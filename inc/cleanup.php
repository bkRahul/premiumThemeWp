<?php 
/*


This is the cleanup template for the sunsetWp theme

@package SunsetWp


*/


/* Remove the version string from css and js */

function sunsetWp_remove_version_strings($src) {
	global $wp_version;
	parse_str(parse_url($src, PHP_URL_QUERY), $query); 
	if(!empty($query['ver']) && $query['ver'] == $wp_version ) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}

add_filter('script_loader_src', 'sunsetWp_remove_version_strings');
add_filter('style_loader_src', 'sunsetWp_remove_version_strings');



/* Remove the meta tag generator*/

function sunsetWp_remove_meta_version() {
	return '';
}

add_filter('the_generator', 'sunsetWp_remove_meta_version');



?>