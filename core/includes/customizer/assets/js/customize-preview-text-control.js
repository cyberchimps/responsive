/**
 * This file makes customizer preview of text control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    //Header -> Main Navigation
    //Menu button width
    api( 'responsive_hamburger_menu_label_text', function ( value ) {
        value.bind( function( newval ) {
            $( '.main-navigation .menu-toggle' ).css( 'width', '49px' );
            if( '' !== newval ) {
                $( '.main-navigation .menu-toggle' ).css( 'width', 'auto' );
            }
        } );
    } );

    //Blog -> Content
    //Meta Separator
    api( 'responsive_blog_entry_meta_separator_text', function( value ) {
        value.bind( function( newval ) {
            jQuery( 'style#responsive-blog-meta-seperator-content' ).remove();
            jQuery( 'head' ).append(
                '<style id="responsive-blog-meta-seperator-content">'
                + '.search .hentry .post-meta > span::after,.archive .hentry .post-meta > span::after,.blog .hentry .post-meta > span::after { content:"' + newval +'" }'
                + '</style>'
            );
        } );
    } );
    //Blog Post-> Content
    //Meta Separator
    api( 'responsive_single_blog_meta_separator_text', function( value ) {
        value.bind( function( newval ) {
            jQuery( 'style#responsive-single-blog-meta-seperator-content' ).remove();
            jQuery( 'head' ).append(
                '<style id="responsive-single-blog-meta-seperator-content">'
                + '.single .hentry .post-meta > span::after { content:"' + newval +'" }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_header_button_label', function( value ) {
        value.bind( function( newval ) {
            jQuery('.site-header .site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap a.responsive-header-button').text(newval);
        } );
    } );
    api( 'responsive_header_button_url', function( value ) {
        value.bind( function( newval ) {
            jQuery('.site-header .site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap a.responsive-header-button').prop('href', newval);
        } );
    } );

    
} )( jQuery );