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
$news_link           = get_post_meta( get_the_ID(), 'link_to_article', true );
$source              = get_post_meta( get_the_ID(), 'source', true );
$location            = get_post_meta( get_the_ID(), 'location', true );
$time                = get_the_time( 'F j, Y' );
$time_att            = get_the_time( 'Y-m-d' );

wp_rig()->print_styles( 'wp-rig-content_posts' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<?php
	// The post thumbnail.
	if ( has_post_thumbnail() ) :
		if ( $news_link ) :
			?>
			<div class="post-image__container">
				<a href="<?php echo esc_html( $news_link ); ?>" class="post-image link-absolute" target="_blank"><?php the_title( '<span class="hidden">', '</span>' ); ?></a>
				<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image', 'loading' => 'eager' ) ); ?>
			</div>
		<?php else : ?>
			<div class="post-image__container">
				<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-image', 'loading' => 'eager' ) ); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="post-title">
		<p class="post-source">
			<?php echo esc_html( $source ); ?> |
			<time class="post-date" datetime="<?php echo esc_html( $time_att ); ?>">
				<?php echo esc_html( $time ); ?>
			</time>
			<br>
			<strong>
				<?php echo esc_html( $location ); ?>
			</strong>
		</p>
		<?php
		if ( $news_link ) :
			?>
			<a href="<?php echo esc_html( $news_link ); ?>" class="post-title__link" target="_blank">
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
	<div class="post-content">
		<h3 class="post-intro">
			<?php
			if ( ! empty( $press_release_intro ) ) {
				echo wp_kses( $press_release_intro, 'post' );
			}
			?>
		</h3>
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
		get_template_part( 'template-parts/modules/social-share' );
		if ( get_post_meta( get_the_ID(), 'show_boilerplate', true ) ) {
			if ( ! empty( $boilerplate ) ) :
				?>
				<div class="boilerplate">
					<?php echo wp_kses( $boilerplate, 'post' ); ?>
				</div>
				<?php
			endif;
		}
		// Pagination.
		wp_rig()->print_styles( 'wp-rig-pagination-post' );
		wp_rig()->display_pagination();
		// Related posts.
		if ( $related_posts ) {
			wp_rig()->print_styles( 'wp-rig-related_posts' );
		}
		wp_rig()->display_related_posts( $related_posts );
		get_template_part( 'template-parts/modules/post-back-btn' );
		?>

	</footer>
</article>
<?php
