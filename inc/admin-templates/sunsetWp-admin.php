<?php settings_errors(); ?>
<h1>Sunset Theme Options</h1>

<?php
	
	//Store the field variables for use
 	$picture = esc_attr(get_option('profile_picture'));
 	$firstname = esc_attr(get_option('first_name'));
	$lastname = esc_attr(get_option('last_name'));

	$fullname = $firstname.' '.$lastname;

	$description = esc_attr(get_option('description'));

?>

<div class="container box-container">

<div class="sidebar-preview">
	<div class="image-container">
		<div id="profile-image-preview" class="profile_picture" style="background-image: url(<?php print $picture ?>);"></div>
	</div>
 

	<h1 class="admin-name"><?php print $fullname; ?></h1>
	<h3 class="admin-dscription"><?php print $description; ?></h3>
	<div class="admin-icons"></div>
</div>


<form method="POST" action="options.php" class="sidebar-admin_form">
	
<?php settings_fields('sunsetWp-settings-group'); 	//Call the settings field on the page 	?>

<?php do_settings_sections('premium_sunsetWp');//(page-url to be called on) 	//Call the settings section on the page 	?>

<?php submit_button(); ?>

</form>

</div>