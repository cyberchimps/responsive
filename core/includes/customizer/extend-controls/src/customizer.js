( function( $, api ) {
	var $window = $( window ),
		$document = $( document ),
		$body = $( 'body' );
	/**
	 * API on ready event handlers
	 *
	 * All handlers need to be inside the 'ready' state.
	 */
	wp.customize.bind( 'ready', function() {
		
		wp.customize.state.create( 'responsiveTab' );
		wp.customize.state( 'responsiveTab' ).set( 'general' );
		

		// Set handler when custom responsive toggle is clicked.
		$( '#customize-theme-controls' ).on( 'click', '.responsive-build-tabs-button:not(.responsive-nav-tabs-button)', function( e ) {
			e.preventDefault();

			wp.customize.previewedDevice.set( $( this ).attr( 'data-device' ) );
		});
		// Set handler when custom responsive toggle is clicked.
		$( '#customize-theme-controls' ).on( 'click', '.responsive-compontent-tabs-button:not(.responsive-nav-tabs-button)', function( e ) {
			e.preventDefault();

			wp.customize.state( 'responsiveTab' ).set( $( this ).attr( 'data-tab' ) );
		});
		var setCustomTabElementsDisplay = function() {
			var tabState = wp.customize.state( 'responsiveTab' ).get(),
			$tabs = $( '.responsive-compontent-tabs-button:not(.responsive-nav-tabs-button)' );
			$tabs.removeClass( 'nav-tab-active' ).filter( '.responsive-' + tabState + '-tab' ).addClass( 'nav-tab-active' );
		}
		// Refresh all responsive elements when previewedDevice is changed.
		wp.customize.state( 'responsiveTab' ).bind( setCustomTabElementsDisplay );

		$( '#customize-theme-controls' ).on( 'click', 'customize-section-back', function( e ) {
			wp.customize.state( 'responsiveTab' ).set( 'general' );
		});

		// Set all custom responsive toggles and fieldsets.
		var setCustomResponsiveElementsDisplay = function() {
			var device = wp.customize.previewedDevice.get(),
			    $tabs = $( '.responsive-build-tabs-button.nav-tab' );
			$tabs.removeClass( 'nav-tab-active' ).filter( '.preview-' + device ).addClass( 'nav-tab-active' );
		}
		// Refresh all responsive elements when previewedDevice is changed.
		wp.customize.previewedDevice.bind( setCustomResponsiveElementsDisplay );

		// Refresh all responsive elements when any section is expanded.
		// This is required to set responsive elements on newly added controls inside the section.
		wp.customize.section.each(function ( section ) {
			section.expanded.bind( setCustomResponsiveElementsDisplay );
		});

		/**
		 * Resize Preview Frame when show / hide Builder.
		 */
		var resizePreviewer = function() {
			var $section = $( '.control-section.responsive-builder-active' );
			var $footer = $( '.control-section.responsive-footer-builder-active' );
			if ( $body.hasClass( 'responsive-builder-is-active' ) || $body.hasClass( 'responsive-footer-builder-is-active' ) ) {
				if ( $body.hasClass( 'responsive-footer-builder-is-active' ) && 0 < $footer.length && ! $footer.hasClass( 'responsive-builder-hide' ) ) {
					wp.customize.previewer.container.css( 'bottom', $footer.outerHeight() + 'px' );
				} else if ( $body.hasClass( 'responsive-builder-is-active' ) && 0 < $section.length && ! $section.hasClass( 'responsive-builder-hide' ) ) {
					wp.customize.previewer.container.css({ "bottom" : $section.outerHeight() + 'px' });
				} else {
					wp.customize.previewer.container.css( 'bottom', '');
				}
			} else {
				wp.customize.previewer.container.css( 'bottom', '');
			}
		}
		$window.on( 'resize', resizePreviewer );
		wp.customize.previewedDevice.bind(function( device ) {
			setTimeout(function() {
				resizePreviewer();
			}, 250 );
		});
		var reloadPreviewer = function() {
			$( wp.customize.previewer.container ).find( 'iframe' ).css( 'position', 'static' );
			$( wp.customize.previewer.container ).find( 'iframe' ).css( 'position', 'absolute' );
		}
		wp.customize.previewer.bind( 'ready', reloadPreviewer );
		/**
		 * Init Header & Footer Builder
		 */
		var initHeaderBuilderPanel = function( panel ) {
			var section =  wp.customize.section( 'responsive_customizer_header_builder' );
			if ( section ) {
				var $section = section.contentContainer,
				section_layout =  wp.customize.section( 'responsive_customizer_header_main' );
				// If Header panel is expanded, add class to the body tag (for CSS styling).
				panel.expanded.bind(function( isExpanded ) {
					_.each(section.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve(); // This triggers control.ready().
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});

					if ( isExpanded ) {
						$body.addClass( 'responsive-builder-is-active' );
						$section.addClass( 'responsive-builder-active' );
						$section.css('display', 'none').height();
						$section.css('display', 'block');
					} else {
						$body.removeClass( 'responsive-builder-is-active' );
						$section.removeClass( 'responsive-builder-active' );
					}
					_.each(section_layout.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve(); // This triggers control.ready().
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});
					resizePreviewer();
				});
				// Attach callback to builder toggle.
				$section.on( 'click', '.responsive-builder-tab-toggle', function( e ) {
					e.preventDefault();
					$section.toggleClass( 'responsive-builder-hide' );
					resizePreviewer();
				});
			}

		};
		wp.customize.panel( 'responsive_header', initHeaderBuilderPanel );
		/**
		 * Init Header & Footer Builder
		 */
		var initFooterBuilderPanel = function( panel ) {
			var section =  wp.customize.section( 'responsive_customizer_footer_builder' );
			if ( section ) {
				var $section = section.contentContainer,
				section_layout =  wp.customize.section( 'responsive_customizer_footer_middle' );
				// If Header panel is expanded, add class to the body tag (for CSS styling).
				panel.expanded.bind(function( isExpanded ) {
					_.each(section.controls(), function( control ) {
						if ( 'resolved' === control.deferred.embedded.state() ) {
							return;
						}
						control.renderContent();
						control.deferred.embedded.resolve(); // This triggers control.ready().
						
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
						control.deferred.embedded.resolve(); // This triggers control.ready().
						
						// Fire event after control is initialized.
						control.container.trigger( 'init' );
					});
					resizePreviewer();
				});
				// Attach callback to builder toggle.
				$section.on( 'click', '.responsive-builder-tab-toggle', function( e ) {
					e.preventDefault();
					$section.toggleClass( 'responsive-builder-hide' );
					resizePreviewer();
				} );
			}

		};
		wp.customize.panel( 'responsive_footer', initFooterBuilderPanel );
	});

} )( jQuery, wp );