<?php
	
	/*

	============================
			ADMIN PAGE
	============================

	*/


function sunsetWp_add_admin_page() {

	add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'premium-sunsetWp', 'sunsetWp_theme_create_page', get_template_directory_uri().'/img/sunset-icon.png', 110);
}

add_action('admin_menu', 'sunsetWp_add_admin_page');

function sunsetWp_theme_create_page() {
	//Generate sunset-theme admin page 
}

?>