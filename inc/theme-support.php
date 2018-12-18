<?php

 	$options = get_option('post-formats');

	$formats = array('aside','image', 'video', 'gallery', 'link', 'quote', 'status', 'audio', 'chat');
	
	$output = array();
	
	foreach ($formats as $format) {

		$output[]  = (@$options[$format] == 1 ? $format : '');

	}
	
	if(!empty($options)) {

	add_theme_support('post-formats', $output);
	
	}


?>