<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Kenrie Vandekerckhove">
    <meta name="author" content="Domien Verstraete">
    <meta name="author" content="Seraphin Sampers">
    <title>Bachelor Kiosk</title>
    <?php wp_head();?>
    <!-- css connection -->
</head>

<body <?php body_class();?>>
    <h1>Menu</h1>
    <div class="wrapper">
    <?php echo get_menu_links(array("page-projecten.php","page-richting.php","page-game.php"));?>
    </div>

    <div class="ghost-container">
        <img class="red-ghost-picture" src="wp-content/themes/thema/recourses/images/kisspng-pac-man-ghosts-pac-man-5ac80be7e06367.0261825015230596879191-kopie.png">
        <img class="left-ghost-picture" src="wp-content/themes/thema/recourses/images/red-gost-left.png">
    </div>
</body>
<footer>
    <p>&copy; 2024 Passionately made by Kenrie, Seraphin & Domien <img src="wp-content/themes/thema/recourses/images/pixel-heart.gif" alt=""></p>
  </footer>
  <?php wp_footer();?>
</html>