<html lang="en">
<?php
/*
Template Name: Projecten 
*/
?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Kenrie Vandekerckhove">
  <meta name="author" content="Domien Verstraete">
  <meta name="author" content="Seraphin Sampers">
  <title>Bachelor Kiosk</title>
  <?php wp_head();?>
</head>

<body onload="fetchData()" <?php body_class();?>>
  <div class="TopText">
    <h1>Bachelor Proeven</h1>
    <p>Deze pagina bevat informatie over de bachelor proeven van de richting <br>Elektronica-ICT</p>
  </div>
  <div class="bodydiv">
    <div class="leftbodydiv">
    <!-- The sidebar -->
    <div class="sidebar">
      <ul>
        <li><a href="../../home">.Home</a></li>
        <li><a href="../projecten">.Projecten</a></li>
        <li><a href="../richtingen">.Richtingen</a></li>
        <li><a href="../game">.Game</a></li>
      </ul>
      <img src="../../wp-content/themes/ProefGeval/assets/images/asemgou-of-aventura-arcade.gif" class="kong">
    </div>

    <!-- Sidebar with boxes -->
    <div class="sidebarCheck">
      <h2>Filters:</h2>
      <ul>
        <li>
          <input type="checkbox" id="option1" name="checkbox" value="option1">
          <label for="option1">Electronica</label>
      </li>
      <li>
          <input type="checkbox" id="option2" name="checkbox" value="option2">
          <label for="option2">Network & System Admin</label>
      </li>
      <li>
          <input type="checkbox" id="option3" name="checkbox" value="option3">
          <label for="option3">Software Engineer & AI</label>
      </li>
      </ul>
    </div>
</div>

    <!-- proeven -->
    <div class="content" id="proevenDiv">
      <?php
//dankje chat gpt
$template_name = 'page-project.php';
// Custom query to retrieve pages using the specified template
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'posts_per_page' => -1, // Display all pages, remove pagination
    'meta_value' => $template_name
);
$pages_query = new WP_Query($args);
if ($pages_query->have_posts()) {
    echo '<ul>';
    // Loop through each page
    while ($pages_query->have_posts()) {
        $pages_query->the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }
    echo '</ul>';
    // Restore original post data
    wp_reset_postdata();
}
	?>
    </div>
  </div>
<?php wp_footer();?>
</body>

</html>
<script>
  function fetchData(){
    //verbinding met de backend checken
  fetch("http://"+backendAddr+"/backend").then(function(response) {
    if (!response.ok) {
        //oke de verbinding met de backend is niet werkend en we moeten het dus laten bij de template fiches
    }else{
      let Container = document.getElementById("proevenDiv")
      //leeg maken van de div
      while(Container.firstChild){
        Container.removeChild(Container.firstChild);
      }
      fetch("http://"+backendAddr+"/backend/getFiches/all").then(async function(response) {
        let data = await response.json();
        console.log(data)
        for(let i = 0; i<data.length; i++){
          /*template
          <div id="P19">
            <h2>Proef 19</h2>
            <p>Deze proef gaat over ...</p><br>
          </div>*/
          let containerDiv = document.createElement("div")
          let h2 = document.createElement("a")
          let p = document.createElement("p")
          h2.textContent = data[i].titel
          h2.href = "project.html?"+data[i].id
          p.textContent = data[i].tekst
          containerDiv.appendChild(h2)
          containerDiv.appendChild(p)
          Container.appendChild(containerDiv)
        }
      })
    }
  })
  }
</script>