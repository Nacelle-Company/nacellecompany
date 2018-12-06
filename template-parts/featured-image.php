<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) : ?>
<div class="grid-container-full">

	<header style="background: repeating-linear-gradient(0deg, rgba(255,255,255, 0.25), rgba(255,255,255, 0.25) 1px, transparent 1px, transparent 7px), <?php the_field('header_color_picker'); ?>;" class="featured-hero grid-x" >
		<div class="cell">
			<div class="grid-container">
				<div class="grid-x">
					<?php
                          if (is_single()) {
                              the_title('<h1 class="entry-title cell medium-6">', '</h1>');
                          } else {
                              the_title('<h2 class="entry-title cell medium-6"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                          }
                      ?>
				</div>
			</div>
		</div>
	</header>
	<?php endif;
