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
				$tab_ids_prefix . 'responsive_header_contact_info',
				$tab_ids_prefix . 'responsive_header_contact_info_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_style',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_style_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_shape',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_shape_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_size',
				$tab_ids_prefix . 'responsive_header_contact_info_icon_size_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_item_spacing',
			);
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_header_contact_info_icons_color',
				$tab_ids_prefix . 'responsive_header_contact_info_icons_color_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_background_color',
				$tab_ids_prefix . 'responsive_header_contact_info_icons_bg_color_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_font_color',
				$tab_ids_prefix . 'responsive_header_contact_info_font_color_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_typography_group',
				$tab_ids_prefix . 'responsive_header_contact_info_typography_separator',
				$tab_ids_prefix . 'responsive_header_contact_info_margin_padding',
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

            responsive_horizontal_separator_control($wp_customize, 'header_contact_info_separator', 1, 'responsive_header_contact_info', 10, 1, );

			$icon_shape = array(
				'none'    => esc_html__( 'None', 'responsive' ),
				'rounded' => esc_html__( 'Rounded', 'responsive' ),
				'shape'   => esc_html__( 'Square', 'responsive' ),
			);

			responsive_select_button_control( $wp_customize, 'header_contact_info_icon_shape', esc_html__( 'Icon Shape', 'responsive' ), 'responsive_header_contact_info', 10, $icon_shape, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_shape' ), null );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_icon_shape_separator', 1, 'responsive_header_contact_info', 10, 1 );

			$icon_style = array(
				'filled'  => esc_html__( 'Filled', 'responsive' ),
				'outline' => esc_html__( 'Outline', 'responsive' ),
			);

			responsive_select_button_control( $wp_customize, 'header_contact_info_icon_style', esc_html__( 'Icon Style', 'responsive' ), 'responsive_header_contact_info', 10, $icon_style, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_style' ), null );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_icon_style_separator', 1, 'responsive_header_contact_info', 10, 1, );

			responsive_drag_number_control( $wp_customize, 'header_contact_info_icon_size', __( 'Icon Size (px)', 'responsive' ), 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_size' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_icon_size_separator', 1, 'responsive_header_contact_info', 10, 1, );

			responsive_drag_number_control( $wp_customize, 'header_contact_info_item_spacing', __( 'Item Spacing (px)', 'responsive' ), 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_item_spacing' ), null, 100, 1, 'postMessage' );

			responsive_color_control( $wp_customize, 'header_contact_info_icons', __( 'Icons Color', 'responsive' ), 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_hover_color' ), 'header_contact_info_icons_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_icons_color_separator', 1, 'responsive_header_contact_info', 10, 1, );

			responsive_color_control( $wp_customize, 'header_contact_info_background', __( 'Background Color', 'responsive' ), 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_hover_color' ), 'header_contact_info_background_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_icons_bg_color_separator', 1, 'responsive_header_contact_info', 10, 1, );
			
			responsive_color_control( $wp_customize, 'header_contact_info_font', __( 'Font Color', 'responsive' ), 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_hover_color' ), 'header_contact_info_font_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_font_color_separator', 1, 'responsive_header_contact_info', 10, 1, );

			responsive_typography_group_control( $wp_customize, 'header_contact_info_typography_group', __( 'Font', 'responsive' ), 'responsive_header_contact_info', 10, 'header_contact_info_typography' );

			responsive_horizontal_separator_control($wp_customize, 'header_contact_info_typography_separator', 1, 'responsive_header_contact_info', 10, 1, );

			responsive_padding_control( $wp_customize, 'header_contact_info_margin', 'responsive_header_contact_info', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ), Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ), '', __( 'Margin', 'responsive' ) );

		}

	}
endif;
return new Responsive_Header_Contact_Info_Customizer();