/** This js file handles conditional display of customizer controls
 *
 * @package Responsive
 * */

 ( function( $ ) {
	var api = wp.customize;
	//for style.
	api(
		'lifterlms_style',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'flat':
							api.control( 'lifterlms_box_padding' ).toggle( false );
							api.control( 'lifterlms_box_radius' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'boxed':
						case 'content-boxed':
							api.control( 'lifterlms_box_padding' ).toggle( true );
							api.control( 'lifterlms_box_radius' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	//for width.
	api(
		'lifterlms_width',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'full-width':
							api.control( 'lifterlms_container_width' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'contained':
							api.control( 'lifterlms_container_width' ).toggle( true );
							break;
					}
				}
			);
		}
	);


})( jQuery );
