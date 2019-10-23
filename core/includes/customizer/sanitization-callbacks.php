<?php
/**
 * Sanitization Callbacks
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Multicheck sanitization callback
 *
 * @param  object $values    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_multicheck( $values ) {
	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
	return ! empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/**
 * Drop-down Pages sanitization callback
 *
 * @param  object $page_id    arguments.
 * @param  object $setting    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
}

/**
 * Color sanitization callback
 *
 * @param  object $color    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_color( $color ) {
	if ( empty( $color ) || is_array( $color ) ) {
		return '';
	}

	// If string does not start with 'rgba', then treat as hex.
	// sanitize the hex color and finally convert hex to rgba.
	if ( false === strpos( $color, 'rgba' ) ) {
		return sanitize_hex_color( $color );
	}

	// By now we know the string is formatted as an rgba color so we need to further sanitize it.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

/**
 * Select choices sanitization callback
 *
 * @param  object $input    arguments.
 * @param  object $setting    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_multi_choices( $input, $setting ) {
	// Get list of choices from the control associated with the setting.
	$choices    = $setting->manager->get_control( $setting->id )->choices;
	$input_keys = $input;

	foreach ( $input_keys as $key => $value ) {
		if ( ! array_key_exists( $value, $choices ) ) {
			unset( $input[ $key ] );
		}
	}

	// If the input is a valid key, return it;
	// otherwise, return the default.
	return ( is_array( $input ) ? $input : $setting->default );
}

/**
 * Image sanitization callback
 *
 * @param  object $image    arguments.
 * @param  object $setting    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Number sanitization callback
 *
 * @param  object $val    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_number( $val ) {
	return is_numeric( $val ) ? $val : 0;
}

/**
 * Number with blank value sanitization callback
 *
 * @param  object $val    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_number_blank( $val ) {
	return is_numeric( $val ) ? $val : '';
}

/**
 * Select sanitization callback
 *
 * @param  object $input    arguments.
 * @param  object $setting    arguments.
 * @since 1.2.1
 */
function responsive_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Check if check_product_price_custom_string function is present.
 */
if ( ! function_exists( 'responsive_check_product_price_custom_string' ) ) {
	/**
	 * Show hide logic for  product price format.
	 *
	 * @return boolean True/value values.
	 */
	function responsive_check_product_price_custom_string() {
		$value = get_theme_mod( 'responsive_product_sale_notification', '' );
		if ( 'sale-percentage' === $value ) {
			return true;
		} else {
			return false;
		}

	}
}
/**
 * Check if responsive_check_layout_type function is present.
 */
if ( ! function_exists( 'responsive_check_layout_type' ) ) {
	/**
	 * Checks if the layout is fullwidth no boxed
	 *
	 * @return boolean True/value values.
	 */
	function responsive_check_layout_type() {
		global $responsive_options;
		$responsive_options = responsive_get_options();

		if ( 'full-width-no-box' === $responsive_options['site_layout_option'] ) {
			return true;
		} else {
			return false;
		}

	}
}

/**
 * Check if function present
 */
if ( ! function_exists( 'responsive_sanitize_background' ) ) {
	/**
	 * Menu Background
	 *
	 * @param  string $input Color value.
	 * @return string        Output color.
	 */
	function responsive_sanitize_background( $input ) {

		$output = apply_filters( 'responsive_sanitize_hex', $input );

		return $output;
	}
	add_filter( 'responsive_sanitize_background', 'responsive_sanitize_background' );
}

/**
 * Check if function present
 */
if ( ! function_exists( 'responsive_checkbox_validate' ) ) {
	/**
	 * Validates checkbox inputs.
	 *
	 * @param  string $input checkbox.
	 *
	 * @return 1 or 0
	 */
	function responsive_checkbox_validate( $input ) {
		$input = ( 1 == $input ? 1 : 0 );
		return $input;
	}
}

/**
 * Check if responsive_check_sidebar_menu_type function is present.
 */
if ( ! function_exists( 'responsive_check_sidebar_menu_type' ) ) {
	/**
	 * Checks if mobile menu type is sidebar
	 *
	 * @return boolean True/value values.
	 */
	function responsive_check_sidebar_menu_type() {
		$responsive_mobile_menu_style = get_theme_mod( 'mobile_menu_style' );

		if ( 'sidebar' === $responsive_mobile_menu_style ) {
			return true;
		} else {
			return false;
		}

	}
}
/**
 * Check if responsive_check_sidebar_menu_type function is present.
 */
if ( ! function_exists( 'responsive_check_submenu_divider' ) ) {
	/**
	 * Checks submenu divider is present or not
	 *
	 * @return boolean True/value values.
	 */
	function responsive_check_submenu_divider() {
		$responsive_submenu_divider = get_theme_mod( 'responsive_submenu_divider' );

		if ( '1' === $responsive_submenu_divider ) {
			return true;
		} else {
			return false;
		}

	}
}
