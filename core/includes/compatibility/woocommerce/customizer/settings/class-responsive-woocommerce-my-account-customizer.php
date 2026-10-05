<?php
/**
 * WooCommerce My Account Layout Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_My_Account_Customizer' ) ) :

	/**
	 * My Account Layout section.
	 */
	class Responsive_Woocommerce_My_Account_Customizer {

		/**
		 * Setup class.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Customizer options
		 *
		 * @param WP_Customize_Manager $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_section(
				'responsive_woocommerce_my_account',
				array(
					'title'    => esc_html__( 'My Account Layout', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 7,
				)
			);

			// Where the account menu sits. Refresh transport, the layout CSS is printed by PHP.
			responsive_select_button_control(
				$wp_customize,
				'my_account_navigation_layout',
				esc_html__( 'Navigation Layout', 'responsive' ),
				'responsive_woocommerce_my_account',
				10,
				array(
					'left'  => esc_html__( 'Left', 'responsive' ),
					'above' => esc_html__( 'Above', 'responsive' ),
					'right' => esc_html__( 'Right', 'responsive' ),
				),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_my_account_navigation_layout' ),
				null
			);

			// Show the logged in user's avatar and name above the account menu. Refresh transport, the markup is printed by PHP.
			responsive_toggle_control(
				$wp_customize,
				'my_account_show_user_info',
				esc_html__( 'Show user name and avatar?', 'responsive' ),
				'responsive_woocommerce_my_account',
				5,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_my_account_show_user_info' ),
				null
			);
		}
	}

endif;

return new Responsive_Woocommerce_My_Account_Customizer();
