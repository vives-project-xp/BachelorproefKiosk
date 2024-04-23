<?php

function get_menu_links($templates){
	/*output zoals dit:
	<ul>
		<li><a href="../../Home">.Home</a></li>
		<li><a href="../Projecten">.Projecten</a></li>
		<li><a href="../Richtingen">.Richtingen</a></li>
		<li><a href="https://agar.io/">.Game</a></li>
	</ul>*/
	$output = "<ul>";
	//$templates = array("index.php","page-projecten.php","page-richtingen.php");
	foreach($templates as $template){
        $args = array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $template,
			'depth' => 1, // maximale diepte in descendanten van paginas	
			'echo' => 0, // Return the result instead of echoing it
		);
		$pages = wp_list_pages($args);
		// Convert the list of pages into an array
		$pages_array = explode("\n", $pages);
		
		// Extract the title from the first page link
		if (!empty($pages_array[0])) {
			preg_match('/<a(.*?)<\/a>/', $pages, $matches);
			$output .= '<li>' . $matches[0] . '</li>';
		} else {
			echo "No pages found with the specified template.";
		}
	}
    $output .= '</ul>';
	wp_reset_postdata();
	return $output;
}

function get_link_page($page){
	$args = array(
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => $page		
	);
	$pages_query = new WP_Query($args);
	if (!$pages_query->have_posts()) {
		return "importeer het juiste aub";
	}
	$pages_query->the_post();
	$link = get_permalink();
	wp_reset_postdata();
	return $link;
}
function get_next_prev_link($index, $mode){
	//return = [url prev, url next]
	$links = ["mario", "luigi"];
	$i = 0;
	if($mode == "doc"){
		$files = scandir('wp-content/themes/thema/recourses/folders');
		$fileCount = count($files) - 2;
		if($index == 0){
			//links[0] op laatste van pages
			if($index+1 >= $fileCount){
				links[1] = $files[$index]
			}
			
		}
		if($index+1 >= $fileCount){
			//links[1] op eerste van pages
		}
	}else{
		
	}
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
}
function load_stylesheets(){

	wp_register_style('stylesheet', get_template_directory_uri().'/recourses/css/style.css', array(), false, 'all');
	wp_enqueue_style('stylesheet');
	
}
add_action('wp_enqueue_scripts','load_stylesheets');
function loadjs(){
	wp_register_script('scripto', get_template_directory_uri().'/recourses/js/script.js', '', 1, true);
	wp_enqueue_script('scripto');
}
add_action('wp_enqueue_scripts','loadjs');
?>