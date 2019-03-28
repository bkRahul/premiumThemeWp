<?php 
/*


This is the template for the header

@package SunsetWp


*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?><?php wp_title('|') ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if (is_singular() && pings_open(get_queried_object())	)	: ?>
	<link rel="pingback" href="<?php bloginfo('pingback'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
				<a class="js-toggleSidebar sidebarOpen"><span class="sunset-icon sunset-menu"></span></a>
	<div class="container-fluid">
		<div class="row">
			


			<div class="col-xs-12 col-md-12">

			<div class="header-container " style="background-image: url(<?php header_image(); ?>)">

				<div class="header-content text-center table">
					<div class="table-cell">
						<h1 class="site-title sunset-icon"><span class="sunset-logo"></span><span class="d-none"><?php bloginfo('name'); ?></span></h1>
						<h3 class="site-description"><?php bloginfo('description'); ?></h3>						
					</div><!-- .table-cell -->
				</div><!-- .header-content -->

				<div class="header-nav-container">
					
					<nav class="navbar navbar-expand-lg navbar-light">
					  <!-- <a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>"><?php echo get_bloginfo( 'name' ); ?></a> -->
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="header-nav collapse navbar-collapse" id="navbarSupportedContent">
						<?php wp_nav_menu(array(
							'theme_location'=>'primary',
							'container'=>false,
							'menu_class'=>'navbar-nav mr-auto',
							'menu_item'=>'nav-item',
							'walker'=> new sunsetWp_Walker_Nav_Primary()	
						)); ?>

					<!-- <div class="search-form-container"><?php get_search_form(); ?>
					</div> -->

					 </div>
					</nav>

				</div><!-- .header-nav -->

			</div><!-- .header-container -->

			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
	<aside class="sunsetWp-sidebar">
		<div class="sidebar-container">
			<a class="js-toggleSidebar sidebarClose"><span class="sunset-icon sunset-close"></span></a>
		</div>
		<?php get_sidebar(); ?>
	</aside>