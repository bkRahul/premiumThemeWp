<?php 
/*


This is the template for the custom widgets

@package SunsetWp


*/


class SunsetWp_Profile_Widget extends WP_Widget {
	
	//setup widget name, description

	public function __construct() {

		$widget_ops = array(
			'classname' => 'sunsetWp-profile-widget',
			'description' => 'Custom Profile Widget',
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



//Popular posts Widget

class SunsetWp_PopularPosts_Widget extends WP_Widget {

	//setup widget name, description

	public function __construct() {

		$widget_ops = array(
			'classname' => 'sunsetWp-popularPosts-widget',
			'description' => 'Custom Popular Posts Widget',
		);

		parent::__construct( 'sunset_popular_posts', 'SunsetWp Popular Posts', $widget_ops );
		
	}
	
	//back-end display of widget
	public function form( $instance ) {
		
		$title = ( !empty( $instance['title'] ) ? $instance['title'] : 'Popular Posts' );
		$tot = ( !empty( $instance['tot'] ) ? absInt( $instance['tot'] ) : 4 );

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';

		echo $output;
	}


//update widget
public function update( $new_instance, $old_instance ) {

	$instance = array();
	$instance['title'] = ( !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '');
	$instance['tot'] = ( !empty( $new_instance['tot'] ) ? absInt( strip_tags( $new_instance['tot'] ) ) : 0);

	return $instance;

}	

	//frontend display of widget
	public function widget( $args, $instance) {
	
		$tot = absInt( $instance['tot'] );

		$post_args = array(
			'post_type' => 'post',
			'posts_per_page' => $tot,
			'meta_key' => 'sunset_post_views',
			'orderby' => 'meta_value_num',
			'order' => 'DESC'
		);

		$posts_query = new WP_Query( $post_args );

		echo $args['before_widget']; 

		if( !empty( $instance['title'] ) ):

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

		endif;

		if ( $posts_query->have_posts() ):

			echo '<div>';

			while( $posts_query->have_posts() ): $posts_query->the_post();

$get_views_count = get_post_meta( get_the_ID(), 'sunset_post_views', true );

				echo '<p><span class="post-icon"><img src="' . get_template_directory_uri() . '/img/post-'. ( get_post_format() ? get_post_format() : 'standard' ) .'.png"></span><a href="' . get_the_permalink() . '">'. get_the_title() .'</a></p>';

			endwhile;

			echo '</div>';

		endif;
			
		echo $args['after_widget'];

	}

}

add_action( 'widgets_init', function(){
	register_widget( 'SunsetWp_PopularPosts_Widget' );
} );