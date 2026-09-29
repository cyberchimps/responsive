/**
 * WooCommerce Custom Quantity Plus & Minus Buttons
 */
( function( $ ) {
	'use strict';

	function addQuantityButtons() {
		$( '.product-quantity-plus-minus form.cart .quantity' ).each( function() {
			var $qty = $( this );
			if ( ! $qty.find( '.minus' ).length ) {
				$qty.prepend( '<button type="button" class="minus" aria-label="Decrease quantity">-</button>' );
			}
			if ( ! $qty.find( '.plus' ).length ) {
				$qty.append( '<button type="button" class="plus" aria-label="Increase quantity">+</button>' );
			}
		} );
	}

	$( document ).ready( function() {
		addQuantityButtons();
	} );

	$( document ).ajaxComplete( function() {
		addQuantityButtons();
	} );

	$( document ).on( 'click', '.quantity .plus, .quantity .minus', function( e ) {
		e.preventDefault();

		var $button = $( this ),
			$qty    = $button.closest( '.quantity' ).find( '.qty' );

		if ( ! $qty.length ) {
			return;
		}

		var current = parseFloat( $qty.val() ),
			min     = parseFloat( $qty.attr( 'min' ) ),
			max     = parseFloat( $qty.attr( 'max' ) ),
			step    = parseFloat( $qty.attr( 'step' ) );

		if ( isNaN( current ) || '' === $qty.val() ) {
			current = 0;
		}
		if ( isNaN( step ) || 0 >= step ) {
			step = 1;
		}
		if ( isNaN( min ) ) {
			min = 0;
		}

		if ( $button.hasClass( 'plus' ) ) {
			if ( ! isNaN( max ) && ( current + step ) > max ) {
				$qty.val( max );
			} else {
				var decimals = ( step.toString().split( '.' )[1] || '' ).length;
				$qty.val( ( current + step ).toFixed( decimals ) );
			}
		} else {
			if ( ( current - step ) < min ) {
				$qty.val( min );
			} else {
				var decimals = ( step.toString().split( '.' )[1] || '' ).length;
				$qty.val( ( current - step ).toFixed( decimals ) );
			}
		}

		$qty.trigger( 'change' );
	} );
} )( jQuery );
