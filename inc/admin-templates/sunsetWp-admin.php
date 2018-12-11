<h1>Sunset Theme Options</h1>
<h3 class="title">Manage Options</h3>
<p>Customize the sunsetWp Theme Options</p>

<?php settings_errors(); ?>

<form method="POST" action="options.php">
	
<?php settings_fields('sunsetWp-settings-group'); 	//Call the settings field on the page 	?>

<?php do_settings_sections('premium_sunsetWp');//(page-url to be called on) 	//Call the settings section on the page 	?>

<?php submit_button(); ?>

</form>