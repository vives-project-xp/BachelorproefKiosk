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
<?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richting.php","page-game.php"));?>
    <img class="topbarimg" src="wp-content/themes/thema/recourses/images/shells.gif">
  </div>


  <div class="wrapper">
    <iframe src="https://snake.googlemaps.com/" width="500" height="500" title="description" class="bacheloring" ></iframe>
  </div>
<?php wp_footer();?>
</body>

</html>
