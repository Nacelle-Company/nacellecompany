<?php
/**
 * Template part for displaying a news post's content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$news_link     = get_post_meta( get_the_ID(), 'link_to_article', true );
$related_posts = get_post_meta( get_the_ID(), 'related_to', true );
$related_footer_posts = get_post_meta( get_the_ID(), 'related_catalog_items', true );

// $the_terms;
// $the_term;
printVar( $related_posts );
printVar( $related_footer_posts );

if ( has_post_thumbnail() ) {
	?>
	<a href="<?php echo esc_html( $news_link ); ?>" target="_blank">
		<?php the_post_thumbnail( 'medium-large', array( 'align' => 'left' ) ); ?>
	</a>
	<?php
}
?>
<a href="<?php echo esc_html( $news_link ); ?>" target="_blank">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<h4>
		<?php esc_html_e( 'Read more', 'wp-rig' ); ?>
		<?php get_template_part( 'template-parts/svg/icon-external-link' ); ?>
	</h4>
</a>
<?php
the_content();
get_template_part( 'template-parts/modules/social-share' );

?>
<footer class="post-footer">
	<?php
	wp_rig()->print_styles( 'wp-rig-related_posts' );
	wp_rig()->display_related_posts( $related_posts );
	?>
</footer>
<?php
