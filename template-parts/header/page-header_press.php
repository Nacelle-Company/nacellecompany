<?php
/**
 * Template part for displaying the page header for the
 * press archive
 * press single pages
 * press filter & search pages
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<header class="page-header">
	<div class="page-title__wrap">
		<?php if (is_single()) : ?>
			<a href="/press">
				<h1 class="page-title page-title__press-single">
					<?php echo esc_html('Latest News'); ?>
				</h1>
			</a>
		<?php else : ?>
			<h1 class="page-title page-title__press-archive">
				<?php echo esc_html('Latest News'); ?>
			</h1>
		<?php endif; ?>
	</div>
</header>
