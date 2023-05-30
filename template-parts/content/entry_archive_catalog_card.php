<?php
/**
 * Template part for displaying a catalog post's card on the archive page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $lazy_load;

require('logic/logic_entry_archive_catalog_card.php');

// ACF Variables.
// https://pixelsandthings.co.uk/srcset-images-in-wordpress-using-advanced-custom-fields/.
$img_src      = wp_get_attachment_image_src( $img, 'medium' );
$img_srcset   = wp_get_attachment_image_srcset( $img, 'medium' );
$img_alt_text = get_post_meta( $img, '_wp_attachment_image_alt', true );

$blog_name = get_bloginfo( 'name' );

if( str_contains($blog_name, 'Nacelle') ) {
	$site_name = 'nacelle';
} else {
	$site_name = 'comedy-dynamics';
}
?>
<div class="gi">
	<a href="<?php echo esc_attr( $permalink ); ?>" class="link-absolute" aria-label="visit" title="<?php the_title(); ?>"></a>

	<?php if ( ! empty( $img ) && $img_src ) : ?>
			<img class="catalog-card__img"
				loading="<?php echo esc_html( $lazy_load ); ?>"
				width="<?php echo esc_html( $width ); ?>"
				height="<?php echo esc_html( $height ); ?>"
				src="<?php echo esc_url( $img_src[0] ); ?>"
				title="<?php the_title(); ?>"
				srcset="<?php echo esc_attr( $img_srcset ); ?>"
				sizes="(min-width: 2980px) calc(10vw - 27px), (min-width: 2700px) 10vw, (min-width: 2440px) 11.25vw, (min-width: 2160px) 12.69vw, (min-width: 1900px) 14.58vw, (min-width: 1620px) 16.54vw, (min-width: 1360px) 20vw, (min-width: 1080px) 25vw, (min-width: 960px) 33vw, (min-width: 780px) 50vw, 100vw"
				alt="<?php echo esc_html( $img_alt_text ); ?>"
				fetchpriority="<?php echo esc_html( $fetch_priority ); ?>"
			/>
		<?php else : ?>
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/<?php echo esc_html($site_name); ?>-default-square.webp" class="wp-post-image no-lazy" alt="<?php echo esc_html( $the_title ); ?>" />
		<?php endif; ?>

	<div class="gi__content">
		<h2 class="title font-size-small"><?php echo esc_attr( $the_title ); ?></h2>
		<p class="font-size-small"><?php echo esc_html( $synopsis ); ?></p>
	</div>
</div>
