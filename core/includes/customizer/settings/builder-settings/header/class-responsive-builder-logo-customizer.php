<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Logo_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Logo_Customizer {

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

			/**
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_logo',
				array(
					'title'    => esc_html__( 'Logo', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 120,
				)
			);

			$logo_layout_include_choices = array(
				'logo'               => __( 'Logo', 'responsive' ),
				'logo_title'         => __( 'Logo & Title', 'responsive' ),
				'logo_title_tagline' => __( 'Logo, Title & Tagline', 'responsive' ),
			);

			$logo_layout_structure_choices = array(
				'standard'           => __( 'Standard', 'responsive' ),
				'title_tag_logo'     => __( 'Title - Tagline - Logo', 'responsive' ),
				'top_logo_title_tag' => __( 'Top Logo - Title - Tagline', 'responsive' ),
				'top_title_tag_logo' => __( 'Top Title - Tagline - Logo', 'responsive' ),
				'top_title_logo_tag' => __( 'Top Title - Logo - Tagline', 'responsive' ),
			);

			$desktop_logo_layout_include_label = __( 'Desktop Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'desktop_logo_layout_include', $desktop_logo_layout_include_label, 'responsive_customizer_logo', 10, $logo_layout_include_choices, 'logo_title', null );

			$desktop_logo_layout_structure_label = __( 'Desktop Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'desktop_logo_layout_structure', $desktop_logo_layout_structure_label, 'responsive_customizer_logo', 15, $logo_layout_structure_choices, 'standard', null );

			$tablet_logo_layout_include_label = __( 'Tablet Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'tablet_logo_layout_include', $tablet_logo_layout_include_label, 'responsive_customizer_logo', 20, $logo_layout_include_choices, 'logo', null );

			$tablet_logo_layout_structure_label = __( 'Tablet Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'tablet_logo_layout_structure', $tablet_logo_layout_structure_label, 'responsive_customizer_logo', 25, $logo_layout_structure_choices, 'standard', null );

			$mobile_logo_layout_include_label = __( 'Mobile Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_logo_layout_include', $mobile_logo_layout_include_label, 'responsive_customizer_logo', 30, $logo_layout_include_choices, 'logo', null );

			$mobile_logo_layout_structure_label = __( 'Mobile Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_logo_layout_structure', $mobile_logo_layout_structure_label, 'responsive_customizer_logo', 35, $logo_layout_structure_choices, 'standard', null );

			// Padding (px).
			$logo_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'logo', 'responsive_customizer_logo', 45, null, null, null, $logo_padding_label );

			// Site Title Color.
			$site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'site_title', $site_title_color_label, 'responsive_customizer_logo', 50, '#333', null );

			$site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'site_title_hover', $site_title_hover_color_label, 'responsive_customizer_logo', 50, '#333', null );

			$site_title_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'site_title_typography_options_separator', $site_title_typography_options_label, 'responsive_customizer_logo', 100 );

		}

	}

endif;

return new Responsive_Logo_Customizer();
