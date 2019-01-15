<?php 
/*


This is the template for the image post content

@package SunsetWp


*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-image-post'); ?> >

	<header class="entry-header text-center background-image " style="background-image: url(<?php echo featured_image(); ?>)">
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-excerpt image-caption">
			<?php the_excerpt(); ?>
		</div>		
	</header>


	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>