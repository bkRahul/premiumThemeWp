<?php 
/*


This is the template for the single

@package SunsetWp


*/
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<main class="site-main" role="main">

		<div class="container sunsetWp-post-single">
			<?php if( have_posts() ):

				while( have_posts() ): the_post();

					get_template_part( 'template-parts/single', get_post_format() );

					echo sunsetWp_post_navigation();

					if( comments_open() ):
						comments_template();
					endif;	

				endwhile;

				echo '</div>';

			endif; ?>
		</div>
	</main>
</div>

<?php get_footer(); ?>