/**
 * Product Hover: Button Action Style - Bottom Slide Up
 *
 * Measures the rendered height of each product's action button wrap
 * and stores it as a CSS custom property on the product card so that
 * the CSS transition (translateY) can be pixel-perfect regardless of
 * font size, padding, or button text length.
 *
 * All reads are batched before all writes to avoid forced synchronous
 * layout (reflow thrashing) that harms Core Web Vitals.
 */
( function () {

	'use strict';

	var PRODUCT_SELECTOR     = 'li.product.btn-action-bottom-slide-up';
	var ACTION_WRAP_SELECTOR = '.responsive-product-action-wrap';
	var CSS_VAR_NAME         = '--responsive-button-action-height';
	var resizeTimer;

	/**
	 * Measure the action wrap height for each product card and store it
	 * as a CSS variable. Separates all DOM reads from all DOM writes to
	 * prevent layout thrashing.
	 */
	function measureButtonHeights() {
		var cards = document.querySelectorAll( PRODUCT_SELECTOR );

		if ( ! cards.length ) {
			return;
		}

		// --- Pass 1: Read only ---
		// Collect all offsetHeight values in one go. The browser performs
		// a single reflow here to answer all queries at once.
		var measurements = [];

		cards.forEach( function ( card ) {
			var actionWrap = card.querySelector( ACTION_WRAP_SELECTOR );
			measurements.push( {
				card:   card,
				height: actionWrap ? actionWrap.offsetHeight : 0,
			} );
		} );

		// --- Pass 2: Write only ---
		// Apply all CSS variables in a separate loop. Because no layout
		// queries are made here, the browser batches these into a single paint.
		measurements.forEach( function ( item ) {
			if ( item.height > 0 ) {
				item.card.style.setProperty( CSS_VAR_NAME, item.height + 'px' );
			}
		} );
	}

	/**
	 * Debounced resize handler. Prevents measureButtonHeights from firing
	 * hundreds of times per second while the user drags the window edge.
	 * Waits 200ms after the last resize event before running.
	 */
	function onResize() {
		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( measureButtonHeights, 200 );
	}

	/**
	 * Re-run measurements after WooCommerce AJAX completes.
	 * This handles AJAX product filtering, infinite scroll, and pagination
	 * that injects new product cards into the DOM after the initial load.
	 */
	function onAjaxComplete() {
		measureButtonHeights();
	}

	// --- Initialise ---

	// Run on initial page load (after layout is stable).
	window.addEventListener( 'load', measureButtonHeights );

	// Re-run on window resize with debounce.
	window.addEventListener( 'resize', onResize );

	// Re-run after any WooCommerce AJAX completes (filters, infinite scroll).
	jQuery( document ).on( 'ajaxComplete', onAjaxComplete );

} )();
