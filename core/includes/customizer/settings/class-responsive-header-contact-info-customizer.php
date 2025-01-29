<?php
/**
 * Header Contact Info
 *
 * @package Responsive
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Header_Contact_Info_Customizer' ) ) :
	/**
	 * Header Contact Info Customizer Options
	 */
	class Responsive_Header_Contact_Info_Customizer {
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
				'responsive_header_contact_info',
				array(
					'title'    => __( 'Contact', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10, 
				)
			);
            $tabs_label      = esc_html__( 'Tabs', 'responsive' );
            $tab_ids_prefix  = 'customize-control-';
            $general_tab_ids  = array(
				
			);
			$design_tab_ids = array(
				
			);

			responsive_tabs_button_control( $wp_customize, 'responsive_header_contact_info', $tabs_label, 'responsive_header_contact_info', 10, '', 'responsive_contact_info_general_tab', 'responsive_contact_info_design_tab', $general_tab_ids, $design_tab_ids, null );

            $wp_customize->add_setting(
				'responsive_header_contact_info',
				array(
					'sanitize_callback' => 'responsive_sanitize_multi_select',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Contact_Info_Control(
					$wp_customize,
					'responsive_header_contact_info',
					array(
						'label'    => esc_html__( 'Header Contact Info', 'responsive' ),
						'section'  => 'responsive_header_contact_info',
						'settings' => 'responsive_header_contact_info',
						'priority' => 10,
                        'default'  => responsive_header_contact_info_elements(),
					),
				),
			);

            // Buttons Padding (px).
			$buttons_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'buttons', 'responsive_header_contact_info', 14, 10, 10, null, $buttons_padding_label );

			// Buttons Radius.
			$buttons_radius_label = __( 'Radius (px)', 'responsive' );
			// responsive_number_control( $wp_customize, 'buttons_radius', $buttons_radius_label, 'responsive_header_contact_info', 16, Responsive\Core\get_responsive_customizer_defaults( 'buttons_radius' ) );
			responsive_radius_control( $wp_customize, 'buttons_radius', 'responsive_header_contact_info', 17, 0, 0, null, $buttons_radius_label );

			// Buttons Border Width.
			$buttons_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'buttons_border_width', $buttons_border_width_label, 'responsive_header_contact_info', 16, 1, null, 200,1, 'postMessage' );
			// responsive_borderwidth_control( $wp_customize, 'buttons_border_width', 'responsive_header_contact_info', 17, 0, 0, null, $buttons_border_width_label );

			// Buttons Typography.
			$buttons_typography_label = esc_html__( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'button_typography_group', $buttons_typography_label, 'responsive_header_contact_info', 19, 'button_typography' );

			// Buttons.
			$general_buttons_label = esc_html__( 'Button Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_header_contact_info', 130 );

			// Button Color.
			$button_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_header_contact_info', 130, Responsive\Core\get_responsive_customizer_defaults( 'button' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'button_hover' ), 'button_hover' );
		}

	}
endif;
return new Responsive_Header_Contact_Info_Customizer();