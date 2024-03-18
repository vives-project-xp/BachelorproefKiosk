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
            <li><a href="/home/Projecten">.Bachelor Projecten</a></li>
            <li><a href="/home/Richtingen">.Richting informatie</a></li>
            <li><a href="https://agar.io/">.Game</a></li>
        </ul>
    </div>

    <div class="ghost-container">
        <img src="../../wp-content/themes/ProefGeval/assets/images/kisspng-pac-man-ghosts-pac-man-5ac80be7e06367.0261825015230596879191-kopie.png"
            class="red-ghost-picture">
        <img src="../../wp-content/themes/ProefGeval/assets/images/red-gost-left.png" class="left-ghost-picture">
    </div>
</body>
<footer>
    <p>&copy; 2024 Passionately made by Kenrie, Seraphin & Domien <img src="../../wp-content/uploads/2024/03/pixel-heart.gif" alt=""></p>
  </footer>
  <?php wp_footer();?>
</html>