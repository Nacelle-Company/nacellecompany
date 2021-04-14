<?php

/**
 * The template for displaying distribution catalog pages
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

<main class="main-grid cell medium-auto medium-cell-block-container">

	<h1 class="hide">
		<?php _e('Distribution', 'nacelle'); ?>
	</h1>

	<?php $count = 0; ?>

	<?php // is category distribution 
	?>
	<?php if (have_posts('distribution')) : the_post(); ?>

		<div class="cell macro-cat-cards">

			<div class="grid-x small-up-2 medium-up-2 large-up-4 grid-margin-y macro-cat-cards-wrapper">

				<?php // film category 
				?>
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

				<?php foreach ($posts as $post) : setup_postdata($post);
					$count++; ?>

					<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/distribution/film/">

						<h2 class="text-center catalog-title film">
							<?php get_template_part('template-parts/svg/icon-film'); ?>
							<?php _e('Films', 'nacelle'); ?>
						</h2>

						<div class="img-container">
							<?php
							$image = get_field('square_image');
							if (!is_array($image)) {
								$image = acf_get_attachment($image);
							}
							$alt = $image['alt'];

							?>

							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $alt; ?>" />


						</div>
					</a>
					<?php if ($count === 1) {
						break;
					} ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

				<?php // album category 
				?>
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

				<?php foreach ($posts as $post) : setup_postdata($post);
					$count++;
					$bk_color = get_post_meta(get_the_ID(), true);

					var_dump($bk_color);
					?>


					<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/distribution/album/">

						<h2 class="text-center catalog-title album">
							<?php get_template_part('template-parts/svg/icon-disk'); ?>
							<?php _e('Albums', 'nacelle'); ?>
						</h2>

						<div class="img-container">

							<?php

							$image = get_field('square_image');
							var_dump($image);
							$alt = $image['alt'];
							?>

							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $alt; ?>" />

						</div>
					</a>
					<?php if ($count === 1) {
						break;
					} ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

				<?php // special category 
				?>

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
				<?php foreach ($posts as $post) : setup_postdata($post);
					$count++; ?>

					<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/distribution/special/">

						<h2 class="text-center catalog-title special">
							<?php get_template_part('template-parts/svg/icon-mic'); ?>
							<?php _e('Specials', 'nacelle'); ?>
						</h2>

						<div class="img-container">
							<?php

							$image = get_field('square_image');
							$alt = $image['alt'];

							?>

							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $alt; ?>" />



						</div>
					</a>
					<?php if ($count === 1) {
						break;
					} ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

				<?php // series category 
				?>

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
				<?php foreach ($posts as $post) : setup_postdata($post);
					$count++; ?>

					<a class="cell cat-container" href="<?php echo get_home_url() ?>/category/distribution/series/">

						<h2 class="text-center catalog-title series">
							<?php get_template_part('template-parts/svg/icon-video'); ?>
							<?php _e('Series', 'nacelle'); ?>
						</h2>

						<div class="img-container">
							<?php

							$image = get_field('square_image');
							$alt = $image['alt'];

							?>

							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $alt; ?>" />


						</div>
					</a>
					<?php if ($count === 1) {
						break;
					} ?>

				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			</div>
		</div>


	<?php else : ?>
		<h4>NO posts on this page</h4>
	<?php endif; // End have_posts() check.
	?>

	<div class="cell">

		<?php // left embed 
		?>
		<?php $distributionEmbed = get_field('left_dist_content', 'option');
		if (get_field('left_dist_content', 'option')) :
		?>

			<div class="grid-x grid-margin-x grid-padding-x grid-padding-y align-center-middle">

				<div class="cell medium-8 left-embed">

					<div class="embed-container">

						<iframe src="<?php echo $distributionEmbed ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					</div>

				</div>

			<?php endif; ?>

			<?php // right_dist_content 
			?>
			<?php if (get_field('right_dist_content', 'option')) : ?>

				<div class="cell medium-4 left-embed">

					<?php the_field('right_dist_content', 'option'); ?>

				</div>

			<?php endif; ?>

			</div>

	</div>

	<div class="cell">

		<?php if (have_rows('bottom_repeater', 'option')) : ?>

			<?php while (have_rows('bottom_repeater', 'option')) : the_row();

				// vars
				// $leftContent = get_sub_field('l_editor', 'option');
				$rightContent = get_sub_field('right_editor', 'option');
				// var_dump($leftContent);
			?>
				<?php the_sub_field($rightContent, 'option'); ?>

				<?php if ($leftContent) : ?>
					<p>
					</p>
				<?php endif; ?>

				<?php if ($rightContent) : ?>
					<p>
						<?php echo $rightContent; ?>
					</p>
				<?php endif; ?>

			<?php endwhile; ?>

		<?php endif; ?>
	</div>

	<h1><?php the_field('simple_text', 'option'); ?>
	</h1>

</main>

<?php get_footer();
