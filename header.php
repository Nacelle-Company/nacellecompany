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

		<!-- font awesome kit -->
		<script src="https://kit.fontawesome.com/5dd607493a.js"></script>


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
				<button aria-label="<?php _e('Main Menu', 'nacelle');?>" class="menu-icon" type="button" data-toggle="<?php Nacelle_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<?php if (function_exists('the_custom_logo')) {
							the_custom_logo();
						} ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616.13 947.12" style="width:65px;">
							<defs>
								<style>
									.cls-1 {

										<?php if (is_page('home')) { ?>
											fill: <?php the_field('home_logo_color'); ?>;
										<?php } else echo "fill: #fff"; ?>

									}

								</style>
							</defs>
							<g id="Layer_2" data-name="Layer 2">
								<g id="Layer_1-2" data-name="Layer 1"><path
									class="cls-1"
									d="M46.26 866l-32.85-77.57H0v158.69h22.15V872.2l32.45 74.92h13.8V788.43H46.26V866zM122 788.43L92.55 947.12H116l4.87-30h24.85l4.67 30h24.28L145.6 788.43zm20.25 107.73h-17.89l9.22-51.16zM251.39 788.43h-39.16c-7.72 0-14 6.56-14 14.63V932.5a14.3 14.3 0 0 0 14.62 14.62h38.55c8 0 14-6.29 14-14.62v-43h-23.56v37.1h-20.05V809h20.05v28.61h23.57v-34.55c0-8.2-6.16-14.63-14.02-14.63zM317.14 876.32h28.2v-20.73h-28.2v-46.63h30.03v-20.53h-53.59v158.69h54.2V926.6h-30.64v-50.28zM398.3 788.43h-23.57v158.69h58.06V926.6H398.3V788.43zM478.64 788.43h-23.57v158.69h58.06V926.6h-34.49V788.43zM558.99 926.6v-50.28h28.2v-20.73h-28.2v-46.63h30.02v-20.53h-53.59v158.69h54.2V926.6h-30.63z"/><circle class="cls-1" cx="294.81" cy="290.9" r="183.07" transform="rotate(-45 294.804 290.898)"/><path
									class="cls-1"
									d="M312.59 0v73c112.28 9.07 200.86 103.33 200.86 217.9s-88.58 208.83-200.86 217.91v73c152.46-9.23 273.68-136.16 273.68-290.9S465.05 9.22 312.59 0zM277 581.8v-73C164.75 499.73 76.17 405.47 76.17 290.9S164.75 82.07 277 73V0C124.57 9.22 3.35 136.16 3.35 290.9S124.57 572.57 277 581.8zM605.89 788.43c6.21 0 10.24 4.15 10.24 10.24s-4 10.24-10.24 10.24-10.24-3.9-10.24-10.24 4.15-10.24 10.24-10.24zm-8.57 10.24c0 5.69 3.37 8.73 8.6 8.73s8.6-3.37 8.6-8.73-3.24-8.74-8.6-8.74-8.6 3.44-8.6 8.74zm6.54 5.85h-1.7v-12h6.38a1.56 1.56 0 0 1 1.73 1.67v4a1.67 1.67 0 0 1-1.73 1.7h-.89l3.08 4.64h-2l-4-5.95.23-.26h3.53v-4.26h-4.64z"/></g>
							</g>
						</svg>
					</a>

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

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616.13 947.12" style="width:65px;">
							<defs>
								<style>
									.cls-1 {

										<?php if (is_page('home')) { ?>
											fill: <?php the_field('home_logo_color'); ?>;
										<?php } else echo "fill: #fff"; ?>

									}

								</style>
							</defs>
							<g id="Layer_2" data-name="Layer 2">
								<g id="Layer_1-2" data-name="Layer 1"><path
									class="cls-1"
									d="M46.26 866l-32.85-77.57H0v158.69h22.15V872.2l32.45 74.92h13.8V788.43H46.26V866zM122 788.43L92.55 947.12H116l4.87-30h24.85l4.67 30h24.28L145.6 788.43zm20.25 107.73h-17.89l9.22-51.16zM251.39 788.43h-39.16c-7.72 0-14 6.56-14 14.63V932.5a14.3 14.3 0 0 0 14.62 14.62h38.55c8 0 14-6.29 14-14.62v-43h-23.56v37.1h-20.05V809h20.05v28.61h23.57v-34.55c0-8.2-6.16-14.63-14.02-14.63zM317.14 876.32h28.2v-20.73h-28.2v-46.63h30.03v-20.53h-53.59v158.69h54.2V926.6h-30.64v-50.28zM398.3 788.43h-23.57v158.69h58.06V926.6H398.3V788.43zM478.64 788.43h-23.57v158.69h58.06V926.6h-34.49V788.43zM558.99 926.6v-50.28h28.2v-20.73h-28.2v-46.63h30.02v-20.53h-53.59v158.69h54.2V926.6h-30.63z"/><circle class="cls-1" cx="294.81" cy="290.9" r="183.07" transform="rotate(-45 294.804 290.898)"/><path
									class="cls-1"
									d="M312.59 0v73c112.28 9.07 200.86 103.33 200.86 217.9s-88.58 208.83-200.86 217.91v73c152.46-9.23 273.68-136.16 273.68-290.9S465.05 9.22 312.59 0zM277 581.8v-73C164.75 499.73 76.17 405.47 76.17 290.9S164.75 82.07 277 73V0C124.57 9.22 3.35 136.16 3.35 290.9S124.57 572.57 277 581.8zM605.89 788.43c6.21 0 10.24 4.15 10.24 10.24s-4 10.24-10.24 10.24-10.24-3.9-10.24-10.24 4.15-10.24 10.24-10.24zm-8.57 10.24c0 5.69 3.37 8.73 8.6 8.73s8.6-3.37 8.6-8.73-3.24-8.74-8.6-8.74-8.6 3.44-8.6 8.74zm6.54 5.85h-1.7v-12h6.38a1.56 1.56 0 0 1 1.73 1.67v4a1.67 1.67 0 0 1-1.73 1.7h-.89l3.08 4.64h-2l-4-5.95.23-.26h3.53v-4.26h-4.64z"/></g>
							</g>
						</svg>
					</a>
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
