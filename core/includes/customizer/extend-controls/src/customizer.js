( function( $ ) {
	var	$body = $( 'body' ),
		$window = $( window );
	/**
	 * API on ready event handlers
	 *
	 * All handlers need to be inside the 'ready' state.
	 */
	wp.customize.bind( 'ready', function() {

		var resizePreviewer = function() {
			var $section = $('.control-section.responsive-builder-active');
			var $footer = $('.control-section.responsive-footer-builder-active');
			var isResponsiveBuilderActive = $body.hasClass('responsive-header-builder-is-active');
			var isFooterBuilderActive = $body.hasClass('responsive-footer-builder-is-active');
			var previewerContainer = wp.customize.previewer.container;
		
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
		};
		
		// Bind events
		$window.on('resize', resizePreviewer);
		
		wp.customize.previewedDevice.bind(function() {
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
	
} )( jQuery, wp );