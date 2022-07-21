<?php
/**
 * Template part for displaying a catalog item.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-card-catalog' );

// function postpone_plugin_scripts() {
	postpone_script( 'YTPlayer' );
// }
// add_action( 'wp_print_scripts', 'postpone_plugin_scripts' );
?>
<article id="post-<?php the_ID(); ?>">
<?php
	get_template_part( 'template-parts/modules/card', get_post_type() );
?>
</article>
