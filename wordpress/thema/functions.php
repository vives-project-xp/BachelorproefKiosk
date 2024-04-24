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
function get_next_prev_link($index){
	//return = [url prev, url next]
	$args = array(
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => "page-project.php"		
	);
	$argspdf = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'application/pdf',
		'posts_per_page' => -1, // Retrieve all PDFs
	);
	$links = ["mario", "luigi"];
	$indieces = [0,0];
	$filePage = get_link_page("page-docu.php");
	$dedic_pages = get_pages($args);
	$pdf_attachments = get_posts($argspdf);
	$array = array_merge($pdf_attachments, $dedic_pages);
	if($index != 0){
		$links[0] = $array[$index-1];
		$indieces[0] = $index-1;
	}else{
		$links[0] = $array[count($array-1)];
		$indieces[0] = count($array-1);
	}
	if($index != count($array-1)){
		$links[1] = $array[$index+1];
		$indieces[1] = $index+1;
	}else{
		$links[1] = $array[0];
		$indieces[1] = 0;
	}
	if($indieces[0] < count($pdf_attachments)){
		$links[0] = get_link_page("page-docu.php")."?&file=".$links[0]->getFilename()."&id=". $indieces[0];
	}else{
		$links[0] = get_page_link($links[0]->ID)."?&id=". $indieces[0];
	}
	if($indieces[1] < count($pdf_attachments)){
		$links[1] = get_link_page("page-docu.php")."?&file=".$links[1]->getFilename()."&id=". $indieces[1];
	}else{
		$links[1] = get_page_link($links[1]->ID)."?&id=". $indieces[1];
	}
	return $links;
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