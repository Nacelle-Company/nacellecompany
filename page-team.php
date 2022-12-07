<?php
/**
 * Template Name: Team
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();
wp_rig()->print_styles( 'wp-rig-page' );
wp_rig()->print_styles( 'wp-rig-page-team' );
get_template_part( 'template-parts/header/page-header' );

?>
<main id="primary" class="site-main site-main__team">
<?php

while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if (have_rows('repeater')) : ?>
			<?php while (have_rows('repeater')) : the_row();
				// vars
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$position = get_sub_field('position');
				?>
				<div class="teammember">
					<img class="teammember-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
					<div class="teammember-info">
						<?php if ($name) : ?>
							<h2 class="teammember-name"><?php echo $name; ?></h2>
						<?php endif; ?>
						<?php if ($position) : ?>
							<p class="teammember-position"><?php echo $position; ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
	</article>
<?php endwhile; ?>
</main>
<?php
get_footer();
