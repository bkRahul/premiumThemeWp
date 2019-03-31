<?php 
/*


This is the template for the custom widgets

@package SunsetWp


*/


class SunsetWp_Profile_Widget extends WP_Widget {
	
	//setup widget name, description

	public function __construct() {

		$widget_ops = array(
			'classname' => 'sunset-profile-widget',
			'description' => 'Custom Sunset Profile Widget',
		);

		parent::__construct( 'sunset_profile', 'Sunset Profile', $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {
		echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields of this Widget from <a href="./admin.php?page=premium_sunsetWp">This Page</a></p>';
	}

	//frontend display of widget
	public function widget( $args, $instance) {

		$picture = esc_attr( get_option('profile_picture') );
		$firstname = esc_attr( get_option('first_name') );
		$lastname = esc_attr( get_option('last_name') );

		$fullname = $firstname.' '.$lastname;
		$description = esc_attr( get_option('description') );

		$twitter_icon = esc_attr( get_option('twitter_handler') );
		$facebook_icon = esc_attr( get_option('facebook_handler') );
		$googleplus_icon = esc_attr( get_option('gplus_handler') );		

		echo $args['before_widget']; 

?>

<div class="sidebar-preview">
	<div class="image-container">
		<div id="profile-image-preview" class="profile_picture" style="background-image: url(<?php print $picture ?>);"></div>
	</div>
 

	<h1 class="admin-name"><?php print $fullname; ?></h1>
	<h5 class="admin-description"><?php print $description; ?></h5>
	<div class="admin-social-icons">
		<?php if( !empty( $facebook_icon ) ): ?>
			<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank" class="sunset-icon-sidebar sunset-icon sunset-facebook"></a>
		<?php endif; 

		 if( !empty( $googleplus_icon ) ): ?>
			<a href="https://plus.gogle.com/<?php echo $googleplus_icon; ?>" target="_blank" class="sunset-icon-sidebar sunset-icon sunset-googleplus"></a>
		<?php endif; 

		 if( !empty( $twitter_icon ) ): ?>
			<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank" class="sunset-icon-sidebar sunset-icon sunset-twitter"></a>
		<?php endif; ?>		
	</div>
</div>

<?php 

	echo $args['after_widget'];

	}
}

add_action( 'widgets_init', function(){
	register_widget( 'SunsetWp_Profile_Widget' );
} );



//Edit default WordPress widgets

function sunsetWp_tag_cloud_font_change( $args ) {
	
	$args['smallest'] = 8;
	$args['largest'] = 10;
	
	return $args;
	
}

add_filter( 'widget_tag_cloud_args', 'sunsetWp_tag_cloud_font_change' );


//Edit the category links

function sunsetWp_list_categories_output_change( $links ) {
	
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
	
}
add_filter( 'wp_list_categories', 'sunsetWp_list_categories_output_change' );