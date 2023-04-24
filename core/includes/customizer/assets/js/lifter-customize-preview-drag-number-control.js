/**
 * This file makes customizer preview of responsive_drag_number_control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;
    var mobile_menu_breakpoint;
    var disable_mobile_menu_flag;

    //Theme Options Layout
    //Box Radius
    // api( 'lifterlms_container_width', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', newval+'px' );
    //         if ( $(window).width() > 769 ) {
    //             $( '.floatingb-container' ).css( 'width', newval+'px' );
    //         } else {
    //             $( '.floatingb-container' ).css( 'width', '100%' );
    //         }

    //     } );
    // } );

    // api( 'lifterlms_width', function( value ) {
    //   value.bind( function( newval ) {
    //     if(newval !== "contained")
    //       $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', 'none' );
    //     else
    //       $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', api( 'lifterlms_container_width' ).get()+'px' );
    //   } );
    // } );



} )( jQuery );
