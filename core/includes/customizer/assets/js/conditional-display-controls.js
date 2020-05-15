/** This js file handles conditional display of customizer controls
 *
 * @package Responsive
 * */

( function( $ ) {
	var api = wp.customize;
	api(
		'responsive_header_layout',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'horizontal':
							api.control( 'responsive_header_alignment' ).toggle( false );
							api.control( 'responsive_header_menu_full_width' ).toggle( false );
							api.control( 'responsive_header_menu_background_color' ).toggle( false );
							api.control( 'responsive_header_menu_border_color' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'vertical':
							api.control( 'responsive_header_alignment' ).toggle( true );
							api.control( 'responsive_header_menu_full_width' ).toggle( true );
							api.control( 'responsive_header_menu_background_color' ).toggle( true );
							api.control( 'responsive_header_menu_border_color' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		'responsive_mobile_header_layout',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'horizontal':
							api.control( 'responsive_mobile_header_alignment' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'vertical':
							api.control( 'responsive_mobile_header_alignment' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		'responsive_width',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'full-width':
							api.control( 'responsive_container_width' ).toggle( false );
							api.control( 'responsive_footer_full_width' ).toggle( false );
							api.control( 'responsive_header_full_width' ).toggle( false );
							api.control( 'responsive_inline_logo_site_title' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'contained':
							api.control( 'responsive_container_width' ).toggle( true );
							api.control( 'responsive_footer_full_width' ).toggle( true );
							api.control( 'responsive_header_full_width' ).toggle( true );
							api.control( 'responsive_inline_logo_site_title' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		'responsive_style',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'flat':
							api.control( 'responsive_box_padding' ).toggle( false );
							api.control( 'responsive_box_radius' ).toggle( false );
							api.control( 'responsive_box_background_color' ).toggle( false );

							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'boxed':
						case 'content-boxed':
							api.control( 'responsive_box_padding' ).toggle( true );
							api.control( 'responsive_box_radius' ).toggle( true );
							api.control( 'responsive_box_background_color' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		'responsive_enable_header_widget',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case false:
							api.control( 'responsive_header_widget_position' ).toggle( false );
							api.control( 'responsive_header_widget_alignment' ).toggle( false );
							api.control( 'responsive_header_widget_color_separator' ).toggle( false );
							api.control( 'responsive_header_widget_text_color' ).toggle( false );
							api.control( 'responsive_header_widget_background_color' ).toggle( false );
							api.control( 'responsive_header_widget_border_color' ).toggle( false );
							api.control( 'responsive_header_widget_link_color' ).toggle( false );
							api.control( 'responsive_header_widget_link_hover_color' ).toggle( false );

							break;
						/**
						 * The select was switched to »show«.
						 */
						case true:
							api.control( 'responsive_header_widget_position' ).toggle( true );
							api.control( 'responsive_header_widget_alignment' ).toggle( true );
							api.control( 'responsive_header_widget_color_separator' ).toggle( true );
							api.control( 'responsive_header_widget_text_color' ).toggle( true );
							api.control( 'responsive_header_widget_background_color' ).toggle( true );
							api.control( 'responsive_header_widget_border_color' ).toggle( true );
							api.control( 'responsive_header_widget_link_color' ).toggle( true );
							api.control( 'responsive_header_widget_link_hover_color' ).toggle( true );

							break;
					}
				}
			);
		}
	);

	api(
		'responsive_disable_mobile_menu',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case false:
							api.control( 'responsive_mobile_menu_breakpoint' ).toggle( false );
							api.control( 'responsive_mobile_menu_style' ).toggle( false );

							break;
						/**
						 * The select was switched to »show«.
						 */
						case true:
							api.control( 'responsive_mobile_menu_breakpoint' ).toggle( true );
							api.control( 'responsive_mobile_menu_style' ).toggle( true );

							break;
					}
				}
			);
		}
	);

	api(
		'responsive_mobile_menu_style',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'dropdown':
						case 'fullscreen':
							api.control( 'responsive_sidebar_menu_alignment' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'sidebar':
							api.control( 'responsive_sidebar_menu_alignment' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		"responsive_theme_options['breadcrumb']",
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case true:
							api.control( 'responsive_breadcrumb_position' ).toggle( false );
							api.control( 'responsive_breadcrumb_color' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case false:
							api.control( 'responsive_breadcrumb_position' ).toggle( true );
							api.control( 'responsive_breadcrumb_color' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	api(
		"responsive_blog_entry_columns",
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					if (newval < 1) {
						api.control( 'responsive_blog_entry_display_masonry' ).toggle( false );
					} else {
						api.control( 'responsive_blog_entry_display_masonry' ).toggle( true );
					}
				}
			);
		}
	);

	api(
		"responsive_blog_entry_content_type",
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'content':
							api.control( 'responsive_excerpt_length' ).toggle( false );
							api.control( 'responsive_blog_read_more_text' ).toggle( false );
							api.control( 'responsive_blog_entry_read_more_type' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'excerpt':
							api.control( 'responsive_excerpt_length' ).toggle( true );
							api.control( 'responsive_blog_read_more_text' ).toggle( true );
							api.control( 'responsive_blog_entry_read_more_type' ).toggle( true );
							break;
					}
				}
			);
		}
	);

})( jQuery );
