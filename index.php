<?php 
/*


This is the template for the index.php

@package SunsetWp


*/
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<main class="site-main" role="main">

		<?php if ( is_paged() ): ?>

		<div class="container prev-post-container text-center">
			<a class="btn-sunsetWp-load sunsetWp-load-more" data-prev="1" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="sunset-icon sunset-loading"> </span>
			<span class="load-text"> Load Previous Posts</span></a>
		</div>

		<?php endif; ?>		

		<div class="container sunsetWp-posts-container">
			<?php if( have_posts() ):

				echo '<div class="page-limit" data-page="">';

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				echo '</div>';

			else:
				echo 0;
				//	Add the pagination functions here.
				 //wpbeginner_numeric_posts_nav();

			endif; ?>
		</div>
		<?php 

		// don't display the button if there are not enough posts
		if (  $wp_query->max_num_pages > 1 ):  ?>

		<div class="container text-center">
			<a class="btn-sunsetWp-load sunsetWp-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="sunset-icon sunset-loading"> </span>
			<span class="load-text"> Load Next Posts</span></a>
		</div>

		<?php endif; ?>
	</main>
</div>

<?php get_footer(); ?>