<?php
/**
 * Styling Options for Responsive Theme.
 *
 * @package     Responsive
 * @author      Responsive
 * @copyright   Copyright (c) 2019, Responsive
 * @link        https://cyberchimps.com/
 * @since       1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Siteidentity_Configs' ) ) {

	/**
	 * Register Body Color Customizer Configurations.
	 */
	class Responsive_Customizer_Siteidentity_Configs extends Responsive_Customizer_Config_Base {

		/**
		 * Register Body Color Customizer Configurations.
		 *
		 * @param Array                $configurations Responsive Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Responsive Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {
			error_log('in the register_configuration');
			$_configs = array(

				/**
				 * Option: custom control
				 */
				array(
					'name'           => 'responsive_display_tagline',
					'default'        => '',
					'type'           => 'control',
					'control'        => 'checkbox',
					'section'        => 'title_tagline',
					'required'       => 0,
					'title'          => __( 'Display Site Tagline', 'responsive' ),
				)
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Responsive_Customizer_Siteidentity_Configs;
