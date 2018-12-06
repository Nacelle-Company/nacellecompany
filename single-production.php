<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>
<?php get_template_part('template-parts/featured-image'); ?>

	<div class="grid-y catalog-top-meta-container">

		<main class="grid-x grid-margin-x catalog-top-meta">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content-catalog', ''); ?>
			<?php endwhile; ?>
		</main>

		<div class="grid-x catalog-bottom-meta">
			<div class="cell">
					<ul class="accordion" data-accordion data-allow-all-closed="true">
					  <li class="accordion-item" data-accordion-item>
						  <a href="#" class="accordian-open">
							  <div class="grid-x grid-margin-x">

						  		<div class="cell medium-5 accordion-line">
						  		</div>
								<div class="cell medium-7">
								  <p class="accordion-title">See all credits<span class="accordian-+">+</span></p>
								</div>
						  	</div>
						  </a>
						<div class="accordion-content grid-x grid-padding-x grid-padding-y" data-tab-content >
							<div class="cell medium-7">
								<div class="grid-x">

									<div class="cell medium-4">
										<?php if (get_field('rt')): ?>
												<p class="title">Rating:</p>
												<p>
													<?php the_field('rt')['value'] ?>
												</p>

								  		<?php endif ?>
										<?php if (get_field('copyright')): ?>
												<p class="title">Copyright:</p>
												<p>
													<?php the_field('copyright')['value'] ?>
												</p>

										<?php endif ?>
									</div>

							  <div class="cell medium-8 extra-metadata">

<!-- Writers -->

								<?php $writers = get_field('writers');
                                    if ($writers): ?>
									<div class="grid-x">
										<div class="cell medium-6 title">
											<p>Writer(s):</p>
										</div>
										<div class="cell medium-6">
											<p>
				  							  <?php $writerstr = array();
                                                  foreach ($writers as $writer) {
                                                      $writerstr[] = $writer->name;
                                                  }
                                                  echo implode(", ", $writerstr);
                                                  ?>
				  						  </p>
										</div>
									</div>
								<?php endif; ?>

<!-- Runtime -->
								<?php $runtime = get_field('runtime');
                                    if ($runtime): ?>
									<div class="grid-x">
										<div class="cell medium-6 title">
											<p>Runtime:</p>
										</div>
										<div class="cell medium-6">
											<p><?php echo $runtime; ?></p>
										</div>
									</div>
								<?php endif ?>
<!-- Premiere -->
								<?php $premiereDate = get_field('premiere_date');
                                    if ($premiereDate): ?>
									<div class="grid-x">
										<div class="cell medium-6 title">
											<p>Premiere Date:</p>
										</div>
										<div class="cell medium-6">
											<p><?php echo $premiereDate; ?></p>
										</div>
									</div>
								<?php endif ?>
								<!-- Genre -->
								<?php

                                $terms = get_field('genre');

                                if ($terms): ?>
								<div class="grid-x">
									<div class="cell medium-6 title">
										<p>Genre(s):</p>
									</div>
									<div class="cell medium-6">
									<?php $termstr = array();
                                    foreach ($terms as $term): ?>

										<a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a><br />

									<?php endforeach; ?>
									</div>
								</div>
								<?php endif; ?>

							  </div>
							</div>

							</div>
						</div>
					  </li>
					</ul>
			</div>
      	</div>

	</div>

	<div class="grid-container">
		<div class="grid-x grid-padding-y grid-margin-x">
			<div class="medium-12 cell">
				<div class="grid-x grid-padding-y grid-margin-x">
					<div class="medium-12 cell">
						<h3>More content coming soon. . .</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- closing div for featured-image.php topmost "grid-container"

	<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>

<?php get_footer();
