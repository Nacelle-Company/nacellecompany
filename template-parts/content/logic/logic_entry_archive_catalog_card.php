<?php
/**
 * Logic for entry_archive_catalog_card.php
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
global $count_cat;
$permalink  = get_permalink();
$content_wp = get_the_content();
$content_ex = get_the_excerpt();
$the_title  = get_the_title();
$the_title_l = strlen($the_title);
$content_acf = get_post_meta( $post->ID, 'synopsis', true );
$synopsis    = '';
$trim_length = 17; // ? Trimming the synopsis. desired length of text to display.
$value_more  = ' . . . '; // ? What to add at the end of the trimmed text.

if($the_title_l >= 28) {
	$the_title  = substr($the_title,0,28);
	$the_title  = $the_title . '...';
}

// Assign content if avaliable, otherwise use the synopsis acf.
if ( $content_acf ) {
	$content_acf = wp_trim_words( $content_acf, $trim_length, $value_more ); // Final synopsis.
	$synopsis    = $content_acf;
} elseif ( $content_ex ) {
	$content_ex = wp_trim_words( $content_ex, $trim_length, $value_more ); // Final synopsis.
	$synopsis   = $content_ex;
} elseif ( $content_wp ) {
	$content_wp = wp_trim_words( $content_wp, $trim_length, $value_more ); // Final synopsis.
	$synopsis   = $content_wp;
}

if ( $count_cat <= 9 ) {
	$lazy_load  = 'eager';
	$fetch_priority = 'high';
} else {
	$lazy_load  = 'lazy';
	$fetch_priority = 'low';
}

// // // // //
// IMAGE WORK
// // // // //

$sq_img   = get_post_meta( $post->ID, 'square_image', true );
$hz_img   = get_post_meta( $post->ID, 'horizontal_image', true );
$feat_img = get_post_thumbnail_id($post->ID);

if ( !empty($sq_img) ) {
	$img    = get_post_meta( $post->ID, 'square_image', true );
	$width  = '768';
	$height = '768';
} else if ( !empty($hz_img) ) {
	$img    = get_post_meta( $post->ID, 'horizontal_image', true );
	$width  = '320';
	$height = '182';
} else {
	$img = $feat_img;
	$width  = '320';
	$height = '768';
}
