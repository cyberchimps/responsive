<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Typography_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Typography_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'load_fonts' ) );

			if ( is_customize_preview() ) {
				$path = get_stylesheet_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-font-presets.min.js';
				wp_enqueue_script( 'responsive-customize-preview-font-preset', $path, array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
				add_action( 'wp_head', array($this, 'live_preview_styles' ), 99 );			
			}
			
			/**
			 * Typography.
			 */
			$wp_customize->add_section(
				'responsive_typography',
				array(
					'title'    => __( 'Typography', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 30,
				)
			);
			
			// Font Presets
			// $font_presets_label = esc_html__( 'Font Combinations', 'responsive' );
			responsive_font_presets_control( $wp_customize, 'font_presets', null, 'responsive_typography', 1, '', 'postMessage', 'Presets');

			// Heading Fonts heading.
			$heading_fonts_typography_label = esc_html__( 'Base Font', 'responsive' );
			responsive_separator_control( $wp_customize, 'base_fonts_typography_separator', $heading_fonts_typography_label, 'responsive_typography', 2 );

			// Body Typography.
			$body_typography_label = esc_html__( 'Body Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'body_typography_group', $body_typography_label, 'responsive_typography', 3, 'body_typography' );

			// ALL heading Typography.
			$all_heading_typography_label = esc_html__( 'All Headings Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'headings_typography_group', $all_heading_typography_label, 'responsive_typography', 5, 'headings_typography' );

			// Meta Typography.
			$meta_typography_label = esc_html__( 'Meta Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'meta_typography_group', $meta_typography_label, 'responsive_typography', 6, 'meta_typography' );

			// Heading Fonts heading.
			$heading_fonts_typography_label = esc_html__( 'Heading Font', 'responsive' );
			responsive_separator_control( $wp_customize, 'heading_fonts_typography_separator', $heading_fonts_typography_label, 'responsive_typography', 7 );

			// Body Typography.
			$h1_typography_label = esc_html__( 'H1 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h1_typography_group', $h1_typography_label, 'responsive_typography', 9, 'heading_h1_typography' );

			// H2 Typography.
			$h2_typography_label = esc_html__( 'H2 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h2_typography_group', $h2_typography_label, 'responsive_typography', 11, 'heading_h2_typography' );

			// H3 Typography.
			$h3_typography_label = esc_html__( 'H3 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h3_typography_group', $h3_typography_label, 'responsive_typography', 13, 'heading_h3_typography' );
	
			// H4 Typography.
			$h4_typography_label = esc_html__( 'H4 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h4_typography_group', $h4_typography_label, 'responsive_typography', 15, 'heading_h4_typography' );

			// H5 Typography.
			$h5_typography_label = esc_html__( 'H5 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h5_typography_group', $h5_typography_label, 'responsive_typography', 17, 'heading_h5_typography' );

			// H6 Typography.
			$h6_typography_label = esc_html__( 'H6 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h6_typography_group', $h6_typography_label, 'responsive_typography', 19, 'heading_h6_typography' );

			responsive_horizontal_separator_control($wp_customize, 'paragraph_margin_bottom_separator', 1, 'responsive_typography', 20, 1, );
			
			// Paragraph Margin Bottom.
			$paragraph_margin_label = esc_html__( 'Paragraph Margin Bottom', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'paragraph_margin_bottom', $paragraph_margin_label, 'responsive_typography', 21, 1.75, null, 5, 1, 'postMessage', 0.1 );

			responsive_horizontal_separator_control($wp_customize, 'underline_content_links_separator', 1, 'responsive_typography', 22, 1, );

			// Underline Content Links
			responsive_toggle_control(
				$wp_customize,
				'underline_content_links', 
				esc_html__( 'Underline Content Links', 'responsive' ),
				'responsive_typography',
				32, 
				false, 
				'',
				'refresh',
			);
			
		}

		public function live_preview_styles() {
			$preset = get_theme_mod( 'responsive_font_presets', '' );
			if ( $preset !== '' ) {
				$choices = json_decode( get_theme_mod( 'font_presets_value' ), true );
				if ( isset( $choices[ $preset ] ) ) {
					$bodyFont = $choices[ $preset ]['bodyFont'];
					$headingFont = $choices[ $preset ]['headingFont'];
					$bodyWeight = $choices[ $preset ]['bodyWeight'];
					$headingWeight = $choices[ $preset ]['headingWeight'];

					$this->load_fonts($bodyFont);
					$this->load_fonts($headingFont);
					
					echo "<style class='customizer-typography-font-preset-body-font-family'>
							body { font-family: " . $bodyFont . "; font-weight: {$bodyWeight}; }
						  </style>";
					
					echo "<style class='customizer-typography-font-preset-headings-font-family'>
						  	h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { font-family: " . $headingFont . "; font-weight: {$headingWeight}; }
						</style>";
				}
			}
		}

		public static function loop( $type = 'css' ) {
			// Get the selected font preset.
			$preset = get_theme_mod( 'responsive_font_presets', '' );
			if ( '' === $preset ) {
				return "";
			}
		
			// Get the choices array stored in theme mods.
			$choices = json_decode( get_theme_mod( 'font_presets_value' ), true );

			// Check if the selected preset exists in the choices.
			$bodyFont = $choices[ $preset ]['bodyFont'];
			$headingFont = $choices[ $preset ]['headingFont'];
		
			if ( $type === 'fonts' ) {
				return array ($bodyFont, $headingFont);
			}
		
			return ""; // Return an empty string if no preset or choices are found.
		}
		
		public function load_fonts( $font ) {

			// Get fonts.
			$fonts = self::loop( 'fonts' );

			// Loop through and enqueue fonts.
			if ( ! empty( $fonts ) && is_array( $fonts ) ) {
				foreach ( $fonts as $font ) {
					responsive_enqueue_google_font( $font );
				}
			}

		}

	}

endif;

return new Responsive_Site_Typography_Customizer();