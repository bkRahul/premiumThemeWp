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

	//Add Settings Section
	add_settings_section('sunsetWp-sidebar-options', 'Sidebar Options', 'sunsetWp_sidebar_options', 'premium_sunsetWp'); //(section-id, title, fieldname, callback, page-id)
	
	//
	add_settings_field('sidebar_name', 'First Name', 'sunsetWp_sidebar_name', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-id, section-id);
}

function sunsetWp_sidebar_options(){
	echo "Sunset Sidebar Options";
}

function sunsetWp_sidebar_name(){
	$firstname = esc_attr(get_option('first_name'));
	echo '<input type="text" name="first_name" value="'.$firstname.'"></input>';
}
?>