<html lang="en">
<?php
/*
Template Name: Doc page
*/
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Kenrie Vandekerckhove">
    <meta name="author" content="Domien Verstraete">
    <meta name="author" content="Seraphin Sampers">
    <script type="text/javascript" src="wp-content/themes/thema/recourses/js/Disable_scroll.js" defer></script>
    <title>Bachelor Kiosk</title>
<?php wp_head();?>
</head>

<body <?php body_class();?>>
<div class="topbar" type="navbar">
    <ul>
    <?php echo get_menu_links(array("page-menu.php","page-projecten.php","page-richting.php","page-game.php"));?>
    </ul>
    <img class="topbarimg" src="wp-content/themes/thema/recourses/images/shells.gif">
</div>

<div class="backnext">
    <?php
        $index = $_GET["id"];
        $file = $_GET["file"];
        $links = get_next_prev_link($index);
        echo "<button class='back' onclick=redirect('".$links[0]."')>Back</button>";
        echo "<button class='next' onclick=redirect('".$links[1]."')>Next</button>";
    ?>
</div>

<div class="wrapper">
<?php
echo do_shortcode("[pdfjs-viewer url=".$file." viewer_width=0 viewer_height=800 download=false print=false fullscreen=false]");
?>
</div>

</div>
<?php wp_footer();?>
</body>
<script>
function redirect(url){
	window.location.href = url;
}
</script>
</html>
