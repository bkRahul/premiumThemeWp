<?php	
	/*

	=======================================
		 Theme Custom Functions Section
	=======================================

	*/


//custom function to fix Access-Control-Allow-Origin  

function add_cors_http_header() {

    header("Access-Control-Allow-Origin: *");

}

add_action('init','add_cors_http_header');


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

function featured_image( $num = 1 ) {

	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
			elseif ( $attachments && $num > 1 ):
				$output = $attachments;
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



//custom function gallery post type

function get_slider_attachments( $attachments ) {

	$output = array();
	$count =  count($attachments)-1;
	for ( $i=0; $i <= $count; $i++ ):
	$active = ( $i == 0 ? ' active' : '' );
	$n = ( $i == $count ? 0 : $i+1 );
	$nextimg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
	$p = ( $i == 0 ? $count : $i-1 );
	$previmg = wp_get_attachment_thumb_url( $attachments[$p]->ID );

	$output[$i] = array(
		'class' 	=> $active,
		'url'		=> wp_get_attachment_url( $attachments[$i]->ID ),
		'nextimg' 	=> $nextimg,
		'previmg'	=> $previmg,
		'caption'	=> $attachments[$i]->post_excerpt 
	);

	endfor; 

	return $output;

}


//custom function gallery post type

function sunsetWp_post_navigation() {

	$nav = '<div class="row">';

	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> %link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;

}


//custom function for social media share links

function sunsetWp_share_this( $content ) {
	
	if( is_single() ){
	
		$content .= '<div class="sunsetWp-shareThis"><h4>Share This</h4>';
				
		$title = get_the_title();
		$permalink = get_permalink();
		
		$twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
		
		$twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
		$google = 'https://plus.google.com/share?url=' . $permalink;
			
		$content .= '<ul>';
		$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="sunset-icon sunset-twitter"></span></a></li>';
		$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="sunset-icon sunset-facebook"></span></a></li>';
		$content .= '<li><a href="' . $google . '" target="_blank" rel="nofollow"><span class="sunset-icon sunset-googleplus"></span></a></li>';
		$content .= '</ul></div><!-- .sunset-share -->';
		
		return $content;
	
	} else {
		return $content;
	}
	
}
add_filter( 'the_content', 'sunsetWp_share_this' );


//custom function to save post views

function sunsetWp_save_post_views( $postID ) {

	$metaKey = 'sunset_post_views';
	$views = get_post_meta( $postID, $metaKey, true );

	$count = ( empty( $views ) ? 0 : $views );
	$count++;

	update_post_meta( $postID, $metaKey, $count );

}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

?>