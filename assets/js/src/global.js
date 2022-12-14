/**
 * File global.js.
 *
 * Handles global javascript for your theme.
 */

const promagnifier = document.getElementsByClassName( 'promagnifier' );

for ( let i = 0; i < promagnifier.length; i++ ) {
	promagnifier[ i ].setAttribute( 'tabindex', '0' );
	promagnifier[ i ].setAttribute( 'id', 'Search' );
	const promagnifierText = promagnifier[ i ].getElementsByClassName( 'asp_text_button' );
	promagnifierText[ i ].setAttribute( 'aria-labelledby', 'Search' );
}
