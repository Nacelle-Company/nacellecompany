<?php
/*
Template Name: Front
*/
get_header();

?>

<?php do_action('Nacelle_before_content'); ?>

<?php
$image = get_field('gif');
$seconds = get_field('seconds');
$secondsHide = $seconds + 1;
$video_mp4 =  get_field('splash'); 
$count = 0;
?>

<?php if ($image) : ?>

	<div class="splash fade-in">
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	</div>

<?php elseif ($video_mp4) : ?>

<div class="splash fade-in">
	<?php

		// https://speckyboy.com/html5-video-wordpress-custom-fields/
		// Get the Video Fields

		// Build the  Shortcode
		$attr =  array(
			'mp4'      => $video_mp4,
			'preload'  => 'auto',
			'autoplay' => 'on'
		);

		// Display the Shortcode
		echo wp_video_shortcode($attr);


		?>
	<?php else : ?>
	<?php endif; ?>

	<script>
		// let splash = document.querySelector(".splash");
		// window.addEventListener("load", function() {
		// 	setTimeout(function() {
		// 		splash.classList.add("slideLeft");

		// 	}, <?php //echo $seconds; ?>000);

		// });

		// window.addEventListener("load", function() {
		// 	setTimeout(function() {
		// 		splash.classList.add("hidden");

		// 	}, <?php //echo $secondsHide; ?>000);

		// });
	</script>
</div>
<div class="grid-x">
	<div class="cell">

		<?php while (have_posts('')) : the_post(); ?>
		<?php get_template_part('template-parts/clean-hero-slider'); ?>

		<div class="circle-slider orbit" role="region" aria-label="Nacelle News Slider" data-orbit data-auto-play="false" data-use-m-u-i="false">

			<ul class="orbit-container" id="circle-posts">

				<div class="grid-x background-slide-container orbit-group">
					<div class="small-12 medium-4 large-4 press-title-background columns">
						<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/news-slider-title-bkgnd.png" alt="press title background" />

					</div>
				</div>

				<?php get_template_part('template-parts/circle-slider'); ?>

			</ul>

		</div>
		<?php endwhile; ?>
		<!-- END LOOP -->

		<?php get_template_part('template-parts/front-partners'); ?>

	</div>
</div>

<?php get_footer(); ?>