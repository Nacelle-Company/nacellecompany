<?php
/**
 * Template part for displaying a pagination
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
wp_rig()->print_styles( 'wp-rig-pagination-archive' );
the_posts_pagination(
	array(
		'mid_size'           => 2,
		'prev_text'          => __( '&larr;', 'wp-rig' ),
		'next_text'          => __( '&rarr;', 'wp-rig' ),
		'screen_reader_text' => __( 'Page navigation', 'wp-rig' ),
	)
);
