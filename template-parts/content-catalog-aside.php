<?php
/**
 * The featured image aside content
 *
 * Used on content-catalog.php
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>

<aside class="cell medium-5 feat medium-order-2">

	<div class="grid-x">

		<div class="cell medium-10 artwork-container pr-medium-2 pt-medium-3">

			<?php the_post_thumbnail('full'); ?>

			<div class="grid-x link-icons-container text-center">

				<div class="cell medium-11 link-icons">

					<?php

                    $imdb = get_field('imdb_video');
                    $youTube = get_field('youtube_video');
                    $itunesV = get_field('itunes_video');
                    $googlePlayV = get_field('google_play_video');
                    $amazonV = get_field('amazon_video');
                    $steamV = get_field('steam_video');
                    $microsoftV = get_field('microsoft_video');
                    $vuduV = get_field('vudu_video');
                    $vimeoV = get_field('vimeo_video');
                    $netflixV = get_field('netflix_video');
                    $animalNationV = get_field('animal_nation_video');
                    $epixV = get_field('epix_video');
                    $mtv2V = get_field('mtv2_video');
                    $itunesA = get_field('itunes_audio');
                    $googlePlayA = get_field('google_play_audio');
                    $amazonA = get_field('amazon_audio');
                    $spotifyA = get_field('spotify_audio');
                    $pandoraA = get_field('pandora_audio');
                    $huluV = get_field('hulu_video');
                    ?>


					<?php if ($imdb) : ?>
					<!-- imdb video -->
						<a href="<?php echo $imdb; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/imdb.svg" />

						</a>

					<?php endif; ?>


					<?php if ($youTube) : ?>
					<!-- youtube video -->
						<a href="<?php echo $youTube; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/youtube.svg" />

						</a>

					<?php endif; ?>

					<?php if ($itunesV) : ?>
					<!-- itunes video -->

						<a href="<?php echo $itunesV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/itunes-video.svg" />

						</a>

					<?php endif; ?>

					<?php if ($googlePlayV) : ?>
					<!-- google play video -->
						<a href="<?php echo $googlePlayV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/google_play.svg" />

						</a>

					<?php endif; ?>

					<?php if ($amazonV) : ?>
					<!-- amazon video -->
						<a href="<?php echo $amazonV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/amazon-video.svg" />

						</a>

					<?php endif; ?>

					<?php if ($steamV) : ?>
					<!-- steam video -->
						<a href="<?php echo $steamV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/steam.svg" />

						</a>

					<?php endif; ?>

					<?php if ($microsoftV) : ?>
					<!-- microsoft video -->
						<a href="<?php echo $microsoftV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/microsoft.svg" />

						</a>
					<?php endif; ?>

					<?php if ($vuduV) : ?>
					<!-- vudu video -->
						<a href="<?php echo $vuduV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/vudu.svg" />

						</a>
					<?php endif; ?>

					<?php if ($vimeoV) : ?>
					<!-- vimeo video -->
						<a href="<?php echo $vimeoV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/vimeo.svg" />

						</a>

					<?php endif; ?>

					<?php if ($netflixV) : ?>
					<!-- netflix video -->
						<a href="<?php echo $netflixV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/netflix.svg" />

						</a>

					<?php endif; ?>

					<?php if ($animalNationV) : ?>
					<!-- animal nation video -->
						<a href="<?php echo $animalNationV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/animal-nation.svg" />

						</a>

					<?php endif; ?>

					<?php if ($huluV) : ?>
					<!-- hulu video -->
						<a href="<?php echo $huluV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/hulu.svg" />

						</a>

					<?php endif; ?>

					<?php if ($epixV) : ?>
					<!-- epix video -->
						<a href="<?php echo $epixV; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/epix.svg" />

						</a>

					<?php endif; ?>

					<?php if ($mtv2V) : ?>
					<!-- mtv2 video -->
						<a href="<?php echo $mtv2V; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/mtv2.svg" />

						</a>

					<?php endif; ?>

					<?php if ($itunesA) : ?>
					<!-- itunes audio -->
						<a href="<?php echo $itunesA; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/itunes.svg" />

						</a>

					<?php endif; ?>

					<?php if ($googlePlayA) : ?>
					<!-- google play audio -->
						<a href="<?php echo $googlePlayA; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/google_play.svg" />

						</a>

					<?php endif; ?>

					<?php if ($amazonA) : ?>
					<!-- amazon audio -->
						<a href="<?php echo $amazonA; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/amazon-music.svg" />

						</a>

					<?php endif; ?>

					<?php if ($spotifyA) : ?>
					<!-- spotify audio -->
						<a href="<?php echo $spotifyA; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/spotify.svg" />

						</a>

					<?php endif; ?>

					<?php if ($pandoraA) : ?>
					<!-- pandora audio -->
						<a href="<?php echo $pandoraA; ?>" target="_blank">

							<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/pandora.svg" />

						</a>

					<?php endif; ?>

				</div>

			</div>

		</div> <!-- END artwork-container -->

		<div class="cell medium-2 no-mobile">

			<div class="grid-x grid-padding-y">

				<div class="cell next">

					<?php //the_post_navigation();?>

					<?php


                    if (get_adjacent_post(true, '', false)) {
                        next_post_link('%link &raquo;', 'Next', true, '774');
                    } else {
                        // $loop = wp_get_recent_posts('order=ASC&post_type=catalog&post_status=publish', ARRAY_A);
                        // $last_post_int = count($loop) - 1;
                        // $firstPostName = $loop[$last_post_int]['post_name'];
                        // echo '<a href="http://localhost:3000/comedydynamics/catalog/' . $firstPostName . '">Next</a>';
                    };


                    ?>


				</div>
				<div class="cell prev">
					<?php
                    if (get_adjacent_post(true, '', true)) {
                        previous_post_link('%link', 'Prev');
                    } else {
                        $first = new WP_Query('posts_per_page=1&order=DESC&post_type=catalog');
                        $first->the_post();
                        echo '<a href="' . get_permalink() . '">Prev</a>';
                        wp_reset_query();
                    };

                    ?>

					<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/arrow-prev.svg" />

				</div>

			</div>

		</div> <!-- END  no-mobile -->

	</div> <!-- END grid-x -->

</aside>
