<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<main class="main-container">

	<div class="main-grid grid-x">

		<div class="main-content">

			<header>
				<h1 class="entry-title"><?php _e('Press', 'nacelle'); ?></h1>
			</header>

			<?php if (have_posts()) : ?>

				<?php //Start the Loop 
				?>
				<?php while (have_posts()) : the_post();

					// $link = get_field('link_to_article');
					$link = get_post_meta(get_the_ID(), 'link_to_article', true);
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					$even_odd_class = $wp_query->current_post % 2 == 0 ? '' : 'press-row-reversed';

				?>

					<article class="press-row <?php echo $even_odd_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="press-row-img">
							<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

								<?php the_post_thumbnail('rta_thumb_cropped_240x240'); ?>
							</a>

						</div>
						<svg class="news-image-hover-background" width="377" height="377" xmlns="http://www.w3.org/2000/svg">
							<g fill="#1D1D1D" fill-rule="nonzero" opacity=".3">
								<path d="M201.067 0v47.295c72.175 5.884 129.12 66.964 129.12 141.205 0 74.241-56.945 135.32-129.12 141.206V377C299.077 371.024 377 288.769 377 188.5 377 88.232 299.076 5.977 201.067 0M175.933 377v-47.294C103.758 323.82 46.812 262.74 46.812 188.5c0-74.242 56.946-135.322 129.121-141.206V0C77.924 5.977 0 88.232 0 188.5 0 288.77 77.924 371.025 175.933 377" />
							</g>
						</svg>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

							<div class="press-row-content">
								<h2 class="press-row-content-header h4">
									<svg class="icon" width="31" height="20" xmlns="http://www.w3.org/2000/svg">
										<path d="M29.487 0H5.983a2.565 2.565 0 00-2.417 1.667H1.282C.574 1.667 0 2.227 0 2.917v14.166C0 18.694 1.34 20 2.991 20h26.496c.708 0 1.282-.56 1.282-1.25V1.25c0-.69-.574-1.25-1.282-1.25zM2.564 17.083V4.167h.855v12.916c0 .23-.192.417-.428.417a.423.423 0 01-.427-.417zm25.641.417H5.952c.02-.136.03-.275.03-.417V2.5h22.223v15zM9.188 11.25h7.265c.354 0 .641-.28.641-.625v-5A.633.633 0 0016.453 5H9.188a.633.633 0 00-.641.625v5c0 .345.287.625.641.625zm1.496-4.167h4.273v2.084h-4.273V7.083zm-2.137 7.292v-1.25c0-.345.287-.625.641-.625h7.265c.354 0 .641.28.641.625v1.25a.633.633 0 01-.641.625H9.188a.633.633 0 01-.641-.625zm10.256 0v-1.25c0-.345.287-.625.641-.625H25c.354 0 .641.28.641.625v1.25A.633.633 0 0125 15h-5.556a.633.633 0 01-.64-.625zm0-7.5v-1.25c0-.345.287-.625.641-.625H25c.354 0 .641.28.641.625v1.25A.633.633 0 0125 7.5h-5.556a.633.633 0 01-.64-.625zm0 3.75v-1.25c0-.345.287-.625.641-.625H25c.354 0 .641.28.641.625v1.25a.633.633 0 01-.641.625h-5.556a.633.633 0 01-.64-.625z" fill-rule="nonzero" />
									</svg>
									<?php $theTitle = wp_strip_all_tags(get_post_meta(get_the_ID(), 'title', true));
									echo $theTitle; ?>

								</h2>
								<time class="press-row-content-time" datetime="2008-02-14 20:00">
									<?php the_time('F j, Y'); ?>
								</time>

								<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>

							</div>
						</a>
					</article>

				<?php endwhile; ?>

			<?php endif; ?>
			<?php // End have_posts() check. 
			?>

		</div>
		<?php wp_reset_query(); ?>
		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer();
