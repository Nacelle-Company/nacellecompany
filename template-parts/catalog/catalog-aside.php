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
				<a href="<?php echo $itunesV; ?>" target="_blank" rel="noreferrer">

					<?php the_post_thumbnail('large'); ?>

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

		</div> <?php // END artwork-container 
				?>

		<div class="cell medium-2 no-mobile">

			<div class="grid-x">

				<div class="cell pagination grid-padding-y">

					<?php get_template_part('template-parts/catalog/catalog-pagination'); ?>

				</div>

			</div>

		</div> <?php // END  no-mobile 
				?>

	</div> <?php // END grid-x 
			?>

</aside>