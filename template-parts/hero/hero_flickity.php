<?php
/**
 * Template flickity slider part
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-flickity' );

wp_rig()->display_flickity( get_field( 'home_feat_posts' ) );
