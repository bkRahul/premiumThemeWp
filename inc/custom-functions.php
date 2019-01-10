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


//post loop footer custom function 
function sunsetWp_posts_footer() {
	$commentsnum = get_comments_number();
	if ( comments_open() ) {

		if ($commentsnum == 0) {
			$comments = __('No Comments');
		}
		elseif ($commentsnum == 1) {
			$comments = __('1 Comment');
		}
		else {
			$comments = $commentsnum . __(' Comments');
		}
		$comments = '<a href="'. get_comments_link() .'">'. $comments .' <span class="sunset-icon sunset-comment"></span></a>';
	}
	else {
		$comments = __('Comments are closed'); 
	}
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-md-6">'. get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-md-6">' . $comments . '</div></div></div>';
}

?>