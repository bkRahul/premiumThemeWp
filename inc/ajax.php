<?php 
/*


@package SunsetWp

This is the file for ajax functions


*/

add_action('wp_ajax_nopriv_sunsetWp_load_more', 'sunsetWp_load_more');
add_action('wp_ajax_sunsetWp_load_more', 'sunsetWp_load_more');

function sunsetWp_load_more() {
	$paged = $_POST['page']+1;
	$query = new WP_Query(array(
		'post_type' => 'post',
		'paged' => $paged ));

	if( $query->have_posts() ):

		while( $query->have_posts() ): $query->the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;	

	endif;	

wp_reset_postdata();		

die();
}
?>