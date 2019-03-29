<?php settings_errors(); ?>
<h1>Sunset Sidebar Options</h1>

<?php
	
	//Store the field variables for use
	$picture = esc_attr( get_option('profile_picture') );
	$firstname = esc_attr( get_option('first_name') );
	$lastname = esc_attr( get_option('last_name') );

	$fullname = $firstname.' '.$lastname;
	$description = esc_attr( get_option('description') );

	$twitter_icon = esc_attr( get_option('twitter_handler') );
	$facebook_icon = esc_attr( get_option('facebook_handler') );
	$googleplus_icon = esc_attr( get_option('gplus_handler') );
?>

<div class="container box-container">

<div class="sidebar-preview">
	<div class="image-container">
		<div id="profile-image-preview" class="profile_picture" style="background-image: url(<?php print $picture ?>);"></div>
	</div>
 

	<h1 class="admin-name"><?php print $fullname; ?></h1>
	<h3 class="admin-description"><?php print $description; ?></h3>
	<div class="admin-social-icons">
		<?php if( !empty( $facebook_icon ) ): ?>
			<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="sunset-icon-sidebar dashicons-before dashicons-facebook"></span></a>
		<?php endif; 

		 if( !empty( $googleplus_icon ) ): ?>
			<a href="https://twitter.com/<?php echo $googleplus_icon; ?>" target="_blank"><span class="sunset-icon-sidebar dashicons-before dashicons-googleplus"></span></a>
		<?php endif; 

		 if( !empty( $twitter_icon ) ): ?>
			<a href="https://plus.gogle.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="sunset-icon-sidebar dashicons-before dashicons-twitter"></span></a>
		<?php endif; ?>		
	</div>
</div>


<form method="POST" action="options.php" class="sidebar-admin-form">
	
<?php settings_fields('sunsetWp-settings-group'); 	//Call the settings field on the page 	?>

<?php do_settings_sections('premium_sunsetWp');//(page-url to be called on) 	//Call the settings section on the page 	?>

<?php submit_button('Save Changes', 'primary', 'btnsubmit'); ?>

</form>

</div>