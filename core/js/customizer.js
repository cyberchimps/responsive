/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-name a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'responsive_theme_options[home_headline]', function( value ) {
		value.bind( function( to ) {
			$( '.featured-title' ).text( to );
		} );
	} );
	wp.customize( 'responsive_theme_options[home_subheadline]', function( value ) {
		value.bind( function( to ) {
			$( '.featured-subtitle' ).text( to );
		} );
	} );
	wp.customize( 'responsive_theme_options[home_content_area]', function( value ) {
		value.bind( function( to ) {
			$( '#featured-content > p' ).text( to );
		} );
	} );
	wp.customize( 'responsive_theme_options[cta_url]', function( value ) {
		value.bind( function( to ) {
			$( '.call-to-action > a' ).attr('href', to );
		} );
	} );
	wp.customize( 'responsive_theme_options[cta_text]', function( value ) {
		value.bind( function( to ) {
			$( '.call-to-action > a' ).text( to );
		} );
	} );
} )( jQuery );
