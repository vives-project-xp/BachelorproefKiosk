<html lang="en">
<?php
/*
Template Name: Game
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
  <h1>Game</h1>
  <div class="topbar">
    <ul>
      <li><a href="../../Home">.Home</a></li>
      <li><a href="../Projecten">.Projecten</a></li>
      <li><a href="../Richtingen">.Richtingen</a></li>
      <li><a href="https://agar.io/">.Game</a></li>
    </ul>
    <img class="topbarimg" src="../../../wp-content/themes/ProefGeval/assets/images/shells.gif">
  </div>


  <div id="gameContainer">
    <canvas id="gameBoard"></canvas>
  </div>

  <div id="scoreText">0</div>

  <button id="resetBtn">Reset</button>

<?php wp_footer();?>
</body>

</html>