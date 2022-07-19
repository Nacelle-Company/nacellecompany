<?php
/**
 * Template part for displaying a catalog post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-hero-video' );

?>
<header class="entry-header__video-container">
	<?php get_template_part( 'template-parts/hero/hero_video', get_post_type() ); ?>
</header>
