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
function responsive_standard_fonts()
{
	return apply_filters(
		'responsive_standard_fonts_array',
		array(
			'Open Sans'       => array(
				array(
					300,
					400,
					600,
					700,
					800,
				),
				'sans-serif',
			),
			'Times New Roman' => array(
				array(
					400,
					500,
					600,
					700,
					800,
					900,
				),
				'sans-serif',
			),
			'Georgia'         => array(
				array(
					400,
					700,
				),
				'sans-serif',
			),
			'Garamond'        => array(
				array(
					400,
					500,
					600,
					700,
					800,
				),
				'sans-serif',
			),
			'Verdana'        => array(
				array(
					400,
					700,
				),
				'sans-serif',
			),
			'Helvetica'        => array(
				array(
					400,
					700,
				),
				'sans-serif',
			),
			'Arial'        => array(
				array(
					400,
					700,
				),
				'sans-serif',
			),
			'Courier'        => array(
				array(
					400,
					700,
				),
				'sans-serif',
			),
			'Libre Franklin'  => array(
				array(
					200,
					400,
					700,
				),
				'sans-serif',
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
function responsive_get_google_fonts()
{

	$google_fonts_file = apply_filters('responsive_google_fonts_json_file', RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/typography/google-fonts.json');

	if (! file_exists(RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/typography/google-fonts.json')) {
		return array();
	}

	$file_contants     = file_get_contents($google_fonts_file);
	$google_fonts_json = json_decode($file_contants, 1);
	foreach ($google_fonts_json as $key => $font) {
		$name = key($font);
		foreach ($font[$name] as $font_key => $single_font) {

			if ('variants' === $font_key) {

				foreach ($single_font as $variant_key => $variant) {

					if ('regular' == $variant) { //phpcs:ignore
						$font[$name][$font_key][$variant_key] = '400';
					}
				}
			}

			$google_fonts[$name] = array_values($font[$name]);
		}
	}

	return apply_filters('responsive_google_fonts', $google_fonts);
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
		$url = 'https://fonts.googleapis.com/css?family=' . str_replace( ' ', '%20', $font ) . ':';

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
		

		// If local fonts are enabled, cache and use local CSS.
		if ( 1 === (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) ) {
			$local_css = Responsive_Local_Fonts::cache_and_get_url( 'https://fonts.googleapis.com/css?family=' . $font . '&subset=' . $subsets );
			if ( $local_css ) {
				wp_enqueue_style( 'responsive-google-font-' . $handle, $local_css, false, null, 'all' );
				return;
			}
		}

		// Enqueue style from Google as fallback.
		wp_enqueue_style( 'responsive-google-font-' . $handle, $url, false, false, 'all' );//phpcs:ignore
}

/**
 * Check if the required fonts are available locally in the cache.
 * 
 * This function verifies that:
 * 1. Local font loading is enabled
 * 2. The fonts.css file exists
 * 3. All required fonts are present in the cached CSS
 *
 * @param array $fonts Array of font strings (e.g., ["'Jua', sans-serif", "'Germania One', display"])
 * @return bool True if all fonts are cached locally, false otherwise
 */
function responsive_are_fonts_available_locally( $fonts ) {
    // If local loading is disabled, return false immediately.
    if ( 1 !== (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) ) {
        return false;
    }

    $upload_dir = wp_upload_dir();
    $local_fonts_dir = trailingslashit( $upload_dir['basedir'] ) . 'responsive-local-fonts/';
    $fonts_css_file  = $local_fonts_dir . 'fonts.css';


    // Check if fonts.css exists.
    if ( ! file_exists( $fonts_css_file ) ) {
        return false;
    }

    // Read the CSS content
    $css_content = file_get_contents( $fonts_css_file );
    
    if ( empty( $css_content ) ) {
        return false;
    }

    // Check if each required font exists in the cached CSS
    foreach ( $fonts as $font ) {
        // Clean font name (remove quotes and fallbacks)
        $clean_font = trim( preg_replace( "/['\"]/", '', explode( ',', $font )[0] ) );
        
        
        if ( empty( $clean_font ) ) {
            continue;
        }

        // Check if the font-family declaration exists in the CSS
        // Google Fonts CSS uses single quotes: font-family: 'Font Name';
        $pattern_single = "font-family: '" . $clean_font . "'";
        $pattern_double = 'font-family: "' . $clean_font . '"';
        
        if ( strpos( $css_content, $pattern_single ) === false && 
             strpos( $css_content, $pattern_double ) === false ) {
            return false;
        }
        
    }

    return true;
}

/**
 * Delete all locally cached font files and CSS.
 * This should be called before regenerating the cache with new fonts.
 *
 * @return bool True on success, false on failure
 */
function responsive_delete_local_fonts_cache() {
    $upload_dir = wp_upload_dir();
    $local_fonts_dir = trailingslashit( $upload_dir['basedir'] ) . 'responsive-local-fonts/';
    
    if ( ! file_exists( $local_fonts_dir ) ) {
        return true;
    }
        
    // Get all files in the directory
    $files = glob( $local_fonts_dir . '*' );
    
    if ( ! $files ) {
        return true;
    }
    
    $deleted_count = 0;
    foreach ( $files as $file ) {
        if ( is_file( $file ) ) {
            if ( unlink( $file ) ) {
                $deleted_count++;
            }
        }
    }
    
    return true;
}
/**
 * Enqueues a Google Font URL
 *
 * @param  string $font Font name.
 */
function responsive_enqueue_google_font_url($font)
{

	// Return if disabled.
	if (true === get_theme_mod('responsive_disable_google_font', false)) {
		return;
	}

	// Get list of all Google Fonts.
	$google_fonts = responsive_get_google_fonts();

	$font_name_array = explode(',', $font, 2);

	// Sanitize font name.
	$font_name = trim($font_name_array[0], "'");
	// Make sure font is in our list of fonts.
	if (! $google_fonts || ! array_key_exists($font_name, $google_fonts)) {
		return;
	}
	$font = str_replace(' ', '+', $font_name);

	// Sanitize handle.
	$handle = trim($font_name);
	$handle = strtolower($handle);
	$handle = str_replace(' ', '-', $handle);

	// Weights.
	$weights = array('100', '200', '300', '400', '500', '600', '700', '800', '900');
	$weights = apply_filters('responsive_google_font_enqueue_weights', $weights, $font);
	$italics = apply_filters('responsive_google_font_enqueue_italics', true);
	// Main URL.
	$query_url = str_replace(' ', '%20', $font) . ':';

	// Add weights to URL.
	if (! empty($weights)) {
		$query_url     .= implode(',', $weights) . ',';
		$italic_weights = array();
		if ($italics) {
			foreach ($weights as $weight) {
				$italic_weights[] = $weight . 'i';
			}
			$query_url .= implode(',', $italic_weights);
		}
	}
	return $query_url;
}

/**
 * Adds data to the $fonts array for a font to be rendered.
 *
 * Main function to render Google Fonts - either locally or from CDN.
 * 
 * @param array $fonts Array of font strings to load
 */
function responsive_render_google_fonts_url( $fonts ) {
    $isGoogleFont = false;
    
    // Return if disabled.
    if ( true === get_theme_mod( 'responsive_disable_google_font', false ) ) {
        return;
    }


    // Build Google Fonts URL
    $url = 'https://fonts.googleapis.com/css?family=';
    $query_parts = array();

	/*
	* If google fonts are enabled locally , we also need to check for preset fonts separately as they are not enqueued
	*/
	if(1 === (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ))
	{
		$preset = get_theme_mod( 'responsive_font_presets', '' );
		if ( $preset !== '' ) {
			$choices = json_decode( get_theme_mod( 'font_presets_value'),true );
			if ( isset( $choices[ $preset ] ) ) {
				$headingFontFamily = $choices[ $preset ]['headingFont'];
				$bodyFontFamily = $choices[ $preset ]['bodyFont'];
				if ( substr( $headingFontFamily, 0, 1 ) !== "'" ) {
					$headingFontFamily = "'" . $headingFontFamily;
				}

				// Add trailing quote if missing
				if ( substr( $headingFontFamily, -1 ) !== "'" ) {
					$headingFontFamily .= "'";
				}
				if ( substr( $bodyFontFamily, 0, 1 ) !== "'" ) {
					$bodyFontFamily = "'" . $bodyFontFamily;
				}

				// Add trailing quote if missing
				if ( substr( $bodyFontFamily, -1 ) !== "'" ) {
					$bodyFontFamily .= "'";
				}
				$fonts[] = $headingFontFamily; 
				$fonts[] = $bodyFontFamily;

			}
		}
	}
    
    foreach ( $fonts as $font ) {
        // Clean font name: remove quotes and fallback (after comma)
        $clean_font = trim( preg_replace( "/['\"]/", '', explode( ',', $font )[0] ) );
        
        if ( empty( $clean_font ) ) {
            continue;
        }
        
        $google_fonts = responsive_get_google_fonts();
        
        if ( isset( $google_fonts ) && array_key_exists( $clean_font, $google_fonts ) ) {
            $isGoogleFont = true;
            $fragment = responsive_enqueue_google_font_url( $clean_font );
            
            if ( ! empty( $fragment ) ) {
                $query_parts[] = $fragment;
            }
        }
    }

    // If we have no valid Google font fragments, bail out.
    if ( empty( $query_parts ) ) {
        wp_dequeue_style( 'responsive-google-font-css' );
        return;
    }

    // Build complete Google Fonts URL
    $url .= implode( '%7C', $query_parts );

    // Add subsets
    $get_subsets = get_theme_mod( 'responsive_google_font_subsets', array( 'latin' ) );
    $subsets = '';
    
    if ( ! empty( $get_subsets ) ) {
        $font_subsets = array();
        foreach ( $get_subsets as $get_subset ) {
            $font_subsets[] = $get_subset;
        }
        $subsets .= implode( ',', $font_subsets );
    } else {
        $subsets = 'latin';
    }
    
    $subset = '&subset=' . $subsets;
    $url = rtrim( $url, '%7C' );
    $url .= $subset;

    // If this is a Google Font, decide whether to load locally or from CDN
    if ( $isGoogleFont ) {
        
        // Check if local fonts loading is enabled
        if ( 1 === (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) ) {
            
            // Check if fonts are already cached locally
            if ( responsive_are_fonts_available_locally( $fonts ) ) {
                
                // Use the cached local CSS
                $upload_dir = wp_upload_dir();
                $local_fonts_url = trailingslashit( $upload_dir['baseurl'] ) . 'responsive-local-fonts/fonts.css';
                
                wp_enqueue_style( 'responsive-google-font', $local_fonts_url, false, null, 'all' );
                return;
            }
            
            // Fonts not cached or incomplete - regenerate cache            
            // Delete old cache
            responsive_delete_local_fonts_cache();
            
            // Fetch and cache fonts from Google
            $local_css = Responsive_Local_Fonts::cache_and_get_url( $url );
            
            if ( $local_css ) {
                wp_enqueue_style( 'responsive-google-font', $local_css, false, null, 'all' );
                return;
            }
        }
        
        // Load from Google CDN (either local loading is disabled or caching failed)
        wp_enqueue_style( 'responsive-google-font', $url, false, false, 'all' );
        
    } else {
        // Not a Google Font
        wp_dequeue_style( 'responsive-google-font-css' );
    }
}