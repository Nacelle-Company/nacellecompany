<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
//if (has_post_thumbnail($post->ID)) :?>
	<header class="featured-hero align-center-middle grid-x lg" role="banner">

		<?php
            // if (is_single()) {
                post_type_archive_title('<h1 class="entry-title-lg cell">', '</h1>');
            // } else {
            //     the_title('<h1 class="entry-title-lg cell">', '</h1>');
            // }
        ?>

	</header>
<?php //endif;
