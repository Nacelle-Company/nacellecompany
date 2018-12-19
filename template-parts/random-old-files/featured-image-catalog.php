<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) : ?>
<!-- <div class="grid-container"> -->

	<header style="background:<?php the_field('header_color_picker'); ?>;" class="featured-hero grid-container fluid">
		<div class="grid-x">
			<div class="cell">

				<div class="grid-container">
					<a href="#">
						<div class="play grid-x">
							<p><a data-open="videoModal1"><i class="far fa-play-circle"></i></a></p>
						</div>
					</a>
					<div class="grid-x">
							<?php
                                  if (is_single()) {
                                      the_title('<h1 class="cell medium-7 grid-offset-3 entry-title">', '</h1>');
                                  } else {
                                      the_title('<h2 class="cell medium-7 grid-offset-3 entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                  }
                              ?>
					</div>
				</div>

		  	</div>
		</div>
	</header>

	<div class="reveal" id="videoModal1" data-reveal>

			<div class="embed-container">
				<?php the_field('video_embedd'); ?>
			</div>

	  <button class="close-button" data-close aria-label="Close reveal" type="button">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>


	<?php endif;
