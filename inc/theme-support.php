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


?>