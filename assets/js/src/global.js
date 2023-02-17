/**
 * File global.js.
 *
 * Handles global javascript for your theme.
 */
// TODO: VIDEO PLACEHOLDER IMAGE: https://jsfiddle.net/luukee/L10tyrw5/1/


/**
 * Search icon add SEO/accessibility attributes
 * @kind Element.
 * @url https://github.com/wprig/wprig
 * @as This.
 */
const searchIcon = document.querySelector( '.search-icon a' );

if ( searchIcon.childElementCount !== 0 ) {
	const promagnifier = document.querySelector( '.search-icon .promagnifier' );
	promagnifier.setAttribute( 'tabindex', '0' );
	promagnifier.setAttribute( 'id', 'icon_search' );
	const promagnifierText = promagnifier.querySelector( '.asp_text_button' );
	promagnifierText.setAttribute( 'aria-labelledby', 'icon_search' );
} else {
	searchIcon.style.display = 'none';
}

// Back to top button
const showOnPx = 100;
const backToTopButton = document.querySelector( '.button-to-top' );

const scrollContainer = () => {
	return document.documentElement || document.body;
};

const goToTop = () => {
	document.body.scrollIntoView( {
		behavior: 'smooth',
	} );
};

document.addEventListener("scroll", () => {
	if (scrollContainer().scrollTop > showOnPx) {
		backToTopButton.classList.remove("invisible");
	} else {
		backToTopButton.classList.add("invisible");
	}
});

backToTopButton.addEventListener( 'click', goToTop );
// END Back to top button
