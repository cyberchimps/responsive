/**
 * This file makes customizer preview of checkbox control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;
    // Header Layout
    // Full Width Header
    api(
        "responsive_header_full_width",
        function( $swipe ) {

            $swipe.bind(
                function( pair ) {
                    if ( pair === true ) {
                        jQuery( 'body' ).addClass( "header-full-width" );
                    }
                    else {
                        jQuery( 'body' ).removeClass( "header-full-width" );
                    }
                }
            );
        }
    )

    // Inline Logo & Site Title
    api(
        "responsive_inline_logo_site_title",
        function( $swipe ) {

            $swipe.bind(
                function( pair ) {
                    if ( pair === true ) {
                        jQuery( 'body' ).addClass( "inline-logo-site-title" );
                    }
                    else {
                        jQuery( 'body' ).removeClass( "inline-logo-site-title" );
                    }
                }
            );
        }
    )

    // Full Width Footer
    api(
        "responsive_footer_full_width",
        function( $swipe ) {

            $swipe.bind(
                function( pair ) {
                    var value = api( 'responsive_width' ).get();
                    if( value == 'contained') {
                        if (pair === true) {
                            jQuery('body').addClass("footer-full-width");
                        }
                        else {
                            jQuery('body').removeClass("footer-full-width");
                        }
                    }
                }
            );
        }
    )

    // Hide Copyright Icon & Year.
    api(
        "responsive_copyright_icon_and_year",
        function( $swipe ) {
            $swipe.bind(
                    function( pair ) {
                    if ( pair === true ) {
                        jQuery('.copyright_icon_and_year').css('display','none');
                    } else {
                        jQuery('.copyright_icon_and_year').css('display','inline-block');
                    }
                }
            );
        }
    )

    // Enable Header Widget
    api(
        "responsive_enable_header_widget",
        function( $swipe ) {
            $swipe.bind(
                function( pair ) {
                    var align = api( 'responsive_header_widget_alignment' ).get();
                    var position = api( 'responsive_header_widget_position' ).get();
                    if (pair === true) {
                        jQuery('body').addClass("header-widget-alignment-"+align);
                        jQuery('body').addClass("header-widget-position-"+position);
                        api.control('responsive_header_widget_position').activate();
                        // api('responsive_header_widget_position').show();
                    }
                    else {
                        jQuery('body').removeClass("header-widget-alignment-"+align);
                        jQuery('body').removeClass("header-widget-position-"+position);
                        api.control('responsive_header_widget_position').deactivate();
                        // api('responsive_header_widget_position').hide();
                    }

                }
            );
        }
    )

    // Stack on Mobile.
    api( 'responsive_stacked_mobile_menu', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_responsive_stacked_mobile_menu' );
			if ( to ) {
				var style = '<style class="customizer-responsive_stacked_mobile_menu">@media (max-width: 992px){ .main-navigation.toggled .menu {flex-direction:column}}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				var style = '<style class="customizer-responsive_stacked_mobile_menu">@media (max-width: 992px){ .main-navigation.toggled .menu {flex-direction:row}}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			}
		});
	});

} )( jQuery );
