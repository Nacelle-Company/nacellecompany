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
	<?php wp_head(); ?>
</head>
<?php
if (has_nav_menu('top-bar-l')) :
	$leftToo = 'left-too';
	$textAlign = 'text-center';
	$align = '';
else :
	$leftToo = '';
	$textAlign = 'text-left';
	$align = 'align-right';
endif;
?>

<body <?php body_class(); ?>>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TH8K84L" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<noscript><img height="1" width="1" style="display:none" alt="" src="https://www.facebook.com/tr?id=427279594883969&ev=PageView&noscript=1" /></noscript>
	<?php
	if (is_page_template(array('page-templates/page-front-circles.php', 'page-templates/page-front-carousel.php', 'page-templates/page-front-grid.php'))) {
		$transHeader = 'transparent-header';
	} else {
		$transHeader = '';
	}
	?>
	<?php get_template_part('template-parts/search-off-canvas'); ?>

	<header class="site-header <?php echo $transHeader; ?>" role="banner">
		<div class="title-bar" <?php Nacelle_title_bar_responsive_toggle(); ?>>
			<span class="title-bar-title">
				<button aria-label="<?php _e('Main Menu', 'nacelle'); ?>" class="menu-icon-c" type="button" data-toggle="<?php Nacelle_mobile_menu_id(); ?>"></button>
				<?php if (function_exists('the_custom_logo')) {
					the_custom_logo();
				} ?>
			</span>
			<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>
				<?php get_template_part('template-parts/mobile-top-bar'); ?>
			<?php endif; ?>
		</div>
		<nav class="top-bar <?php echo $leftToo; ?>" role="navigation" id="<?php Nacelle_mobile_menu_id(); ?>">
				<?php if (has_nav_menu('top-bar-l')) : ?>
						<?php Nacelle_top_bar_l(); ?>
				<?php endif; ?>
					<?php if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} ?>
					<?php Nacelle_top_bar_r(); ?>
		</nav>
		<?php if (is_front_page() && get_field('yes_homepage_heading', 'option')) : ?>
			<div class="cell tagline text-center">
				<h1>
					<?php the_field('homepage_heading', 'option'); ?>
				</h1>
			</div>
		<?php endif; ?>
	</header>