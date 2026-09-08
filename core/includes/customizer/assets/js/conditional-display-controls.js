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
							// api.control( 'responsive_footer_full_width' ).toggle( false );
							api.control( 'responsive_header_full_width' ).toggle( false );
							api.control( 'responsive_inline_logo_site_title' ).toggle( false );
							break;
						/**
						 * The select was switched to »show«.
						 */
						case 'contained':
							// api.control( 'responsive_footer_full_width' ).toggle( true );
							api.control( 'responsive_header_full_width' ).toggle( true );
							api.control( 'responsive_inline_logo_site_title' ).toggle( true );
							break;
						case 'narrow':
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
	api( 'responsive_disable_author_meta', function( setting ) {
		setting.bind( function( disabled ) {
			const show = ! disabled;
			[ 'responsive_post_author_box_style', 'responsive_responsive_disable_author_meta_separator' ].forEach( function( id ) {
				api.control( id, function( control ) {
					control.toggle( show );
				} );
			} );
		} );
	} );

	api(
		'responsive_sidebar_link_style',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					var showHoverBg = ( 'hover-background' === newval );
					if ( api.control( 'responsive_sidebar_link_hover_bg_color' ) ) {
						api.control( 'responsive_sidebar_link_hover_bg_color' ).toggle( showHoverBg );
					}
					if ( api.control( 'responsive_sidebar_link_hover_bg_separator' ) ) {
						api.control( 'responsive_sidebar_link_hover_bg_separator' ).toggle( showHoverBg );
					}
				}
			);
		}
	);

 
	// Button presets
	function toggleButtonBackgroundColor( presetVal ) {
		var showBgColor = !( presetVal && presetVal.indexOf( 'outline' ) === 0 );
		if ( api.control( 'responsive_button_color' ) ) {
			api.control( 'responsive_button_color' ).toggle( showBgColor );
		}
		if ( api.control( 'responsive_button_background_image' ) ) {
			api.control( 'responsive_button_background_image' ).toggle( showBgColor );
		}
	}

	api.bind( 'ready', function() {
		if ( api( 'responsive_button_presets' ) ) {
			toggleButtonBackgroundColor( api( 'responsive_button_presets' ).get() );
		}
	} );

	api(
		'responsive_button_presets',
		function( $swipe ) {
			$swipe.bind(
				function( newval ) {
					toggleButtonBackgroundColor( newval );
				}
			);
		}
	);

function toggleRelatedPostsLocation( placement ) {
	var show = ( 'contained' === placement );
	var styleId = 'responsive-rp-location-visibility';

	jQuery( '#' + styleId ).remove();

	if ( ! show ) {
		jQuery( 'head' ).append(
			'<style id="' + styleId + '">' +
			'#customize-control-responsive_single_blog_related_posts_location { display: none !important; }' +
			'</style>'
		);
	}
}

api.bind( 'ready', function() {
	if ( api( 'responsive_single_blog_related_posts_section_placement' ) ) {
		toggleRelatedPostsLocation( api( 'responsive_single_blog_related_posts_section_placement' ).get() );
	}
} );

