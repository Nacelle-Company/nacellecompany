<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<footer id="colophon" class="site-footer">
	<script>
		// YTPlayer hero video jquery call
		jQuery(function() {
			jQuery("#hero_video").YTPlayer();
			jQuery("#hero_video__desktop").YTPlayer();
		});
	</script>
	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
</footer><!-- #colophon -->
</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>
