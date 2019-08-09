<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php woocommerce_content(); ?>
		</main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
