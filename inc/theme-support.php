<?php
/*


This is the template for the theme support options

@package SunsetWp


*/


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


	//add theme support for widgets sidebar
	function sunsetWp_sidebar_setup() {
	register_sidebar(
		array(
			'name' => 'SunsetWp Sidebar',
			'id' => 'sidebar-1',
			'class' => 'custom',
			'description' => 'Standard Theme Sidebar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h6 class="sunsetWp-widget-title">',
			'after_title' => '</h6>'
		 ));
	}

	add_action('widgets_init', 'sunsetWp_sidebar_setup');


	//add HTML5 feature
	add_theme_support( 'html5', array('comment-list', 'comment-form, search-form', 'gallery', 'caption') );
?>