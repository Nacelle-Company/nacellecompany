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

wp_rig()->print_styles( 'wp-rig-subcategory' );

global $searchandfilter;



// Variables.
$sf_current_query = $searchandfilter->get( 46515 )->current_query(); // Search and Filter plugin.
// $catalog_post     = get_post_type( get_the_ID() );
// $catalog_post = get_post_type_object( get_post_type( $post->label ) );
// echo $catalog_post;

// echo $catalog_post;
$count            = $wp_query->current_post;
$the_title        = get_the_title();
$permalink        = get_permalink();
$content_wp       = get_the_content();
$content_ex       = get_the_excerpt();
$content_acf      = get_post_meta( $post->ID, 'synopsis', true );
$trim_length      = 17; // ? Trimming the synopsis. desired length of text to display.
$value_more       = ' . . . '; // ? What to add at the end of the trimmed text.
$image            = '';
/**
 * For the first 12 posts remove the loading="lazy" attr.
 *
 * @param Type $count Gets the loop index number.
 * @return attr lazy
 * @throws conditon boolean
 */
// $attr['loading'] = false;

if ( $count < 13 ) {
	$attr = 'false';
	// $attr['loading'] = false;
} else {
	$attr = 'lazy';
}
/**
 * Checking the images.
 */
if ( ! empty( get_field( 'square_image' ) ) ) {
	$image = get_field( 'square_image' );
		$image = wp_get_attachment_image(
			$image['id'],
			'large',
			false,
			array(
				'loading' => $attr,
			)
		);
} elseif ( ! empty( get_field( 'horizontal_image' ) ) ) {
	$image = get_field( 'horizontal_image' );
		$image = wp_get_attachment_image(
			$image['id'],
			'large',
			false,
			array(
				'loading' => $attr,
			)
		);
} else {
	$image = get_the_post_thumbnail(); // ? If any post get the square image first if you have it, otherwise get the horizontal image and if neither get the post thumbnail.
}

	// ? Assign content if avaliable, otherwise use the synopsis acf.
if ( $content_acf ) {
	$content_acf = wp_trim_words( $content_acf, $trim_length, $value_more ); // Final synopsis.
	$synopsis = $content_acf;
} elseif ( $content_ex ) {
	$content_ex = wp_trim_words( $content_ex, $trim_length, $value_more ); // Final synopsis.
	$synopsis   = $content_ex;
} elseif ( $content_wp ) {
	$content_wp    = wp_trim_words( $content_wp, $trim_length, $value_more ); // Final synopsis.
	$synopsis = $content_wp;
}

if ( ! empty( $image ) ) {
	?>
	<div class="grid-item grid-item__hover <?php echo $attr; ?>">
		<a href="<?php echo esc_attr( $permalink ); ?>" class="link-absolute" aria-label="visit"></a>
		<?php if ( ! empty( $image ) ) : ?>
			<?php echo wp_kses( $image, 'post' ); ?>
		<?php endif; ?>

		<a href="<?php echo esc_attr( $permalink ); ?>" aria-label="visit">
		<div class="grid-item__content">
			<h6 class="title"><?php echo esc_attr( $the_title ); ?></h6>
			<sub><?php echo esc_html( $synopsis ); ?></sub>
		</div>
		</a>
		<?php get_template_part( 'template-parts/content/entry_actions', get_post_type() ); ?>
	</div>
		<?php
		// code...
} else { // If not image, just give us the permalink, title and content.
	?>
	<div class="grid-item grid-item__plain">
		<a href="<?php echo esc_attr( $permalink ); ?>" aria-label="visit">
			<div class="grid-item__content">
				<h6 class="title"><?php echo esc_attr( $the_title ); ?></h6>
				<sub><?php echo esc_html( $synopsis ); ?></sub>
			</div>
		</a>
		<?php get_template_part( 'template-parts/content/entry_actions', get_post_type() ); ?>
	</div>
		<?php
}
?>
