<?php
	
	/*

	============================
			ADMIN PAGE
	============================

	*/


function sunsetWp_add_admin_page() {

//Generate sunset-theme admin page 
	add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'premium_sunsetWp', 'sunsetWp_theme_create_page', get_template_directory_uri().'/img/sunset-icon.png', 110);


//Generate sunset-theme admin sub-pages 
	add_submenu_page('premium_sunsetWp', 'Sunset Theme Options', 'General Info', 'manage_options', 'premium_sunsetWp', 'sunsetWp_theme_create_page');//(id, title, fieldname, admin privileges, page-url, callback)

	add_submenu_page('premium_sunsetWp', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'premium_sunsetWp_css', 'sunsetWp_theme_settings_page');//(id, title, fieldname, admin privileges, page-url, callback)

//Activate Custom Settings fields
	add_action('admin_init', 'sunsetWp_custom_settings') ;	

}

add_action('admin_menu', 'sunsetWp_add_admin_page');

	//Generate Custom sunsetWp-theme admin General Info page 
function sunsetWp_theme_create_page() {
	require_once(get_template_directory().'/inc/admin-templates/sunsetWp-admin.php');
}

	//Generate sunsetWp-theme css page
function sunsetWp_theme_settings_page() {
	echo "<h1>Sunset Custom CSS</h1>"; 
}

function sunsetWp_custom_settings() {
	//Register Settings fields
	register_setting('sunsetWp-settings-group', 'first_name');
	register_setting('sunsetWp-settings-group', 'last_name');
	register_setting('sunsetWp-settings-group', 'twitter_handler', 'sunsetWp_sanitize_twitter_input');
	register_setting('sunsetWp-settings-group', 'facebook_handler');
	register_setting('sunsetWp-settings-group', 'gplus_handler');

	//Add Settings Section
	add_settings_section('sunsetWp-sidebar-options', 'Sidebar Options', 'sunsetWp_sidebar_options', 'premium_sunsetWp'); //(section-id, title, fieldname, callback, page-id)
	
	//Add Settings fields
	add_settings_field('sidebar_name', 'Full Name', 'sunsetWp_sidebar_name', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-id, section-id);
	//Add Settings fields
	add_settings_field('sidebar_twitter', 'Twitter Handler', 'sunsetWp_sidebar_twitter', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-id, section-id);
	//Add Settings fields
	add_settings_field('sidebar_facebook', 'Facebook Handler', 'sunsetWp_sidebar_facebook', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-id, section-id);
	//Add Settings fields
	add_settings_field('sidebar_gplus', 'Google+ Handler', 'sunsetWp_sidebar_gplus', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-id, section-id);	
}

function sunsetWp_sidebar_options(){
	echo "customize your theme Sidebar information";
}

function sunsetWp_sidebar_name(){
	$firstname = esc_attr(get_option('first_name'));
	$lastname = esc_attr(get_option('last_name'));
	echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="First Name"></input>
		<input type="text" name="last_name" value="'.$lastname.'" placeholder="Last Name"></input>';
}

function sunsetWp_sidebar_twitter(){
	$twitterhandler = esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitterhandler.'" placeholder="Twitter Handler"></input><p class="description">Input your twitter username without @ character</p>';
}

function sunsetWp_sidebar_facebook(){
	$facebookhandler = esc_attr(get_option('facebook_handler'));
	echo '<input type="text" name="facebook_handler" value="'.$facebookhandler.'" placeholder="Facebook Handler"></input>';
}

function sunsetWp_sidebar_gplus(){
	$gplushandler = esc_attr(get_option('gplus_handler'));
	echo '<input type="text" name="gplus_handler" value="'.$gplushandler.'" placeholder="Google+ Handler"></input>';
}



//Sanitization Settings

function sunsetWp_sanitize_twitter_input($input) {
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}
?>