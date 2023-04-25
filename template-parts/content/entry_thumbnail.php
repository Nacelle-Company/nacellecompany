<?php
/**
 * Template part for displaying a post's featured image
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
global $count;
if ($count < 2) {
	$loading = 'eager';
} else {
	$loading = 'lazy';
}
// Audio or video attachments can have featured images, so they need to be specifically checked.
$support_slug = get_post_type();
if ( 'attachment' === $support_slug ) {
	if ( wp_attachment_is( 'audio' ) ) {
		$support_slug .= ':audio';
	} elseif ( wp_attachment_is( 'video' ) ) {
		$support_slug .= ':video';
	}
}

// ACF images.
$size = 'medium_large';
if ( get_field( 'square_image' ) ) {
	$img = get_field( 'square_image' );
	$img = wp_get_attachment_image( $img, $size );

} elseif ( get_field( 'horizontal_image' ) ) {
	$img = get_field( 'horizontal_image' );
	$img = wp_get_attachment_image( $img, $size );

} else {
	$img = get_the_post_thumbnail();
}

if ( post_password_required() || ! post_type_supports( $support_slug, 'thumbnail' ) || ! has_post_thumbnail() ) {
	return;
}

if ( is_singular( get_post_type() ) ) {
	?>
	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'medium', array( 'class' => 'skip-lazy' ) ); ?>
	</div>
	<?php
} elseif ( is_post_type_archive() ) {
	?>
	<div class="entry-thumbnail">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
			global $wp_query;
			if ( 4 > $wp_query->current_post ) {
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'class' => 'skip-lazy',
						'loading' => $loading,
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			} else {
				the_post_thumbnail(
					'medium',
					array(
						'loading' => $loading,
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			}
			?>
		</a>
	</div>
	<?php
} else {
	?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<?php
		global $wp_query;
		if ( 0 === $wp_query->current_post ) {
			echo wp_kses( $img, 'post' );
		} else {
			echo wp_kses( $img, 'post' );
		}
		?>
	</a>
	<?php
}
