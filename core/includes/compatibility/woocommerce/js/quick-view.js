(function ($) {

	if ( typeof responsiveShopQuickView === 'undefined' ) {
		return;
	}

	ResponsiveProQuickView = {

		stick_add_to_cart          : responsiveShopQuickView.shop_quick_view_stick_cart,
		auto_popup_height_by_image : responsiveShopQuickView.shop_quick_view_auto_height,

		/**
		 * Init
		 */
		init: function () {
			this._add_classes();
			this._init_popup();
			this._bind();
		},
		_add_classes: function () {
			if (responsiveShopQuickView.shop_quick_view_enable == "on-image-click") {
				$( 'li.product' ).addClass( "responsive-qv-on-image-click" );
			} else if (responsiveShopQuickView.shop_quick_view_enable == "on-image") {
				$( 'li.product' ).addClass( "responsive-qv-on-image" );
			} else {
				$( 'li.product' ).addClass( "responsive-qv-after-summary" );
			}
		},
		_init_popup: function () {

			/**
			 * Set Max Height Width For Wrappers.
			 */
			$( '#responsive-quick-view-content,#responsive-quick-view-content div.product' ).css(
				{
					'max-width'  : parseFloat( $( window ).width() ) - 120,
					'max-height' : parseFloat( $( window ).height() ) - 120
				}
			);

			/**
			 * Remove HREF from the links.
			 */
			var on_img_click_els = $( '.responsive-qv-on-image-click .woocommerce-LoopProduct-link' );
			if ( on_img_click_els.length > 0 ) {
				on_img_click_els.each(
					function (e) {
						$( this ).attr( 'href', 'javascript:void(0)' );
					}
				);
			}
		},

		/**
		 * Binds events
		 */
		_bind: function () {
			// Open Quick View.
			$( document ).off( 'click', '.responsive-quick-view-button, .responsive-quick-view-text, .responsive-qv-on-image-click .woocommerce-LoopProduct-link' ).on( 'click', '.responsive-quick-view-button, .responsive-quick-view-text, .responsive-qv-on-image-click .woocommerce-LoopProduct-link', ResponsiveProQuickView._open_quick_view );

			// Close Quick View.
			$( document ).on( 'click', '#responsive-quick-view-close', ResponsiveProQuickView._close_quick_view );
			$( document ).on( 'click', '.responsive-content-main-wrapper', ResponsiveProQuickView._close_quick_view_on_overlay_click );
			$( document ).on( 'keyup', ResponsiveProQuickView._close_quick_view_on_esc_keypress );
			$( document ).on( 'added_to_cart', ResponsiveProQuickView._close_quick_view );
		},

		/**
		 * Open Quick View.
		 *
		 * @param  {[type]} e [description]
		 * @return {[type]}   [description]
		 */
		_open_quick_view: function ( e ) {
			e.preventDefault();

			var self       	  = $( this ),
				wrap 		  = self.closest( 'li.product' ),
				quick_view    = $( document ).find( '#responsive-quick-view-modal' ),
				quick_view_bg = $( document ).find( '.responsive-quick-view-bg' );

			var product_id = self.data( 'product_id' );
			if ( wrap.hasClass( 'responsive-qv-on-image-click' )  ) {
				product_id = wrap.find( '.responsive-quick-view-data' ).data( 'product_id' );

			}

			if ( ! quick_view.hasClass( 'loading' ) ) {
				quick_view.addClass( 'loading' );
			}
			if ( ! quick_view_bg.hasClass( 'responsive-quick-view-bg-ready' ) ) {
				quick_view_bg.addClass( 'responsive-quick-view-bg-ready' );
			}

			// stop loader
			$( document ).trigger( 'responsive_quick_view_loading' );
			$.ajax(
				{
					url        : responsiveShopQuickView.ajax_url,
					type       : 'POST',
					dataType   : 'html',
					data       : {
						action     : 'responsive_load_product_quick_view',
						product_id : product_id,
						nonce: responsiveShopQuickView.nonce
					},
					success: function (data) {
						$( document ).find( '#responsive-quick-view-modal' ).find( '#responsive-quick-view-content' ).html( data );
						ResponsiveProQuickView._after_markup_append_process();
					}
				}
			);
		},

		/**
		 * Auto set height to the content.
		 */
		_after_markup_append_process: function () {

			var quick_view 		   = $( document ).find( '#responsive-quick-view-modal' ),
				quick_view_content = quick_view.find( '#responsive-quick-view-content' ),
				form_variation     = quick_view_content.find( '.variations_form' );

			if ( ! quick_view.hasClass( 'open' ) ) {

				var modal_height  = quick_view_content.outerHeight(),
					window_height = $( window ).height(),
					$html 		  = $( 'html' );

				if ( modal_height > window_height ) {
					$html.css( 'margin-right', ReponsiveProQuickView._get_scrollbar_width() );
				} else {
					$html.css( 'margin-right', '' );
					$html.find( '.responsive-sticky-active, .responsive-header-sticky-active, .responsive-custom-footer' ).css( 'max-width', '100%' );
				}

				$html.addClass( 'responsive-quick-view-is-open' );
			}

			// Initialize variable form.
			if ( form_variation.length > 0 ) {

				// Trigger variation form actions.
				form_variation.trigger( 'check_variations' );
				form_variation.trigger( 'reset_image' );

				// Trigger variation form.
				form_variation.wc_variation_form();
				form_variation.find( 'select' ).change();
			}

			// Initialize flex slider.
			var image_slider_wrap = quick_view.find( '.responsive-qv-image-slider' );
			if ( image_slider_wrap.find( 'li' ).length > 1 ) {
				image_slider_wrap.flexslider();
			}

			setTimeout(
				function () {
					ResponsiveProQuickView._auto_set_content_height_by_image();

					// Add popup open class.
					quick_view.removeClass( 'loading' ).addClass( 'open' );
					$( '.responsive-quick-view-bg' ).addClass( 'open' );
				},
				100
			);

			// stop loader
			$( document ).trigger( 'responsive_quick_view_loader_stop' );
		},

		/**
		 * Auto set height to the content depends on the option.
		 *
		 * @return {[type]} [description]
		 */
		_auto_set_content_height_by_image: function () {

			$( '#responsive-quick-view-modal' ).imagesLoaded()
			.always(
				function ( instance ) {

					var quick_view     = $( document ).find( '#responsive-quick-view-modal' );
					image_height       = quick_view.find( '.woocommerce-product-gallery__image img' ).outerHeight(),
					summary            = quick_view.find( '.product .summary.entry-summary' ),
					content            = summary.css( 'content' ),
					summary_content_ht = quick_view.find( '.summary-content' ).outerHeight();

					// No Image.
					var featured_image = quick_view.find( '.woocommerce-product-gallery__image img, .responsive-qv-slides img' );

					/**
					 * Auto height to the content as per image height.
					 *
					 * @param  {[type]} ResponsiveProQuickView.auto_popup_height_by_image [description]
					 * @return {[type]}                                              [description]
					 */
					var popup_height = parseFloat( $( window ).height() ) - 120,
					image_height     = parseFloat( image_height );

					if ( ResponsiveProQuickView.auto_popup_height_by_image ) {
						if ( featured_image.length ) {

							// If image height is less then popup/window height the set max height of `image` to the summery.
							if ( image_height < popup_height ) {
									summary.css( 'max-height', parseFloat( image_height ) );

									// Or set the popup/window height.
							} else {
								summary.css( 'max-height', popup_height );
							}
						} else {
							summary.css( 'width', '100%' );
						}
					} else {
						summary.css( 'max-height', parseFloat( popup_height ) );
					}

					/**
					 * Stick the Add to Cart Box.
					 *
					 * @param  {[type]} ResponsiveProQuickView.stick_add_to_cart [description]
					 * @return {[type]}                                     [description]
					 */
					if ( ResponsiveProQuickView.stick_add_to_cart ) {

						quick_view.addClass( 'stick-add-to-cart' );

						var cart_height    = quick_view.find( '.cart' ).outerHeight();
						var summery_height = parseFloat( popup_height ) - parseFloat( cart_height );

						// Reset the summery height:
						// If Image height is large than the stick cart form
						// Then calculate the sticky cart height and set the summery.
						if ( image_height > cart_height ) {

							// Stick Class.
							quick_view.find( '.cart' ).addClass( 'stick' );

							// Recalculate the outer heights,
							// Because, These are change after adding `stick` class to the form.
							var popup_height   = $( '#responsive-quick-view-content' ).outerHeight();
							var cart_height    = quick_view.find( '.cart' ).outerHeight();
							var summery_height = parseFloat( popup_height ) - parseFloat( cart_height );

							summary.css( 'max-height', parseFloat( summery_height ) );

						} else {

							// If image height is less then popup/window height the set max height of `image` to the summery.
							if ( popup_height > summery_height ) {
									summary.css( 'max-height', parseFloat( popup_height ) );
							} else {
									summary.css( 'max-height', '' );
							}
						}
					}
				}
			);

		},

		/**
		 * Close box with esc key.
		 *
		 * @param  {[type]} e [description]
		 * @return {[type]}   [description]
		 */
		_close_quick_view_on_esc_keypress: function ( e ) {
			e.preventDefault();
			if ( e.keyCode === 27 ) {
				ResponsiveProQuickView._close_quick_view();
			}
		},

		/**
		 * Close Quick View.
		 *
		 * @param  {[type]} e [description]
		 * @return {[type]}   [description]
		 */
		_close_quick_view: function ( e ) {

			if ( e ) {
				e.preventDefault();
			}

			$( document ).find( '.responsive-quick-view-bg' ).removeClass( 'responsive-quick-view-bg-ready' );
			$( document ).find( '#responsive-quick-view-modal' ).removeClass( 'open' ).removeClass( 'loading' );
			$( '.responsive-quick-view-bg' ).removeClass( 'open' );
			$( 'html' ).removeClass( 'responsive-quick-view-is-open' );
			$( 'html' ).css( 'margin-right', '' );

			setTimeout(
				function () {
					$( document ).find( '#responsive-quick-view-modal' ).find( '#responsive-quick-view-content' ).html( '' );
				},
				600
			);
		},

		/**
		 * Close box by click overlay.
		 *
		 * @param  {[type]} e [description]
		 * @return {[type]}   [description]
		 */
		_close_quick_view_on_overlay_click: function ( e ) {
			if ( this === e.target ) {
				ResponsiveProQuickView._close_quick_view();
			}
		},

		/**
		 * Get Scrollbar Width
		 *
		 * @return {[type]} [description]
		 */
		_get_scrollbar_width: function () {
			// Append our div, do our calculation and then remove it.
			var div = $( '<div style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"><div style="height:100px;"></div>' );
			$( 'body' ).append( div );
			var w1 = $( 'div', div ).innerWidth();
			div.css( 'overflow-y', 'scroll' );
			var w2 = $( 'div', div ).innerWidth();
			$( div ).remove();

			return (w1 - w2);
		}

	};

	/**
	 * Initialization
	 */
	$(
		function () {
			ResponsiveProQuickView.init();
		}
	);

})( jQuery );

jQuery(
	function ($) {
		// Update data-quantity
		$( document.body ).on(
			'click input',
			'input.qty',
			function () {
				$( this ).parent().parent().find( 'a.ajax_add_to_cart' ).attr( 'data-quantity', $( this ).val() );
				$( ".added_to_cart" ).remove(); // Optional: Removing other previous "view cart" buttons
			}
		).on(
			'click',
			'.add_to_cart_button',
			function () {
				var button = $( this );
				setTimeout(
					function () {
						button.parent().find( '.quantity > input.qty' ).val( 1 ); // reset quantity to 1
					},
					1000
				); // After 1 second

			}
		);
	}
);