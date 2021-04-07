<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

$hero_image = get_field('news_header_image', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][ $img_size_lg ];
$hero_md = $hero_image['sizes'][ $img_size_md ];
$hero_sm = $hero_image['sizes'][ $img_size_sm ];

    ?>

<main class="main-container">
	<div class="main-grid">
		<div id="search-results" class="main-content news-search">

		<header>
			<div class="grid-x bookmark">

				<div class="col auto pr-1">

					<i class="far fa-newspaper"></i>

				</div>

				<div class="col small-1 bookmark-title">

					<h5><strong>News</strong></h5>

				</div>

			</div>
			<h1 class="entry-title"><?php _e('Search Results for', 'foundationpress'); ?> "<?php echo get_search_query(); ?>"</h1>
		</header>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php $newsLink = get_field('link_to_article', $post->ID); ?>

				<div class="grid-x grid-padding-y feed-container">

					<?php
                    // If a featured image is set, insert into layout and use Interchange
                    // to select the optimal image size per named media query.
                    if (has_post_thumbnail($post->ID)) :?>

					<div class="cell medium-4">

						<?php if ($newsLink): ?>
						<a href="<?php echo $newsLink; ?>" target="_blank">
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

		</div>
	<?php get_sidebar(); ?>

	</div>
</main>
<?php get_footer();
