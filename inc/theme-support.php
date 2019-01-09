<?php
/*


This is the template for the theme support options

@package SunsetWp


*/
?>




<?php
	/*

	=======================================
			Theme Support Section
	=======================================

	*/


	//add theme support for post-formats
 	$options = get_option('post_formats');

	$background = get_option('custom_background');

	$header = get_option('custom_header');

	$formats = array('aside','image', 'video', 'gallery', 'link', 'quote', 'status', 'audio', 'chat');
	
	$output = array();
	
	foreach ($formats as $format) {

		$output[]  = (@$options[$format] == 1 ? $format : '');

	}
	
	if(!empty($options)) {

	add_theme_support('post-formats', $output);
	
	}

	//add theme support for background
	if(!empty($background)) {

	add_theme_support('custom-background');
	
	}

	//add theme support for header
	if(!empty($header)) {

	add_theme_support('custom-header');
	
	}

	//add theme support for featured image
 
	add_theme_support('post-thumbnails');
 

	//add theme support for menu

	function sunsetWp_register_nav_menu() {
		register_nav_menu('primary', 'Header Navigation Menu');
	}

	add_action('init', 'sunsetWp_register_nav_menu');

?>