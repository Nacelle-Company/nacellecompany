<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
get_header();
include 'template-parts/logic/logic-404.php';
?>
<main class="main-container-full">
	<div class="main-grid">
		<div class="main-content-full-width">
			<article class="text-center">
				<header>
					<h1 class="entry-title"><?php _e('This is not the page you are looking for. . .', 'nacelle'); ?></h1>
				</header>
				<div class="entry-content">
					<?php $bkImage = get_template_directory_uri() . '/src/assets/images/bamford-is-sad-you-are-on-404-page.png'; ?>
					<style>
						main.main-container-full {
							background-image: url("<?php echo $bkImage; ?>");
							background-repeat: no-repeat;
							background-position: right bottom;
							background-size: 45%;
						}
						@media print, screen and (min-width: 40em) {
							main.main-container-full {
								background-position: right top;
							}
						}
					</style>
					<div class="error">
						<p class="bottom"><?php _e('The page you are looking for might have been moved, had its name changed, or we\'re working on it.', 'nacelle'); ?></p>
						<h2 class="text-center h3 mb-2"><?php _e('but maybe one of these are?', 'nacelle'); ?></h2>
						<div class="grid-x align-center align-middle">

							<!-- home icon and button  -->
							<a href="<?php bloginfo('url') ?>" class="button large">
								<?php get_template_part('template-parts/svg/icon', 'home', ['fill' => $fillColor]); ?>
								<span><?php _e('Home', 'nacelle'); ?></span>
							</a>

							<!-- main catalog button and icon  -->
							<a href="<?php bloginfo('url');
												echo $catalogPath; ?>" class="button large">
								<?php get_template_part('template-parts/svg/icon', 'disk-lg', ['fill' => $fillColor]); ?>
								<span><?php _e('Catalog', 'nacelle'); ?></span>
							</a>

							<?php if (!empty($hasNewsPosts)) : ?>
								<a href="<?php bloginfo('url'); ?>/in-the-news" class="button large">
									<?php get_template_part('template-parts/svg/icon', 'newspaper', ['fill' => $fillColor]); ?>
									<span><?php _e('News', 'nacelle'); ?></span>
								</a>
							<?php endif; ?>

							<?php if (!empty($hasPressPosts)) : ?>
								<a href="<?php bloginfo('url'); ?>/press" class="button large">
									<?php get_template_part('template-parts/svg/icon', 'press', ['fill' => $fillColor]); ?>
									<span><?php _e('Press', 'nacelle'); ?></span>
								</a>
							<?php endif; ?>

							<?php if (!empty($hasPRPosts)) : ?>
								<a href="<?php bloginfo('url'); ?>/press-release" class="button large">
									<?php get_template_part('template-parts/svg/icon', 'pressrelease', ['fill' => $fillColor]); ?>
									<span><?php _e('Releases', 'nacelle'); ?></span>
								</a>
							<?php endif; ?>
						</div>

					</div>
				</div>

			</article>

		</div>

	</div>

</main>
<?php get_footer();
