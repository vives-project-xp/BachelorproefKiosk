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
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <div class="TopText">
        <h1>Kies een richting</h1>
        <p>Deze pagina bevat informatie over de richtingen van de opleiding Elektronica-ICT</p>
    </div>

    <!-- The sidebar -->
    <div class="leftbodydiv">
        <!-- The sidebar -->
        <div class="sidebar">
        <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richting.php"));?>
            <img id="highkicks" src="wp-content/uploads/highkicks.gif">
        </div>
    </div>

    <div class="content">

        <h3><a href="<?php echo get_link_page("page-projecten.php")."/elektronica" ?>">.Elektronica</a></h3>


        <h3><a href="<?php echo get_link_page("page-projecten.php")."/ict" ?>">.ICT</a></h3>

    </div>
<?php wp_footer();?>
</body>

</html>