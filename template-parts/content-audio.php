<?php 
/*


This is the template for the standard post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-audio-post'); ?> >
<div class="row"> 
	<header class="entry-header text-center col-md-6">
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->
	</header>
	<div class="entry-content col-md-6">

		<div class="audio-content">
		<?php 
			echo get_embedded_media_content(array('audio', 'iframe'));
		?>
		</div>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div><!-- .entry-content -->
</div>

	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>