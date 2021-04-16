<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) : ?>
	<header class="featured-hero" role="banner" <?php if (get_post_type() == 'news' && is_archive( )) : ?> <?php else : ?>data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]"<?php endif; ?>>
		<?php if (get_post_type() == 'news') : ?>
				<div class="grid-x align-center-middle">
					<div class="cell">
						<h1 class="text-center mb-0"><?php _e('News', 'nacelle'); ?></h1>
					</div>
				</div>
		<?php endif; ?>
	</header>
<?php endif;
