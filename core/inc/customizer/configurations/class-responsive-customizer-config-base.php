<?php
/**
 * Responsive Theme Customizer Configuration Base.
 *
 * @package     Responsive
 * @author      Responsive
 * @copyright   Copyright (c) 2019, Cyberchmips
 * @link        https://cyberchmips.com/
 * @since       Responsive 3.15
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Responsive_Customizer_Config_Base' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Responsive_Customizer_Config_Base {

		/**
		 * Constructor
		 */
		public function __construct() {

			add_filter( 'responsive_customizer_configurations', array( $this, 'register_configuration' ), 30, 2 );
		}

		/**
		 * Base Method for Registering Customizer Configurations.
		 *
		 * @param Array                $configurations Responsive Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Responsive Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {
			return $configurations;
		}

		/**
		 * Section Description
		 *
		 * @since 1.4.3
		 *
		 * @param  array $args Description arguments.
		 * @return mixed       Markup of the section description.
		 */
		public function section_get_description( $args ) {
			return $content;
		}

	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Responsive_Customizer_Config_Base;
