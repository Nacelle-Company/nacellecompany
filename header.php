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

					<!-- <a href="<?php //echo esc_url(home_url('/')); 
									?>" rel="home">

						<?php // get_template_part('template-parts/svg/icon-cd-logo', ''); 
						?>

					</a> -->

				</span>

			</div>

		</div>


		<nav class="site-navigation top-bar desktop-menu" role="navigation">

			<div class="nav-container <?php if (has_nav_menu('top-bar-l')) { echo 'left-too'; } ?>">

				<?php
				if (has_nav_menu('top-bar-l')) { ?>
					<div class="left">
						<?php Nacelle_top_bar_l(); ?>
					</div>
				<?php }
				?>

				<!-- custom logo -->
				<div class="site-desktop-title top-bar-title">

					<?php if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} ?>

					<!-- <a href="<?php //echo esc_url(home_url('/')); 
									?>" rel="home">
						<svg width="65" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs>
								<path class="svg-icon" id="a" d="M.02305024.0331637H7.1012026v16.7172415H.02305024z" />
								<path class="svg-icon" id="c" d="M.06080713.03315316h5.71009725V16.7504052H.06080713z" />
								<path class="svg-icon" id="e" d="M.07695705.0331637h6.11621556v16.7172415H.07695705z" />
								<path class="svg-icon" id="g" d="M.00793274.0331637h6.11611021v16.7172415H.00793274z" />
								<path class="svg-icon" id="i" d="M.06806564.03241572h2.15763128V2.1899522H.06806564z" />
							</defs>
							<g fill-rule="evenodd">
								<path class="svg-icon" d="M4.87304052 83.1657301v8.1716694l-3.46027553-8.1716694H.00004214v16.7172205h2.3332577v-7.892496l3.41866288 7.892496h1.4543355V83.1657301zM12.8567261 83.1657301L9.7497893 99.8829506h2.4716856l.513047-3.1630876h2.6181199l.4914506 3.1630876h2.5577552l-3.0633225-16.7172205h-2.481799zm1.2160373 5.9575608l.916953 5.3914182h-1.8888979l.9719449-5.3914182z" />
								<g transform="translate(20.858995 83.132577)">
									<path class="svg-icon" d="M5.62463857.0331637H1.49961426c-.8141329 0-1.47656402.69119124-1.47656402 1.54061588V15.2098736c0 .8781847.66232577 1.5406159 1.54061589 1.5406159h4.06097244c.8417342 0 1.47656402-.6624312 1.47656402-1.5406159v-4.5330389H4.61813938v3.9113776H2.50590276V2.19533549h2.11223662V5.2090389h2.48306321V1.57377958c0-.86375203-.64863047-1.54061588-1.47656402-1.54061588" fill="#FFF" mask="url(#b)" />
								</g>
								<g transform="translate(30.867098 83.132577)">

									<path class="svg-icon" mask="url(#d)" d="M2.54355429 9.29117585h2.97082659V7.10751297H2.54355429V2.19543031h3.16308753V.03315316H.06080713V16.7504789h5.71009725v-2.1622771H2.54355429z" />
								</g>
								<g transform="translate(39.400324 83.132577)">

									<path class="svg-icon" mask="url(#f)" d="M2.55991491.0331637H.07695705v16.7173258h6.11621556v-2.1622772h-3.6332577z" />
								</g>
								<g transform="translate(47.933549 83.132577)">

									<path class="svg-icon" mask="url(#h)" d="M2.49057455.0331637H.00793274v16.7173258h6.11611021v-2.1622772h-3.6334684z" />
								</g>
								<path class="svg-icon" d="M58.8882087 97.7208v-5.2970259h2.9709319v-2.1836629h-2.9709319v-4.912188h3.1631929v-2.1621718h-5.6458347v16.7172204h5.7100972V97.7208zM50.3440798 30.7511841c0-10.634611-8.6517423-19.2863533-19.2862479-19.2863533-10.6345057 0-19.2863534 8.6517423-19.2863534 19.2863533 0 10.6346111 8.6518477 19.286248 19.2863534 19.286248 10.6345056 0 19.2862479-8.6516369 19.2862479-19.286248" />
								<path class="svg-icon" d="M32.931233.10536971V7.7944378C44.7589153 8.75100181 54.090998 18.681253 54.090998 30.7511315c0 12.0698784-9.3320827 22.0000243-21.159765 22.956799v7.6889627c16.0613209-.9716288 28.8311345-14.3443517 28.8311345-30.6457617 0-16.3013047-12.7698136-29.67402759-28.8311345-30.64576179M29.1843149 61.3968827V53.70792C17.3566325 52.7512506 8.02454986 42.8209994 8.02454986 30.7512263c0-12.0699838 9.33208264-22.00012968 21.15976504-22.95679905V.10535918C13.1230993 1.07709338.35328568 14.4498162.35328568 30.7512263c0 16.3013047 12.76981362 29.6740275 28.83102922 30.6456564" fill="#FFF" />
								<g transform="translate(62.682333 83.132577)">

									<path class="svg-icon" d="M.9331872 1.72810454H.75398946V.45981443h.67212318c.12747164 0 .18256888.07922204.18256888.17572123v.4239222c0 .12072934-.09649919.17919773-.18256888.17919773H1.3329846l.32394652.48944895h-.20679903l-.42381685-.62724473.02401944-.0276013h.37230146v-.448047H.9331872v1.10289303zM.24389222 1.1112893c0 .59953809.35502431.92011346.9065235.92011346.55813614 0 .90631281-.35491897.90631281-.92011346 0-.55149919-.34111832-.92032415-.90631281-.92032415-.57225284 0-.9065235.36187196-.9065235.92032415zM1.14683387.03241572c.65484603 0 1.07887359.43772285 1.07887359 1.07887358 0 .65463534-.42402756 1.07866289-1.07887359 1.07866289-.65474068 0-1.07876823-.41022691-1.07876823-1.07866289 0-.66179902.43772285-1.07887358 1.07876823-1.07887358z" fill="#FFF" mask="url(#j)" />
								</g>
							</g>
						</svg>
					</a> -->
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

							<?php get_template_part( 'template-parts/svg/icon-search' ); ?>

							<?php echo do_shortcode('[searchandfilter id="4711" fields="search" search_placeholder="Search. . ."]');
							?>

						</div>

					</div>

				</div>

			</div>

		</nav>

	</header>