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

$hero_image = get_field('press_release_header', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][ $img_size_lg ];
$hero_md = $hero_image['sizes'][ $img_size_md ];
$hero_sm = $hero_image['sizes'][ $img_size_sm ];

if (!empty('press_release_header')):
    ?>

	<header class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">

	</header>

<?php endif;?>

<?php // get_template_part('template-parts/featured-image-lg-title');?>


<div class="main-container">
	<!-- <header class="grid-container">
		<h1 class="entry-title">Press</h1>
	</header> -->
	<div class="main-grid">
		<main class="main-content">
		<?php
        // https://developer.wordpress.org/reference/functions/query_posts/
        $current_year = date('Y');
        $current_month = date('m');
        $posts = query_posts($query_string . "&year=$current_year&monthnum=$current_month&order=DESC");
        if (have_posts()) : ?>

			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>
						<div class="grid-x grid-padding-y feed-container">

							<?php
                            // If a featured image is set, insert into layout and use Interchange
                            // to select the optimal image size per named media query.
                            if (has_post_thumbnail($post->ID)) : ?>

							<!-- <div class="cell medium-4">
								<?php //echo '<a href="' . get_permalink() . '">';?>
									<img data-interchange="[<?php //the_post_thumbnail_url('fp-small');?>, small], [<?php //the_post_thumbnail_url('fp-medium');?>, medium], [<?php //the_post_thumbnail_url('fp-large');?>, large]">
								<?php //echo '</a>';?>
							</div> -->

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

						<?php else : ?>

							<div class="cell medium-12 archive-title">

								<div class="grid-x">
									<?php // oldschool title
                                        if (is_single()) {
                                            the_title('<h3 class="entry-title">', '</h3>');
                                        } else {
                                            the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                                        }
                                    ?>
								</div>
								<div class="grid-x small-up-2">
									<div class="cell">
										<p><?php the_time('m.j.y'); ?></p>
									</div>
									<div class="cell text-right">
										<a class="clear button success medium" href="<?php echo get_permalink(); ?>">Read More. . .</a>
									</div>
								</div>
							<footer>
								<div class="entry-content">
									<?php //the_content();?>
									<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>
								</div>
								<?php $tag = get_the_tags(); if ($tag) {
                                        ?><p><?php the_tags(); ?></p><?php
                                    } ?>
							</footer>
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
