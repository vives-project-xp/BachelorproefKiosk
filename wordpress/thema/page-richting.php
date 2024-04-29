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
    <script type="text/javascript" src="wp-content/themes/thema/recourses/js/Disable_scroll.js" defer></script>
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
        <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richting.php","page-game.php"));?>
            <img id="highkicks" src="wp-content/themes/thema/recourses/images/highkicks.gif">
        </div>
    </div>

    <div class="content">
        <?php
        $elek_page_link = "";
        $ict_page_link = "";
        $args = array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-projecten.php'		
        );
        $pages_query = new WP_Query($args);
        if ($pages_query->have_posts()) {
            while($pages_query->have_posts()){
                $pages_query->the_post();
                if(strtolower(get_the_title())=="elektronica"){
                    $elek_page_link = get_permalink();
                }
                if(strtolower(get_the_title())=="ict"){
                    $ict_page_link = get_permalink();
                }
            }
        }
        wp_reset_postdata();
        echo "<h3><a href='".$elek_page_link."/elektronica'>.Elektronica</a></h3>";
        echo "<h3><a href='".$ict_page_link."/ict'>.ICT</a></h3>";
        ?>
    </div>
<?php wp_footer();?>
</body>

</html>