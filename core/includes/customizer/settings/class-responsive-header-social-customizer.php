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
			$design_tab_ids  = array(
				$tab_ids_prefix . 'responsive_header_social_item_style',
				$tab_ids_prefix . 'responsive_header_social_item_use_brand_colors',
				$tab_ids_prefix . 'responsive_header_social_item_color',
				$tab_ids_prefix . 'responsive_header_social_item_background_color',
				$tab_ids_prefix . 'responsive_header_social_item_border_spacing',
				$tab_ids_prefix . 'responsive_header_social_item_border_style',
				$tab_ids_prefix . 'responsive_header_social_item_border_width',
				$tab_ids_prefix . 'responsive_border_header_social_radius',
				$tab_ids_prefix . 'responsive_header_social_border_radius_padding',
				$tab_ids_prefix . 'responsive_header_social_item_border_color',
				$tab_ids_prefix . 'responsive_header_social_item_icon_spacing',
				$tab_ids_prefix . 'responsive_header_social_item_icon_size',
				$tab_ids_prefix . 'responsive_header_social_item_typography_group',
				$tab_ids_prefix . 'responsive_header_social_item_margin_padding',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_header_social_items',
				$tab_ids_prefix . 'responsive_header_social_show_label',
				$tab_ids_prefix . 'responsive_header_social_item_spacing',
				$tab_ids_prefix . 'responsive_header_social_redirect_to_social_links',
			);

			responsive_tabs_button_control( $wp_customize, 'header_social_tabs', $tabs_label, 'responsive_header_social', 1, '', 'responsive_social_general_tab', 'responsive_social_design_tab', $general_tab_ids, $design_tab_ids, null );

			$wp_customize->add_setting(
				'responsive_header_social_items',
				array(
					'sanitize_callback' => 'responsive_sanitize_multi_select',
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
						'choices'  => responsive_header_social_elements(),
					),
				)
			);

			$wp_customize->add_setting(
				'responsive_header_social_show_label',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'theme_mod',
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'header_social_show_label' ),
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

			responsive_drag_number_control( $wp_customize, 'header_social_item_spacing', __( 'Item Spacing (px)', 'responsive' ), 'responsive_header_social', 55, 5, null, 50, 0, 'postMessage' );

			// Redirect to social links.
			responsive_redirect_control( $wp_customize, 'header_social_redirect_to_social_links', __( 'Set Social Links', 'responsive' ), 'responsive_header_social', 60, 'section', 'responsive_social_links');
			
			$social_item_style_choices = array(
				'filled'  => esc_html__( 'Filled', 'responsive' ),
				'outline' => esc_html__( 'Outline', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_social_item_style', __( 'Social Style', 'responsive' ), 'responsive_header_social', 60, $social_item_style_choices, 'filled', null );

			$social_item_use_brands_colors_choices = array(
				'no'          => esc_html__( 'No', 'responsive' ),
				'yes'         => esc_html__( 'Yes', 'responsive' ),
				'on-hover'    => esc_html__( 'On Hover', 'responsive' ),
				'until-hover' => esc_html__( 'Until Hover', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_social_item_use_brand_colors', __( 'Use Brand Colors', 'responsive' ), 'responsive_header_social', 60, $social_item_use_brands_colors_choices, 'no', null );

			responsive_color_control( $wp_customize, 'header_social_item', __( 'Colors', 'responsive' ), 'responsive_header_social', 65, Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_hover_color' ), 'header_social_item_hover' );
			
			responsive_color_control( $wp_customize, 'header_social_item_background', __( 'Background Colors', 'responsive' ), 'responsive_header_social', 66, Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_bg_color' ), 'responsive_show_social_background_colors', '', true, Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_bg_hover_color' ), 'header_social_item_background_hover' );

			responsive_separator_control( $wp_customize, 'header_social_item_border_spacing', esc_html__( 'Border', 'responsive' ), 'responsive_header_social', 70 );

			$social_item_border_style_choices = array(
				'none'   => esc_html__( 'None', 'responsive' ),
				'solid'  => esc_html__( 'Solid', 'responsive' ),
				'dashed' => esc_html__( 'Dashed', 'responsive' ),
				'dotted' => esc_html__( 'Dotted', 'responsive' ),
				'double' => esc_html__( 'Double', 'responsive' ),
			);

			responsive_select_button_control( $wp_customize, 'header_social_item_border_style', __( 'Border Style', 'responsive' ), 'responsive_header_social', 75, $social_item_border_style_choices, 'none', null, 'postMessage' );

			responsive_drag_number_control( $wp_customize, 'header_social_item_border_width', __( 'Border Width (px)', 'responsive' ), 'responsive_header_social', 85, 0, null, 100, 0, 'postMessage' );

			responsive_radius_control( $wp_customize, 'header_social_radius', 'responsive_header_social', 86, Responsive\Core\get_responsive_customizer_defaults( 'header_social_border_radius' ), Responsive\Core\get_responsive_customizer_defaults( 'header_social_border_radius' ), null, __( 'Border Radius (px)', 'responsive' ) );

			responsive_color_control( $wp_customize, 'header_social_item_border', __( 'Border Color', 'responsive' ), 'responsive_header_social', 87, Responsive\Core\get_responsive_customizer_defaults( 'header_social_border_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'header_social_border_hover_color' ), 'header_social_item_border_hover' );

			responsive_separator_control( $wp_customize, 'header_social_item_icon_spacing', esc_html__( ' ', 'responsive' ), 'responsive_header_social', 88 );

			responsive_drag_number_control( $wp_customize, 'header_social_item_icon_size', __( 'Icon Size (px)', 'responsive' ), 'responsive_header_social', 89, 16, null, 200, 0, 'postMessage' );

			responsive_typography_group_control( $wp_customize, 'header_social_item_typography_group', esc_html__( 'Label Font', 'responsive' ), 'responsive_header_social', 90, 'header_social_item_typography' );

			responsive_padding_control( $wp_customize, 'header_social_item_margin', 'responsive_header_social', 91, Responsive\Core\get_responsive_customizer_defaults( 'header_social_margin_y' ), Responsive\Core\get_responsive_customizer_defaults( 'header_social_margin_x' ), null, 'Margin (px)' );
		}
	}

endif;

return new Responsive_Header_Social_Icons_Customizer();
