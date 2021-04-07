<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<main class="main-container">
	<div class="main-grid">
		<div class="main-content-full-width">
			<article class="text-center">
				<header>
					<h1 class="entry-title"><?php _e('Oops we dont have anything here!', 'nacelle'); ?></h1>
				</header>
				<div class="entry-content">

					<div class="error">

						<p class="bottom"><?php _e('The page you are looking for might have been moved, had its name changed, or we\'re working on it.', 'nacelle'); ?></p>

					</div>

					<?php
                        /* translators: %s: home page url */
                        printf(
                            __('<a href="%s" class="button">Return to the Home Page</a>', 'nacelle'),
                            home_url()
                        );
                    ?>


				</div>

			</article>

		</div>

	</div>

</main>
<?php get_footer();
