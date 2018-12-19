<?php settings_errors(); ?>
<h1>Sunset Theme Options</h1>

<div class="container box-container">

<form method="POST" action="options.php" class="sidebar_admin_form">
	
<?php settings_fields('sunsetWp-theme-support'); 	//Call the settings field on the page 	?>

<?php do_settings_sections('sunsetWp_options');//(page-url to be called on) 	//Call the settings section on the page 	?>

<?php submit_button(); ?>

</form>

</div>