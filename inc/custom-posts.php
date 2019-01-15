<?php	
	/*

	=======================================
		    Theme Custom Post Section
	=======================================

	*/
 
	$contact = get_option('activate_contact');

	//add custom Post Message for Contact form
	if(@$contact == 1) {

		add_action('init', 'sunsetWp_contact_post_type');
		
		add_filter('manage_sunset-contact_posts_columns', 'sunsetWp_set_contact_columns');

		add_action('manage_sunset-contact_posts_custom_column', 'sunsetWp_contact_custom_column', 10, 2 );

		add_action('add_meta_boxes', 'sunsetWp_add_contact_meta_box');

		add_action('save_post', 'sunsetWp_save_email_data');

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
		'menu_icon' => 'dashicons-email-alt',
		'menu_position' => 26,
		'supports' => array(
			'title',
			'editor',
			'author'
		)
	);

	register_post_type('sunset-contact', $args);
	}

//modify the custom post type columns preview
	function sunsetWp_set_contact_columns($columns) {
	
	$newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';

	// unset( $columns['author'] );
	return $newColumns;
	}


//modify the post preview data
	function sunsetWp_contact_custom_column($column, $post_id) {
		switch ($column) {
			case 'message':
				echo get_the_excerpt();
				break;
			
			case 'email':
				$value = get_post_meta($post_id, '_contact_email_value_key', true);
				echo '<a href="mailto:'.$value.'">'.$value.'</a>';
				break;
		}
	}


//add contact email meta box
	function sunsetWp_add_contact_meta_box() {
		add_meta_box('contact_email', 'User Email', 'sunsetWp_contact_email_callback', 'sunset-contact', 'side', 'default');//(id, title, callback, post-type-id)
	}

	function sunsetWp_contact_email_callback($post) {

		wp_nonce_field('sunsetWp_save_email_data', 'sunsetWp_contact_email_meta_box_nonce');//(action, name)

		$value = get_post_meta($post->ID, '_contact_email_value_key', true);

		echo '<label for="sunsetWp_contact_email_field">User Email Address </label>';

		echo '<input type="email" id="sunsetWp_contact_email_field" name="sunsetWp_contact_email_field" value="'.$value.'" size="25"></input>';
	}


//Save the email data
	function sunsetWp_save_email_data($post_id) {
		if (!isset($_POST['sunsetWp_contact_email_meta_box_nonce'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['sunsetWp_contact_email_meta_box_nonce'], 'sunsetWp_save_email_data')) {
			return;
		}

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!isset($_POST['sunsetWp_contact_email_field'])) {
			return;
		}

		$email = sanitize_text_field($_POST['sunsetWp_contact_email_field']);

		update_post_meta($post_id, '_contact_email_value_key', $email);//(post-id, meta_key, meta_value)
	}

?>