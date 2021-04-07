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
					$even_odd_class = $wp_query->current_post % 2 == 0 ? '' : 'article-row-reversed';

				?>

					<article class="article-row <?php echo $even_odd_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="article-row-img">
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

							<div class="article-row-content">
								<h1 class="article-row-content-header">
									<svg width="31" height="20" xmlns="http://www.w3.org/2000/svg">
										<path class="newspaper-icon" d="M29.4871795 0H5.98290598c-1.1142094 0-2.06426282.69671875-2.41709401 1.66666667H1.28205128C.57398504 1.66666667 0 2.22630208 0 2.91666667V17.0833333C0 18.6941667 1.33931624 20 2.99145299 20H29.4871795c.7080662 0 1.2820513-.5596354 1.2820513-1.25V1.25c0-.69036458-.5739851-1.25-1.2820513-1.25zM2.56410256 17.0833333V4.16666667h.85470086V17.0833333c0 .2297396-.19172009.4166667-.42735043.4166667s-.42735043-.1869271-.42735043-.4166667zM28.2051282 17.5H5.95202991c.01997864-.1361458.03087607-.2751562.03087607-.4166667V2.5H28.2051282v15zM9.18803419 11.25h7.26495731c.3540064 0 .6410256-.2798437.6410256-.625v-5c0-.34515625-.2870192-.625-.6410256-.625H9.18803419c-.35400641 0-.64102564.27984375-.64102564.625v5c0 .3451563.28701923.625.64102564.625zm1.49572651-4.16666667h4.2735043v2.08333334h-4.2735043V7.08333333zM8.54700855 14.375v-1.25c0-.3451562.28701923-.625.64102564-.625h7.26495731c.3540064 0 .6410256.2798438.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625H9.18803419c-.35400641 0-.64102564-.2798437-.64102564-.625zm10.25641025 0v-1.25c0-.3451562.2870192-.625.6410256-.625H25c.3540064 0 .6410256.2798438.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.2798437-.6410256-.625zm0-7.5v-1.25c0-.34515625.2870192-.625.6410256-.625H25c.3540064 0 .6410256.27984375.6410256.625v1.25c0 .34515625-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.27984375-.6410256-.625zm0 3.75v-1.25c0-.34515625.2870192-.625.6410256-.625H25c.3540064 0 .6410256.27984375.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.2798437-.6410256-.625z" fill-rule="nonzero" />
									</svg>
									<?php $theTitle = wp_strip_all_tags(get_post_meta(get_the_ID(), 'title', true));
									echo $theTitle; ?>

								</h1>
								<time class="article-row-content-time" datetime="2008-02-14 20:00">
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
