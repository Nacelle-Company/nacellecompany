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
<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

$hero_image = get_field('news_header_image', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][ $img_size_lg ];
$hero_md = $hero_image['sizes'][ $img_size_md ];
$hero_sm = $hero_image['sizes'][ $img_size_sm ];

if (!empty('news_header_image')):
    ?>

	<header class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">

	</header>
<?php else:?>

<?php endif;?>

<?php //get_template_part('template-parts/featured-image-lg-title');?>

<div class="main-container">
	<!-- <header class="grid-container">
		<h1 class="entry-title">News</h1>
	</header> -->
	<div class="main-grid">
		<main class="main-content">
		<?php
        // https://developer.wordpress.org/reference/functions/query_posts/
        $current_year = date('Y');
        $posts = query_posts($query_string . "&year=$current_year&order=DESC");
        if (have_posts()) : ?>

			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>

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

			<?php endif; // End have_posts() check.?>

		</main>
		<?php wp_reset_query(); ?>
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
