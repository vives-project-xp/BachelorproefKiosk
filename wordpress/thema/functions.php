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