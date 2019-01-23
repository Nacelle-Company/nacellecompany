<?php

/**
 * The template for displaying all category posts
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>

<!-- START featured header -->
<?php if (has_post_thumbnail($post->ID)) : ?>

	<header style="background:transparent;" class="catalog featured-hero grid-container fluid">

		<div class="grid-x catalog grid-padding-y">

			<div class="cell">

				<div class="grid-container px-0 px-medium-3">

					<div class="grid-x align-middle">

						<div class="cell medium-12 large-5 grid-offset-5">

							<?php
                                  if (is_single()) {
                                      the_title('<h1 class="entry-title">', '</h1>');
                                  } else {
                                      the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                  }
                              ?>

						</div>

					</div>

					<!-- modal button -->
					<?php
                    $videoEmbedd = get_field('video_embedd');

                    if (!empty($videoEmbedd)): ?>

					<div class="grid-x align-middle">

						<div class="cell medium-5 grid-offset-5">

							<div class="play grid-x align-start">

								<div class="cell">

									<button class="bounce hollow button success" data-open="videoModal1">

										<i class="far fa-play-circle"></i>Watch Trailer

									</button>

								</div>

							</div>

						</div>

					</div>

					<?php endif; ?>
					<!-- END modal button -->

				</div> <!-- END grid-container -->

		  	</div> <!-- END cell -->

		</div> <!-- END catalog -->

	</header>

	<!-- modal -->
	<?php

    $videoEmbeddPlease = get_field('video_embedd');

    if (!empty($videoEmbeddPlease)): ?>

		<div class="reveal single-cat" id="videoModal1" data-reveal data-reset-on-close="true">

			<div class="embed-container">

				<?php echo $videoEmbeddPlease ?> 

			</div>

			<!-- close modal X -->
			<button class="close-button" data-close aria-label="Close reveal" type="button">

				<span aria-hidden="true">&times;</span>

			</button>

		</div>

	<?php endif ?>
	<!-- Watch Trailer MODAL END-->

<?php endif; ?> <!-- END featured header -->


<div class="grid-container">

	<main class="top-meta grid-x grid-padding-y">

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-7 small-order-2'); ?>>

				<div class="entry-content grid-container px-0 px-medium-3">

					<!-- START synopsis -->
					<?php $synopsis = get_field('synopsis'); if ($synopsis): ?>

						<div class="grid-x grid-padding-y synopsis">

							<!-- synopsis title -->
							<div class="cell medium-4 title">

								<p><?php _e('Synopsis', 'comedy-dynamics'); ?></p>

							</div>

							<!-- synopsis -->
							<div class="cell medium-8">

								<?php the_field('synopsis'); ?>

							</div>

						</div>

					<?php endif; ?> <!-- END synopsis -->

					<!-- START credits -->
					<div class="grid-x grid-padding-y">

						<div class="cell medium-4 title">

							<div class="grid-x">

								<p><?php _e('Credits', 'comedy-dynamics'); ?></p>

							</div>

						</div>

						<!-- START the crew -->
						<div class="cell medium-8">

<!-- TALENT -->
							<?php $talents = get_field('talent'); if ($talents): ?>

								<div class="grid-x">

									<!-- talent title -->
									<div class="cell small-4 title">

										<p><?php _e('Talent', 'comedy-dynamics'); ?></p>

									</div>

									<!-- talent list -->
									<div class="cell small-8">

										<p>
											<?php

                                            $terms = get_field('talent');

                                            $termstr = array();

                                            foreach ($terms as $term) {
                                                $termstr[] = $term->name;
                                            }

                                            echo implode(", ", $termstr);

                                            ?>
										</p>

									</div>

								</div>

							<?php endif; ?>

<!-- end TALENT -->
<!-- DIRECTORS -->

							<?php $directors = get_field('directors'); if ($directors): ?>

								<div class="grid-x">

									<!-- directors title -->
									<div class="cell small-4 title">

										<p><?php _e('Director(s)', 'comedy-dynamics'); ?></p>

									</div>

									<div class="cell small-8">

										<p>
											<?php

                                            $directorsstr = array();

                                            foreach ($directors as $director) {
                                                $directorsstr[] = $director->name;
                                            }
                                            echo implode(", ", $directorsstr);

                                            ?>
										</p>

									</div>

								</div>

						<?php endif; ?>
						<!-- end DIRECTORS -->

						<!-- PRODUCERS -->
						<?php $terms = get_field('producers'); if ($terms): ?>

							<div class="grid-x">

								<div class="cell small-4 title">

									<p><?php _e('Producer(s)', 'comedy-dynamics'); ?></p>

								</div>

								<div class="cell small-8">

									<p>
										<?php

                                        $termstr = array();

                                        foreach ($terms as $term) {
                                            $termstr[] = $term->name;
                                        }
                                        echo implode(", ", $termstr);

                                        ?>

									</p>

								</div>

							</div>
							<?php endif; ?>
							<!-- end PRODUCERS -->

					</div> <!-- end CREW -->

				</div>

			</div>

				<div class="meta-accordion catalog-bottom-meta grid-container-full pl-medium-3">
					<div class="grid-x">

					    <ul class="accordion cell" data-accordion data-allow-all-closed="true">
					        <li class="accordion-item" data-accordion-item>
					            <a href="#" class="accordian-open">
										<div class="grid-x align-middle mx-0">
						                    <div class="cell medium-7">
						                    	<div class="grid-x accordion-line"></div>
						                    </div>
						                    <div class="cell medium-5">
						                        <button class="accordion-title clear success">More info <i class="fas fa-caret-down"></i></button>
						                    </div>
						                </div>
					            </a>
					            <div class="accordion-content grid-container-full" data-tab-content >
				                    <div class="grid-container grid-x pl-medium-0">
										<div class="cell medium-4">

										</div>
				                        <div class="cell medium-8 tbp-1">
				                            <div class="grid-x">

				                            <div class="cell medium-12 extra-metadata">

				                  				<!-- Writers -->

												<?php $writers = get_field('writers');
                                                if ($writers): ?>
												<div class="grid-x">
													<div class="cell small-4 title">
				                                          <p>Writer(s):</p>
				                                      </div>
				                                      <div class="cell small-8">
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
													<div class="cell small-4 title">
														<p>Runtime:</p>
													</div>
													<div class="cell small-8">
				                                          <p><?php echo $runtime; ?></p>
				                                      </div>
				                                  </div>
				                              <?php endif ?>

				                  <!-- Premiere -->
				                              <?php
                                              // get raw date
                                              $date = get_field('release_date', false, false);

                                              // make date object
                                              $date = new DateTime($date);

                                              ?>
											  <div class="grid-x">
												  <div class="cell small-4 title">
													  <p>Premiere:</p>
												  </div>
												  <div class="cell small-8">
													  <p><?php echo $date->format('m/d/Y'); ?></p>
												  </div>
											  </div>

				                              <!-- Genre -->
											  <?php $terms = get_the_terms($post->ID, 'genre');

                                              if ($terms): ?>
				                              <div class="grid-x">
				                                  <div class="cell small-4 title">
				                                      <p>Genre(s):</p>
				                                  </div>
				                                  <div class="cell small-8">

													  <?php $terms = get_the_terms($post->ID, 'genre');
                                                      $i = 1;

                                                        foreach ($terms as $term) {
                                                            $term_link = get_term_link($term, 'genre');
                                                            if (is_wp_error($term_link)) {
                                                                continue;
                                                            }
                                                            echo $term->name;

                                                            echo ($i < count($terms))? ", " : "";
                                                            // Increment counter
                                                            $i++;
                                                        }
                                                    ?>


				                                  </div>
				                              </div>
										  <?php endif; ?>
											  <!-- rating -->
  				                                <?php if (get_field('rating')): ?>
													<div class="grid-x">
														<div class="cell small-4 title">
															<p class="title">Rating:</p>
														</div>
														<div class="cell small-8">
															<p><?php the_field('rating')['value'] ?></p>
														</div>
													</div>
  				                                <?php endif ?>
												<!-- copyright -->
  				                                <?php if (get_field('copyright')): ?>
													<div class="grid-x">
														<div class="cell small-4 title">
															<p class="title">Copyright:</p>
														</div>
														<div class="cell small-8">
															<p><?php the_field('copyright')['value'] ?></p>
														</div>
													</div>
  				                                <?php endif ?>

				                          </div> <!-- end of 8cells -->
				                      </div>
				                      </div><!-- end of 7cells container -->

				                    </div>
					            </div>
					        </li>
						</ul>
				    </div>

				</div>
			</article>
			<?php get_template_part('template-parts/content-catalog-aside', ''); ?>

		<?php endwhile; ?>
	</main>
</div> <!-- closing div for featured-image.php topmost "grid-container" -->

<?php if (have_rows('embedded_content')): ?>

	<?php while (have_rows('embedded_content')): the_row();

        // vars
        $embed = get_sub_field('embed');
        $text = get_sub_field('embedded_text');
        $side = get_sub_field('embedded_side');

        ?>
		<div class="grid-container">
			<div class="grid-x align-center-middle grid-margin-x">
				<div class="cell medium-8">
					<?php if ($embed): ?>
						<?php echo $embed; ?>
					<?php endif; ?>
				</div>
				<div class="cell medium-4">
					<?php echo $text; ?>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

<?php endif; ?>

<!-- mobile post navigation -->
<div class="cell small-12 no-desktop">
	<div class="grid-x align-center-middle">
		<div class="cell small-3 next small-order-2 small-offset-3">
			<?php

            ?>
			<?php
            if (get_adjacent_post(false, '', false)) {
                next_post_link('%link', 'Next');
            } else {
                $loop = wp_get_recent_posts('order=ASC&post_type=catalog&post_status=publish', ARRAY_A);
                $last_post_int = count($loop) - 1;
                $firstPostName = $loop[$last_post_int]['post_name'];
                echo '<a href="http://localhost:3000/comedydynamics/catalog/' . $firstPostName . '">Next</a>';
            };
            ?>
		</div>
		<div class="cell small-3 prev small-order-1 small-offset-2">
			<?php
            if (get_adjacent_post(false, '', true)) {
                previous_post_link('%link', 'Prev');
            } else {
                $first = new WP_Query('posts_per_page=1&order=DESC&post_type=catalog');
                $first->the_post();
                echo '<a href="' . get_permalink() . '">Prev</a>';
                wp_reset_query();
            };
            ?>
		</div>
	</div>
	<!-- mobile post navigation -->

			<?php if (have_rows('embedded_content')): ?>

				<?php while (have_rows('embedded_content')): the_row();

                    // vars
                    $embedd = get_sub_field('embedded_link');
                    $embeddText = get_sub_field('embedded_text');
                    $embeddSide = get_sub_field('embedded_side');

                    ?>
					<?php if (get_sub_field('embedded_side')): ?>

						<?php 	$sourceOrder = 'medium-order-2';
                                $textRight = 'text-right'; ?>

					<?php endif; ?>

							<div class="cell medium-6 <?php echo $sourceOrder; ?>">
								<div class="embed-container">

								<?php if ($embedd): ?>
									<?php echo $embedd; ?>
								<?php endif; ?>

								</div>
							</div>

							<div class="cell medium-6 align-center <?php echo $textRight; ?>">

								<?php if ($embeddText): ?>
									<?php echo $embeddText; ?>
								<?php endif; ?>

							</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>



	<?php // edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>');?>

<?php get_footer();
