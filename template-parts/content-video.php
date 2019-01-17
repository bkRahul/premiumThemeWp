<?php 
/*


This is the template for the video post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-video-post'); ?> >
	<header class="entry-header text-center">
		<div class="embed-responsive embed-responsive-16by9">
		<?php 
			echo get_embedded_media_content(array('audio', 'iframe'));
		?>
		</div>
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-content">
		<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id (get_the_ID() ) ); ?>
		<a class="standard-featured-link" href="<?php the_permalink(); ?>">
			<div class="standard-featured-image background-image" style="background-image: url(<?php echo $featured_image; ?>)">
			</div>
		</a>
		<?php endif ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunsetWp"><?php _e('Read More'); ?></a>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>