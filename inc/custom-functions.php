<?php	
	/*

	=======================================
		 Theme Custom Functions Section
	=======================================

	*/



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
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">' . $comments . '</div></div></div>';
}



//post loop background image custom function 

function featured_image() {
	$output = '';
	if( has_post_thumbnail() ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => 1,
			'post_parent' => get_the_ID()
		) );
		if( $attachments ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
	return $output;
}

//custom function to get media content in posts

function get_embedded_media_content( $type = array()) {
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ));
	$embed = get_media_embedded_in_content( $content, $type);
	return $embed[0];
}
?>