/**
 * File global.js.
 *
 * Handles global javascript for your theme.
 */
/* global wpRigScreenReaderText */
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

const KEYMAP = {
	TAB: 9,
};

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initNavigation );
} else {
	// The DOM has already been loaded.
	initNavigation();
}

// Initiate the menus when the DOM loads.
function initNavigation() {
	initNavToggleSubmenus();
	initNavToggleSmall();
}

/**
 * Initiate the script to process all
 * navigation menus with submenu toggle enabled.
 */
function initNavToggleSubmenus() {
	const navTOGGLE = document.querySelectorAll( '.nav--toggle-sub' );

	// No point if no navs.
	if ( ! navTOGGLE.length ) {
		return;
	}

	for ( let i = 0; i < navTOGGLE.length; i++ ) {
		initEachNavToggleSubmenu( navTOGGLE[ i ] );
	}
}

/**
 * Initiate the script to process submenu
 * navigation toggle for a specific navigation menu.
 * @param {Object} nav Navigation element.
 */
function initEachNavToggleSubmenu( nav ) {
	// Get the submenus.
	const SUBMENUS = nav.querySelectorAll( '.menu ul' );

	// No point if no submenus.
	if ( ! SUBMENUS.length ) {
		return;
	}

	// Create the dropdown button.
	const dropdownButton = getDropdownButton();

	for ( let i = 0; i < SUBMENUS.length; i++ ) {
		const parentMenuItem = SUBMENUS[ i ].parentNode;
		let dropdown = parentMenuItem.querySelector( '.dropdown' );

		// If no dropdown, create one.
		if ( ! dropdown ) {
			// Create dropdown.
			dropdown = document.createElement( 'span' );
			dropdown.classList.add( 'dropdown' );

			const dropdownSymbol = document.createElement( 'i' );
			dropdownSymbol.classList.add( 'dropdown-symbol' );
			dropdown.appendChild( dropdownSymbol );

			// Add before submenu.
			SUBMENUS[ i ].parentNode.insertBefore( dropdown, SUBMENUS[ i ] );
		}

		// Convert dropdown to button.
		const thisDropdownButton = dropdownButton.cloneNode( true );

		// Copy contents of dropdown into button.
		thisDropdownButton.innerHTML = dropdown.innerHTML;

		// Replace dropdown with toggle button.
		dropdown.parentNode.replaceChild( thisDropdownButton, dropdown );

		// Toggle the submenu when we click the dropdown button.
		thisDropdownButton.addEventListener( 'click', ( e ) => {
			toggleSubMenu( e.target.parentNode );
		} );

		// Clean up the toggle if a mouse takes over from keyboard.
		parentMenuItem.addEventListener( 'mouseleave', ( e ) => {
			toggleSubMenu( e.target, false );
		} );

		// When we focus on a menu link, make sure all siblings are closed.
		parentMenuItem.querySelector( 'a' ).addEventListener( 'focus', ( e ) => {
			const parentMenuItemsToggled = e.target.parentNode.parentNode.querySelectorAll( 'li.menu-item--toggled-on' );
			for ( let j = 0; j < parentMenuItemsToggled.length; j++ ) {
				toggleSubMenu( parentMenuItemsToggled[ j ], false );
			}
		} );

		// Handle keyboard accessibility for traversing menu.
		SUBMENUS[ i ].addEventListener( 'keydown', ( e ) => {
			// These specific selectors help us only select items that are visible.
			const focusSelector = 'ul.toggle-show > li > a, ul.toggle-show > li > button';

			if ( KEYMAP.TAB === e.keyCode ) {
				if ( e.shiftKey ) {
					// Means we're tabbing out of the beginning of the submenu.
					if ( isfirstFocusableElement( e.target, document.activeElement, focusSelector ) ) {
						toggleSubMenu( e.target.parentNode, false );
					}
					// Means we're tabbing out of the end of the submenu.
				} else if ( islastFocusableElement( e.target, document.activeElement, focusSelector ) ) {
					toggleSubMenu( e.target.parentNode, false );
				}
			}
		} );

		SUBMENUS[ i ].parentNode.classList.add( 'menu-item--has-toggle' );
	}
}

/**
 * Initiate the script to process all
 * navigation menus with small toggle enabled.
 */
function initNavToggleSmall() {
	const navTOGGLE = document.querySelectorAll( '.nav--toggle-small' );

	// No point if no navs.
	if ( ! navTOGGLE.length ) {
		return;
	}

	for ( let i = 0; i < navTOGGLE.length; i++ ) {
		initEachNavToggleSmall( navTOGGLE[ i ] );
	}
}

/**
 * Initiate the script to process small
 * navigation toggle for a specific navigation menu.
 * @param {Object} nav Navigation element.
 */
