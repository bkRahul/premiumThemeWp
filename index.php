<?php 
/*


This is the template for the index.php

@package SunsetWp


*/
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<main class="site-main" role="main">
		<div class="container sunsetWp-posts-container">
			<?php if( have_posts() ):

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

			endif; ?>
		</div>

		<div class="container text-center">
			<a class="btn btn-sunsetWp sunsetWp-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="sunset-icon sunset-loading"> </span> Load More</a>
		</div>
	</main>
</div>

<?php get_footer(); ?>