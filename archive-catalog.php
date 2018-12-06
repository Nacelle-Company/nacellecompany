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
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php
            $cd_productionsArgs = array('catalog' => 'productions');
            $taxonomy  = 'catalog';
            $tax_terms = get_terms($taxonomy, array('hide_empty' => false));
            $cd_productionsQuery = new WP_Query($cd_productionsArgs);
            $cd_synopsis = get_field('synopsis');
            $count = 0;
            ?>

			<?php if ($cd_productionsQuery->have_posts()) : while ($cd_productionsQuery->have_posts()) : $cd_productionsQuery->the_post(); $count++ ?>

				<?php if (get_field('sticky_post')): ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail');?> <!-- post thumbnail -->

						<?php printf($cd_synopsis);?><!-- synopsis -->
					</a>
				<?php endif; ?>

				<?php if ($count === 4) {
                break;
            } ?>
			<?php endwhile; ?>
		<?php endif; ?>



<!-- end productions -->

	</div>
</div>

<?php get_footer();
