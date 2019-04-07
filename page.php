<?php 
/*


This is the template for the page.php

@package SunsetWp


*/
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<main class="site-main" role="main">

		<div class="container sunsetWp-posts-container">
			<?php if( have_posts() ):

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile;

			endif; ?>
		</div>
	</main>
</div>

<?php get_footer(); ?>