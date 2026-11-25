/**
 * File scroll-to-id.js.
 *
 * Smooth scrolls to an element when an on-page anchor link (#id) is clicked,
 * accounting for fixed / sticky headers. Enabled from
 * Customize > Site Settings > Smooth Scroll > "Enable Smooth Scroll to ID".
 */
( function () {
	'use strict';

	var cfg = window.responsiveScrollToId || {};
	var extraOffset = Number( cfg.extraOffset ) || 0;

	// Links that must keep their native behaviour (tabs, skip links, pagination, etc.).
	var excluded = [
		'.skip-link',
		'.nav-links a',
		'[role="tab"]',
		'.wc-tabs a',
		'[data-toggle]',
		'[data-bs-toggle]',
		'[href*="tab-"]'
	];
	if ( cfg.excludeLinks ) {
		excluded.push( cfg.excludeLinks );
	}
	var linkSelector = 'a[href*="#"]:not([href="#"]):not([href="#0"])';
	excluded.forEach( function ( sel ) {
		linkSelector += ':not(' + sel + ')';
	} );

	function prefersReducedMotion() {
		return window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	}

	// Absolute offset top of an element, including nested offset parents.
	function getOffsetTop( el ) {
		var top = 0;
		while ( el ) {
			top += el.offsetTop;
			el = el.offsetParent;
		}
		return top;
	}

	function isVisible( el ) {
		return !! ( el.offsetWidth || el.offsetHeight || el.getClientRects().length );
	}

	// Height covered by a fixed / sticky header (desktop #masthead or mobile #masthead-mobile).
	function getStickyOffset() {
		var offset = 0;
		var headers = document.querySelectorAll( '.site-header' );

		headers.forEach( function ( header ) {
			if ( ! isVisible( header ) ) {
				return;
			}
			var candidates = [ header ].concat( Array.prototype.slice.call( header.querySelectorAll( '*' ) ) );
			candidates.forEach( function ( el ) {
				var pos = window.getComputedStyle( el ).position;
				if ( pos !== 'fixed' && pos !== 'sticky' ) {
					return;
				}
				if ( ! isVisible( el ) ) {
					return;
				}
				var rect = el.getBoundingClientRect();
				if ( rect.height > 0 && rect.bottom > offset ) {
					offset = rect.bottom;
				}
			} );
		} );

		return offset + extraOffset;
	}

	function getTarget( hash ) {
		if ( ! hash || hash.length < 2 ) {
			return null;
		}
		try {
			return document.getElementById( decodeURIComponent( hash.slice( 1 ) ) ) || document.querySelector( hash );
		} catch ( err ) {
			return null; // Invalid selector.
		}
	}

	function scrollToTarget( target ) {
		var top = getOffsetTop( target ) - getStickyOffset();
		window.scrollTo( {
			top: top < 0 ? 0 : top,
			left: 0,
			behavior: prefersReducedMotion() ? 'auto' : 'smooth'
		} );
	}

	// Close the mobile off-canvas panel if the clicked link lives inside it.
	function closeOffCanvas( link ) {
		if ( link && link.closest && link.closest( '#responsive-off-canvas-panel' ) ) {
			var closeBtn = document.querySelector( '.responsive-off-canvas-panel-close' );
			if ( closeBtn ) {
				closeBtn.click();
			}
		}
	}

	function onClick( e ) {
		var link = e.currentTarget;
		var hash = link.hash;
		var target = getTarget( hash );

		if ( ! target ) {
			return;
		}

		e.preventDefault();
		closeOffCanvas( link );
		scrollToTarget( target );

		// Keep the URL shareable, like native anchor behaviour.
		if ( hash !== window.location.hash ) {
			window.history.pushState( null, '', hash );
		}

		// Keyboard / screen-reader users: move focus to the section.
		if ( ! target.hasAttribute( 'tabindex' ) ) {
			target.setAttribute( 'tabindex', '-1' );
		}
		target.focus( { preventScroll: true } );
	}

	function init() {
		var current = window.location.href.split( '#' )[ 0 ];

		document.querySelectorAll( linkSelector ).forEach( function ( link ) {
			// Only links pointing to a section on the current page.
			if ( link.href.split( '#' )[ 0 ] === current && link.hash ) {
				link.addEventListener( 'click', onClick );
			}
		} );

		// Page opened with a #hash (e.g. coming from a link on another page).
		if ( window.location.hash ) {
			var target = getTarget( window.location.hash );
			if ( target ) {
				setTimeout( function () {
					scrollToTarget( target );
				}, 750 );
			}
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
