<?php
/*
Template Name: fileTest 
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

<body <?php body_class();?>>
  <div class="TopText">
    <?php
	//    <h1>Bachelor Proeven</h1>
	$string = explode('/',$_SERVER['REQUEST_URI']);//Array ( [0] => [1] => ?page_id=7 [2] => electronica)
	$stringo = $string[sizeof($string)-1];
  if(sizeof($string) != 3){
    $stringo = "projecten";
  }
	//print_r($string);
	echo '<h1>'.$stringo.'</h1>';
    ?>
    <p>Deze pagina bevat informatie over de bachelor proeven van de richting <br>Elektronica-ICT</p>
  </div>
  <div class="bodydiv">
    <div class="leftbodydiv">
    <!-- The sidebar -->
    <div class="sidebar">
    <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richting.php","page-game.php"));?>
      <img src="wp-content/themes/thema/recourses/images/asemgou-of-aventura-arcade.gif" class="kong">
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
<div style="display:none" class="data">
<?php foreach (new DirectoryIterator('wp-content/themes/thema/recourses/folders') as $file) {
    if($file->isDot()) continue;
    print $file->getFilename() . '<br>';
    } 
   ?>
</div>
    <!-- proeven -->
    <div class="content" id="proevenDiv">
      <?php
//dankje chat gpt
$template_name = 'page-project.php';
// Custom query to retrieve pages using the specified template	
$args = array();
if($stringo == 'projecten' || $stringo == 'Projecten'){
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
	}
}else{
	$current_page_id = get_the_ID();
	$args = array(
	    'child_of' => $current_page_id,
	    'sort_column' => 'menu_order', // Sort by menu order
	    'sort_order' => 'ASC', // Ascending order
	);
	//$pages_query = new WP_Query($args);
	$pages_query = get_pages($args);
	if ($pages_query) {
	    //print_r($pages_query);
	    echo '<ul>';
	    // Loop through each page
	    foreach ( $pages_query as $child_page ) {
      echo '<li><a href="' . $child_page->guid . '">' . $child_page->post_title . '</a></li>';
	    }
	    echo '</ul>';

	}
}

    // Restore original post data
    wp_reset_postdata();
	?>
    </div>
  </div>
<?php wp_footer();?>
</body>

</html>
