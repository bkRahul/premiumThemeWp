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

<body class="<?php body_class(); ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-12">

				<div class="header-container " style="background-image: url(<?php header_image(); ?>)">

					<div class="header-content text-center table">
						<div class="table-cell">
							<h1 class="site-title sunset-icon"><span class="sunset-logo"></span><span class="hide"><?php bloginfo('name'); ?></span></h1>
							<h3 class="site-description"><?php bloginfo('description'); ?></h3>						
						</div><!-- .table-cell -->
					</div><!-- .header-content -->

					<div class="nav-container">
						<nav class="navbar navbar-default header-nav">
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' =>'nav navbar-nav'))?>
						</nav>
					</div><!-- .header-nav -->

				</div><!-- .header-container -->

			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->