function initEachNavToggleSmall( nav ) {
	const menuTOGGLE = nav.querySelector( '.menu-toggle' );

	// Return early if MENUTOGGLE is missing.
	if ( ! menuTOGGLE ) {
		return;
	}

	// Add an initial values for the attribute.
	menuTOGGLE.setAttribute( 'aria-expanded', 'false' );

	menuTOGGLE.addEventListener( 'click', ( e ) => {
		nav.classList.toggle( 'nav--toggled-on' );
		e.target.setAttribute( 'aria-expanded', 'false' === e.target.getAttribute( 'aria-expanded' ) ? 'true' : 'false' );
	}, false );
}

/**
 * Toggle submenus open and closed, and tell screen readers what's going on.
 * @param {Object} parentMenuItem Parent menu element.
 * @param {boolean} forceToggle Force the menu toggle.
 * @return {void}
 */
function toggleSubMenu( parentMenuItem, forceToggle ) {
	const toggleButton = parentMenuItem.querySelector( '.dropdown-toggle' ),
		subMenu = parentMenuItem.querySelector( 'ul' );
	let parentMenuItemToggled = parentMenuItem.classList.contains( 'menu-item--toggled-on' );

	// Will be true if we want to force the toggle on, false if force toggle close.
	if ( undefined !== forceToggle && 'boolean' === ( typeof forceToggle ) ) {
		parentMenuItemToggled = ! forceToggle;
	}

	// Toggle aria-expanded status.
	toggleButton.setAttribute( 'aria-expanded', ( ! parentMenuItemToggled ).toString() );

	/*
	 * Steps to handle during toggle:
	 * - Let the parent menu item know we're toggled on/off.
	 * - Toggle the ARIA label to let screen readers know will expand or collapse.
	 */
	if ( parentMenuItemToggled ) {
		// Toggle "off" the submenu.
		parentMenuItem.classList.remove( 'menu-item--toggled-on' );
		subMenu.classList.remove( 'toggle-show' );
		toggleButton.setAttribute( 'aria-label', wpRigScreenReaderText.expand );

		// Make sure all children are closed.
		const subMenuItemsToggled = parentMenuItem.querySelectorAll( '.menu-item--toggled-on' );
		for ( let i = 0; i < subMenuItemsToggled.length; i++ ) {
			toggleSubMenu( subMenuItemsToggled[ i ], false );
		}
	} else {
		// Make sure siblings are closed.
		const parentMenuItemsToggled = parentMenuItem.parentNode.querySelectorAll( 'li.menu-item--toggled-on' );
		for ( let i = 0; i < parentMenuItemsToggled.length; i++ ) {
			toggleSubMenu( parentMenuItemsToggled[ i ], false );
		}

		// Toggle "on" the submenu.
		parentMenuItem.classList.add( 'menu-item--toggled-on' );
		subMenu.classList.add( 'toggle-show' );
		toggleButton.setAttribute( 'aria-label', wpRigScreenReaderText.collapse );
	}
}

/**
 * Returns the dropdown button
 * element needed for the menu.
 * @return {Object} drop-down button element
 */
function getDropdownButton() {
	const dropdownButton = document.createElement( 'button' );
	dropdownButton.classList.add( 'dropdown-toggle' );
	dropdownButton.setAttribute( 'aria-expanded', 'false' );
	dropdownButton.setAttribute( 'aria-label', wpRigScreenReaderText.expand );
	return dropdownButton;
}

/**
 * Returns true if element is the
 * first focusable element in the container.
 * @param {Object} container
 * @param {Object} element
 * @param {string} focusSelector
 * @return {boolean} whether or not the element is the first focusable element in the container
 */
function isfirstFocusableElement( container, element, focusSelector ) {
	const focusableElements = container.querySelectorAll( focusSelector );
	if ( 0 < focusableElements.length ) {
		return element === focusableElements[ 0 ];
	}
	return false;
}

/**
 * Returns true if element is the
 * last focusable element in the container.
 * @param {Object} container
 * @param {Object} element
 * @param {string} focusSelector
 * @return {boolean} whether or not the element is the last focusable element in the container
 */
function islastFocusableElement( container, element, focusSelector ) {
	const focusableElements = container.querySelectorAll( focusSelector );
	if ( 0 < focusableElements.length ) {
		return element === focusableElements[ focusableElements.length - 1 ];
	}
	return false;
}

/**
 * A lightweight youtube embed. Still should feel the same to the user, just MUCH faster to initialize and paint.
 *
 * Thx to these as the inspiration
 *   https://storage.googleapis.com/amp-vs-non-amp/youtube-lazy.html
 *   https://autoplay-youtube-player.glitch.me/
 *
 * Once built it, I also found these:
 *   https://github.com/ampproject/amphtml/blob/master/extensions/amp-youtube (👍👍)
 *   https://github.com/Daugilas/lazyYT
 *   https://github.com/vb/lazyframe
 */
