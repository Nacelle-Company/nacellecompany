<?php
/**
 * Entry meta information for posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

if ( ! function_exists( 'Nacelle_entry_meta' ) ) :
	function Nacelle_entry_meta() {
		/* translators: %1$s: current date, %2$s: current time */
		echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %1$s at %2$s.', 'nacelle' ), get_the_date(), get_the_time() ) . '</time>';
		echo '<p class="byline author">' . __( 'Written by', 'nacelle' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
	}
endif;
