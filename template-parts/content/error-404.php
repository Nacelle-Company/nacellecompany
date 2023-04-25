<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-page' );
?>
<section class="error site-main__content-width-lg">

	<?php get_template_part( 'template-parts/header/page-header' ); ?>

	<?php get_template_part('template-parts/content/error', 'content'); ?>
</section>
