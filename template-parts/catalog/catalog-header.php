	<header class="catalog featured-hero grid-container fluid">

		<div class="grid-x catalog grid-padding-y">

			<div class="cell px-large-3">

				<div class="grid-x align-justify">

					<?php // title 
					?>
					<div class="cell large-7">
						<?php
						if (is_single()) {
							the_title('<h1 class="entry-title">', '</h1>');
						} else {
							the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						}
						?>
					</div>

					<?php // theatre popup button 
					?>
					<div class="cell medium-auto medium-text-right mr-3 breadcrumbs">
						<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
						<?php // include tickets modal 
						?>
						<?php if (get_field('theatres_popup')) : ?>

							<?php get_template_part('template-parts/blocks/tickets-modal', 'none'); ?>

						<?php endif; ?>

					</div>

				</div>

				<div class="grid-x align-justify align-top">

					<?php // synopsis 
					?>
					<div class="cell medium-12 large-6 synopsis">
						<span class="invisible"><h2><?php the_title(); ?></h2></span>

						<?php
						$trim_length = 35;  //desired length of text to display
						$value_more = ' . . <button class="primary-color" data-toggle="exampleModal5" aria-controls="exampleModal5">more.</button>'; // what to add at the end of the trimmed text
						$custom_field = 'synopsis';
						$value = get_post_meta($post->ID, $custom_field, true);
						if ($value) {
							echo wp_trim_words($value, $trim_length, $value_more);
						}
						?>

					</div>

				</div>

			</div> <?php // END cell 
					?>

		</div> <?php // END catalog 
				?>

	</header>