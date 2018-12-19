<?php
/**
 * The template for displaying search results pages.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main id="search-results" class="main-content grid-x">

		<header>
			<h1 class="entry-title"><?php _e('Search Results for', 'comedy-dynamics'); ?> "<?php echo get_search_query(); ?>"</h1>
		</header>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>
				<?php // get_template_part('template-parts/content', get_post_format());?>

					<?php  // var in the loop
                    $link = get_field('link_to_article');

                    ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>
							<div class="grid-x grid-padding-y feed-container">

								<?php
                                // If a featured image is set, insert into layout and use Interchange
                                // to select the optimal image size per named media query.
                                if (has_post_thumbnail($post->ID)) :?>

								<div class="cell medium-4">

									<?php if ($link): ?>
									<a href="<?php echo $link; ?>" target="_blank">
										<img data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]">
									<?php echo '</a>'; ?>
									<?php endif; ?>
								</div>

								<div class="cell medium-8 archive-title">

									<div class="grid-x">
										<?php
                                            if (is_single()) {
                                                the_title('<h4 class="entry-title">', '</h4>');
                                            } else {
                                                the_title('<h4 class="entry-title"><a href="' . esc_url($link) . '" target="_blank">', '</a></h4>');
                                            }
                                            echo '</a>';
                                        ?>
									</div>

									<div class="grid-x small-up-2">

										<div class="cell">
											<p><?php the_time('m.j.y'); ?></p>
										</div>

										<div class="cell text-right">
											<?php if ($link): ?>
												<a class="success medium" href="<?php echo $link; ?>" target="_blank">Read Article</a>
											<?php endif; ?>
										</div>

									</div>
								</div>
							<?php elseif (empty(has_post_thumbnail($post->ID))) : ?>
							<div class="cell medium-12 archive-title">
								<div class="grid-x">
									<?php
                                        if (is_single()) {
                                            the_title('<h4 class="entry-title">', '</h4>');
                                        } else {
                                            the_title('<h4 class="entry-title"><a href="' . esc_url($link) . '" target="_blank">', '</a></h4>');
                                        }
                                        echo '</a>';
                                    ?>
								</div>
								<div class="grid-x small-up-2">

									<div class="cell">
										<p><?php the_time('m.j.y'); ?></p>
									</div>

									<div class="cell text-right">
										<?php if ($link): ?>
											<a class="success medium" href="<?php echo $link; ?>" target="_blank">Read Article</a>
										<?php endif; ?>
									</div>

								</div>
							</div>
							<?php endif;?>

						</div>
					</article>

			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

		<?php
        if (function_exists('comedy_dynamics_pagination')) :
            comedy_dynamics_pagination();
        elseif (is_paged()) :
        ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'comedy-dynamics')); ?></div>
				<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'comedy-dynamics')); ?></div>
			</nav>
		<?php endif; ?>

		</main>
	<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();
