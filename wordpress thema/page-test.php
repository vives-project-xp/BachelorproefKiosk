<html lang="en">
<?php
/*
Template Name: test
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
    say yooo-o

<?php
$page_content = get_post_field('post_content', get_the_ID());

// Use WordPress functions to parse the content and extract the image URL
$image_url = "sex";
//print_r($page_content);
if (preg_match('/<img.+?src="(.+?)"/', $page_content, $matches)) {
    $image_url = $matches[1];
}
// Output the image URL
echo $image_url;
?>

<?php wp_footer();?>

</body>

</html>