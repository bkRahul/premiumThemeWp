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

				echo '<div class="page-limit" data-page="http://localhost/sunsetWp/">';

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				echo '</div>';

			endif; ?>
		</div>

		<div class="container text-center">
			<a class="btn-sunsetWp-load sunsetWp-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="sunset-icon sunset-loading"> </span>
			<span class="load-text"> Load More</span></a>
		</div>
	</main>
</div>

<?php get_footer(); ?>