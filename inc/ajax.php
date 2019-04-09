 <?php 
/*


@package SunsetWp

This is the file for ajax functions


*/

add_action('wp_ajax_nopriv_sunsetWp_load_more', 'sunsetWp_load_more');
add_action('wp_ajax_sunsetWp_load_more', 'sunsetWp_load_more');

function sunsetWp_load_more() {
	
	$paged = $_POST["page"]+1;
	$prev = $_POST['prev'];
	$archive = $_POST['archive'];

	if( $prev == 1 && $_POST["page"] != 1 ) {
		$paged = $_POST["page"]-1;
	}
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	);
	
	if( $archive != '0' ){
		
		$archVal = explode( '/', $archive );
		
		$type = ( $archVal[1] == "category" ? "category_name" : $archVal[1] );
		
		$args[ $type ] = $archVal[2];
		
		$page_trail = '/' . $archVal[1] . '/' . $archVal[2] . '/';
		
	} else {
		$page_trail = '/';
	}
		
	$query = new WP_Query( $args );

	if( $query->have_posts() ):

	echo '<div class="page-limit" data-page="' . $page_trail . 'page/'. $paged .'">';

		while( $query->have_posts() ): $query->the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;	
	
	echo '</div>';

	endif;	

wp_reset_postdata();		

die();

}

function sunsetWp_check_paged( $num = null ) {
	
	$output = "";
	
	if( is_paged() ){ $output = 'page/' . get_query_var( 'paged' ); }
	
	if( $num == 1 ){
		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;
	} else {
		return $output;
	}
	
}


add_action('wp_ajax_nopriv_sunsetWp_save_user_contact_form', 'sunsetWp_save_user_contact_form');
add_action('wp_ajax_sunsetWp_save_user_contact_form', 'sunsetWp_save_user_contact_form');

function sunsetWp_save_user_contact_form() {

	$title = wp_strip_all_tags( $_POST['name'] );
 	$email = wp_strip_all_tags( $_POST['email'] );
	$message = wp_strip_all_tags( $_POST['message'] );

	$args = array(
		'post_title' => $title,
		'post_content' => $message,
		'post_author' => 1,
		'post_type' => 'sunset-contact',
		'post_status' => 'publish',
		'meta_input' => array(
			'_contact_email_value_key' => $email
		) 
	);

	$postID = wp_insert_post( $args );

	echo $postID;

	die();

}

?>