<html lang="en">
<?php
/*
Template Name: Page richting
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
    <!-- Java script connection -->
    <script defer src="./recourses/js/script.js"></script>

    <!-- WELKE VIEZE MADERFACKER HAD HET IDEE OM SPYWARE EN BLOATWARE IN ONZE SITE TE STEKEN >:( -->
    <!-- Google charts connection -->
    <!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->
    <!-- Kit fontawesome and bootstrap -->
    <script src="https://kit.fontawesome.com/6485483773.js" crossorigin="anonymous"></script>
    <!-- css connection -->
    <link rel="stylesheet" href="/Website/recourses/css/style.css">
    <?php wp_head();?>
</head >

<body <?php body_class();?>>
    <div class="titel">
        <h2><?php echo get_the_title(get_the_ID()) ?></h2>
    </div>
    <div class="topbar">
        <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richtingen.php","page-game.php"));?>
        <img src="wp-content/themes/thema/recourses/images/megaman-nt-warrior-anime.gif" width="50px">
    </div>

    <div class="projectwrapper">
        <div class="splitter">
            <img src="wp-content/themes/thema/recourses/images/ezgif.com-crop1.gif" class="splitter">
        </div>

        <div class="richtingbrochure">
            <?php 
                echo "<img src='wp-content/themes/thema/recourses/folders/".get_the_title(get_the_ID()).".jpeg' id='imgrichting'>"
            ?>
        </div>

    </div>
</body>
<?php wp_footer();?>
</html>