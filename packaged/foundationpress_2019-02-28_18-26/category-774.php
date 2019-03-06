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

<main class="main-grid grid-x medium-auto medium-cell-block-container">

	<h1 class="hide">
		<?php _e('Production', 'comedy-dynamics'); ?>
	</h1>

	<?php $count = 0; ?>
<!-- is category production-->
<?php if (have_posts('production')) : the_post(); ?>

	<div class="grid-x macro-cat-cards medium-up-2 grid-padding-x grid-margin-x large-up-2">

		<div class="cell">

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

					<h2 class="text-center catalog-title special">
						<i class="fas fa-microphone-alt"></i>
						<?php _e('Specials', 'comedy-dynamics'); ?>
					</h2>

					<?php foreach ($posts as $post): setup_postdata($post) ?>

						<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/production/special-production/">



							<div class="img-container">

								<?php

                                    $image = get_field('square_image');
                                    $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                    if ($image) {
                                        echo wp_get_attachment_image($image, $size);
                                    }

                                    ?>
							</div>
						</a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>

				</div>


					<!-- series category -->
				<div class="cell">

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

										<h2 class="text-center catalog-title series">
											<i class="fas fa-video"></i>
											<?php _e('Series', 'comedy-dynamics'); ?>
										</h2>

					<?php foreach ($posts as $post): setup_postdata($post); ?>

							<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/production/series-production/">

								<div class="img-container">

								<?php

                                $image = get_field('square_image');
                                $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                if ($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }

                                ?>
									</div>
								</a>

					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>

	</div>



<?php else : ?>
<h4>NO posts on this page</h4>
<?php endif; // End have_posts() check.?>

	<div class="grid-container">
		<div class="grid-x grid-padding-y grid-margin-x align-center-middle">

					<!-- left embed -->
					<?php if (get_field('left_prod_embed', 'option')): ?>
						<div class="cell medium-6 left-embed">
							<?php the_field('left_prod_embed', 'option'); ?>
						</div>
					<?php endif; ?>
					<!-- right_prod_content -->
					<?php if (get_field('right_prod_content', 'option')): ?>
						<div class="cell medium-6">
							<?php the_field('right_prod_content', 'option'); ?>
						</div>
					<?php endif; ?>



		</div>
	</div>

</main>

<?php get_footer();
