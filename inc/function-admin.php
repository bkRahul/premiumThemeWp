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
	add_submenu_page('premium_sunsetWp', 'Sunset Theme Options', 'General Info', 'manage_options', 'premium_sunsetWp', 'sunsetWp_theme_create_page');

	add_submenu_page('premium_sunsetWp', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'premium_sunsetWp_css', 'sunsetWp_theme_settings_page');

}

add_action('admin_menu', 'sunsetWp_add_admin_page');

function sunsetWp_theme_create_page() {
	//Generate sunset-theme admin page 
	require_once(get_template_directory().'/inc/admin-templates/sunsetWp-admin.php');
}

function sunsetWp_theme_settings_page() {
	//Generate sunset-theme admin page
	echo "<h1>Sunset Custom CSS</h1>"; 
}

?>