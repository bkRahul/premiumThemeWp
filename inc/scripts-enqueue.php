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


/*
=======================================

	Enqueue sunsetWp Frontend Scripts  

=======================================
*/

function sunsetWp_script_enqueue() {

//css

	wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0','all');

	wp_enqueue_style('sunsetWpstyle', get_template_directory_uri().'/css/sunsetWp.css', array(), '1.0', 'all');

	wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,400');

//js


	wp_deregister_script('jquery');

	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', false, '3.2.1', true);

	wp_enqueue_script('jquery');
	
	wp_enqueue_script('popperjs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '3.3.1', true);

	wp_enqueue_script('bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

	wp_enqueue_script('sunsetWpjs', get_template_directory_uri().'/js/sunsetWp.js', array('jquery'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'sunsetWp_script_enqueue');

?>