<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Trigger_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_Trigger_Customizer {

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
				'responsive_customizer_mobile_trigger',
				array(
					'title'    => esc_html__( 'Trigger', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 180,
				)
			);

			// Mobile Menu Trigger Style.
			$mobile_trigger_style_choices = array(
				'default'  => __( 'Default', 'responsive' ),
				'bordered' => __( 'Outline', 'responsive' ),
			);
			$mobile_trigger_style         = __( 'Trigger Style', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_trigger_style', $mobile_trigger_style, 'responsive_customizer_mobile_trigger', 10, $mobile_trigger_style_choices, 'everyone', null );

			// Mobile Menu Trigger Icon.
			$mobile_trigger_icon_choices = array(
				'menu'  => __( 'Icon 1', 'responsive' ),
				'menu2' => __( 'Icon 2', 'responsive' ),
				'menu3' => __( 'Icon 3', 'responsive' ),
			);
			$mobile_trigger_icon         = __( 'Trigger Icon', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_trigger_icon', $mobile_trigger_icon, 'responsive_customizer_mobile_trigger', 15, $mobile_trigger_icon_choices, 'menu', null );



		}

	}

endif;

return new Responsive_Header_Trigger_Customizer();
