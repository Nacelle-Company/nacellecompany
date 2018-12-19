<?php
/**
 * The template for displaying catalog pages
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

<div class="grid-container full">
	<main class="main-grid grid-x">
		<h1 class="hide">Distribution</h1>
		<!-- is category distribution -->
		<?php $count = 0; ?>

		<?php if (have_posts('')) : the_post(); ?>

			<div class="cell">
				<div class="grid-x small-up-1 medium-up-4 grid-padding-y">
<!-- film category -->

					<?php
                    $posts = get_posts(array(
                        'meta_query' => array(
                            array(
                                'key' => 'dist_film_featured',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    )); ?>
					<?php foreach ($posts as $post): setup_postdata($post); $count ++; ?>

					<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/film/">
						<h2 class="text-center catalog-title film">Film</h2>
						<?php

                        $image = get_field('square_image');
                        $size = 'large'; // (thumbnail, medium, large, full or custom size)

                        if ($image) {
                            echo wp_get_attachment_image($image, $size);
                        }

                        ?>
					</a>
					<?php if ($count === 1) {
                            break;
                        } ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

<!-- album category -->
					<?php
                    $posts = get_posts(array(
                        'meta_query' => array(
                            array(
                                'key' => 'dist_album_featured',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    )); ?>
					<?php foreach ($posts as $post): setup_postdata($post); $count ++; ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/album/">
							<h2 class="text-center catalog-title album">Album</h2>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>
						<?php if ($count === 1) {
                                break;
                            } ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

<!-- special category -->

					<?php
                    $posts = get_posts(array(
                        'meta_query' => array(
                            array(
                                'key' => 'dist_special_featured',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    )); ?>
					<?php foreach ($posts as $post): setup_postdata($post); $count ++; ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/special/">
							<h2 class="text-center catalog-title special">Special</h2>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>
						<?php if ($count === 1) {
                                break;
                            } ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

<!-- series category -->

					<?php
                    $posts = get_posts(array(
                        'meta_query' => array(
                            array(
                                'key' => 'dist_series_featured',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    )); ?>
					<?php foreach ($posts as $post): setup_postdata($post); $count ++; ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/series/">
							<h2 class="text-center catalog-title series">Series</h2>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>
						<?php if ($count === 1) {
                                break;
                            } ?>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

				</div>
			</div>


			<?php if (have_rows('add_a_row', 'option')): ?>

			    <ul>

			    <?php while (have_rows('add_a_row', 'option')): the_row(); ?>

			        <li><?php the_sub_field('editor'); ?></li>

			    <?php endwhile; ?>

			    </ul>

			<?php endif; ?>



<?php else : ?>
	<h4>NO posts on this page</h4>
<?php endif; // End have_posts() check.?>



	</main>
</div>

<?php get_footer();
