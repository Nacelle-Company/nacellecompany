<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main id="search-results" class="main-content">

		<header>

			<div class="grid-x bookmark">

				<div class="col auto pr-1">

					<i class="fas fa-bullhorn"></i>

				</div>

				<div class="col small-1 bookmark-title">

					<h5><strong>Press</strong></h5>

				</div>

			</div>

			<h1 class="entry-title"><?php _e('Search Results for', 'foundationpress'); ?> "<?php echo get_search_query(); ?>"</h1>
		</header>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<div class="cell medium-12 archive-title">

					<div class="grid-x">
						<h4> <!-- newschool title -->
							<?php echo '<a href="' . get_permalink() . '">'; ?>
								<?php
                                $acfTitle = the_field('title');
                                $singleTitle = 	is_single();
                                if (!empty($acfTitle)) {
                                    echo $acfTitle;
                                } elseif (!empty($singleTitle)) {
                                    echo the_title();
                                }


                                ?>

							<?php echo '</a>'; ?>
						</h4>
					</div>
					<div class="grid-x small-up-2">
						<div class="cell">
							<p><?php the_time('m.j.y'); ?></p>
						</div>
						<div class="cell text-right">
							<a class="clear button success medium" href="<?php echo get_permalink(); ?>">Read More</a>
						</div>
					</div>
				</div>

			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

		<?php
        if (function_exists('foundationpress_pagination')) :
            foundationpress_pagination();
        elseif (is_paged()) :
        ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
				<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
			</nav>
		<?php endif; ?>

		</main>
	<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();
