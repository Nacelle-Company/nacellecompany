	<header class="catalog catalog-header featured-hero grid-container fluid">
		<div class="grid-x catalog grid-padding-y">
			<div class="cell px-large-3">
				<div class="grid-x align-justify">

					<div class="cell large-7">
						<?php
						if (is_single()) {
							the_title('<h1 class="entry-title">', '</h1>');
						} else {
							the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						}
						?>
					</div>
					<div class="cell medium-auto mr-4 breadcrumbs">
						<div class="grid-x align-justify large-text-right large-flex-dir-column">
							<?php if (function_exists('rank_math_the_breadcrumbs') || et_field('theatres_popup')) : ?>
								<div class="cell breadcrumb-container small-9 large-12">
									<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
									<?php if (get_field('theatres_popup')) : ?>
										<?php get_template_part('template-parts/blocks/tickets-modal', 'none'); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="cell small-3 large-12">
								<div class="grid-x align-right">
									<div class="cell shrink flex-container align-right">
										<strong class="secondary-color">Share on</strong>
									</div>
									<div class="cell shrink flex-container align-right">
										<?php get_template_part('template-parts/blocks/social-share'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-x align-justify align-top">
					<div class="cell medium-12 large-6 synopsis">
						<span class="invisible">
							<h2><?php the_title(); ?></h2>
						</span>
						<?php
						$synopsis_more = ' . . <button class="primary-color" data-toggle="exampleModal5" aria-controls="exampleModal5">more.</button>'; // what to add at the end of the trimmed text
						if (get_the_content()) {
							$synopsis = apply_filters('the_content', get_the_content());
							$synopsis = wp_strip_all_tags($synopsis);
						} else {
							$synopsis = get_post_meta($post->ID, 'synopsis', true);
						}
						echo wp_trim_words($synopsis, 35, $synopsis_more);
						?>
					</div>
				</div>
			</div>
		</div>
	</header>