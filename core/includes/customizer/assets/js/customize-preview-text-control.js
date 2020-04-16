/**
 * This file makes customizer preview of text control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

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


} )( jQuery );