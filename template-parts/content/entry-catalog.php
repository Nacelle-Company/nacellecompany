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

<?php
// if ( is_singular( get_post_type() ) ) {
// if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
// the_post_navigation(
// array(
// 'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous:', 'wp-rig' ) . '</span></div>%title',
// 'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next:', 'wp-rig' ) . '</span></div>%title',
// )
// );
// }

// if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
// comments_template();
// }
// }
