<?php
/**
 * Template part for displaying a catalog item.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-card-catalog' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
<?php
	get_template_part( 'template-parts/modules/card', get_post_type() );
?>
</article>
