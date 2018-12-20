<?php settings_errors(); ?>
<h1>Sunset Contact Options</h1>

<div class="container box-container">

<form method="POST" action="options.php" class="sidebar_admin_form">
	
<?php settings_fields('sunsetWp-contact-options'); 	//Call the settings field on the page 	?>

<?php do_settings_sections('sunsetWp_contact');//(page-url to be called on) 	//Call the settings section on the page 	?>

<?php submit_button(); ?>

</form>

</div>