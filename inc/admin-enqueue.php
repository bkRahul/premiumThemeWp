<?php
/*
==================================

	Enqueue sunsetWp Admin Scripts  

==================================
*/

function sunsetWp_admin_script_enqueue($hook) {

//echo $hook;

if('toplevel_page_premium_sunsetWp' == $hook) {

//css
	wp_register_style('sunsetWp_admin', get_template_directory_uri().'/css/sunsetWp-admin.css', array(), '1.0.0', 'all');
	wp_enqueue_style('sunsetWp_admin');


//call media uploader
	wp_enqueue_media();


//js
	wp_register_script('sunsetWp_admin_script', get_template_directory_uri().'/js/sunsetWp-admin.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('sunsetWp_admin_script');

}

else if('sunset_page_sunsetWp_css' == $hook) {

//css
	wp_register_style('sunsetWp_ace', get_template_directory_uri().'/css/sunsetWp-ace.css', array(), '1.0.0', 'all');
	wp_enqueue_style('sunsetWp_ace');


//js
	wp_register_script('ace', get_template_directory_uri().'/js/ace/ace.js', array('jquery'), '1.2.1', true);
	wp_enqueue_script('ace');

	wp_register_script('sunsetWp_ace_script', get_template_directory_uri().'/js/sunsetWp-ace.js', array('jquery'), '1.2.1', true);
	wp_enqueue_script('sunsetWp_ace_script');


}

}

add_action('admin_enqueue_scripts', 'sunsetWp_admin_script_enqueue');


?>