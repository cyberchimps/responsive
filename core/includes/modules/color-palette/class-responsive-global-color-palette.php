<?php
/**
 * Responsive Global color palette
 *
 * @package     Responsive
 * @subpackage  Class
 * @link        https://cyberchimps.com/
 * @since       6.3.0
 */
namespace Reponsive\Core\GlobalPalette;

use function Responsive\Core\get_responsive_customizer_defaults;
use function Responsive\Core\responsive_prepare_css_value;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Global palette class
 */
class Responsive_Global_Color_Palette {

	public function __construct() {
		add_filter( 'responsive_head_css', array( $this, 'responsive_generate_global_palette_styles' ), 99 );

		// If plugin 'Elementor' exists.
		if ( class_exists( '\Elementor\Plugin' ) ) {
			add_action( 'rest_request_after_callbacks', array( $this, 'responsive_elementor_add_theme_colors' ), 999, 3 );
			add_filter( 'rest_request_after_callbacks', array( $this, 'responsive_display_global_colors_front_end' ), 999, 3 );
		}
	}

    /**
	 * Get CSS variable prefix used for styling.
	 *
	 * @since 6.3.0
	 * @return string variable prefix
	 */
	public static function get_css_variable_prefix() {
		return '--responsive-global-palette';
	}

	public static function responsive_generate_global_palette_styles( $output_css ) {

		$global_palette   = get_theme_mod( 'responsive_global_color_palette', get_responsive_customizer_defaults( 'default_global_palette' ) );
		$variable_prefix  = self::get_css_variable_prefix();
		$palette_css_vars = array();

		/**
		 * Filter the current global color palette.
		 *
		 * @param array $global_palette The current global color palette.
		 *
		 * @return array The filtered global color palette.
		 * @since 6.3.1
		 */
		$global_palette = apply_filters( 'responsive_global_current_palette', $global_palette );

		if ( isset( $global_palette['palette'] ) ) {

			// Define the correct order of palette keys to ensure proper mapping to CSS variables
			$palette_key_order = array( 'accent', 'link_hover', 'text', 'header_text', 'content_background', 'site_background', 'alt_background', 'subtle_background' );

			foreach ( $palette_key_order as $index => $key ) {
				if ( isset( $global_palette['palette'][ $key ] ) ) {
					$palette_css_vars[ $variable_prefix . $index ] = $global_palette['palette'][ $key ];
				}
			}
		}

		$css = ":root {\n";
		foreach ( $palette_css_vars as $var => $value ) {
			$css .= "    {$var}: {$value};\n";
		}
		$css .= "    --responsive-global-headings-color: " . responsive_prepare_css_value( 'responsive_all_heading_text_color' ) . ";\n";
		$css .= "}\n\n";

		// Elementor global variables
		$css .= ":root {\n";
		$css .= "    --e-global-color-responsivepalette0: var(--responsive-global-palette0);\n";
		$css .= "    --e-global-color-responsivepalette1: var(--responsive-global-palette1);\n";
		$css .= "    --e-global-color-responsivepalette2: var(--responsive-global-palette2);\n";
		$css .= "    --e-global-color-responsivepalette3: var(--responsive-global-palette3);\n";
		$css .= "    --e-global-color-responsivepalette4: var(--responsive-global-palette4);\n";
		$css .= "    --e-global-color-responsivepalette5: var(--responsive-global-palette5);\n";
		$css .= "    --e-global-color-responsivepalette6: var(--responsive-global-palette6);\n";
		$css .= "    --e-global-color-responsivepalette7: var(--responsive-global-palette7);\n";
		$css .= "}\n";

		$output_css .= $css;
		return $output_css;
	}

	/**
	 * Get slugs for palette colors.
	 *
	 * @since 6.3.0
	 * @return array Palette slugs.
	 */
	public static function get_palette_slugs() {
		return array(
			'responsive-palette0',
			'responsive-palette1',
			'responsive-palette2',
			'responsive-palette3',
			'responsive-palette4',
			'responsive-palette5',
			'responsive-palette6',
			'responsive-palette7',
		);
	}

