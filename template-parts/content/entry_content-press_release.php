<?php
/**
 * Template part for displaying a Press Release post's content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$press_release_intro = get_post_meta( get_the_ID(), 'intro', true );
$related_posts       = get_post_meta( get_the_ID(), 'talent_name', true );
$boilerplate         = get_option( 'options_boilerplate' );

?>
	<?php
	// The post thumbnail.
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'medium-large', array( 'align' => 'left' ) );
	}
	?>
	<div class="post-title">
		<!-- The post title. -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<!-- Post intro. -->
		<h3 class="post-intro">
			<?php
			if ( ! empty( $press_release_intro ) ) {
				echo wp_kses( $press_release_intro, 'post' );
			}
			?>
		</h3>
		<?php
		$location = get_post_meta( get_the_ID(), 'location', true );
		$time     = get_the_time( 'm.j.y' );
		echo '<p><strong>';
		echo esc_html( $location ) . ' ';
		echo '</strong>';
		echo esc_html( $time );
		echo '</p>';
		?>
	</div>
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
	if ( get_post_meta( get_the_ID(), 'show_boilerplate', true ) ) {
		if ( ! empty( $boilerplate ) ) {
			echo '<div class="boilerplate">';
			echo wp_kses( $boilerplate, 'post' );
			echo '</div>';
		}
	}
	wp_rig()->print_styles( 'wp-rig-related_posts' );
	wp_rig()->display_related_posts( $related_posts );
	?>
</footer>
<?php
