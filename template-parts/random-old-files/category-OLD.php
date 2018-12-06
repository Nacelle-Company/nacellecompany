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


<?php

// echo '<pre>';
//     print_r(get_fields());
// echo '</pre>';

?>

	<div class="main-grid">

	<?php // PRODUCTIONS taxonomy
    $productionsArgs = array('category' => 'productions');
    $productionsQuery = new WP_Query($productionsArgs);
    $count = 0;
    ?>
	<?php if (is_category('productions')):?>
		<h1>Productions Category</h1>
		<?php if ($productionsQuery->have_posts()) : while ($productionsQuery->have_posts()) : $productionsQuery->the_post(); $count++ ?>

			<?php if (get_field('sticky_post')):?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('thumbnail');?> <!-- post thumbnail -->
					<?php
                    $value = substr(get_field('synopsis'), 0, 121);
                    echo $value . ". . ."; ?><!-- synopsis -->
				</a>
			<?php endif;?>

			<?php if ($count === 4) {
                        break;
                    } ?>
			<?php endwhile; ?>

		<?php endif; ?>
	<?php endif;?>


	<?php
    $cd_distributionsArgs = array('category' => 'distributions');
    $cd_distributionsQuery = new WP_Query($cd_distributionsArgs);
    $count = 0;
    ?>
	<div class="grid-x">
		<?php if (is_category('distributions')): ?>
			<p><?php single_cat_title(); ?></p>
			<?php if ($cd_distributionsQuery->have_posts()) : while ($cd_distributionsQuery->have_posts()) : $cd_distributionsQuery->the_post(); $count++ ?>
				<?php the_title(); ?>
				<?php if (get_field('sticky_post')): ?>
					<div class="cell medium-3">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail');?> <!-- post thumbnail -->
							<?php
                            $value = substr(get_field('synopsis'), 0, 121);
                            echo $value . ". . .";
                            ?><!-- synopsis -->
						</a>
					</div>
				<?php endif; ?>

				<?php if ($count === 4) {
                                break;
                            } ?>
				<?php endwhile; ?>
			<?php endif ?>
		<?php endif ?>

	<!-- end productions -->
	</div>
</div>


<?php $my_query = new WP_Query('category_name=distributions&posts_per_page=1');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>
	<!-- Do stuff... -->
	<?php the_post_thumbnail('thumbnail');?>
<?php endwhile; ?>




<?php get_footer();
