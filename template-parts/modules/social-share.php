<?php
/**
 * Template part for social sharing icons.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-social-share' );

$html        = '';
$url_full    = get_permalink( $post->ID );
$url         = esc_url( $url_full );
$queried_id  = get_queried_object();
$obj_slug    = $queried_id->post_type;
$hashes      = true;
$posts_class = '';
if ( 'catalog' === $obj_slug ) {
	$hashes = false;
} else {
	$posts_class = ' ss-posts';
}
?>
<div class="social-share<?php echo esc_html( $posts_class ); ?>">
	<h3 class='share-on'>
	<?php
	if ( $hashes ) :
		?>
		<span class="has-theme-secondary-color">###</span><br>
	<?php endif; ?>Share <?php the_title( '<span class="hidden">', '</span>' ); ?></h3>
	<a href="http://www.facebook.com/sharer.php?u=<?php echo wp_kses( $url, 'post' ); ?>" rel="noopener" target="_blank">
		<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-facebook.svg' ); ?>
	</a>
	<a href="https://twitter.com/intent/tweet?url=https:<?php echo wp_kses( $url_full, 'post' ); ?>" data-size="large" target="_blank" rel="noopener">
		<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-twitter.svg' ); ?>
	</a>
</div>
