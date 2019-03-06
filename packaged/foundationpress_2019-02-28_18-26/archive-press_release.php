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


	<header class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">
        <div class="grid-x">
		    <div class="cell">
		    	<h1 class="text-center">Press Releases</h1>
		    </div>
		</div>
	</header>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">

		<?php
        // https://developer.wordpress.org/reference/functions/query_posts/

        $current_year = date('Y');


        $current_month = date('M');

        $posts = query_posts($query_string . "&post_status=future,publish&posts_per_page=60&order=DESC");

        if (have_posts()) : ?>

			<!--Start the Loop -->
			<?php while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="cell pt-3">

						<div class="grid-x feed-container">

							<?php
                            // If a featured image is set, insert into layout and use Interchange
                            // to select the optimal image size per named media query.
                            if (has_post_thumbnail($post->ID)) : ?>

							<div class="cell medium-12 archive-title">

								<div class="grid-x">

									<!-- newschool title -->
									<h4>

										<?php echo '<a href="' . get_permalink() . '">'; ?>

											<?php

                                            $acfTitle = the_field('title');

//                                             $singleTitle = 	is_single();

//                                             if (!empty($acfTitle)) {

                                                echo $acfTitle;

//                                             } elseif (!empty($singleTitle)) {

//                                                 echo the_title();

//                                             }

                                            ?>

										<?php echo '</a>'; ?>
									</h4>
								</div>
								<div class="grid-x small-up-2">
									<div class="cell">
										<p><?php the_time('m.j.y'); ?></p>
									</div>
									<div class="cell text-right">
										<a class="clear button success medium pr-0" href="<?php echo get_permalink(); ?>">Read More</a>
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
									<?php // edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>');?>
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
