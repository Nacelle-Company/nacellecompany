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

<div class="space-please grid-container full">
	<main class="main-grid grid-x">

<!-- is category distribution -->
<?php if (is_category('Distribution')) : ?> <!--category -->
	<?php if (have_posts('')) : the_post();?>

			<div class="cell">
				<div class="grid-x small-up-1 medium-up-4">

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
					<?php foreach ($posts as $post):

                        setup_postdata($post)

                        ?>
					<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/film/">
						<h3 class="text-center catalog-title film">Film</h3>
						<?php

                        $image = get_field('square_image');
                        $size = 'large'; // (thumbnail, medium, large, full or custom size)

                        if ($image) {
                            echo wp_get_attachment_image($image, $size);
                        }

                        ?>
					</a>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>


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
					<?php foreach ($posts as $post):

                        setup_postdata($post)

                        ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/album/">
							<h3 class="text-center catalog-title album">Album</h3>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

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
					<?php foreach ($posts as $post):

                        setup_postdata($post)

                        ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/special/">
							<h3 class="text-center catalog-title special">Special</h3>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

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
					<?php foreach ($posts as $post):

                        setup_postdata($post)

                        ?>

						<a class="medium-6 cell" href="<?php echo get_home_url() ?>/category/distribution/series/">
							<h3 class="text-center catalog-title series">Series</h3>
							<?php

                            $image = get_field('square_image');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

				</div>
			</div>
<!-- embedded content -->
<?php endif; ?> <!-- END LOOP -->

<?php
// get the current taxonomy term
$term = get_queried_object();


// vars
$lefttitle = get_field('left_title', $term);
$leftembed = get_field('left_embed', $term);
$righttitle = get_field('right_title', $term);
$rightembed = get_field('right_embed', $term);
// $color = get_field('color', $term);
?>
	<div class="grid-x">
		<div class="medium-6 cell">
			<?php echo $lefttitle; ?>
			<div class="embed-container">
				<?php echo $leftembed; ?>
			</div>
		</div>

		<div class="medium-6 cell">

		</div>

		</div>


<!-- is category production-->
<?php elseif (is_category('1973')) :?>

	<?php get_template_part('taxonomy-media');?>

	<!-- is category production-->
<?php elseif (is_category('1974')) :?>

		<?php get_template_part('taxonomy-media');?>

<!-- is category production-->
<?php elseif (is_category('1975')) :?>

	<?php get_template_part('taxonomy-media');?>

	<!-- is category production-->
<?php elseif (is_category('1976')) :?>

		<?php get_template_part('taxonomy-media');?>

<!-- is category production-->
<?php elseif (is_category('Production')) : ?>

				<div class="cell">
					<div class="grid-x">
						<div class="cell medium-6">
							<div class="grid-x medium-12">
								<div class="cell small-12">
									<h3 class="text-center catalog-title special">Special</h3>
								</div>
								<?php
                                $posts = get_posts(array(
                                    'meta_query' => array(
                                        array(
                                            'key' => 'production_special_featured',
                                            'compare' => '=',
                                            'value' => '1'
                                        )
                                    )
                                )); ?>
								<?php foreach ($posts as $post):

                                    setup_postdata($post)

                                    ?>
										<a class="cell medium-6" href="<?php echo get_home_url() ?>/category/production/special-production/">
											<?php

                                            $image = get_field('square_image');
                                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                            if ($image) {
                                                echo wp_get_attachment_image($image, $size);
                                            }

                                            ?>
										</a>

								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>


							</div>
						</div>
						<div class="cell medium-6">
							<div class="grid-x medium-12">
								<div class="cell small-12">
									<h3 class="text-center catalog-title series">Series</h3>
								</div>
								<?php
                                $posts = get_posts(array(
                                    'meta_query' => array(
                                        array(
                                            'key' => 'production_series_featured',
                                            'compare' => '=',
                                            'value' => '1'
                                        )
                                    )
                                )); ?>
								<?php foreach ($posts as $post):

                                    setup_postdata($post)

                                    ?>
										<a class="cell medium-6" href="<?php echo get_home_url() ?>/category/production/series-production/">
											<?php

                                            $image = get_field('square_image');
                                            $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                            if ($image) {
                                                echo wp_get_attachment_image($image, $size);
                                            }

                                            ?>
										</a>

								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
				</div>

<!-- is production special-->
<?php elseif (is_category('1979')) :?>

	<?php get_template_part('taxonomy-media');?>

	<!-- is category production-->
<?php elseif (is_category('1978')) :?>

		<?php get_template_part('taxonomy-media');?>




<?php else : ?>
	<h4>NO posts on this page</h4>
<?php endif; // End have_posts() check.?>



	</main>
</div>

<?php get_footer();
