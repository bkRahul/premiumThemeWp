<?php settings_errors(); ?>

<h1>Sunset Contact Form</h1>

<p>Use this Shortcode to activate Contact Form inside Page or Post</p>

<p><code>[contact_form]</code></p>

<div class="container box-container">

<form method="POST" action="options.php" class="sidebar_admin_form">
	
<?php settings_fields('sunsetWp-contact-options'); 	//Call the settings field on the page 	

do_settings_sections('sunsetWp_contact');//(page-url to be called on) 	//Call the settings section on the page 	

submit_button(); ?>

</form>

</div>