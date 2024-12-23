<?php
/**
 * Header Social Icons
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Social_Icons_Customizer' ) ) :
	/**
	 * Header Social Icons Customizer Options
	 */
	class Responsive_Header_Social_Icons_Customizer {

		/**
		 * Constructor
		 *
		 * @since 1.0.5
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

			$wp_customize->add_section(
				'responsive_header_social',
				array(
					'title'    => __( 'Header Social', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 27, 
				)
			);

            $tabs_label      = esc_html__( 'Tabs', 'responsive' );
            $tab_ids_prefix  = 'customize-control-';
            $design_tab_ids  = array();
			$general_tab_ids = array();
			responsive_tabs_button_control( $wp_customize, 'header_social_tabs', $tabs_label, 'responsive_header_social', 1, '', 'responsive_social_general_tab', 'responsive_social_design_tab', $general_tab_ids, $design_tab_ids, null );

			$wp_customize->add_setting(
				'responsive_header_social_items',
				array(
					'default'           => array( 'facebook', 'x', 'instagram' ),
					'sanitize_callback' => 'responsive_sanitize_social',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Social_Control(
					$wp_customize,
					'responsive_header_social_items',
					array(
						'label' => esc_html__( 'Header Social Items', 'responsive' ),
						'section' => 'responsive_header_social',
						'settings' => 'responsive_header_social_items',
						'priority' => 25,
						'choices'  => $this->responsive_header_social_elements(),
					),
				)
			);

			$wp_customize->add_setting(
				'responsive_header_social_show_label',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'theme_mod',
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_social_show_label' ),
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'responsive_header_social_show_label',
					array(
						'label'    => __( 'Show Icon Label', 'responsive' ),
						'section'  => 'responsive_header_social',
						'settings' => 'responsive_header_social_show_label',
						'priority' => 50,
					)
				)
			);

			// Redirect to social links.
			responsive_redirect_control( $wp_customize, 'redirect_to_social_links', __( 'Set Social Links', 'responsive' ), 'responsive_header_social', 60, 'section', 'responsive_social_links');
		}

		/**
		 * Returns header social elements for the customizer.
		 *
		 * @since 0.2
		 */
		public function responsive_header_social_elements() {
			// Default elements.
			$elements = apply_filters(
				'responsive_header_social_elements',
				array(
					'facebook'  => esc_html__( 'Facebook', 'responsive' ),
					'x'         => esc_html__( 'X', 'responsive' ),
					'instagram' => esc_html__( 'Instagram', 'responsive' ),
				)
			);
	
			// Return elements.
			return $elements;
	
		}
	}

endif;

return new Responsive_Header_Social_Icons_Customizer();
