( function( $ ) {
	var	$body = $( 'body' ),
		$window = $( window );
	/**
	 * API on ready event handlers
	 *
	 * All handlers need to be inside the 'ready' state.
	 */
	wp.customize.bind( 'ready', function() {

		// Track current device type.
		let currentDevice = 'desktop';

		var resizePreviewer = function() {
			var $section = $('.control-section.responsive-builder-active');
			var $footer = $('.control-section.responsive-footer-builder-active');
			var isResponsiveBuilderActive = $body.hasClass('responsive-header-builder-is-active');
			var isFooterBuilderActive = $body.hasClass('responsive-footer-builder-is-active');
			var previewerContainer = wp.customize.previewer.container;
			var customizerPanelWidth = $( '#customize-sidebar-outer-content' ).width();

			if (isResponsiveBuilderActive || isFooterBuilderActive) {
				setTimeout(function() {
					if (isFooterBuilderActive && $footer.length && !$footer.hasClass('responsive-hfb-builder-hide')) {
						previewerContainer.css('bottom', $footer.outerHeight() + 'px');
					} else if (isResponsiveBuilderActive && $section.length && !$section.hasClass('responsive-hfb-builder-hide')) {
						previewerContainer.css('bottom', $section.outerHeight() + 'px');
					} else {
						previewerContainer.css('bottom', '');
					}
				}, 100);
			} else {
				previewerContainer.css('bottom', '');
			}

			if( customizerPanelWidth ) {
				$( '#sub-accordion-section-responsive_header_builder' ).css( 'left', customizerPanelWidth + 'px' );
				$( '#sub-accordion-section-responsive_footer_builder' ).css( 'left', customizerPanelWidth + 'px' );
			}
		};
		
		// Bind events
		$window.on('resize', resizePreviewer);

		wp.customize.previewedDevice.bind(function(device) {
			currentDevice = device;
			console.log("Current device changed to: ", currentDevice);
			setTimeout(resizePreviewer, 100);
		});


		/**
		 * Init Header & Footer Builder
		 */
		var initHeaderBuilderPanel = function( panel ) {
			var section =  wp.customize.section( 'responsive_header_builder' );
			if ( section ) {
				var $section = section.contentContainer,
				section_layout =  wp.customize.section( 'responsive_header_builder_section' );
				console.log("Section is found: ", section);
				console.log("Section layout is: ", section_layout);
				// If Header panel is expanded, add class to the body tag (for CSS styling).
				panel.expanded.bind(function( isExpanded ) {
					_.each(section.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve();
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});
					
					if ( isExpanded ) {
						console.log("expanded ...");
						$body.addClass( 'responsive-header-builder-is-active' );
						if(currentDevice === 'desktop') 
						$section.addClass( 'responsive-builder-active' );
						else if(currentDevice === 'tablet' || currentDevice === 'mobile') {
							$section.addClass( 'responsive-mobile-tablet-builder-active' );
						}
						$section.css('display', 'none').height();
						$section.css('display', 'block');
					} else {
						$body.removeClass( 'responsive-header-builder-is-active' );
						$section.removeClass( 'responsive-builder-active' );
					}
					_.each(section_layout.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve();
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});
					resizePreviewer();
				});
				// Attach callback to builder toggle.
				$section.on( 'click', '.responsive-hfb-builder-tab-toggle', function( e ) {
					e.preventDefault();
					$section.toggleClass( 'responsive-hfb-builder-hide' );
					resizePreviewer();
				});
			}

		};
		wp.customize.panel( 'responsive_header', initHeaderBuilderPanel );

		var initFooterBuilderPanel = function( panel ) {
			var section =  wp.customize.section( 'responsive_footer_builder' );
			if ( section ) {
				var $section = section.contentContainer,
				section_layout =  wp.customize.section( 'responsive_footer_layout' );
				// If Footer panel is expanded, add class to the body tag (for CSS styling).
				panel.expanded.bind(function( isExpanded ) {
					_.each(section.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve();
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});

					if ( isExpanded ) {
						$body.addClass( 'responsive-footer-builder-is-active' );
						$section.addClass( 'responsive-footer-builder-active' );
						$section.css('display', 'none').height();
						$section.css('display', 'block');
					} else {
						$body.removeClass( 'responsive-footer-builder-is-active' );
						$section.removeClass( 'responsive-footer-builder-active' );
					}
					_.each(section_layout.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve();

						control.container.trigger( 'init' );
					});
					resizePreviewer();
				});
				// Attach callback to builder toggle.
				$section.on( 'click', '.responsive-hfb-builder-tab-toggle', function( e ) {
					e.preventDefault();
					$section.toggleClass( 'responsive-hfb-builder-hide' );
					resizePreviewer();
				});
			}

		};
		wp.customize.panel( 'responsive_footer', initFooterBuilderPanel );

		wp.customize( 'responsive_footer_primary_row_top_border_size', function(value){
			value.bind(function(newval) {
				if( newval > 0 ) {
					document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'none';
				}
            });
		});
		wp.customize( 'responsive_footer_above_row_top_border_size', function(value){
			value.bind(function(newval) {
				if( newval > 0 ) {
					document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'none';
				}
            });
		});
		wp.customize( 'responsive_footer_below_row_top_border_size', function(value){
			value.bind(function(newval) {
				if( newval > 0 ) {
					document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'none';
				}
            });
		});
		wp.customize( 'responsive_footer_primary_columns', function(value){
			value.bind(function(newval) {
				if( newval > 1 ) {
					document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'none';
				}
            });
		});
		wp.customize( 'responsive_footer_above_columns', function(value){
			value.bind(function(newval) {
				if( newval > 1 ) {
					document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'none';
				}
            });
		});
		wp.customize( 'responsive_footer_below_columns', function(value){
			value.bind(function(newval) {
				if( newval > 1 ) {
					document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'block';
				} else {
					document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'none';
				}
            });
		});
    });
	/**
	 * Header Woo Cart Label
	 */
	wp.customize( 'responsive_woo_cart_label', function( setting ) {
		setting.bind( function( newval ) {
			$( document.body ).trigger( 'wc_fragment_refresh' );
		} );
	} );
	/**
	 * Header Woo Cart - Hide Cart Label
	 */
	wp.customize( 'responsive_hide_cart_total_label', function( setting ) {
		setting.bind( function( newval ) {
			$( document.body ).trigger( 'wc_fragment_refresh' );
		} );
	} );
	/**
	 * Header Woo Cart Click Action
	 */
	wp.customize( 'responsive_header_woo_cart_click_action', function( setting ) {
		setting.bind( function( newval ) {
			$( document.body ).trigger( 'wc_fragment_refresh' );
		} );
	} );

	wp.customize.bind('ready', function() {
		wp.customize('responsive_color_scheme', function(value) {
			value.bind(function(newval) {
	
				// Extract design style and color palette.
				let customizerColorSchemes = newval.split('-');
				let designStyle = customizerColorSchemes[0];
				let colorPalette = customizerColorSchemes[1];
	
				// Get available design styles.
				let designStyles = localize.paletteDesignStyles;
	
				if (designStyles[designStyle] && designStyles[designStyle].color_schemes[colorPalette]) {
					let responsiveColorSchemes = designStyles[designStyle].color_schemes[colorPalette];
	
					// List of theme mods to update dynamically.
					let themeMods = {
						'responsive_alt_background_color': responsiveColorSchemes.alt_background,
						'responsive_box_background_color': responsiveColorSchemes.background,
						'responsive_link_color': responsiveColorSchemes.accent,
						'responsive_button_color': responsiveColorSchemes.accent,
						'responsive_button_hover_color': responsiveColorSchemes.accent,
						'responsive_sidebar_headings_color': responsiveColorSchemes.text,
						'responsive_sidebar_background_color': responsiveColorSchemes.background,
						'responsive_body_text_color': responsiveColorSchemes.text,
						'responsive_meta_text_color': responsiveColorSchemes.accent,
						'responsive_sidebar_text_color': responsiveColorSchemes.text,
						'responsive_h1_text_color': responsiveColorSchemes.text,
						'responsive_h2_text_color': responsiveColorSchemes.text,
						'responsive_h3_text_color': responsiveColorSchemes.text,
						'responsive_h4_text_color': responsiveColorSchemes.text,
						'responsive_h5_text_color': responsiveColorSchemes.text,
						'responsive_h6_text_color': responsiveColorSchemes.text,
						'responsive_sidebar_link_color': responsiveColorSchemes.accent,
						'responsive_shop_product_rating_color': responsiveColorSchemes.accent,
						'responsive_add_to_cart_button_text_color': responsiveColorSchemes.background,
						'responsive_add_to_cart_button_hover_text_color': responsiveColorSchemes.background,
						'responsive_cart_buttons_text_color': responsiveColorSchemes.background,
						'responsive_cart_buttons_hover_color': responsiveColorSchemes.accent,
						'responsive_cart_buttons_hover_text_color': responsiveColorSchemes.background,
						'responsive_cart_checkout_button_color': responsiveColorSchemes.accent,
						'responsive_cart_checkout_button_text_color': responsiveColorSchemes.background,
						'responsive_cart_checkout_button_hover_text_color': responsiveColorSchemes.background
					};
	
					// Loop through theme mods and set values only if they exist.
					Object.keys(themeMods).forEach(function(mod) {
						if (wp.customize(mod)) {
							wp.customize(mod).set(themeMods[mod]);
						}
					});
	
					// Handle header/footer separately with fallbacks.
					let headerBackground = responsiveColorSchemes.header_background || '#ffffff';
					let footerBackground = responsiveColorSchemes.footer_background || '#333333';
					let headerText = responsiveColorSchemes.header_text || '#333333';
					let footerText = responsiveColorSchemes.footer_text || '#ffffff';
	
					let additionalMods = {
						'responsive_header_text_color': headerText,
						'responsive_footer_text_color': footerText,
						'responsive_footer_background_color': footerBackground,
						'responsive_header_site_title_color': headerText,
						'responsive_header_site_title_hover_color': headerText,
						'responsive_header_menu_background_color': headerBackground,
						'responsive_header_mobile_menu_background_color': headerBackground,
						'responsive_header_menu_link_color': headerText,
						'responsive_header_secondary_menu_background_color': headerBackground,
						'responsive_header_secondary_menu_link_color': headerText
					};
	
					// Apply additional mods safely.
					Object.keys(additionalMods).forEach(function(mod) {
						if (wp.customize(mod)) {
							wp.customize(mod).set(additionalMods[mod]);
						}
					});
	
				} else {
					console.error('Invalid color scheme or design style.');
				}
			});
		});
	});

	wp.customize('responsive_header_search_label', function(setting) {
		setting.bind(function(label) {
			const general_tab = $('#responsive_header_search_general_tab'); 
			const design_tab  = $('#responsive_header_search_design_tab'); 

			const controls = {
				visibility: $('#customize-control-responsive_header_search_label_visibility'),
				separator2: $('#customize-control-responsive_header_search_separator3'),
				typography: $('#customize-control-responsive_header_search_label_typography_group'),
				separator10: $('#customize-control-responsive_header_search_separator10')
			};

			if (label.length > 0) {
				if (general_tab.hasClass('nav-tab-active')) {
					controls.visibility.fadeIn(300);
					controls.separator2.fadeIn(300);
				}
				if (design_tab.hasClass('nav-tab-active')) {
					controls.typography.fadeIn(300);
					controls.separator10.fadeIn(300);
				}
			} else {
				$.each(controls, function(_, control) {
					control.fadeOut(300);
				});
			}
		});
	});
	wp.customize( 'search_style', function(setting){
		setting.bind( function( type ) {
			if( 'full-screen' !== type ) {
				$('#customize-control-responsive_header_search_label').fadeOut(300);
                $('#customize-control-responsive_header_search_separator2').fadeOut(300);
                $('#customize-control-responsive_header_search_label_visibility').fadeOut(300);
                $('#customize-control-responsive_header_search_separator3').fadeOut(300);
                document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
                document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';
			} else {
				$('#customize-control-responsive_header_search_label').fadeIn(300);
                $('#customize-control-responsive_header_search_separator2').fadeIn(300);
                if( wp.customize('responsive_header_search_label').get().length > 0 ) {
                    $('#customize-control-responsive_header_search_label_visibility').fadeIn(300);
                    $('#customize-control-responsive_header_search_separator3').fadeIn(300);
                }
			}
        } );
	} );
	wp.customize( 'responsive_header_contact_info_icon_shape', function(setting){
		setting.bind( function( shape ){
			if( shape === 'none' ) {
				$('#customize-control-responsive_header_contact_info_icon_style').fadeOut(300);
                $('#customize-control-responsive_header_contact_info_icon_style_separator').fadeOut(300);
			} else {
				$('#customize-control-responsive_header_contact_info_icon_style').fadeIn(300);
                $('#customize-control-responsive_header_contact_info_icon_style_separator').fadeIn(300);
			}
		});
	});
	wp.customize( 'responsive_blog_entry_content_type', function(setting){
		setting.bind( function( type ){
			if( type !== 'excerpt' ) {
				$('#customize-control-responsive_blog_entry_content_alignment_separator').fadeOut(300);
                $('#customize-control-responsive_excerpt_length').fadeOut(300);
                $('#customize-control-responsive_excerpt_length_separator').fadeOut(300);
                $('#customize-control-responsive_blog_read_more_text').fadeOut(300);
                $('#customize-control-responsive_blog_read_more_text_separator').fadeOut(300);
                $('#customize-control-responsive_blog_entry_read_more_type').fadeOut(300);
			} else {
				$('#customize-control-responsive_blog_entry_content_alignment_separator').fadeIn(300);
                $('#customize-control-responsive_excerpt_length').fadeIn(300);
                $('#customize-control-responsive_excerpt_length_separator').fadeIn(300);
                $('#customize-control-responsive_blog_read_more_text').fadeIn(300);
                $('#customize-control-responsive_blog_read_more_text_separator').fadeIn(300);
                $('#customize-control-responsive_blog_entry_read_more_type').fadeIn(300);
			}
		});
	});

	wp.customize( 'responsive_site_background_image_toggle', function( setting ) {
		setting.bind( function( toggle ) {
			displaySiteBackgroundImageSettings( toggle && wp.customize('responsive_site_background_image').get() );
		} );
	});
	wp.customize( 'responsive_site_background_image', function( setting ) {
		setting.bind( function( img ) {
			displaySiteBackgroundImageSettings( img && wp.customize('responsive_site_background_image_toggle').get() );
		} );
	});
	const displaySiteBackgroundImageSettings = (display) => {
		const method = display ? 'fadeIn' : 'fadeOut';
		$('#customize-control-responsive_site_background_img_position')[method](300);
		$('#customize-control-responsive_site_background_image_attachment')[method](300);
		$('#customize-control-responsive_site_background_image_repeat')[method](300);
		$('#customize-control-responsive_site_background_image_size')[method](300);
	};

	wp.customize.section('responsive_rp_layout', function( section ) {
		section.container.find('.customize-section-back').on('click', function(e) {
			e.preventDefault(); // stop default back navigation

			// Navigate to the Single Post section
			wp.customize.section('responsive_single_blog_layout').expand();
		});
	});

	
} )( jQuery, wp );