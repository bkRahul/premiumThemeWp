<?php 
/*


This is the template for the aside post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-aside-post'); ?> >
	<header class="entry-header text-center">
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-content">
		<div class="row">
			<div class="col-xs-12 col-md-4">
			<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id (get_the_ID() ) ); ?>
			<div class="aside-featured-image background-image" style="background-image: url(<?php echo $featured_image; ?>)"></div>
			<?php endif; ?>
			</div>
			<div class="col-xs-12 col-md-8">
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div>				
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="row">
			<div class="col-xs-12 col-md-8 offset-md-4">
				<?php echo sunsetWp_posts_footer() ?>		
			</div>
		</div>
	</footer>	
</article>