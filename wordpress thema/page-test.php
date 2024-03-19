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
//dankje chat gpt
$template_name = 'page-project.php';
// Custom query to retrieve pages using the specified template
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'posts_per_page' => -1, // Display all pages, remove pagination
    'meta_value' => $template_name
);
$pages_query = new WP_Query($args);
$prevpage = null;
$lower = 7777777; //er zullen wel geen 7777777 paginas op deze server staan.
$higher = -1;
$lowest = 7777777;
$highest = 0;
$links = [null,null,null,null];
$eigenID = get_the_id();
if ($pages_query->have_posts()) {
    while ($pages_query->have_posts()) {
	$id = get_the_id();
	$link = get_permalink()
        $pages_query->the_post();
	if($id > $highest){
		$highest = $id;
		$links[0] = $link;
	}
	if($id < $lowest){
		$lowest = $id;
		$links[1] = $link;
	}
	if($id < $higher && $id > $eigenID){
		$higher = $id;
		$links[2] = $link;
	}
	if($id > $lower && $id < $eigenID){
		$lower = $id;
		$links[3] = $link;
	}
    wp_reset_postdata();
}
$nextlink = "";
$prevlink = "";
if(higher == -1){
	$nextlink = $links[1];
}else{
	$nextlink = $links[2];
}
if(higher == 7777777){
	$nextlink = $links[0];
}else{
	$nextlink = $links[3];
}
?>

<?php wp_footer();?>

</body>

</html>