<?php	
	/*

	=======================================
		    Theme Custom Post Section
	=======================================

	*/

	$contact = get_option('activate_contact');

	//add custom Post Message for Contact form
	if(!empty($contact)) {
		add_action('init', 'sunsetWp_contact_post_type');
	
	}

	function sunsetWp_contact_post_type(){
	$labels = array(
		'name' => 'Messages',
		'singular_name' => 'Message',
		'menu_name' => 'Messages',
		'name_admin_bar' => 'Message',
	);
	$args = array(
		'labels' => $labels,
		'show_ui' => true,
		'show_in_menu' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'author'
		),
		'menu_position' => 26,
		'menu_icon' => 'dashicons-email-alt'
	);

	register_post_type('sunsetWp-contact',$args);
	}
?>