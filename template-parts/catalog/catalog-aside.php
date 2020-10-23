<?php

/**
 * The featured image aside content
 *
 * Used on content-catalog.php
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<?php

// video links
$imdbV = get_field('imdb_video');
$youTubeV = get_field('youtube_video');
$itunesV = get_field('itunes_video');
$googlePlayV = get_field('google_play_video');
$amazonV = get_field('amazon_video');
$steamV = get_field('steam_video');
$microsoftV = get_field('microsoft_video');
$vuduV = get_field('vudu_video');
$vimeoV = get_field('vimeo_video');
$netflixV = get_field('netflix_video');
$animalNationV = get_field('animal_nation_video');
$breakerV = get_field('breaker_video_link');
$huluV = get_field('hulu_video');
$epixV = get_field('epix_video');
$comcastV = get_field('comcast');
$redboxV = get_field('redbox');
$walmartV = get_field('walmart');
$targetV = get_field('target');
$fandangoV = get_field('fandango');
$hooplaV = get_field('hoopla_video');
$mtv2V = get_field('mtv2_video');
$tubiV = get_field('tubi_video');
$customV = get_field('custom_video');
$customVtitle = get_field('custom_video_title');
// audio links
$itunesA = get_field('itunes_audio');
$googlePlayA = get_field('google_play_audio');
$youTubeA = get_field('you_tube_audio');
$amazonA = get_field('amazon_audio');
$spotifyA = get_field('spotify_audio');
$pandoraA = get_field('pandora_audio');
$walmartA = get_field('walmart_audio');
$targetA = get_field('target_audio');
$fandangoA = get_field('fandango_audio');
$customA = get_field('custom_audio');
$customAtitle = get_field('custom_audio_title');

?>
<aside class="catalog-aside feat">

	<div class="grid-x">

		<div class="cell medium-10 artwork-container">

			<?php if ($itunesV) : ?>
				<a href="<?php echo $itunesV; ?>" target="_blank">

					<?php the_post_thumbnail('large', $attr); ?>

				</a>
			<?php else : ?>

				<?php if (has_post_thumbnail()) {
					the_post_thumbnail('large', $attr);
				} else {
				?>
					<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/default-image.png" alt="<?php the_title(); ?>" />
				<?php
				} ?>

			<?php endif; ?>

			<?php if (get_field('show_icons')) { ?>

				<div class="grid-x link-icons-container text-center">

					<div class="cell medium-11 link-icons">

						<article class="accordion hover cell link-icons-toggle" data-accordion data-allow-all-closed="true">
							<section class="accordion-item" data-accordion-item>
								<a href="#" class="accordion-open">
									<div class="grid-x align-middle mx-0">
										<div class="cell medium-6">
											<button class="accordion-title clear primary-color"><b>VIDEO</b>
												<?php get_template_part('template-parts/svg/icon-down-angle', ''); ?>

											</button>
										</div>
									</div>
								</a>

								<div class="accordion-content grid-container-full" data-tab-content>
									<ul class="grid-container grid-x pl-medium-0">

										<?php if ($imdbV) : ?>
											<li>
												<a href="<?php echo $imdbV; ?>" target="_blank" rel="noreferrer">
													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/imdb.svg" /> -->
													<strong><?php _e("IMDB", 'Nacelle'); ?></strong>
												</a>
											</li>
										<?php endif; ?>

										<?php if ($youTubeV) : ?>
											<li><a href="<?php echo $youTubeV; ?>" target="_blank">
													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/youtube.svg" /> -->
													<strong><?php _e("YouTube", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($itunesV) : ?>
											<li><a href="<?php echo $itunesV; ?>" target="_blank">
													<strong><?php _e("Apple TV", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($googlePlayV) : ?>
											<li><a href="<?php echo $googlePlayV; ?>" target="_blank">
													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/google_play.svg" /> -->
													<strong><?php _e("Google Play", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($amazonV) : ?>
											<!-- amazon video -->
											<li><a href="<?php echo $amazonV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/amazon-video.svg" /> -->
													<strong><?php _e("Amazon", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($steamV) : ?>
											<!-- steam video -->
											<li><a href="<?php echo $steamV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/steam.svg" /> -->
													<strong><?php _e("Steam", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($microsoftV) : ?>
											<!-- microsoft video -->
											<li><a href="<?php echo $microsoftV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/microsoft.svg" /> -->
													<strong><?php _e("Microsoft", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($vuduV) : ?>
											<!-- vudu video -->
											<li><a href="<?php echo $vuduV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/vudu.svg" /> -->
													<strong><?php _e("Vudu", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($vimeoV) : ?>
											<!-- vimeo video -->
											<li><a href="<?php echo $vimeoV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/vimeo.svg" /> -->
													<strong><?php _e("Vimeo", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($netflixV) : ?>
											<!-- netflix video -->
											<li><a href="<?php echo $netflixV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/netflix.svg" /> -->
													<strong><?php _e("Netflix", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($animalNationV) : ?>
											<!-- animal nation video -->
											<li><a href="<?php echo $animalNationV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/animal-nation.svg" /> -->
													<strong><?php _e("Animal Nation", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($breakerV) : ?>
											<!-- animal nation video -->
											<li><a href="<?php echo $breakerV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/breaker-logo.svg" /> -->
													<strong><?php _e("Breaker", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($huluV) : ?>
											<!-- hulu video -->
											<li><a href="<?php echo $huluV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/hulu.svg" /> -->
													<strong><?php _e("HULU", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($epixV) : ?>
											<!-- epix video -->
											<li><a href="<?php echo $epixV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/epix.svg" /> -->
													<strong><?php _e("EPIX", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($comcastV) : ?>
											<!-- comcast video -->
											<li><a href="<?php echo $comcastV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/comcast-infinity.svg" /> -->
													<strong><?php _e("Comcast", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($redboxV) : ?>
											<!-- redbox video -->
											<li><a href="<?php echo $redboxV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/redbox-icon.svg" /> -->
													<strong><?php _e("Redbox", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($walmartV) : ?>
											<!-- redbox video -->
											<li><a href="<?php echo $walmartV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/redbox-icon.svg" /> -->
													<strong><?php _e("Walmart", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($targetV) : ?>
											<!-- redbox video -->
											<li><a href="<?php echo $targetV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/redbox-icon.svg" /> -->
													<strong><?php _e("Target", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($fandangoV) : ?>
											<li><a href="<?php echo $fandangoV; ?>" target="_blank">
													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/redbox-icon.svg" /> -->
													<strong><?php _e("Fandango", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($hooplaV) : ?>
											<li><a href="<?php echo $hooplaV; ?>" target="_blank">
													<strong><?php _e("Hoopla", 'Nacelle'); ?></strong>
												</a></li>
										<?php endif; ?>

										<?php if ($mtv2V) : ?>
											<!-- mtv2 video -->
											<li><a href="<?php echo $mtv2V; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/mtv2.svg" /> -->
													<strong><?php _e("MTV2", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($tubiV) : ?>
											<!-- mtv2 video -->
											<li><a href="<?php echo $tubiV; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/mtv2.svg" /> -->
													<strong><?php _e("Tubi", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<!-- END Video Icons -->

										<!-- custom VIDEO link -->
										<?php
										// Check rows exists.
										if (have_rows('new_link')) :

											// Loop through rows.
											while (have_rows('new_link')) : the_row();

												// Load sub field value.
												$linkTitle = get_sub_field('link_title');
												$linkURL = get_sub_field('link_url');
												$yesImage = get_field('show_large');
										?>
												<?php if (!empty($yesImage)) : ?>
													<li>
														<a href="<?php echo $linkURL; ?>" target="_blank">
															<strong>
																<?php echo $linkTitle; ?>
															</strong>
														</a>
													</li>
										<?php endif;
											// End loop.
											endwhile;
										// No value.
										else :
										// Do something...
										endif;
										?>
										<!-- END custom VIDEO link -->
									</ul>
								</div>
							</section>

							<!-- audio dropdown -->
							<!-- <article class="accordion cell link-icons-toggle" data-accordion data-allow-all-closed="true"> -->
							<section class="accordion-item" data-accordion-item>

								<a href="#" class="accordion-open">
									<div class="grid-x align-middle mx-0">
										<div class="cell medium-6">
											<button class="accordion-title clear primary-color"><b>AUDIO</b>

												<?php get_template_part('template-parts/svg/icon-down-angle', ''); ?>

											</button>
										</div>
									</div>
								</a>

								<div class="accordion-content grid-container-full" data-tab-content>
									<ul class="grid-container grid-x pl-medium-0">

										<?php if ($itunesA) : ?>
											<!-- itunes audio -->
											<li><a href="<?php echo $itunesA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/itunes.svg" /> -->
													<strong>
														<?php _e("iTunes", 'Nacelle'); ?>
													</strong>
												</a></li>

										<?php endif; ?>

										<?php if ($googlePlayA) : ?>
											<!-- google play audio -->
											<li><a href="<?php echo $googlePlayA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/google_play.svg" /> -->
													<strong><?php _e("Google Play", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($youTubeA) : ?>
											<!-- google play audio -->
											<li><a href="<?php echo $youTubeA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/google_play.svg" /> -->
													<strong><?php _e("YouTube Music", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($amazonA) : ?>
											<!-- amazon audio -->
											<li><a href="<?php echo $amazonA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/amazon-music.svg" /> -->
													<strong><?php _e("Amazon", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($spotifyA) : ?>
											<!-- spotify audio -->
											<li><a href="<?php echo $spotifyA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/spotify.svg" /> -->
													<strong><?php _e("Spotify", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($pandoraA) : ?>
											<!-- pandora audio -->
											<li><a href="<?php echo $pandoraA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/pandora.svg" /> -->
													<strong><?php _e("Pandora", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($walmartA) : ?>
											<!-- pandora audio -->
											<li><a href="<?php echo $walmartA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/walmart.svg" /> -->
													<strong><?php _e("Walmart", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($targetA) : ?>
											<!-- pandora audio -->
											<li><a href="<?php echo $targetA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/target.svg" /> -->
													<strong><?php _e("Target", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<?php if ($fandangoA) : ?>
											<!-- pandora audio -->
											<li><a href="<?php echo $fandangoA; ?>" target="_blank">

													<!-- <img src="<?php //  bloginfo('template_directory'); 
																	?>/dist/assets/images/fandango-now.svg" /> -->
													<strong><?php _e("Fandango", 'Nacelle'); ?></strong>
												</a></li>

										<?php endif; ?>

										<!-- custom VIDEO link -->
										<?php
										// Check rows exists.
										if (have_rows('new_audio_link')) :

											// Loop through rows.
											while (have_rows('new_audio_link')) : the_row();

												// Load sub field value.
												$audioLinkTitle = get_sub_field('audio_link_title');
												$audioLinkURL = get_sub_field('audio_link_url');
										?>
												<li>
													<a href="<?php echo $audioLinkURL; ?>" target="_blank">
														<strong>
															<?php echo $audioLinkTitle; ?>
														</strong>
													</a>
												</li>
										<?php
											// End loop.
											endwhile;

										// No value.
										else :
										// Do something...
										endif;
										?>
										<!-- END custom VIDEO link -->
									</ul>
								</div>
							</section>
						</article>

					</div>

				</div>

			<?php } ?>

		</div> <!-- END artwork-container -->

		<div class="cell medium-2 no-mobile">

			<div class="grid-x">

				<div class="cell pagination grid-padding-y">

					<?php get_template_part('template-parts/catalog/catalog-pagination'); ?>

				</div>

			</div>

		</div> <!-- END  no-mobile -->

	</div> <!-- END grid-x -->

</aside>