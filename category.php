<?php
/**
 * The template for displaying catalog archive
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

<main>

	<div class="grid-container full align-center pt-3">

	<!-- check if is any of the secondary categories (album, film, production series ext.) -->
	<?php if (is_category(array( 'album', 'film', 'series', 'special', 'podcast' ))) :?>

		<!-- get the content from the template-parts folder -->
		<?php get_template_part('/template-parts/content/content-categories'); ?>

		<!-- production categories -->
	<?php elseif (is_category(array('special-production', 'series-production' ))) :?>

	<!-- get the content from the template-parts folder -->
		<?php get_template_part('/template-parts/content/content-production-category'); ?>

	<?php else : ?>

		<div class="cell text-center">

			<h3><?php _e('Sorry, we dont have anything here :(', 'comdey-dynamics'); ?></h3>

			<a class="button" data-toggle="searchFilmOffCanvas"><?php _e('Try a search!', 'nacelle'); ?></a>

		</div>

	<?php endif; // End have_posts() check.?>

	</div>

</main>

<?php get_footer();
