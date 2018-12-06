<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>
<?php get_template_part('template-parts/featured-image'); ?>

<div class="grid-container">

	<main class="top-meta grid-x grid-margin-x">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content-catalog', ''); ?>
		<?php endwhile; ?>
	</main>
</div> <!-- closing div for featured-image.php topmost "grid-container" -->

	<div class="grid-container">
		<div class="grid-x grid-padding-y grid-margin-x">

			<div class="cell medium-6">
				<h2>embedded content</h2>
			</div>
			<div class="cell medium-6">
				<h2>purchase on itunes</h2>
			</div>

		</div>
	</div>


	<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>

<?php get_footer(); ?>
