<html lang="en">
<?php
/*
Template Name: Page richtingen
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
<div id="top" style="height: 100px; position: fixed; top: 0; width: 100vw;"></div>
<div id="bottom" style="height: 100px; position: fixed; bottom: 0; width: 100vw;"></div> 
    <div class="TopText">
        <h1>Kies een richting</h1>
        <p>Deze pagina bevat informatie over de richtingen van de opleiding Elektronica-ICT</p>
    </div>

    <!-- The sidebar -->
    <div class="leftbodydiv">
        <!-- The sidebar -->
        <div class="sidebar">
        <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richtingen.php","page-game.php"));?>
            <img id="highkicks" src="wp-content/themes/thema/recourses/images/highkicks.gif">
        </div>
    </div>

    <div class="content">
        <?php
        $elek_page_link = "";
        $ict_page_link = "";
        $child_pages = get_pages( array(
            'child_of' => get_the_ID(),
            'sort_order' => 'ASC',
            'sort_column' => 'menu_order'
        ) );
        foreach ( $child_pages as $child_page ) {
            if(strtolower($child_page->post_title)=="elektronica"){
                $elek_page_link =  get_permalink( $child_page->ID );
            }
            if(strtolower($child_page->post_title)=="ict"){
                $ict_page_link =  get_permalink( $child_page->ID );
            }
        }
        wp_reset_postdata();
        echo "<h3><a href='".$elek_page_link."'>.Elektronica</a></h3>";
        echo "<h3><a href='".$ict_page_link."'>.ICT</a></h3>";
        ?>
    </div>
<?php wp_footer();?>
</body>

</html>