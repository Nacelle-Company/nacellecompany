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
<html class="no-js" <?php language_attributes(); ?>>

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

	<!-- font awesome kit -->
	<script src="https://kit.fontawesome.com/5dd607493a.js"></script>

	<meta name="google-site-verification" content="TVz0X0JqzKCcIcb6ksAseGCiw8NK5nRGLlYtxhM0VTQ" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157434723-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-157434723-1');
	</script>
	<style>
		table.xdebug-error {
			color: black !important;
			font-size: 14px !important;
		}
		<?php
		if(get_field('site_wide_css', 'option')) {
			the_field('site_wide_css', 'option');
		}
		?>
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>

		<?php get_template_part('template-parts/mobile-off-canvas'); ?>

	<?php endif; ?>

	<?php get_template_part('template-parts/search-off-canvas'); ?>

	<header class="site-header cell shrink medium-cell-block-container" role="banner">

		<div class="site-title-bar title-bar mobile-nav" <?php Nacelle_title_bar_responsive_toggle(); ?>>

			<div class="title-bar-left grid-x align-middle">

				<button aria-label="<?php _e('Main Menu', 'nacelle'); ?>" class="menu-icon" type="button" data-toggle="<?php Nacelle_mobile_menu_id(); ?>"></button>

				<span class="site-mobile-title title-bar-title">

					<?php if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} ?>

				</span>

			</div>

		</div>


		<nav class="site-navigation top-bar desktop-menu" role="navigation">

			<div class="nav-container <?php if (has_nav_menu('top-bar-l')) {
											echo 'left-too';
										} ?>">

				<?php
				if (has_nav_menu('top-bar-l')) { ?>
					<div class="left">
						<?php Nacelle_top_bar_l(); ?>
					</div>
				<?php }
				?>

				<!-- custom logo -->
				<div class="site-desktop-title top-bar-title">

					<?php 
					if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} 
					
					?>

				</div>

				<!-- top bar right -->
				<div class="right">

					<?php Nacelle_top_bar_r(); ?>

					<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>

						<?php get_template_part('template-parts/mobile-top-bar'); ?>

					<?php endif; ?>

					<!-- search icon -->
					<div class='header-search-container' tabindex='1'>

						<div class='search-container' tabindex='1'>

							<?php get_template_part('template-parts/svg/icon-search'); ?>

						<?php echo do_shortcode('[searchandfilter slug="search-form-only" fields="search" search_placeholder="Search. . ."]');
							?>

						</div>

					</div>

				</div>

			</div>

		</nav>

	</header>