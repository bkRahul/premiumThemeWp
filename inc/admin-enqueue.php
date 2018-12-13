<?php
/*
==========================

	Enqueue sunsetWp Admin Scripts  

==========================
*/

function sunsetWp_admin_script_enqueue($hook) {

if('toplevel_page_premium_sunsetWp' != $hook) {
	return;
}

//css
	wp_register_style('sunsetWp_admin', get_template_directory_uri().'/css/sunsetWp-admin.css', array(), '1.0.0', 'all');
	wp_enqueue_style('sunsetWp_admin');
}


add_action('admin_enqueue_scripts', 'sunsetWp_admin_script_enqueue');


?>