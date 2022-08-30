/**
 * File global.js.
 *
 * Handles global javascript for your theme.
 */

const promagnifier = document.getElementsByClassName( 'promagnifier' );

for ( let i = 0; i < promagnifier.length; i++ ) {
	promagnifier[ i ].setAttribute( 'tabindex', '0' );
}
