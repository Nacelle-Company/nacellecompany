<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) :
	if (get_post_type() == 'press') {
		$title = 'Press & News';
	} else {
		$title = 'News';
	}
?>
	<header class="featured-hero" role="banner" <?php if ((get_post_type() == 'news' && is_archive()) || (get_post_type() == 'press' && is_archive())) : ?> <?php else : ?>data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]" <?php endif; ?>>
		<?php if ((get_post_type() == 'news') || (get_post2type() == 'press')) : ?>
			<div class="grid-x align-center-middle news-header slideInFromBottom">
				<div class="cell">
					<h2 class="text-center mb-0 h1"><?php _e($title, 'nacelle'); ?></h2>
				</div>
			</div>
		<?php endif; ?>
	</header>
<?php endif;
