<?php

/**
 * The template for displaying press_release archive pages
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

<header class="primary featured-hero">
	<div class="grid-x">
		<div class="cell text-center">
				<h1><?php post_type_archive_title(); ?></h1>
		</div>
	</div>
</header>

<main class="main-container">
	<div class="main-grid">
		<div class="main-content archive press-release">
			<div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid">
				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						$time = get_the_time('F j, Y', $mypost->ID);
						$timeShort = get_the_time('o-m-j', $mypost->ID);
						$theTitle = get_field('title', false, false);
						if (!empty($theTitle)) {
							$title = $theTitle;
						} else {
							$title = get_the_title($mypost->ID);
						}
						$news_icon = get_field('news_icon', 'option');
						if (has_post_thumbnail($post->ID)) :
				?>
							<article id="post-<?php the_ID(); ?>" class="cell media-object card stack-for-small">
								<div class="flex-container flex-dir-column medium-flex-dir-row">
									<div class="media-object-section">
										<?php
										echo '<a href="' . get_permalink() . '">';
										if (has_post_thumbnail()) : the_post_thumbnail('thumbnail');
										endif;
										echo '</a>';
										?>
									</div>
									<div class="media-object-section">
										<time datetime="<?php echo $timeShort; ?>">
											<?php
											echo $time; ?>
										</time>
										<p class="lead mb-0">
											<?php
											echo '<a href="' . get_permalink() . '">';
											echo $title;
											echo '</a>';
											?>
										</p>
									</div>
									<a class="go-corner" href="<?php echo get_permalink($mypost->ID); ?>">
										<div class="go-arrow">
											→
										</div>
									</a>
								</div>
							</article>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer();
