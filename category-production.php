<?php
/**
 * The template for displaying production category pages
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

<main class="main-content-full-width">
<?php  if (is_category('production')) :?>

	<div class="grid-x">
	    <div class="medium-6 cell">
			<h2 class="text-center">Series</h2>
				<div class="grid-x">

				<?php
                /*
                *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
                *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
                *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
                */

                $post_objects = get_field('prod_series_sticky_posts');

                if ($post_objects): ?>

					<?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT)?>
					<?php setup_postdata($post); ?>
					<?php
                    // vars
                    $square_image = get_field('square_image');
                    if (!empty($square_image)): ?>
						<div class="medium-6 cell">
							<a href="<?php the_permalink(); ?>">
								<img class="category-feat" src="<?php echo $square_image['url']; ?>">
								<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
							</a>
						</div>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
				<?php endif; ?>
				</div>
			<!-- closing /div missing b/c of title -->
		</div>

<!-- specials posts -->

		<div class="medium-6 cell">
			<h2 class="text-center">Specials</h2>
				<div class="grid-x">
				<?php

                /*
                *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
                *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
                *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
                */
                $post_objects = get_field('prod_special_sticky_posts');

                if ($post_objects): ?>

					<?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT)?>
					<?php setup_postdata($post); ?>
					<?php
                    // vars
                    $square_image = get_field('square_image');
                    if (!empty($square_image)): ?>

					<div class="medium-6 cell">
						<a href="<?php the_permalink(); ?>">
							<img class="category-feat" src="<?php echo $square_image['url']; ?>">
							<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
						</a>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
				<?php endif; ?>
				</div>
			<!-- div missing b/c of title -->
		</div>
<!-- post navigation -->
		<div class="grid-x">
			<div class="medium-12 cell">
			<?php /* Display navigation to next/previous pages when applicable */ ?>
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
			</div>
		</div>

<?php endif; ?>
</main>

<?php get_footer();