class LiteYTEmbed extends HTMLElement {
	connectedCallback() {
		this.videoId = this.getAttribute( 'videoid' );

		let playBtnEl = this.querySelector( '.lty-playbtn' );
		// A label for the button takes priority over a [playlabel] attribute on the custom-element
		this.playLabel = ( playBtnEl && playBtnEl.textContent.trim() ) || this.getAttribute( 'playlabel' ) || 'Play';

		/**
		 * Lo, the youtube placeholder image!  (aka the thumbnail, poster image, etc)
		 *
		 * See https://github.com/paulirish/lite-youtube-embed/blob/master/youtube-thumbnail-urls.md
		 *
		 * TODO: Do the sddefault->hqdefault fallback
		 *       - When doing this, apply referrerpolicy (https://github.com/ampproject/amphtml/pull/3940)
		 * TODO: Consider using webp if supported, falling back to jpg
		 */
		if ( ! this.style.backgroundImage ) {
			this.style.backgroundImage = `url("https://i.ytimg.com/vi/${ this.videoId }/hqdefault.jpg")`;
		}

		// Set up play button, and its visually hidden label
		if ( ! playBtnEl ) {
			playBtnEl = document.createElement( 'button' );
			playBtnEl.type = 'button';
			playBtnEl.classList.add( 'lty-playbtn' );
			this.append( playBtnEl );
		}
		if ( ! playBtnEl.textContent ) {
			const playBtnLabelEl = document.createElement( 'span' );
			playBtnLabelEl.className = 'lyt-visually-hidden';
			playBtnLabelEl.textContent = this.playLabel;
			playBtnEl.append( playBtnLabelEl );
		}

		// On hover (or tap), warm up the TCP connections we're (likely) about to use.
		this.addEventListener( 'pointerover', LiteYTEmbed.warmConnections, { once: true } );

		// Once the user clicks, add the real iframe and drop our play button
		// TODO: In the future we could be like amp-youtube and silently swap in the iframe during idle time
		//   We'd want to only do this for in-viewport or near-viewport ones: https://github.com/ampproject/amphtml/pull/5003
		this.addEventListener( 'click', this.addIframe );
	}

	// // TODO: Support the the user changing the [videoid] attribute
	// attributeChangedCallback() {
	// }

	/**
	 * Add a <link rel={preload | preconnect} ...> to the head
	 */
	static addPrefetch( kind, url, as ) {
		const linkEl = document.createElement( 'link' );
		linkEl.rel = kind;
		linkEl.href = url;
		if ( as ) {
			linkEl.as = as;
		}
		document.head.append( linkEl );
	}

	/**
	 * Begin pre-connecting to warm up the iframe load
	 * Since the embed's network requests load within its iframe,
	 *   preload/prefetch'ing them outside the iframe will only cause double-downloads.
	 * So, the best we can do is warm up a few connections to origins that are in the critical path.
	 *
	 * Maybe `<link rel=preload as=document>` would work, but it's unsupported: http://crbug.com/593267
	 * But TBH, I don't think it'll happen soon with Site Isolation and split caches adding serious complexity.
	 */
	static warmConnections() {
		if ( LiteYTEmbed.preconnected ) {
			return;
		}

		// The iframe document and most of its subresources come right off youtube.com
		LiteYTEmbed.addPrefetch( 'preconnect', 'https://www.youtube-nocookie.com' );
		// The botguard script is fetched off from google.com
		LiteYTEmbed.addPrefetch( 'preconnect', 'https://www.google.com' );

		// Not certain if these ad related domains are in the critical path. Could verify with domain-specific throttling.
		LiteYTEmbed.addPrefetch( 'preconnect', 'https://googleads.g.doubleclick.net' );
		LiteYTEmbed.addPrefetch( 'preconnect', 'https://static.doubleclick.net' );

		LiteYTEmbed.preconnected = true;
	}

	addIframe( e ) {
		if ( this.classList.contains( 'lyt-activated' ) ) {
			return;
		}
		e.preventDefault();
		this.classList.add( 'lyt-activated' );

		const params = new URLSearchParams( this.getAttribute( 'params' ) || [] );
		params.append( 'autoplay', '1' );

		const iframeEl = document.createElement( 'iframe' );
		iframeEl.width = 560;
		iframeEl.height = 315;
		// No encoding necessary as [title] is safe. https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#:~:text=Safe%20HTML%20Attributes%20include
		iframeEl.title = this.playLabel;
		iframeEl.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
		iframeEl.allowFullscreen = true;
		// AFAIK, the encoding here isn't necessary for XSS, but we'll do it only because this is a URL
		// https://stackoverflow.com/q/64959723/89484
		iframeEl.src = `https://www.youtube-nocookie.com/embed/${ encodeURIComponent( this.videoId ) }?${ params.toString() }`;
		this.append( iframeEl );

		// Set focus for a11y
		iframeEl.focus();
	}
}
// Register custom element
customElements.define( 'lite-youtube', LiteYTEmbed );

/**
 * Search icon add SEO/accessibility attributes
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

document.addEventListener( 'scroll', () => {
	// console.log( 'Scroll Height: ', scrollContainer().scrollHeight );
	// console.log( 'Client Height: ', scrollContainer().clientHeight );

	if ( scrollContainer().scrollTop > showOnPx ) {
		backToTopButton.classList.remove( 'invisible' );
	} else {
		backToTopButton.classList.add( 'invisible' );
	}
} );

backToTopButton.addEventListener( 'click', goToTop );
// END Back to top button
