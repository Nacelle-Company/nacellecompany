<?php

/**
 * The template for displaying all category posts
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>
<?php // get_template_part('template-parts/featured-image-catalog');?>


<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (has_post_thumbnail($post->ID)) : ?>

	<header style="background:transparent;" class="catalog featured-hero grid-container fluid">
		<div class="grid-x">
			<div class="cell">

				<div class="grid-container">
					<div class="grid-x align-middle">
						<div class="cell medium-5 grid-offset-5">
							<?php
                                  if (is_single()) {
                                      the_title('<h1 class="entry-title">', '</h1>');
                                  } else {
                                      the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                  }
                              ?>
						</div>



<!-- NO MOBILE
NO MOBILE
NO MOBILE -->


<!-- NO MOBILE
NO MOBILE
NO MOBILE -->



					</div>
				</div>

		  	</div>
		</div>
	</header>

	<!-- VIDEO MODAL -->
	<?php

    $videoEmbedd = get_field('video_embedd');

    if (!empty($videoEmbedd)): ?>
		<div class="reveal" id="videoModal1" data-reveal>

				<div class="embed-container">
					<?php the_field('video_embedd'); ?>
				</div>

		  <button class="close-button" data-close aria-label="Close reveal" type="button">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif ?>

<?php endif; ?> <!-- end of featured header -->


<div class="grid-container">
	<main class="top-meta grid-x grid-margin-x grid-padding-y">




<!-- NO DESKTOP
NO DESKTOP
NO DESKTOP -->
<?php

// $videoEmbedd = get_field('video_embedd');
//
// if (!empty($videoEmbedd)):
    ?>
<!--
		<div class="cell small-12 no-desktop ">
			<div class="play grid-x align-center text-center">
				<a class="bounce" data-open="videoModal1">
					<div class="cell medium-12">
						<i class="far fa-play-circle"></i>
					</div>
					<div class="cell medium-12">
						<p>Watch Trailer</p>
					</div>
				</a>
			</div>
		</div> -->

<?php //endif;?>

<!-- NO DESKTOP
NO DESKTOP
NO DESKTOP -->



		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-7 small-order-2'); ?>>
				<div class="entry-content grid-container">

					<?php 	$synopsis = get_field('synopsis');
                            if ($synopsis):
                                ?>
					<div class="grid-x grid-padding-y synopsis">
						<div class="cell medium-4 title">
							<p>Synopsis</p>
						</div>
						<div class="cell medium-8">
							<?php the_field('synopsis'); ?>
						</div>
			        </div>
					<?php endif; ?>

					<div class="grid-x grid-padding-y">
						<div class="cell medium-4 title">
							<div class="grid-x">
								<p>Credits</p>
							</div>
								<!-- trailer button -->
								<?php

                                $videoEmbedd = get_field('video_embedd');

                                if (!empty($videoEmbedd)): ?>

									<div class="play grid-x align-start">
										<div class="cell">
											<button class="bounce hollow button large success" data-open="videoModal1">
												<i class="far fa-play-circle"></i> Watch Trailer
											</button>
										</div>
									</div>

								<?php endif; ?>
								<!-- trailer button -->
							</div>

							<div class="cell medium-8">
			<!-- main talent -->
								  <?php $terms = get_field('main_talent');
                                  if ($terms): ?>
			  			            <div class="grid-x">
			  			              <div class="cell medium-6 title">
			  			                <p>Talent</p>
			  			              </div>
			  			              <div class="cell medium-6">

			  							  <p>
			  								  <?php $termstr = array();
                                                  foreach ($terms as $term) {
                                                      $termstr[] = $term->name;
                                                  }
                                                  echo implode(", ", $termstr);
                                                  ?>
			  							  </p>
			  			              </div>
			  			            </div>
			  				  <?php endif; ?>
			<!-- directors -->
								<?php $terms = get_field('directors');
                                if ($terms): ?>
						            <div class="grid-x">
						              <div class="cell medium-6 title">
						                <p>Director(s)</p>
						              </div>
						              <div class="cell medium-6">

										  <p>
											  <?php $termstr = array();
                                                foreach ($terms as $term) {
                                                    $termstr[] = $term->name;
                                                }
                                                echo implode(", ", $termstr);
                                                ?>
										  </p>
						              </div>
						            </div>
							  <?php endif; ?>
			<!-- Producers -->
								<?php
                                $terms = get_field('producers');
                                    if ($terms):
                                ?>

								<div class="grid-x">
									<div class="cell medium-6 title">
										<p>Producer(s)</p>
									</div>
									<div class="cell medium-6">
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
						</div>
					</div>
				</div>

				<div class="meta-accordion catalog-bottom-meta grid-container-full">
					<div class="grid-x">

					    <ul class="accordion cell" data-accordion data-allow-all-closed="true">
					        <li class="accordion-item" data-accordion-item>
					            <a href="#" class="accordian-open">
										<div class="grid-x align-middle">
						                    <div class="cell medium-7">
						                    	<div class="grid-x accordion-line"></div>
						                    </div>
						                    <div class="cell medium-5">
						                        <button class="accordion-title clear success">More info <i class="fas fa-caret-down"></i></button>
						                    </div>
						                </div>
					            </a>
					            <div class="accordion-content grid-container-full" data-tab-content >
				                    <div class="grid-container grid-x">
				                        <div class="cell medium-12 tbp-1">
				                            <div class="grid-x">

				                            <div class="cell medium-4">

				                            </div>
				                            <div class="cell medium-8 extra-metadata">

				                  <!-- Writers -->

				                          <?php   $writers = get_field('writers');
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
				                          <?php   endif; ?>

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
												  <?php echo $term->name; ?><br />

				                                  <?php endforeach; ?>
				                                  </div>
				                              </div>
				                              <?php endif; ?>
											  <!-- rating -->
  				                                <?php if (get_field('rt')): ?>
													<div class="grid-x">
														<div class="cell medium-6 title">
															<p class="title">Rating:</p>
														</div>
														<div class="cell medium-6">
															<p><?php the_field('rt')['value'] ?></p>
														</div>
													</div>
  				                                <?php endif ?>
												<!-- copyright -->
  				                                <?php if (get_field('copyright')): ?>
													<div class="grid-x">
														<div class="cell medium-6 title">
															<p class="title">Copyright:</p>
														</div>
														<div class="cell medium-6">
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


<div class="space-please grid-container full">
	<div class="grid-x grid-padding-y grid-margin-y grid-margin-x align-middle">

<!-- mobile post navigation -->
<div class="cell small-12 no-desktop">
	<div class="grid-x align-center-middle">
		<div class="cell small-6 next">
			<?php //the_post_navigation();?>
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
		<div class="cell small-2 prev">
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



	<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>

<?php get_footer();
