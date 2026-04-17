/** This js file handles conditional display of customizer controls
 *
 * @package Responsive
 * */

( function( $ ) {
	var api = wp.customize;
	// api(
	// 	'responsive_header_layout',
	// 	function( $swipe ) {
	// 		$swipe.bind(
	// 			function( newval ) {
	// 				switch (newval) {
	// 					case 'horizontal':
	// 						api.control( 'responsive_header_alignment' ).toggle( false );
	// 						api.control( 'responsive_header_menu_full_width' ).toggle( false );
	// 						api.control( 'responsive_header_menu_background_color' ).toggle( false );
	// 						api.control( 'responsive_header_menu_border_color' ).toggle( false );
	// 						break;
	// 					/**
	// 					 * The select was switched to »show«.
	// 					 */
	// 					case 'vertical':
	// 						api.control( 'responsive_header_alignment' ).toggle( true );
	// 						api.control( 'responsive_header_menu_full_width' ).toggle( true );
	// 						api.control( 'responsive_header_menu_background_color' ).toggle( true );
	// 						api.control( 'responsive_header_menu_border_color' ).toggle( true );
	// 						break;
	// 				}
	// 			}
	// 		);
	// 	}
	// );

	// api(
	// 	'responsive_mobile_header_layout',
	// 	function( $swipe ) {
	// 		$swipe.bind(
	// 			function( newval ) {
	// 				switch (newval) {
	// 					case 'horizontal':
	// 						api.control( 'responsive_mobile_header_alignment' ).toggle( false );
	// 						break;
	// 					/**
	// 					 * The select was switched to »show«.
	// 					 */
	// 					case 'vertical':
	// 						api.control( 'responsive_mobile_header_alignment' ).toggle( true );
	// 						break;
	// 				}
	// 			}
	// 		);
	// 	}
	// );

	api(
		'responsive_width',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					switch (newval) {
						case 'full-width':
							api.control( 'responsive_container_width' ).toggle( false );
							// api.control( 'responsive_footer_full_width' ).toggle( false );
							api.control( 'responsive_header_full_width' ).toggle( false );
							api.control( 'responsive_inline_logo_site_title' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'contained':
							api.control( 'responsive_container_width' ).toggle( true );
							// api.control( 'responsive_footer_full_width' ).toggle( true );
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
							api.control( 'responsive_border_box' ).toggle( false );
							api.control( 'responsive_box_background_color' ).toggle( false );
							api.control( 'responsive_outside_container_padding' ).toggle( false );
							api.control( 'responsive_container_spacing' ).toggle( false );

							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'boxed':
						case 'content-boxed':
							api.control( 'responsive_box_padding' ).toggle( true );
							api.control( 'responsive_border_box' ).toggle( true );
							api.control( 'responsive_box_background_color' ).toggle( true );
							api.control( 'responsive_outside_container_padding' ).toggle( true );
							api.control( 'responsive_container_spacing' ).toggle( true );
							break;
					}
				}
			);
		}
	);

	// api(
	// 	'responsive_enable_header_widget',
	// 	function( $swipe ) {
	// 		$swipe.bind(
	// 			function( newval ) {
	// 				switch (newval) {
	// 					case false:
	// 						api.control( 'responsive_header_widget_position' ).toggle( false );
	// 						api.control( 'responsive_header_widget_alignment' ).toggle( false );
	// 						api.control( 'responsive_header_widget_color_separator' ).toggle( false );
	// 						api.control( 'responsive_header_widget_text_color' ).toggle( false );
	// 						api.control( 'responsive_header_widget_background_color' ).toggle( false );
	// 						api.control( 'responsive_header_widget_border_color' ).toggle( false );
	// 						api.control( 'responsive_header_widget_link_color' ).toggle( false );
	// 						api.control( 'responsive_header_widget_link_hover_color' ).toggle( false );

	// 						break;
	// 					/**
	// 					 * The select was switched to »show«.
	// 					 */
	// 					case true:
	// 						api.control( 'responsive_header_widget_position' ).toggle( true );
	// 						api.control( 'responsive_header_widget_alignment' ).toggle( true );
	// 						api.control( 'responsive_header_widget_color_separator' ).toggle( true );
	// 						api.control( 'responsive_header_widget_text_color' ).toggle( true );
	// 						api.control( 'responsive_header_widget_background_color' ).toggle( true );
	// 						api.control( 'responsive_header_widget_border_color' ).toggle( true );
	// 						api.control( 'responsive_header_widget_link_color' ).toggle( true );
	// 						api.control( 'responsive_header_widget_link_hover_color' ).toggle( true );

	// 						break;
	// 				}
	// 			}
	// 		);
	// 	}
	// );

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

	// Blog / Archive: Main Content Width only when resolved layout has no sidebar (matches responsive_not_active_blog_archive_sidebar() in PHP).
	function responsiveBlogArchiveResolvedSidebar() {
		var blog = api( 'responsive_blog_sidebar_position' ).get();
		var globalPos = api( 'responsive_default_sidebar_position' ).get();
		if ( 'global' === blog || 'default' === blog ) {
			return globalPos;
		}
		return blog;
	}
	function toggleBlogArchiveMainContentWidthBySidebar() {
		var show = ( 'no' === responsiveBlogArchiveResolvedSidebar() );
		[ 'responsive_blog_content_width', 'responsive_blog_entry_display_masonry_separator' ].forEach( function( controlId ) {
			var ctrl = api.control( controlId );
			if ( ctrl ) {
				ctrl.toggle( show );
			}
		} );
	}
	api.bind( 'ready', function() {
		toggleBlogArchiveMainContentWidthBySidebar();
	} );
	api( 'responsive_blog_sidebar_position', function( setting ) {
		setting.bind( function() {
			toggleBlogArchiveMainContentWidthBySidebar();
		} );
	} );
	api( 'responsive_default_sidebar_position', function( setting ) {
		setting.bind( function() {
			toggleBlogArchiveMainContentWidthBySidebar();
		} );
	} );

	// WooCommerce: Main Content Width only when resolved layout has no sidebar.
	function responsiveWooResolvedSidebar( contextSettingId ) {
		var pos = api( contextSettingId ) ? api( contextSettingId ).get() : 'global';
		var globalPos = api( 'responsive_default_sidebar_position' ) ? api( 'responsive_default_sidebar_position' ).get() : 'no';
		if ( 'global' === pos || 'default' === pos ) {
			return globalPos;
		}
		return pos;
	}
	function toggleWooMainContentWidthBySidebar( contextSettingId, controlIds ) {
		var show = ( 'no' === responsiveWooResolvedSidebar( contextSettingId ) );
		( controlIds || [] ).forEach( function( controlId ) {
			var ctrl = api.control( controlId );
			if ( ctrl ) {
				ctrl.toggle( show );
			}
		} );
	}
	function toggleWooShopMainContentWidthBySidebar() {
		toggleWooMainContentWidthBySidebar( 'responsive_shop_sidebar_position', [
			'responsive_shop_layout_elements_separator',
			'responsive_shop_content_width',
		] );
	}
	function toggleWooSingleProductMainContentWidthBySidebar() {
		toggleWooMainContentWidthBySidebar( 'responsive_single_product_sidebar_position', [
			'responsive_single_product_layout_elements_separator',
			'responsive_single_product_content_width',
		] );
	}

	api.bind( 'ready', function() {
		toggleWooShopMainContentWidthBySidebar();
		toggleWooSingleProductMainContentWidthBySidebar();
	} );
	api( 'responsive_shop_sidebar_position', function( setting ) {
		setting.bind( function() {
			toggleWooShopMainContentWidthBySidebar();
		} );
	} );
	api( 'responsive_single_product_sidebar_position', function( setting ) {
		setting.bind( function() {
			toggleWooSingleProductMainContentWidthBySidebar();
		} );
	} );
	api( 'responsive_default_sidebar_position', function( setting ) {
		setting.bind( function() {
			toggleWooShopMainContentWidthBySidebar();
			toggleWooSingleProductMainContentWidthBySidebar();
		} );
	} );

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
