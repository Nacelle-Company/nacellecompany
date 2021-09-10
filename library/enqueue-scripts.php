<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */


// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'Nacelle_asset_path' ) ) :
	function Nacelle_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'Nacelle_scripts' ) ) :
	function Nacelle_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style('fold-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . Nacelle_asset_path('aboveFold.css'), array(), '2.10.4', 'all');

		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . Nacelle_asset_path( 'app.css' ), array(), '2.10.4', 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'Nacelle', get_stylesheet_directory_uri() . '/dist/assets/js/' . Nacelle_asset_path( 'app.js' ), array( 'jquery' ), '2.10.4', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );

		// Add the comment-reply library on pages where it is necessary
		// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// 	wp_enqueue_script( 'comment-reply' );
		// }

	}

	add_action( 'wp_enqueue_scripts', 'Nacelle_scripts' );

	// preload css in wordpress
	// add this code in child theme function.php
	// https://gist.github.com/insaurabh/46eac17e4e4badc694dcf42944978b1d
	add_filter('style_loader_tag',  'preload_css', 10, 2);

	function preload_css($html, $handle)
	{

		$targetHanlde = array('main-stylesheet');

		if (in_array($handle, $targetHanlde)) {

			$html = str_replace("rel='stylesheet'", "rel='stylesheet preload' as='style'", $html);
		}

		return $html;
	}

endif;
