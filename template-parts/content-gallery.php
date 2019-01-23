<?php 
/*


This is the template for the standard gallery content

@package SunsetWp


*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sunsetWp-gallery-post'); ?> >
	<header class="entry-header">

		<?php if( featured_image() ): 
			$attachments = featured_image(5); ?>
		<a class="standard-featured-link" href="<?php the_permalink(); ?>">
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide gallery-post" data-ride="carousel"> 
				<div class="carousel-inner" role="listbox">
					<?php
					$count =  count($attachments)-1;
						for ( $i=0; $i <= $count; $i++ ):
						$active = ( $i == 0 ? ' active' : '' );
						$n = ( $i == $count ? 0 : $i+1 );
						$nextimg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
						$p = ( $i == 0 ? $count : $i-1 );
						$previmg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
					?>

						<div class="carousel-item background-image <?php echo $active; ?>" style="height:360px; background-image: url(<?php echo wp_get_attachment_url( $attachments[$i]->ID ); ?>)">

							<div class="d-none nextimg-preview" data-image="<?php echo $nextimg ?>"></div>
							<div class="d-none previmg-preview" data-image="<?php echo $previmg ?>"></div>

							<div class="entry-excerpt image-caption text-center">
								<p><?php echo $attachments[$i]->post_excerpt; ?></p>
							</div>
						</div>

					<?php endfor; ?>
				</div><!-- .carousel-inner -->
				<a class="carousel-control-next right" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
				    <div class="preview-container">
				    	<span class="slider-thumbnail background-image"></span>
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
				    </div>
				</a>
				<a class="carousel-control-prev left" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
				    <div class="preview-container">
				    	<span class="slider-thumbnail background-image"></span>
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</div>
				</a>
  			</div><!-- .carousel -->
		</a>
		<?php endif ?>

	</header>

	<div class="entry-content text-center">

		<?php the_title('<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'">', '</a></h1>') ?>

		<div class="entry-meta">
			<?php echo sunsetWp_posts_meta(); ?>
		</div><!-- .entry-meta -->

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunsetWp"><?php _e('Read More'); ?></a>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php echo sunsetWp_posts_footer() ?>
	</footer>	
</article>