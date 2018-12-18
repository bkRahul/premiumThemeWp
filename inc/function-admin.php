<?php
	
	/*

	=======================================
			Theme ADMIN Section
	=======================================

	*/


function sunsetWp_add_admin_page() {

//Generate sunset-theme admin page 
	add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'premium_sunsetWp', 'sunsetWp_theme_create_page', get_template_directory_uri().'/img/sunset-icon.png', 110);


//Generate sunset-theme admin sub-pages 
	add_submenu_page('premium_sunsetWp', 'SunsetWp Theme Options', 'Sidebar Info', 'manage_options', 'premium_sunsetWp', 'sunsetWp_theme_create_page');//(parent-slug, page-title, menu-title, admin privileges, page-url, callback)

	add_submenu_page('premium_sunsetWp', 'SunsetWp Theme Options', 'Theme Options', 'manage_options', 'sunsetWp_options', 'sunsetWp_theme_support_page');//(parent-slug, page-title, menu-title, admin privileges, page-url, callback)

	add_submenu_page('premium_sunsetWp', 'SunsetWp CSS Options', 'Custom CSS', 'manage_options', 'sunsetWp_css', 'sunsetWp_theme_css_page');//(parent-slug, page-title, menu-title, admin privileges, page-url, callback)


//Activate Custom Settings fields
	add_action('admin_init', 'sunsetWp_custom_settings') ;	

}

add_action('admin_menu', 'sunsetWp_add_admin_page');



//*SunsetWp-theme submenu callbacks

	//Generate sunsetWp-theme admin Sidebar Info page template
function sunsetWp_theme_create_page() {
	require_once(get_template_directory().'/inc/admin-templates/sunsetWp-sidebar.php');
}


	//Generate sunsetWp-theme admin General Info page template
function sunsetWp_theme_support_page() {
	require_once(get_template_directory().'/inc/admin-templates/sunsetWp-options.php');
}

	//Generate sunsetWp-theme css content
function sunsetWp_theme_css_page() {
	echo "<h1>Sunset Custom CSS</h1>"; 
}


function sunsetWp_custom_settings() {

//*Theme Sidebar Options*

	//Register Settings fields
	register_setting('sunsetWp-settings-group', 'profile_picture');	
	register_setting('sunsetWp-settings-group', 'first_name');
	register_setting('sunsetWp-settings-group', 'last_name');
	register_setting('sunsetWp-settings-group', 'description');
	register_setting('sunsetWp-settings-group', 'twitter_handler', 'sunsetWp_sanitize_twitter_input');
	register_setting('sunsetWp-settings-group', 'facebook_handler');
	register_setting('sunsetWp-settings-group', 'gplus_handler');


	//Add Settings Section
	add_settings_section('sunsetWp-sidebar-options', 'Sidebar Options', 'sunsetWp_sidebar_options', 'premium_sunsetWp'); //(section-id, title, fieldname, callback, page-url)

	//Add Settings fields
	add_settings_field('profile-picture', 'Profile Picture', 'sunsetWp_sidebar_picture', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);		
	add_settings_field('sidebar-name', 'Full Name', 'sunsetWp_sidebar_name', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);
	add_settings_field('sidebar-description', 'Description', 'sunsetWp_sidebar_description', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);
	add_settings_field('sidebar-twitter', 'Twitter Handler', 'sunsetWp_sidebar_twitter', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);
	add_settings_field('sidebar-facebook', 'Facebook Handler', 'sunsetWp_sidebar_facebook', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);
	add_settings_field('sidebar-gplus', 'Google+ Handler', 'sunsetWp_sidebar_gplus', 'premium_sunsetWp', 'sunsetWp-sidebar-options');//(id, title, callback, page-url, section-id);	


//*Theme Suppport Options*

	register_setting('sunsetWp-theme-support', 'post-formats', 'sunsetWp_post_formats_callback');//(option-group, option-name, option-callback)	

	add_settings_section('sunsetWp-theme-options', 'Theme Options', 'sunsetWp_theme_options', 'sunsetWp_options'); //(section-id, title, fieldname, callback, page-url)

	add_settings_field('post-formats', 'Post Formats', 'sunsetWp_post_formats', 'sunsetWp_options', 'sunsetWp-theme-options');//(id, title, callback, page-url, section-id);	

}

	//Post formats callback
function sunsetWp_post_formats_callback($input) {
	return $input ;
}

function sunsetWp_post_formats(){
	$options = get_option('post-formats');
	$formats = array('aside','image', 'video', 'gallery', 'link', 'quote', 'status', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format) {
		$checked = (@$options[$format] == 1 ? 'checked' : '');
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post-formats['.$format.']" value="1" '.$checked.'/> '.$format.'</label><br>';
	}

	echo $output;
 
}


function sunsetWp_theme_options(){
	echo "<p>Customize your theme Settings Options</p>";
}


function sunsetWp_sidebar_options(){
	echo "<p>Customize your theme Sidebar Information</p>";
}



function sunsetWp_sidebar_picture(){
	$picture = esc_attr(get_option('profile_picture'));
	echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
		 <input type="hidden" name="profile_picture" value="'.$picture.'" id="profile-picture">';
}

function sunsetWp_sidebar_name(){
	$firstname = esc_attr(get_option('first_name'));
	$lastname = esc_attr(get_option('last_name'));
	echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="First Name"></input>
		<input type="text" name="last_name" value="'.$lastname.'" placeholder="Last Name"></input>';
}

function sunsetWp_sidebar_description(){
	$description = esc_attr(get_option('description'));
	echo '<input type="text" name="description" value="'.$description.'" placeholder="Description"></input><p class="description">A little about you</p>';
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



//*Sanitization Settings*

function sunsetWp_sanitize_twitter_input($input) {
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}
?>