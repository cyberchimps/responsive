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

		/**
		 * Toggles visibility of desktop vs mobile/tablet builder controls.
		 * @param {string} device - The current device (desktop, tablet, mobile).
		 */
		var toggleHeaderBuilderControls = function( device ) {
			var desktopControl = wp.customize.control( 'responsive_header_desktop_items' );
			var mobileTabletControl = wp.customize.control( 'responsive_header_mobile_tablet_items' );
			var desktopAvailableItemsControl = wp.customize.control( 'responsive_header_available_items' );
			var mobileTabletAvailableItemsControl = wp.customize.control( 'responsive_header_mobile_tablet_available_items' );

			// Check if the controls exist before proceeding.
			if ( ! desktopControl || ! mobileTabletControl ) {
				return;
			}

			// Check if the general tab is active
			var generalTab = $( '#responsive_header_builder_general_tab' );
			var isGeneralTabActive = generalTab.length === 0 || generalTab.hasClass( 'nav-tab-active' );

			if ( device === 'desktop' ) {
				// Show Desktop control, Hide Mobile/Tablet control
				desktopControl.container.show();
				mobileTabletControl.container.hide();
				// Toggle available items controls only if general tab is active
				if ( isGeneralTabActive ) {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.show();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				} else {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				}
			} else {
				// Show Mobile/Tablet control, Hide Desktop control (for 'tablet' or 'mobile')
				desktopControl.container.hide();
				mobileTabletControl.container.show();
				// Toggle available items controls only if general tab is active
				if ( isGeneralTabActive ) {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.show();
					}
				} else {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				}
			}
		};

		/**
		 * Toggles visibility of desktop vs mobile/tablet footer builder controls.
		 * @param {string} device - The current device (desktop, tablet, mobile).
		 */
		var toggleFooterBuilderControls = function( device ) {
			var desktopControl = wp.customize.control( 'responsive_footer_items' );
			var mobileTabletControl = wp.customize.control( 'responsive_footer_mobile_items' );
			var desktopAvailableItemsControl = wp.customize.control( 'responsive_footer_available_items' );
			var mobileTabletAvailableItemsControl = wp.customize.control( 'responsive_footer_mobile_available_items' );

			// Check if the controls exist before proceeding.
			if ( ! desktopControl || ! mobileTabletControl ) {
				return;
			}

			// Check if the general tab is active
			var generalTab = $( '#responsive_footer_general_tab' );
			var isGeneralTabActive = generalTab.length > 0 && generalTab.hasClass( 'nav-tab-active' );

			if ( device === 'desktop' ) {
				// Show Desktop control, Hide Mobile/Tablet control
				desktopControl.container.show();
				mobileTabletControl.container.hide();
				// Toggle available items controls only if general tab is active
				if ( isGeneralTabActive ) {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.show();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				} else {
					// If design tab is active, hide both available items controls
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				}
			} else {
				// Show Mobile/Tablet control, Hide Desktop control (for 'tablet' or 'mobile')
				desktopControl.container.hide();
				mobileTabletControl.container.show();
				// Toggle available items controls only if general tab is active
				if ( isGeneralTabActive ) {
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.show();
					}
				} else {
					// If design tab is active, hide both available items controls
					if ( desktopAvailableItemsControl ) {
						desktopAvailableItemsControl.container.hide();
					}
					if ( mobileTabletAvailableItemsControl ) {
						mobileTabletAvailableItemsControl.container.hide();
					}
				}
			}
		};

		wp.customize.previewedDevice.bind(function(device) {
			currentDevice = device;
			toggleHeaderBuilderControls( currentDevice );
			toggleFooterBuilderControls( currentDevice );
			setTimeout(resizePreviewer, 100);
		});

	// Initialize on page load
	setTimeout(function() {
		currentDevice = wp.customize.previewedDevice.get();
		toggleHeaderBuilderControls( currentDevice );
		toggleFooterBuilderControls( currentDevice );
	}, 100);

	// Initialize when footer layout section is expanded
	wp.customize.section( 'responsive_footer_layout', function( section ) {
		section.expanded.bind( function( isExpanded ) {
			if ( isExpanded ) {
				// Using a longer timeout to ensure controls are fully rendered
				setTimeout(function() {
					currentDevice = wp.customize.previewedDevice.get();
					toggleFooterBuilderControls( currentDevice );
				}, 200);
			}
		});
	});

	// Initialize when footer builder section is expanded (in case it's opened first)
	wp.customize.section( 'responsive_footer_builder', function( section ) {
		section.expanded.bind( function( isExpanded ) {
			if ( isExpanded ) {
				// Use a longer timeout to ensure controls are fully rendered
				setTimeout(function() {
					currentDevice = wp.customize.previewedDevice.get();
					toggleFooterBuilderControls( currentDevice );
				}, 200);
			}
		});
	});

	// Listen for header & footer tab clicks to ensure correct device-specific controls are shown
	$( document ).on( 'click', '#responsive_header_builder_general_tab, #responsive_header_builder_style_tab', function() {
		setTimeout(function() {
			currentDevice = wp.customize.previewedDevice.get();
			toggleHeaderBuilderControls( currentDevice );
		}, 50);
	});

	$( document ).on( 'click', '#responsive_footer_general_tab, #responsive_footer_design_tab', function() {
		// Use a small delay to allow the tab component to update the DOM first
		setTimeout(function() {
			currentDevice = wp.customize.previewedDevice.get();
			toggleFooterBuilderControls( currentDevice );
		}, 50);
	});

		/**
		 * Init Header & Footer Builder
		 */
		var initHeaderBuilderPanel = function( panel ) {
			var section =  wp.customize.section( 'responsive_header_builder' );
			if ( section ) {
				var $section = section.contentContainer,
				section_layout =  wp.customize.section( 'responsive_header_builder_section' );
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
						$body.addClass( 'responsive-header-builder-is-active' );
						toggleHeaderBuilderControls( currentDevice );
						$section.addClass( 'responsive-builder-active' );
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
						// Use a timeout to ensure controls are fully rendered before toggling
						setTimeout(function() {
							toggleFooterBuilderControls( currentDevice );
						}, 200);
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


				// This is for showing the footer builder when the footer widgets are edited via Widgets>Footer Widget
				wp.customize.section.each(function(sec) {
					
					if (sec.id.startsWith('sidebar-widgets-footer-widget-')) {

						sec.expanded.bind(function(isExpanded) {

							if (isExpanded) {

								$body.addClass('responsive-footer-builder-is-active');
								$section.addClass('responsive-footer-builder-active');

								_.each(sec.controls(), function(control) {
									if ('resolved' !== control.deferred.embedded.state()) {
										control.renderContent();
										control.deferred.embedded.resolve();
										control.container.trigger('init');
									}
								});

								setTimeout(function() {
									toggleFooterBuilderControls(currentDevice);
								}, 200);

								resizePreviewer();
							}
							else 
							{
								$body.removeClass( 'responsive-footer-builder-is-active' );
								$section.removeClass( 'responsive-footer-builder-active' );
							}
						});
					}
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

	function processThemeSettingForCSS ( setting ) {
		// Ensure the setting exists
        const settingObj = wp.customize(setting);
        if (!settingObj) {
            console.warn('Invalid setting:', setting);
            return null;
        }

        // Get actual value
        let value = settingObj.get();
        if (!value) return null;
	
		// Detect palette var format
        if (typeof value === 'string' && value.startsWith('palette')) {
            return `var(--responsive-global-${value})`;
        }
		if (typeof value === 'string' && value.includes('headings-color')) {
			return `var(--responsive-global-${value})`;
		}
        if (typeof value === 'string' && value.startsWith('title-above-content')) {
            return `var(--responsive-${value})`;
        }
        return value;
	}

	wp.customize.bind('ready', function () {
		wp.customize('responsive_global_color_palette', function (value) {
			function applyPalette(newval) {
				if (!newval || !newval.palette) return;

				const prefix = '--responsive-global-palette';
				const palette = newval.palette;

				// Define the correct order of palette keys to ensure proper mapping to CSS variables
				const paletteKeyOrder = ['accent', 'link_hover', 'text', 'header_text', 'content_background', 'site_background', 'alt_background'];
				
				let cssVars = {};

				// Map palette keys to CSS variables in the correct order
				paletteKeyOrder.forEach(function (key, index) {
					if (palette[key] !== undefined) {
						cssVars[`${prefix}${index}`] = palette[key];
					}
				});
				cssVars['--responsive-global-headings-color'] = processThemeSettingForCSS('responsive_all_heading_text_color');
				cssVars['--responsive-border-color'] = processThemeSettingForCSS('responsive_border_color');
				cssVars['--responsive-global-site-background'] = processThemeSettingForCSS('responsive_site_background_color');
				cssVars['--responsive-global-box-background'] = processThemeSettingForCSS('responsive_box_background_color');
				cssVars['--responsive-global-h1-color'] = processThemeSettingForCSS('responsive_h1_text_color');
				const root = document.documentElement;
				Object.entries(cssVars).forEach(([varName, color]) => {
					root.style.setProperty(varName, color);
				});

				applyToPreview(cssVars);
			}

			// Run once on initial load
			applyPalette(value.get());

			// Run whenever setting value changes
			// value.bind(applyPalette);
		});

		wp.customize( 'responsive_border_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-border-color',
					newval
				);
			});
		});

		wp.customize( 'responsive_title_above_content_bg_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-title-above-content-bg-color',
					newval
				);
			});
		});

		wp.customize( 'responsive_title_above_content_overlay_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-title-above-content-overlay-color',
					newval
				);
			});
		});

		wp.customize( 'responsive_all_heading_text_color', function( value ) {
				value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-global-headings-color',
					newval
				);
			});
		});

		wp.customize( 'responsive_site_background_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-global-site-background',
					newval
				);
			});
		});

		wp.customize( 'responsive_box_background_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-global-box-background',
					newval
				);
			});
		});

		wp.customize( 'responsive_h1_text_color', function( value ) {
			value.bind( function( newval ) {
				if( newval && newval.startsWith('palette') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				if( newval && newval.startsWith('headings-color') ) {
					newval = `var(--responsive-global-${newval})`;
				}
				document.documentElement.style.setProperty(
					'--responsive-global-h1-color',
					newval
				);
			});
		});

		// Individual listeners for global color palette settings to update correct CSS variables
		// Mapping: setting ID -> CSS variable index
		const globalPaletteMapping = {
			'responsive_global_color_palette_accent_color': 0,
			'responsive_global_color_palette_link_hover_color': 1,
			'responsive_global_color_palette_text_color': 2,
			'responsive_global_color_palette_headings_color': 3,
			'responsive_global_color_palette_content_bg_color': 4,
			'responsive_global_color_palette_site_background_color': 5,
			'responsive_global_color_palette_alt_background_color': 6,
			'responsive_global_color_palette_subtle_background_color': 7
		};

		Object.entries(globalPaletteMapping).forEach(function([settingId, index]) {
			wp.customize(settingId, function(value) {
				value.bind(function(newval) {
					const cssVar = `--responsive-global-palette${index}`;
					document.documentElement.style.setProperty(cssVar, newval);
					
					// Also update preview iframe
					const iframe = document.querySelector('#customize-preview iframe');
					if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
						iframe.contentWindow.document.documentElement.style.setProperty(cssVar, newval);
					}
				});
			});
		});
	});

	function applyToPreview(cssVars) {

		const iframe = document.querySelector('#customize-preview iframe');

		if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
			const previewRoot = iframe.contentWindow.document.documentElement;

			Object.entries(cssVars).forEach(([varName, color]) => {
				previewRoot.style.setProperty(varName, color);
			});
			return;
		}
	}

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

	wp.customize( 'responsive_transparent_header_logo_option', function( setting ) {
		setting.bind( function( toggle ) {
			if ( toggle ) {
				$( '#customize-control-responsive_transparent_header_logo' ).fadeIn( 300 );
				$( '#customize-control-responsive_transparent_header_logo_width' ).fadeIn( 300 );
				$( '#customize-control-responsive_transparent_header_retina_logo_option' ).fadeIn( 300 );
				if ( wp.customize( 'responsive_transparent_header_retina_logo_option' ) && wp.customize( 'responsive_transparent_header_retina_logo_option' ).get() ) {
					$( '#customize-control-responsive_transparent_header_retina_logo' ).fadeIn( 300 );
				} else {
					$( '#customize-control-responsive_transparent_header_retina_logo' ).hide();
				}
			} else {
				$( '#customize-control-responsive_transparent_header_logo' ).fadeOut( 300 );
				$( '#customize-control-responsive_transparent_header_logo_width' ).fadeOut( 300 );
				$( '#customize-control-responsive_transparent_header_retina_logo_option' ).fadeOut( 300 );
				$( '#customize-control-responsive_transparent_header_retina_logo' ).fadeOut( 300 );
			}
		} );
	} );

	wp.customize( 'responsive_transparent_header_retina_logo_option', function( setting ) {
		setting.bind( function( toggle ) {
			if ( toggle && wp.customize( 'responsive_transparent_header_logo_option' ) && wp.customize( 'responsive_transparent_header_logo_option' ).get() ) {
				$( '#customize-control-responsive_transparent_header_retina_logo' ).fadeIn( 300 );
			} else {
				$( '#customize-control-responsive_transparent_header_retina_logo' ).fadeOut( 300 );
			}
		} );
	} );

	wp.customize.section('responsive_rp_layout', function( section ) {
		section.container.find('.customize-section-back').on('click', function(e) {
			e.preventDefault(); // stop default back navigation

			// Navigate to the Single Post section
			wp.customize.section('responsive_single_blog_layout').expand();
		});
	});

	
} )( jQuery, wp );

export const Base = true;