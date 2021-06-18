<?php
/**
 * Fonts functions
 *
 * @package Responsive WordPress theme
 */

/**
 * List of standard fonts
 *
 * @since 1.0.0
 */
function responsive_standard_fonts() {
	return apply_filters(
		'responsive_standard_fonts_array',
		array(
			'Open Sans'       => array(
				'weights' => array(
					300,
					400,
					600,
					700,
					800,
				),
			),
			'Times New Roman' => array(
				'weights' => array(
					400,
					500,
					600,
					700,
					800,
					900,
				),
			),
			'Georgia'         => array(
				'weights' => array(
					400,
					700,
				),
			),
			'Garamond'        => array(
				'weights' => array(
					400,
					500,
					600,
					700,
					800,
				),
			),
		)
	);
}

/**
 * Google Fonts used in Responsive Theme.
 * Array is generated from the google-fonts.json file.
 *
 * @since  3.15.4
 *
 * @return Array Array of Google Fonts.
 */
function responsive_get_google_fonts() {

	$google_fonts_file = apply_filters( 'responsive_google_fonts_json_file', RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/typography/google-fonts.json' );

	if ( ! file_exists( RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/typography/google-fonts.json' ) ) {
		return array();
	}

	$file_contants     = file_get_contents( $google_fonts_file );
	$google_fonts_json = json_decode( $file_contants, 1 );
	foreach ( $google_fonts_json as $key => $font ) {
		$name = key( $font );
		foreach ( $font[ $name ] as $font_key => $single_font ) {

			if ( 'variants' === $font_key ) {

				foreach ( $single_font as $variant_key => $variant ) {

					if ( 'regular' == $variant ) {//phpcs:ignore
						$font[ $name ][ $font_key ][ $variant_key ] = '400';
					}
				}
			}

			$google_fonts[ $name ] = array_values( $font[ $name ] );
		}
	}

		return apply_filters( 'responsive_google_fonts', $google_fonts );
}

/**
 * Enqueues a Google Font
 *
 * @param  string $font Font name.
 */
function responsive_enqueue_google_font( $font ) {

	// Return if disabled.
	if ( true === get_theme_mod( 'responsive_disable_google_font', false ) ) {
		return;
	}

	// Get list of all Google Fonts.
	$google_fonts = responsive_get_google_fonts();

	$font_name_array = explode( ',', $font, 2 );

	// Sanitize font name.
	$font_name = trim( $font_name_array[0], "'" );
	// Make sure font is in our list of fonts.
	if ( ! $google_fonts || ! array_key_exists( $font_name, $google_fonts ) ) {
		return;
	}
	$font = str_replace( ' ', '+', $font_name );

	// Sanitize handle.
	$handle = trim( $font_name );
	$handle = strtolower( $handle );
	$handle = str_replace( ' ', '-', $handle );

	// Subset.
	$get_subsets = get_theme_mod( 'responsive_google_font_subsets', array( 'latin' ) );
	$subsets     = '';
	if ( ! empty( $get_subsets ) ) {
		$font_subsets = array();
		foreach ( $get_subsets as $get_subset ) {
			$font_subsets[] = $get_subset;
		}
		$subsets .= implode( ',', $font_subsets );
	} else {
		$subsets = 'latin';
	}
	$subset = '&amp;subset=' . $subsets;

	// Weights.
	$weights = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );
	$weights = apply_filters( 'responsive_google_font_enqueue_weights', $weights, $font );
	$italics = apply_filters( 'responsive_google_font_enqueue_italics', true );
	// Main URL.
	$url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '%20', $font ) . ':';

	// Add weights to URL.
	if ( ! empty( $weights ) ) {
		$url           .= implode( ',', $weights ) . ',';
		$italic_weights = array();
		if ( $italics ) {
			foreach ( $weights as $weight ) {
				$italic_weights[] = $weight . 'i';
			}
			$url .= implode( ',', $italic_weights );
		}
	}

	// Add subset to URL.
	$url .= $subset;

	// Enqueue style.
	wp_enqueue_style( 'responsive-google-font-' . $handle, $url, false, false, 'all' );//phpcs:ignore

}
