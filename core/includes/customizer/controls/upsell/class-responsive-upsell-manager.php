<?php
/**
 * Upsell Manager
 *
 * @package Responsive
 */

/**
 * Class Responsive_Upsell_Manager
 */
class Responsive_Upsell_Manager extends Responsive_Register_Customizer_Controls {

	/**
	 * Cunstructor
	 */
	public function __construct() {
		parent::init();
	}
	/**
	 * Add the controls.
	 */
	public function add_controls() {
	}

	/**
	 * Change controls
	 */
	public function change_controls() {
		$this->change_customizer_object( 'section', 'responsive_front_page_sections_upsell_section', 'active_callback', '__return_true' );
		$this->change_customizer_object( 'section', 'responsive_front_page_translation_upsell_section', 'active_callback', '__return_true' );
	}


	/**
	 * Check if should display upsell.
	 *
	 * @since 1.1.45
	 * @access public
	 * @return bool
	 */
	private function should_display_upsells() {
		$current_time    = time();
		$show_after      = 12 * HOUR_IN_SECONDS;
		$activation_time = get_option( 'responsive_time_activated' );

		if ( empty( $activation_time ) ) {
			return false;
		}

		if ( $current_time < $activation_time + $show_after ) {
			return false;
		}

		return true;
	}
}

if ( ! class_exists( 'Responsive_Addons_Pro_Public' ) ) {
	new Responsive_Upsell_Manager();
}
