<?php 
/*


This is the template for the quote post content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-quote-post'); ?> >

	<header class="entry-header text-center">
		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>
	</header>
	<div class="entry-content text-center">
		<div class="entry-content col-sm-10 offset-sm-1 col-md-8 offset-md-2">
				<h2 class="quote-text"><?php echo get_the_content(); ?></h2>
				<h2 class="quote-author"><?php echo get_the_excerpt(); ?></h2>				
		</div>
	</div>
 	<footer class="entry-footer">
		<?php echo sunsetWp_posts_meta(); ?>
	</footer>	
</article>