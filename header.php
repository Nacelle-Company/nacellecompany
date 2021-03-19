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
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<meta name="google-site-verification" content="TVz0X0JqzKCcIcb6ksAseGCiw8NK5nRGLlYtxhM0VTQ" />
	<meta name="google-site-verification" content="OA3idyQQIY4kWP5RmnkVxf5lW-MfOmom_4SWaSZ5R1Q" />
	<?php // Global site tag (gtag.js) - Google Analytics 
	?>
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TH8K84L');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '427279594883969');
		fbq('track', 'PageView');
	</script>
	<style>
		table.xdebug-error {
			color: black !important;
			font-size: 14px !important;
		}

		<?php
		if (get_field('site_wide_css', 'option')) {
			the_field('site_wide_css', 'option');
		}
		?>
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TH8K84L" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<noscript><img height="1" width="1" style="display:none" alt="" src="https://www.facebook.com/tr?id=427279594883969&ev=PageView&noscript=1" /></noscript>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>

		<?php get_template_part('template-parts/mobile-off-canvas'); ?>

	<?php endif; ?>

	<?php get_template_part('template-parts/search-off-canvas'); ?>

	<header class="site-header cell shrink medium-cell-block-container" role="banner">

		<div class="site-title-bar title-bar mobile-nav" <?php Nacelle_title_bar_responsive_toggle(); ?>>

			<div class="title-bar-left grid-x align-center-middle">

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

				<?php // custom logo 
				?>
				<a href="/" title="<?php echo get_bloginfo('name'); ?> homepage">
					<div class="site-desktop-title top-bar-title">

						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

						if (has_custom_logo()) {
							echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . ' logo' . '" class="custom-logo">';
						} else {
							echo '<h1>' . get_bloginfo('name') . '</h1>';
						}
						?>

					</div>
					</a>

					<?php // top bar right 
					?>
					<div class="right">

						<?php Nacelle_top_bar_r(); ?>

						<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>

							<?php get_template_part('template-parts/mobile-top-bar'); ?>

						<?php endif; ?>

						<?php // search icon 
						?>
						<div class='header-search-container' tabindex='1'>

							<div class='search-container desktop' tabindex='1'>

								<?php get_template_part('template-parts/svg/icon-search'); ?>

								<?php echo do_shortcode('[searchandfilter id="4711" fields="search" search_placeholder="Search. . ."]');
								?>

							</div>

						</div>

					</div>

			</div>

		</nav>

	</header>