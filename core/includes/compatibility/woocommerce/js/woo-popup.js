jQuery( document ).ready(
	function ($) {
		responsiveWooPopup( $ );
	}
);

function responsiveWooPopup($) {
	"use strict";

	// // Open popup on shop page
	$( 'body' ).on(
		'added_to_cart',
		function () {
			$( '#woo-popup-wrap' ).css( {'display':'block'} );

			$.magnificPopup.open(
				{
					items: {
						src: '#woo-popup-wrap', // can be a HTML string, jQuery object, or CSS selector

					},
					modal: true,

				}
			);
		}
	);

	$( '.continue-btn' ).on(
		'click',
		function () {
			$.magnificPopup.close();
		}
	);

	$( '.mfp-bg' ).on(
		'click',
		function () {
			$.magnificPopup.close();
		}
	);

}

/**
 * AJAX to get value of fragments when update cart
 */
jQuery(
	function ($) {

		$( document.body ).on(
			'added_to_cart removed_from_cart',
			function ( event, fragments, cart_hash ) {
				var e = $.Event( 'storage' );

				e.originalEvent = {
					key: wc_cart_fragments_params.cart_hash_key,
				};

				$( '.responsive-woo-free-shipping' ).each(
					function ( i, obj ) {
						var spanSelect = $( obj ),
						content        = spanSelect.attr( 'data-content' ),
						rech_data      = spanSelect.attr( 'data-reach' );

						$.ajax(
							{
								type: 'post',
								dataType: 'json',
								url: woocommerce_params.ajax_url,
								data: {
									action: 'update_responsive_woo_free_shipping_left_shortcode',
									content: content,
									content_rech_data: rech_data
								},

								success: function ( response ) {
									spanSelect.html( '' );
									spanSelect.html( response );
								}
							}
						);
					}
				);

				$( window ).trigger( e );
			}
		);

	}
);