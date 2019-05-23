<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/safari-pinned-tab.svg" color="#4a90e2">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">


		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
		<?php get_template_part('template-parts/mobile-off-canvas'); ?>
	<?php endif; ?>

	<?php get_template_part('template-parts/search-off-canvas'); ?>


	<header class="site-header cell shrink medium-cell-block-container" role="banner">
		<div class="site-title-bar title-bar mobile-nav" <?php Nacelle_title_bar_responsive_toggle();?>>
			<div class="title-bar-left grid-x align-middle">
				<button aria-label="<?php _e('Main Menu', 'comedy-dynamics');?>" class="menu-icon" type="button" data-toggle="<?php Nacelle_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
						<?php

                         if (function_exists('the_custom_logo')) {
                             the_custom_logo();
                         } else {
                         	bloginfo('name');
                         }
                        ?>
				</span>
			</div>
		</div>

		<nav class="site-navigation top-bar desktop-menu" role="navigation">

			<div class="nav-container">

				<!-- custom logo -->
				<div class="site-desktop-title top-bar-title">

					<?php if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        } ?>

				</div>

				<!-- top bar right -->
				<div class="right">

					<?php Nacelle_top_bar_r(); ?>

					<?php if (! get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') :?>

						<?php get_template_part('template-parts/mobile-top-bar');?>

					<?php endif;?>

					<!-- search icon -->
					<div class='header-search-container' tabindex='1'>

						<div class='search-container' tabindex='1'>

							<i class="fas fa-search"></i>

							<?php echo do_shortcode('[searchandfilter id="4711" fields="search" search_placeholder="Search. . ."]'); ?>

						</div>

					</div>

				</div>

			</div>

		</nav>

	</header>
