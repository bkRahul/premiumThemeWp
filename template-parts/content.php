<?php 
/*


This is the template for the standard post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-content">
		<?php if( has_post_thumbnail() ): ?>
			<div class="standard-featured-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container">
			<a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e('Read More'); ?></a>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>