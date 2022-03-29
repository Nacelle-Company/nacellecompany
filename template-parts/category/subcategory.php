<?php
/**
 * The template for displaying subcategory archives.
 *
 * When active, applies to all category archives.
 * To target a specific category, rename file to category-{slug/id}.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

// ? Variables
if ( is_category( array( 'series-production', 'special-production' ) ) ) {
	$image = get_field( 'horizontal_image' );
} else {
	$image = get_field( 'square_image' );
}

if ( $image ) {
	$image = wp_get_attachment_image( $image['id'], 'large', false, array( 'class' => 'grid-item__img' ) ); // ? https://jasonyingling.me/using-wordpress-responsive-images-advanced-custom-fields/
}
$the_title   = get_the_title();
$permalink   = get_permalink();
$content_wp  = get_the_content();
$content_ex  = get_the_excerpt();
$content_acf = get_post_meta( $post->ID, 'synopsis', true );

// ? get content if avaliable, otherwise use the synopsis acf
if ( $content_ex ) {
	$synopsis = $content_ex;
} elseif ( $content_wp ) {
	$synopsis = $content_wp;
} else {
	$synopsis = $content_acf;
}

// ? trimming the synopsis
$trim_length = 17; // ? desired length of text to display
$value_more  = ' . . . '; // ? what to add at the end of the trimmed text
$synopsis    = wp_trim_words( $synopsis, $trim_length, $value_more );

// if ( $image ) :
?>

<div class="grid-item grid-item__hover">
	<a href="<?php echo esc_attr( $permalink ); ?>" aria-label="visit">
	<?php echo wp_kses( $image, 'post' ); ?>
	</a>
	<a href="<?php echo esc_attr( $permalink ); ?>" aria-label="visit">
	<div class="grid-item__content">
		<h6 class="title"><?php echo esc_attr( $the_title ); ?></h6>
		<sub><?php echo esc_html( $synopsis ); ?></sub>
	</div>
	</a>
</div>
<?php // endif; ?>
