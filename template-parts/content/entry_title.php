<?php
/**
 * Template part for displaying a post's title
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$title_visibility = '';
if ( is_page() ) {
	$hide_title = get_post_meta( get_the_ID(), 'hide_title', true );
	if ( $hide_title ) {
		$title_visibility = ' ' . $hide_title;
	}
}

if ( is_singular( get_post_type() ) ) {
	the_title( '<h1 class="entry-title entry-title-singular' . esc_html( $title_visibility ) . '">', '</h1>' );
} elseif ( is_post_type_archive() ) {
	the_title( '<header class="entry-header"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></header>' );
} else {
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
}
