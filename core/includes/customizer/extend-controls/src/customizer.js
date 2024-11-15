( function( $, api ) {
	var	$body = $( 'body' );
	/**
	 * API on ready event handlers
	 *
	 * All handlers need to be inside the 'ready' state.
	 */
	wp.customize.bind( 'ready', function() {

	/**
	 * Init Header & Footer Builder
	 */
	var initHeaderBuilderPanel = function( panel ) {
		var section =  wp.customize.section( 'responsive_header_builder' );
		if ( section ) {
			var $section = section.contentContainer,
			section_layout =  wp.customize.section( 'responsive_header_layout' );
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
			});
			// Attach callback to builder toggle.
			$section.on( 'click', '.responsive-hfb-builder-tab-toggle', function( e ) {
				e.preventDefault();
				$section.toggleClass( 'responsive-hfb-builder-hide' );
			});
		}

	};
	wp.customize.panel( 'responsive_header', initHeaderBuilderPanel );
    });

} )( jQuery, wp );