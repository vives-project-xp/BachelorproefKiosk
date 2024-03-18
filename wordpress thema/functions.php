<?php

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
