<?php

function get_menu_links($templates){
	/*output zoals dit:
	<ul>
		<li><a href="../../Home">.Home</a></li>
		<li><a href="../Projecten">.Projecten</a></li>
		<li><a href="../Richtingen">.Richtingen</a></li>
		<li><a href="https://agar.io/">.Game</a></li>
	</ul>*/
	$GAME_URL = "https://agar.io/";
	$output = "<ul>";
	//$templates = array("index.php","page-projecten.php","page-richtingen.php");
	foreach($templates as $template){
        $args = array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $template		
		);
		$pages_query = new WP_Query($args);

		if (!$pages_query->have_posts()) {
			$output .="importeer het juiste aub";
		}
		//while ($pages_query->have_posts()) {
			$pages_query->the_post();
			$output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		//}
		
	}
    $output .= '<li><a href="' . esc_url($GAME_URL) . '">Game</a></li>';
    $output .= '</ul>';
	wp_reset_postdata();
	return $output;
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