<html lang="en">
<?php
/*
Template Name: Project
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
<div class="topbar" type="navbar">
    <ul>
        <li><a href="../../../Home">.Home</a></li>
        <li><a href="../../Projecten">.Projecten</a></li>
        <li><a href="../../Richtingen">.Richtingen</a></li>
        <li><a href="https://agar.io/">.Game</a></li>
    </ul>
    <img class="topbarimg" src="../../../wp-content/themes/ProefGeval/assets/images/shells.gif">
</div>

<div class="backnext">
      <?php
$template_name = 'page-project.php';
// Custom query to retrieve pages using the specified template
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'posts_per_page' => -1, // Display all pages, remove pagination
    'meta_value' => $template_name
);
$pages_query = new WP_Query($args);
$lower = -1; //er zullen wel geen 7777777 paginas op deze server staan.
$higher = 7777777;
$lowest = 7777777;
$highest = 0;
$links = array('0'=>null,'1'=>null,'2'=>null,'3'=>null);
$eigenID = get_the_id();
if ($pages_query->have_posts()) {
    while ($pages_query->have_posts()) {
        $pages_query->the_post();
	$id = get_the_id();
	$link = get_permalink();
	if($id > $highest){
		$highest = $id;
		$links['0'] = $link;
	}
	if($id < $lowest){
		$lowest = $id;
		$links['1'] = $link;
	}
	if($id < $higher && $id > $eigenID){
		$higher = $id;
		$links['2'] = $link;
	}
	if($id > $lower && $id < $eigenID){
		$lower = $id;
		$links['3'] = $link;
	}
	wp_reset_postdata();
    }
}
$nextlink = "maria";
$prevlink = "mario";
if($higher == 7777777){
	$nextlink = $links['1'];
}else{
	$nextlink = $links['2'];
}
if($lower == -1){
	$prevlink = $links['0'];
}else{
	$prevlink = $links['3'];
}

echo "<button class='back' onclick=redirect('".$prevlink."')>Back</button>";
echo "<button class='next' onclick=redirect('".$nextlink."')>Next</button>";
?>
</div>

<div class="wrapper">
    <?php
$page_content = get_post_field('post_content', get_the_ID());

// Use WordPress functions to parse the content and extract the image URL
$image_url = "project";
//print_r($page_content);
if (preg_match('/<img.+?src="(.+?)"/', $page_content, $matches)) {
    $image_url = $matches[1];
}
// Output the image URL
echo "<img class='bachelorimg' src='".$image_url."'>";
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