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

	if( $prev == 1 && $_POST["page"] != 1 ) {
		$paged = $_POST["page"]-1;
	}

	$query = new WP_Query(array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged ));

	if( $query->have_posts() ):

	echo '<div class="page-limit" data-page="http://localhost/sunsetWp/page/'. $paged .'">';

		while( $query->have_posts() ): $query->the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;	
	
	echo '</div>';

	endif;	

wp_reset_postdata();		

die();
}
?>