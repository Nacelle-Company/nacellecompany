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
					<?php $bkImage = get_template_directory_uri() . '/dist/assets/images/bamford-is-sad-you-are-on-404-page.png'; ?>
					<style>
						body {
							background-image: url("<?php echo $bkImage; ?>") !important;
							background-repeat: no-repeat;
							background-position-x: -40px;
							background-position-y: bottom;
							background-size: 90%;
						}

						h1.entry-title {
							font-size: 13px;
						}

						.error .button {
							display: flex;
							align-items: center;
							margin: 5px;
						}

						svg {
							padding-right: 5px;
						}

						@media print,
						screen and (min-width: 40em) {
							body {
								/* min-height: 100vh; */
								background-size: 25%;
								background-position: right bottom;
							}

							h1.entry-title {
								font-size: 1.5rem;
							}

							.button {
								padding: .5em;
							}


						}

						@media print,
						screen and (min-width: 64em) {
							body {
								min-height: 100vh;
								background-position-x: 30vw;
								background-position-y: bottom;
								background-size: 54vh;
							}

							footer {
								position: absolute;
								bottom: 0;
							}
						}
					</style>
					<div class="error">
						<p class="bottom"><?php _e('The page you are looking for may have been moved, had its name changed or we’re working on it.', 'nacelle'); ?></p>
						<h2 class="text-center h4 mb-2"><?php _e('maybe try one of these?', 'nacelle'); ?></h2>
						<div class="grid-x align-center align-middle">

							<!-- home icon and button  -->
							<a href="<?php bloginfo('url') ?>" class="button large">
								<?php get_template_part('template-parts/svg/icon', 'home', ['fill' => $fillColor]); ?>
								<span><?php _e('Home', 'nacelle'); ?></span>
							</a>

							<!-- main catalog button and icon  -->
							<a href="<?php bloginfo('url');
												echo $catalogPath; ?>" class="button large flex-container">
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
