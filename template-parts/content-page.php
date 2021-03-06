<?php 
/*


This is the template for the single page content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header text-center">
		<?php the_title('<h1 class="entry-title">', '</h1>') ?>
	</header>

	<div class="entry-content">
		<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id (get_the_ID() ) ); ?>
	
			<div class="standard-featured-image background-image" style="background-image: url(<?php echo $featured_image; ?>)">
			</div>
	
		<?php endif ?>
 
			<?php the_content(); ?>
 

	</div><!-- .entry-content -->

</article>