	/**
	 * Get labels for palette colors.
	 *
	 * @since 6.3.0
	 * @return array Palette labels.
	 */
	public static function get_palette_labels() {
		return array(
			__( 'Accent', 'responsive' ),
			__( 'Link Hover', 'responsive' ),
			__( 'Text', 'responsive' ),
			__( 'Headings', 'responsive' ),
			__( 'Background', 'responsive' ),
			__( 'Site Background', 'responsive' ),
			__( 'Alt Background', 'responsive' ),
			__( 'Subtle Background', 'responsive' )
		);
	}

	/**
	 * Get keys for palette colors.
	 *
	 * @since 6.3.0
	 * @return array Palette Keys.
	 */
	public static function get_palette_keys() {
		return array(
			'accent',
			'link_hover',
			'text',
			'header_text',
			'content_background',
			'site_background',
			'alt_background',
			'subtle_background',
		);
	}

	/**
	 * Display theme global colors to Elementor Global colors
	 *
	 * @since 6.3.0
	 * @param object          $response rest request response.
	 * @param array           $handler Route handler used for the request.
	 * @param WP_REST_Request $request Request used to generate the response.
	 * @return object
	 */
	public function responsive_elementor_add_theme_colors( $response, $handler, $request ) {

		$route = $request->get_route();

		if ( '/elementor/v1/globals' !== $route ) {
			return $response;
		}

		$global_palette = get_theme_mod( 'responsive_global_color_palette', get_responsive_customizer_defaults( 'default_global_palette' ) );
		$data           = $response->get_data();
		$slugs          = $this->get_palette_slugs();
		$labels         = $this->get_palette_labels();
		$palette_keys   = $this->get_palette_keys();

		foreach ( $palette_keys as $index => $palette_key ) {

			if ( ! isset( $global_palette['palette'][ $palette_key ] ) ) {
				continue;
			}

			$color = $global_palette['palette'][ $palette_key ];

			$slug = $slugs[ $index ];
			$no_hyphens = str_replace( '-', '', $slug );

			$data['colors'][ $no_hyphens ] = array(
				'id'    => esc_attr( $no_hyphens ),
				'title' => 'Theme ' . $labels[ $index ],
				'value' => $color,
			);
		}

		$response->set_data( $data );
		return $response;
	}

	/**
	 * Display global paltte colors on Elementor front end Page.
	 *
	 * @since 6.3.0
	 * @param object          $response rest request response.
	 * @param array           $handler Route handler used for the request.
	 * @param WP_REST_Request $request Request used to generate the response.
	 * @return object
	 */
	public function responsive_display_global_colors_front_end( $response, $handler, $request ) {

		$route = $request->get_route();

		if ( 0 !== strpos( $route, '/elementor/v1/globals' ) ) {
			return $response;
		}

		$slug_map     = array();
		$slugs        = $this->get_palette_slugs();
		$palette_keys = $this->get_palette_keys();

		foreach ( $palette_keys as $index => $palette_key ) {
			// Remove hyphens as hyphens do not work with Elementor global styles.
			$slug = $slugs[ $index ];
			$no_hyphens = str_replace( '-', '', $slug );
			$slug_map[ $no_hyphens ] = $palette_key;
		}

		$rest_id = substr( $route, strrpos( $route, '/' ) + 1 );
		if ( ! in_array( $rest_id, array_keys( $slug_map ), true ) ) {
			return $response;
		}

		$colors = get_theme_mod( 'responsive_global_color_palette', get_responsive_customizer_defaults( 'default_global_palette' ) );;
		return rest_ensure_response(
			array(
				'id'    => esc_attr( $rest_id ),
				'title' => $this->get_css_variable_prefix() . esc_html( $slug_map[ $rest_id ] ),
				'value' => $colors['palette'][ $slug_map[ $rest_id ] ],
			)
		);
	}

}

return new Responsive_Global_Color_Palette();