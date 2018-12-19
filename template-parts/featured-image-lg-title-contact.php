<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
// if (has_post_thumbnail($post->ID)) :?>
	<header class="featured-hero align-center-middle grid-x lg" role="banner" data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
		<h1 class="entry-title-lg cell">
			<?php
                if (the_field('header_title')) {
                    the_field('header_title');
                }
            ?>
		</h1>
	</header>
<?php //endif;
