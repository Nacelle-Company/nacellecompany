<?php
/**
 * Template part for displaying a Press Release post's content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$press_release_intro = get_post_meta( get_the_ID(), 'intro', true );
$related_posts       = get_post_meta( get_the_ID(), 'talent_name', true );
$related_posts_news  = get_post_meta( get_the_ID(), 'related_to', true );
$boilerplate         = get_option( 'options_boilerplate' );
$press_link           = get_post_meta( get_the_ID(), 'link_to_article', true );
$press_meta          = '';
$source              = get_post_meta( get_the_ID(), 'source', true );
if (!empty($source)) {
	$press_meta .= $source . ' | ';
}
$press_meta          .= get_post_meta( get_the_ID(), 'location', true ) . ' | ';
$press_meta          .= '<time datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_time( 'F j, Y' ) . '</time>';

wp_rig()->print_styles( 'wp-rig-content_posts' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?> >
	<div class="article-header__image">
		<?php if ( $press_link && has_post_thumbnail() ) : ?>
			<a href="<?php echo esc_html( $press_link ); ?>" class="post-image link-absolute" target="_blank"><?php the_title( '<span class="hidden">', '</span>' ); ?></a>
			<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image', 'loading' => 'eager' ) ); ?>
		<?php elseif ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image', 'loading' => 'eager' ) ); ?>
		<?php else : ?>
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/comedy-dynamics-default-square.webp" class="wp-post-image" alt="<?php echo esc_html( $the_title ); ?>" loading="eager" />
		<?php endif; ?>
	</div>
	<div class="article-header__title">
		<h6 class="post-source">
			<?php echo wp_kses($press_meta, array('time' => array('datetime' => array()))); ?>
		</h6>
		<?php
		if ( $press_link ) :
			?>
			<a href="<?php echo esc_html( $press_link ); ?>" class="post-title__link" target="_blank">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<h4>
					<?php esc_html_e( 'Read more', 'wp-rig' ); ?>
					<?php echo load_inline_svg( 'icon-external-link.svg' ); ?>
				</h4>
			</a>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php endif; ?>
	</div>
	<div class="article-content">
		<?php if ( ! empty( $press_release_intro ) ) : ?>
			<h3 class="post-intro">
				<?php echo wp_kses( $press_release_intro, 'post' ); ?>
			</h3>
		<?php endif; ?>
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
	<footer class="post-footer">
		<?php
		// //
		// Styles
		// //
		// Footer styles.
		wp_rig()->print_styles( 'wp-rig-post-footer' );
		// //
		// Template parts.
		// //
		get_template_part( 'template-parts/modules/social-share' );
		// Pagination template.
		wp_rig()->display_pagination();
		// Related posts template.
		wp_rig()->display_related_posts( $related_posts );
		// Boilerplate template.
		if ( get_post_meta( get_the_ID(), 'show_boilerplate', true ) ) {
			if ( ! empty( $boilerplate ) ) :
				?>
				<div class="boilerplate">
					<?php echo wp_kses( $boilerplate, 'post' ); ?>
				</div>
				<?php
			endif;
		}
		// Back button.
		get_template_part( 'template-parts/modules/post-back-btn' );
		?>
	</footer>
</article>
<?php