api(
	'responsive_single_blog_related_posts_section_placement',
	function( $swipe ) {
		$swipe.bind( function( newval ) {
			toggleRelatedPostsLocation( newval );
		} );
	}
);
	api( 'responsive_breadcrumb_position', function( setting ) {
		setting.bind( function( newval ) {
			// Note: 'responsive_page_single_elements_positioning' is intentionally excluded here -
			// it is owned by syncBreadcrumbSortable() in breadcrumb-toggle.js, which also
			// respects the per-post-type "Enable on Single Page" toggle (this listener does not).
			var elementsSettings = [
				'responsive_blog_title_elements_positioning',
				'responsive_blog_single_elements_positioning'
			];

			elementsSettings.forEach( function( settingId ) {
				if ( api.has( settingId ) ) {
					var settingControl = api( settingId );
					var currentArr = settingControl.get();
					
					var ul = $( '#customize-control-' + settingId + ' ul.sortable' );
					if ( ul.length ) {
						var breadcrumbLi = ul.find( 'li[data-value="breadcrumb"]' );
						if ( breadcrumbLi.length ) {
							breadcrumbLi.detach();
							if ( 'before' === newval ) {
								ul.prepend( breadcrumbLi );
							} else if ( 'after' === newval ) {
								var titleLi = ul.find( 'li[data-value="title"]' );
								if ( titleLi.length ) {
									titleLi.after( breadcrumbLi );
								} else {
									ul.append( breadcrumbLi );
								}
							}
							
							var newArr = [];
							ul.find('li').each(function() {
								if (!$(this).is('.invisible')) {
									newArr.push($(this).data('value'));
								}
							});
							settingControl.set( newArr );
						}
					} else if ( Array.isArray( currentArr ) ) {
						var newArr = currentArr.slice();
						var breadcrumbIndex = newArr.indexOf( 'breadcrumb' );
						
						if ( breadcrumbIndex !== -1 ) {
							newArr.splice( breadcrumbIndex, 1 );
						}
						
						if ( 'before' === newval ) {
							newArr.unshift( 'breadcrumb' );
						} else if ( 'after' === newval ) {
							var titleIndex = newArr.indexOf( 'title' );
							if ( titleIndex !== -1 ) {
								newArr.splice( titleIndex + 1, 0, 'breadcrumb' );
							} else {
								newArr.push( 'breadcrumb' );
							}
						}
						
						settingControl.set( newArr );
					}
				}
			} );
		} );
	} );

	api( 'responsive_theme_options[breadcrumb]', function( setting ) {
		setting.bind( function( isEnabled ) {
			// Note: 'responsive_page_single_elements_positioning' is intentionally excluded here -
			// it is owned by syncBreadcrumbSortable() in breadcrumb-toggle.js, which also
			// respects the per-post-type "Enable on Single Page" toggle (this listener does not).
			var elementsSettings = [
				'responsive_blog_title_elements_positioning',
				'responsive_blog_single_elements_positioning'
			];

			var position = api.has( 'responsive_breadcrumb_position' ) ? api( 'responsive_breadcrumb_position' ).get() : 'before';

			elementsSettings.forEach( function( settingId ) {
				if ( api.has( settingId ) ) {
					var settingControl = api( settingId );
					var currentArr = settingControl.get();
					
					var ul = $( '#customize-control-' + settingId + ' ul.sortable' );
					if ( ul.length ) {
						var breadcrumbLi = ul.find( 'li[data-value="breadcrumb"]' );
						if ( breadcrumbLi.length ) {
							breadcrumbLi.detach();
							var showBreadcrumb = ( isEnabled && '0' !== String(isEnabled) && 'false' !== String(isEnabled) );
							if ( showBreadcrumb ) {
								breadcrumbLi.removeClass( 'invisible' );
								breadcrumbLi.find( '.visibility-icon' ).removeClass( 'dashicons-hidden' ).addClass( 'dashicons-visibility' );
								
								if ( 'before' === position ) {
									ul.prepend( breadcrumbLi );
								} else if ( 'after' === position ) {
									var titleLi = ul.find( 'li[data-value="title"]' );
									if ( titleLi.length ) {
										titleLi.after( breadcrumbLi );
									} else {
										ul.append( breadcrumbLi );
									}
								}
							} else {
								breadcrumbLi.addClass( 'invisible' );
								breadcrumbLi.find( '.visibility-icon' ).removeClass( 'dashicons-visibility' ).addClass( 'dashicons-hidden' );
								ul.append( breadcrumbLi );
							}
							
							var newArr = [];
							ul.find('li').each(function() {
								if (!$(this).is('.invisible')) {
									newArr.push($(this).data('value'));
								}
							});
							settingControl.set( newArr );
						}
					} else if ( Array.isArray( currentArr ) ) {
						var newArr = currentArr.slice();
						var breadcrumbIndex = newArr.indexOf( 'breadcrumb' );
						
						if ( breadcrumbIndex !== -1 ) {
							newArr.splice( breadcrumbIndex, 1 );
						}
						
						var showBreadcrumb = ( isEnabled && '0' !== String(isEnabled) && 'false' !== String(isEnabled) );
						if ( showBreadcrumb ) {
							if ( 'before' === position ) {
								newArr.unshift( 'breadcrumb' );
							} else if ( 'after' === position ) {
								var titleIndex = newArr.indexOf( 'title' );
								if ( titleIndex !== -1 ) {
									newArr.splice( titleIndex + 1, 0, 'breadcrumb' );
								} else {
									newArr.push( 'breadcrumb' );
								}
							}
						}
						
						settingControl.set( newArr );
					}
				}
			} );
		} );
	} );

})( jQuery );
