<?php	
	/*

	=======================================
		 Theme Custom Functions Section
	=======================================

	*/
?>

<?php

//post loop meta custom function 
function sunsetWp_posts_meta() {

	$posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
	$categories = get_the_category();
	$seperator = ', ';
	$output = '';
	$i = 1;

	if(!empty( $categories )):
		foreach ($categories as $category):
	if($i > 1): $output .=$seperator; endif;
	$output .= '<a href="'. esc_url(get_category_link( $category->term_id)) .'" alt="'. esc_attr( 'View all posts in%s', $category->name ) .'">'. esc_html( $category->name) .'</a>';
$i++;
endforeach;
endif;
	return '<span class="posted-on">Posted <a href="'.esc_url( get_permalink() ).'">'. $posted_on . '</a> ago / </span><span class="posted-in">'. $output .'</span>';
}

function sunsetWp_posts_footer() {
	return 'This is post footer section';
}

?>