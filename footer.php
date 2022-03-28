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
		// hero video jquery call
		jQuery(function() {
		jQuery("#hero_video").YTPlayer();
		});
	</script>
<?php if ( is_singular( 'catalog' ) ) : ?>
	<div id="open-modal" class="modal-window">
		<div>
			<a href="#" title="Close" class="modal-close">Close</a>
			<?php
			/**
			 * Simple modal.
			 *
			 * @link https://codepen.io/timothylong/pen/AJxrPR
			 */
			if ( get_the_content() ) {
				$synopsis = get_the_content();
			} else {
				$synopsis = get_post_meta( $post->ID, 'synopsis', true );
			}
			echo esc_html( $synopsis );
			?>
		</div>
	</div>
	<!-- simple modal END -->
	<?php endif; ?>

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
	<!-- offcanvas -->
	<script>
		/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
		function openNav() {
		document.getElementById("offcanvasFilter").style.width = "250px";
		document.getElementById("pageHeader").style.marginRight = "250px";
		document.getElementById('filterOverlay').style.visibility = "visible";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
		function closeNav() {
			document.getElementById("offcanvasFilter").style.width = "0";
			document.getElementById("pageHeader").style.marginRight = "0";
			document.getElementById('filterOverlay').style.visibility = "hidden";
		}
	</script>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
