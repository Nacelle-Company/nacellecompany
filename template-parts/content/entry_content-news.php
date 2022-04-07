<?php
/**
 * Template part for displaying a news post's content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$news_link     = get_post_meta( get_the_ID(), 'link_to_article', true );
$related_posts = get_post_meta( get_the_ID(), 'related_to', true );

// The post thumbnail.
if ( has_post_thumbnail() ) {
	?>
	<a href="<?php echo esc_html( $news_link ); ?>" class="post-image" target="_blank">
		<?php the_post_thumbnail( 'medium-large' ); ?>
	</a>
	<?php
}
?>

<!-- The post title. -->
<a href="<?php echo esc_html( $news_link ); ?>" class="post-title" target="_blank">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<h4>
		<?php esc_html_e( 'Read more', 'wp-rig' ); ?>
		<?php get_template_part( 'template-parts/svg/icon-external-link' ); ?>
	</h4>
</a>
<!-- The post content -->
<div class="post-content">
	<?php
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-rig' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);
	?>

</div>
<!-- Post footer. -->
<footer class="post-footer">
	<?php
	get_template_part( 'template-parts/modules/social-share' );
	wp_rig()->print_styles( 'wp-rig-related_posts' );
	wp_rig()->display_related_posts( $related_posts );
	?>
</footer>
<?php
