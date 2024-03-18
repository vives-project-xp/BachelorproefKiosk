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
      <img src="http://10.10.18.5:8080/wp-content/uploads/2024/03/asemgou-of-aventura-arcade.gif" class="kong">
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
      <div id="P1">
        <h2>Proef 1</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P2">
        <h2>Proef 2</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P3">
        <h2>Proef 3</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P4">
        <h2>Proef 4</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P5">
        <h2>Proef 5</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P6">
        <h2>Proef 6</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P7">
        <h2>Proef 7</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P8">
        <h2>Proef 8</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P9">
        <h2>Proef 9</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P10">
        <h2>Proef 10</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P11">
        <h2>Proef 11</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P12">
        <h2>Proef 12</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P13">
        <h2>Proef 13</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P14">
        <h2>Proef 14</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P15">
        <h2>Proef 15</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P16">
        <h2>Proef 16</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P17">
        <h2>Proef 17</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P18">
        <h2>Proef 18</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P19">
        <h2>Proef 19</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>

      <div id="P20">
        <h2>Proef 20</h2>
        <p>Deze proef gaat over ...</p><br>
      </div>
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