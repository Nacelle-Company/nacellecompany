<?php

/**
 * The template for displaying press archive pages
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
	<div class="main-grid press-release">
		<?php get_template_part('template-parts/logo-bg-header'); ?>
		<article class="main-content grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php // get the data!
					$time = get_the_time('F j, Y', $post->ID);
					$timeShort = get_the_time('o-m-j', $post->ID);
					$theTitle = get_field('title', false, false);
					if (!empty($theTitle)) {
						$title = $theTitle;
					} else {
						$title = get_the_title($post->ID);
					}
					$news_icon = get_field('news_icon', 'option');
					// if (has_post_thumbnail($post->ID)) :
					?>
					<div class="cell media-object card stack-for-small">
						<div class="grid-x medium-up-2 ">
							<div class="flex-container flex-dir-column large-flex-dir-row">
								<div class="media-object-section">
									<div class="thumbnail">
										<?php if (has_post_thumbnail()) : ?>
											<?php // the_post_thumbnail('medium');
											echo '<a href="' . get_permalink() . '">';
											echo get_the_post_thumbnail($post_id, 'medium', array('style' => 'width:100%;object-fit:contain;'));
											echo '</a>'; ?>
										<?php endif; ?>
									</div>
								</div>
								<div class="media-object-section cell">
									<time datetime="<?php echo $timeShort; ?>">
										<?php
										echo $time; ?>
									</time>
									<p class="lead mb-0">
										<?php
										echo '<a href="' . get_permalink() . '">';
										echo strip_tags($title);
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
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</article>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();
