<?php
/**
 * Responsive Global color palette
 *
 * @package     Responsive
 * @subpackage  Class
 * @link        https://cyberchimps.com/
 * @since       6.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Global palette class
 */
class Responsive_Global_Color_Palette {

	public function __construct() {
		add_filter( 'responsive_head_css', array( $this, 'responsive_generate_global_palette_styles' ), 99 );
	}

    /**
	 * Get CSS variable prefix used for styling.
	 *
	 * @since 6.3.1
	 * @return string variable prefix
	 */
	public static function get_css_variable_prefix() {
		return '--responsive-global-palette';
	}

	public function responsive_generate_global_palette_styles( $output_css ) {

		$global_palette   = get_theme_mod( 'responsive_global_color_palette', Responsive\Core\get_responsive_customizer_defaults( 'default_global_palette' ) );
		$variable_prefix  = $this->get_css_variable_prefix();
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

			$index = 0;

			foreach ( $global_palette['palette'] as $key => $color ) {

				// Skip "label" only
				if ( $key === 'label' ) {
					continue;
				}

				$palette_css_vars[ $variable_prefix . $index ] = $color;
				$index++;
			}
		}

		$css = ":root {\n";
		foreach ( $palette_css_vars as $var => $value ) {
			$css .= "    {$var}: {$value};\n";
		}
		$css .= "}\n";

		$output_css .= $css;
		return $output_css;
	}

}

return new Responsive_Global_Color_Palette();