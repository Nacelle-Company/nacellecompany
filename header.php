<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/manifest.json">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
		<?php get_template_part('template-parts/mobile-off-canvas'); ?>
	<?php endif; ?>

	<?php get_template_part('template-parts/search-off-canvas'); ?>


	<header class="site-header cell shrink medium-cell-block-container" role="banner">
		<div class="site-title-bar title-bar mobile-nav" <?php comedy_dynamics_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left grid-x align-middle">
				<button aria-label="<?php _e('Main Menu', 'comedy-dynamics'); ?>" class="menu-icon" type="button" data-toggle="<?php comedy_dynamics_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
						<?php
                        // bloginfo('name');
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
				</span>
			</div>
		</div>

		<nav class="site-navigation top-bar desktop-menu" role="navigation">
			<div class="top-bar-left">
				<?php comedy_dynamics_top_bar_l(); ?>
			</div>

			<!-- custom logo -->
			<div class="site-desktop-title top-bar-title">

				<?php if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        } ?>

			</div>

			<!-- top bar right -->
			<div class="top-bar-right">

				<?php comedy_dynamics_top_bar_r(); ?>

				<?php if (! get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>

					<?php get_template_part('template-parts/mobile-top-bar'); ?>

				<?php endif; ?>

			</div>

			<!-- search icon -->
		    <div class='header-search-container' tabindex='1'>

				<div class='search-container' tabindex='1'>

					<i class="fas fa-search"></i>

					<?php echo do_shortcode('[searchandfilter id="4711" fields="search" search_placeholder="Search. . ."]'); ?>

				</div>

			</div>

		</nav>

	</header>
