(function ($) {

	var single_product_gallery_nav = function( on_ready, skip_condition ) {
		$pg_wrap = $( ".responsive-product-gallery-layout-vertical" );

		if ( $pg_wrap.length > 0 ) {
			$pg_nav = $pg_wrap.find( '.flex-control-nav' );

			if ( $pg_nav.length > 0 ) {

				if ( $( window ).width() > 768 ) {

					if ( on_ready === true ) {

						$pg_view_ht = $pg_wrap.find( '.entry-summary' ).height();

						$pg_nav.css(
							{
								'max-height' : $pg_view_ht + 'px',
								'overflow-x' : 'hidden',
								'overflow-y' : 'auto',
								'paddine-right' : '2px',
							}
						);
					} else {

						$pg_view_ht = $pg_wrap.find( '.flex-viewport' ).height();
						$pg_nav_ht 	= $pg_wrap.find( '.flex-control-nav' ).height();

						if ( skip_condition === true || $pg_nav_ht > ( $pg_view_ht + 50 ) ) {
							$pg_nav.css(
								{
									'max-height' : $pg_view_ht + 'px',
									'overflow-x' : 'hidden',
									'overflow-y' : 'auto',
									'paddine-right' : '2px',
								}
							);
						}
					}
				} else {
					$pg_nav.css(
						{
							'max-height' : '',
							'overflow-x' : '',
							'overflow-y' : '',
							'paddine-right' : '',
						}
					)
				}
			}
		}
	}

	jQuery( document ).ready(
		function($){

			var in_customizer = false;

			// check for wp.customize return boolean
			if ( typeof wp !== 'undefined' ) {

				in_customizer = typeof wp.customize !== 'undefined' ? true : false;

				if ( in_customizer ) {
					jQuery( window ).trigger( 'resize' );
				}
			}

			var single_product_li_time;
			jQuery( '.responsive-product-gallery-layout-vertical .flex-control-nav li' ).on(
				'click',
				function(e) {
					clearTimeout( single_product_li_time );
					single_product_li_time = setTimeout(
						function() {
							single_product_gallery_nav( false, true );
						},
						500
					);
				}
			);
		}
	);

	jQuery( window ).on(
		'load',
		function(){
			single_product_gallery_nav();
		}
	);

	var single_product_gallery_time;

	jQuery( window ).on(
		'resize',
		function(){

			clearTimeout( single_product_gallery_time );
			single_product_gallery_time = setTimeout(
				function() {
					single_product_gallery_nav();
				},
				300
			);

		}
	);
})( jQuery );
