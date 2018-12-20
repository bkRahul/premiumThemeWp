<?php

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

	if(!empty($background)) {

	add_theme_support('custom-background');
	
	}

	if(!empty($header)) {

	add_theme_support('custom-header');
	
	}


?>