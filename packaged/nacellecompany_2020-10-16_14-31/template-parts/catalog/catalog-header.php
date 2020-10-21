	<header class="catalog featured-hero grid-container fluid">

		<div class="grid-x catalog grid-padding-y">

			<div class="cell px-3">

					<div class="grid-x align-justify">

						<?php // title 
						?>
						<div class="cell medium-10">
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
						<div class="cell medium-auto">
							<!-- include tickets modal -->
							<?php if (get_field('theatres_popup')) : ?>

								<?php get_template_part('template-parts/blocks/tickets-modal', 'none'); ?>

							<?php endif; ?>

						</div>

					</div>

					<div class="grid-x align-justify align-top">

						<!-- synopsis -->
						<div class="cell medium-6 syopsis">
							<?php
							$excerpt = get_field('synopsis');

							$excerpt = substr($excerpt, 0, 300);
							$result = substr($excerpt, 0, strrpos($excerpt, ' '));
							echo $result . ' . . <a class="primary-color" data-toggle="exampleModal5" aria-controls="exampleModal5">Read full article</a>';
							?>

							<div class="small synopsis reveal" style="display: block;text-align: left;background: #F4F5F6;color: #2C2C2C" id="exampleModal5" data-reveal>
								<?php the_field('synopsis'); ?>
								<button class="close-button" data-close aria-label="Close reveal" type="button">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

						</div>

					</div>

			</div> <!-- END cell -->

		</div> <!-- END catalog -->

	</header>