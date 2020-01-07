(function ($) {

	var total 			    = parseInt( responsiveShopPaginationInfinite.shop_infinite_total ) || '',
		count               = parseInt( responsiveShopPaginationInfinite.shop_infinite_count ) || '',
		ajax_url            = responsiveShopPaginationInfinite.ajax_url || '',
		shop_infinite_nonce = responsiveShopPaginationInfinite.shop_infinite_nonce || '',
		pagination          = responsiveShopPaginationInfinite.shop_pagination || '',
		loadStatus          = true,
		infinite_event      = responsiveShopPaginationInfinite.shop_infinite_scroll_event || '',
		loader              = jQuery('.responsive-shop-pagination-infinite .responsive-loader');

	//	Is 'infinite' pagination?
	if( typeof pagination != '' && pagination == 'infinite' ) {

		var in_customizer = false;

		// check for wp.customize return boolean
		if ( typeof wp !== 'undefined' ) {

			in_customizer =  typeof wp.customize !== 'undefined' ? true : false;

			if ( in_customizer ) {
				return;
			}
		}

		if(	typeof infinite_event != '' ) {
			switch( infinite_event ) {
				case 'click':
					$('.responsive-load-more').click(function(event) {
						event.preventDefault();
						//	For Click
						if( count != 'undefined' && count != ''&& total != 'undefined' && total != '' ) {
							if ( count > total )
								return false;
							NextloadArticles(count);
							count++;
						}
					});

					break;

				case 'scroll':
					$('.responsive-load-more').hide();

					if( $('#content-woocommerce').find('.product:last').length > 0 ) {

						var windowHeight50 = jQuery(window).outerHeight() / 1.25;
						$(window).scroll(function () {

							if( ( $(window).scrollTop() + windowHeight50 ) >= ( $('#content-woocommerce').find('.product:last').offset().top ) ) {
								if (count > total) {
									return false;
								} else {

									//	Pause for the moment ( execute if post loaded )
									if( loadStatus == true ) {

										NextloadArticles(count);
										count++;
										loadStatus = false;
									}
								}
							}
						});
					}

					break;
			}
		}

		/**
		 * Append Posts via AJAX
		 *
		 * Perform masonry operations.
		 */
		function NextloadArticles(pageNumber) {

			$('.responsive-load-more').removeClass('.active').hide();
			loader.show();

			var data = {
				action : 'responsive_shop_pagination_infinite',
				page_no	: pageNumber,
				nonce: shop_infinite_nonce,
				query_vars: responsiveShopPaginationInfinite.query_vars,

			}
			$.post(
				ajax_url,
				data,
				function( data ) {
					var boxes = $( data );
					// Hide loader.
					loader.hide();
					$( '.responsive-load-more' ).addClass( 'active' ).show();

					// Add posts.
					$( '#content-outer > #content-woocommerce ul.products' ).append( boxes );

					var msg = responsiveShopPaginationInfinite.shop_no_more_product_message || '';
					// Display no more post message.
					if ( count > total ) {
						$( '.responsive-shop-pagination-infinite' ).html( '<span class="responsive-load-more no-more active" style="display: inline-block;">' + msg + "</span>" );
					}

					// Complete the process.
					loadStatus = true;
				}
			);
		}
	}

})(jQuery);
