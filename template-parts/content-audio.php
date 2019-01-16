<?php 
/*


This is the template for the standard post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-audio-post'); ?> >
	<header class="entry-header text-center">
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-content">

		<div class="content">
		<?php 
			$content = do_shortcode( apply_filters( 'the_content', $post->post_content));
			$embed = get_media_embedded_in_content( $content, array('audio', 'iframe'));
			echo $embed[0]; 
		?>
		</div>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>