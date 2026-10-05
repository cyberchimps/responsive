<?php
/**
 * WooCommerce Store Notice Customizer Options
 *
 * Adds text and background color controls to WooCommerce's own Store Notice section.
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Store_Notice_Customizer' ) ) :

	/**
	 * Store notice text and background colors.
	 */
	class Responsive_Woocommerce_Store_Notice_Customizer {

		/**
		 * Setup class.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Only show the color controls while "Enable store notice" is ticked.
		 *
		 * The setting is read through the customizer manager so an unsaved (previewed) value is respected.
		 *
		 * @param WP_Customize_Control $control Control being checked.
		 * @return bool
		 */
		public static function is_store_notice_enabled( $control ) {
			$setting = $control->manager->get_setting( 'woocommerce_demo_store' );
			return $setting && 'yes' === wc_bool_to_string( $setting->value() );
		}

		/**
		 * Customizer options
		 *
		 * @param WP_Customize_Manager $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$section = 'woocommerce_store_notice';

			// Store Notice Text Color (Normal, Hover).
			responsive_color_control(
				$wp_customize,
				'store_notice_text',
				esc_html__( 'Text Color', 'responsive' ),
				$section,
				30,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_store_notice_text_color' ),
				array( __CLASS__, 'is_store_notice_enabled' ),
				'',
				true,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_store_notice_text_hover_color' ),
				'store_notice_text_hover'
			);

			// Store Notice Background Color (Normal, Hover).
			responsive_color_control(
				$wp_customize,
				'store_notice_background',
				esc_html__( 'Background Color', 'responsive' ),
				$section,
				31,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_store_notice_background_color' ),
				array( __CLASS__, 'is_store_notice_enabled' ),
				'',
				true,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_store_notice_background_hover_color' ),
				'store_notice_background_hover'
			);

			// Store Notice Position. Refresh transport, the saved CSS decides the layout.
			responsive_select_button_control(
				$wp_customize,
				'store_notice_position',
				esc_html__( 'Notice Position', 'responsive' ),
				$section,
				32,
				array(
					'hang-over-top' => esc_html__( 'Hang Over Top', 'responsive' ),
					'top'           => esc_html__( 'Top', 'responsive' ),
					'bottom'        => esc_html__( 'Bottom', 'responsive' ),
				),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_store_notice_position' ),
				array( __CLASS__, 'is_store_notice_enabled' )
			);

			// Store Notice Font. The font controls themselves come from the global typography class, only the group toggle is registered here.
			responsive_typography_group_control(
				$wp_customize,
				'store_notice_typography_group',
				esc_html__( 'Font', 'responsive' ),
				$section,
				33,
				'store_notice_typography',
				true,
				array( __CLASS__, 'is_store_notice_enabled' )
			);
		}
	}

endif;

return new Responsive_Woocommerce_Store_Notice_Customizer();
