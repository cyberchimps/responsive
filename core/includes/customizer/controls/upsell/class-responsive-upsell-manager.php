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
		$this->register_type( 'Responsive_Section_Upsell', 'section' );
		$this->register_type( 'Responsive_Control_Upsell', 'control' );
		$this->add_main_upsell();
	}

	/**
	 * Change controls
	 */
	public function change_controls() {
		$this->change_customizer_object( 'section', 'responsive_front_page_sections_upsell_section', 'active_callback', '__return_true' );
		$this->change_customizer_object( 'section', 'responsive_front_page_translation_upsell_section', 'active_callback', '__return_true' );
	}

	/**
	 * Adds main
	 */
	private function add_main_upsell() {
		$this->add_section(
			new Responsive_Customizer_Section(
				'responsive_upsell_main_section',
				array(
					'title'    => esc_html__( 'View PRO Features', 'responsive' ),
					'priority' => 2,
				)
			)
		);

		$this->add_control(
			new Responsive_Customizer_Control(
				'responsive_upsell_main_control',
				array(
					'sanitize_callback' => 'sanitize_text_field',
				),
				array(
					'section'     => 'responsive_upsell_main_section',
					'priority'    => 100,
					'options'     => array(
						esc_html__( 'Pro Ready Sites', 'responsive' ),
						esc_html__( 'Form Builder', 'responsive' ),
						esc_html__( 'Interactive Sliders and Carousels', 'responsive' ),
						esc_html__( 'Pricing Tables', 'responsive' ),
						esc_html__( 'Portfolio and Post Layouts', 'responsive' ),
						esc_html__( 'Private, Priority Support', 'responsive' ),
					),
					'button_url'  => esc_url( apply_filters( 'responsive_upgrade_link_from_child_theme_filter', 'https://cyberchimps.com/responsive-go-pro/?utm_source=free-to-pro&utm_medium=responsive-theme&utm_campaign=responsive-pro&utm_content=customizer-view-pro-features' ) ),
					'button_text' => esc_html__( 'Get the PRO version!', 'responsive' ),
				),
				'Responsive_Control_Upsell'
			)
		);
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
