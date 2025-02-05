<?php
/**
 * Create search section in header builder
 *
 * @package Responsive
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Header_Search_Customizer' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Header_Search_Customizer {
		/**
		 * Setup class.
		 *
		 * @since 6.1.3
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}
		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 6.1.3
		 */
		public function customizer_options( $wp_customize ) {
				$wp_customize->add_section(
					'responsive_header_search',
					array(
						'title'    => esc_html__( 'Header Search', 'responsive' ),
						'panel'    => 'responsive_header',
						'priority' => 120,
					)
				);
			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_header_search_label',
				$general_tab_ids_prefix . 'responsive_header_search_label_visibility',
				$general_tab_ids_prefix . 'responsive_header_search_icon',
				$general_tab_ids_prefix . 'search_style',
				$general_tab_ids_prefix . 'responsive_header_search_separator1',
				$general_tab_ids_prefix . 'responsive_header_search_separator2',
				$general_tab_ids_prefix . 'responsive_header_search_separator3',
			);
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_header_search_style_design',
				$design_tab_ids_prefix . 'responsive_header_search_border',
				$design_tab_ids_prefix . 'responsive_header_search_icon_size',
				$design_tab_ids_prefix . 'responsive_header_search_color',
				$design_tab_ids_prefix . 'responsive_header_search_background_color',
				$design_tab_ids_prefix . 'responsive_header_search_label_typography_group',
				$design_tab_ids_prefix . 'responsive_header_search_padding_padding',
				$design_tab_ids_prefix . 'responsive_header_search_margin_padding',
				$design_tab_ids_prefix . 'responsive_header_search_modal_options_separator',
				$design_tab_ids_prefix . 'responsive_header_search_text_color',
				$design_tab_ids_prefix . 'responsive_header_search_modal_background_color',
				$design_tab_ids_prefix . 'responsive_header_search_separator4',
				$design_tab_ids_prefix . 'responsive_header_search_separator5',
				$design_tab_ids_prefix . 'responsive_header_search_separator6',
				$design_tab_ids_prefix . 'responsive_header_search_separator7',
				$design_tab_ids_prefix . 'responsive_header_search_separator8',
				$design_tab_ids_prefix . 'responsive_header_search_separator9',
				$design_tab_ids_prefix . 'responsive_header_search_separator10',
				$design_tab_ids_prefix . 'responsive_header_search_separator11',
				$design_tab_ids_prefix . 'responsive_header_search_separator12',
				$design_tab_ids_prefix . 'responsive_header_search_width',
				$design_tab_ids_prefix . 'responsive_header_search_separator13',
				$design_tab_ids_prefix . 'responsive_border_header_search_border_radius',
				$design_tab_ids_prefix . 'responsive_header_search_separator14',
			);
		
			responsive_tabs_button_control( $wp_customize, 'header_search_tabs', $tabs_label, 'responsive_header_search', 1, '', 'responsive_header_search_general_tab', 'responsive_header_search_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Search Style.
			$wp_customize->add_setting(
				'search_style',
				array(
					'default'           => 'search',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Button_Control(
					$wp_customize,
					'search_style',
					array(
						'label'           => __( 'Search Type', 'responsive' ),
						'section'         => 'responsive_header_search',
						'priority'        => 10,
						'settings'        => 'search_style',
						'choices'         => array(
							'search'      => esc_html__( 'Slide', 'responsive' ),
							'full-screen' => esc_html__( 'Full Screen', 'responsive' ),
							'search-box'  => esc_html__( 'Search Box', 'responsive' ),
						),
					)
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator1', 1, 'responsive_header_search', 15, 1 );

			// Search Label Text.
			$wp_customize->add_setting(
				'responsive_header_search_label',
				array(
					'default'           => '',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_header_search_label',
				array(
					'label'    => __( 'Search Label', 'responsive' ),
					'section'  => 'responsive_header_search',
					'settings' => 'responsive_header_search_label',
					'type'     => 'text',
					'priority' => 20,
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator2', 1, 'responsive_header_search', 25, 1 );

			// Search Label Visibility.
			$search_label_visibility   = esc_html__( 'Search Label Visibility', 'responsive' );
			$search_label_visibility_choices = array(
				'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
				'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
				'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
			);
			responsive_multi_select_button_control( $wp_customize, 'header_search_label_visibility', $search_label_visibility, 'responsive_header_search', 30, $search_label_visibility_choices, array( 'desktop', 'tablet', 'mobile' ) , null );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator3', 1, 'responsive_header_search', 35, 1 );

			// Search Icon
			$wp_customize->add_setting(
				'responsive_header_search_icon',
				array(
					'default'           => 'search1',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Button_Control(
					$wp_customize,
					'responsive_header_search_icon',
					array(
						'label'    => __( 'Search Icon', 'responsive' ),
						'section'  => 'responsive_header_search',
						'settings' => 'responsive_header_search_icon',
						'priority' => 40,
						'choices'  => array(
							'search1' => esc_html__( 'icon_header_search1', 'responsive' ),
							'search2' => esc_html__( 'icon_header_search2', 'responsive' ),
						),
					)
				)
			);

			// Search Style.
			$search_style_label   = esc_html__( 'Search Style', 'responsive' );
			$search_style_choices = array(
				'default'  => esc_html__( 'Default', 'responsive' ),
				'bordered' => esc_html__( 'Bordered', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_search_style_design', $search_style_label, 'responsive_header_search', 50, $search_style_choices, 'bordered', null, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator5', 1, 'responsive_header_search', 55, 1 );

			// Search Border.
			$header_search_border_label = esc_html__( 'Search Border', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_border', $header_search_border_label, 'responsive_header_search', 60, 1, null, 50, 0, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator6', 1, 'responsive_header_search', 65, 1 );

			// Search Radius.
			$border_radius_label = __( 'Search Radius (px)', 'responsive' );
			responsive_radius_control( $wp_customize, 'header_search_border_radius', 'responsive_header_search', 66, 0, 0, null, $border_radius_label );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator14', 1, 'responsive_header_search', 67, 1 );

			// Search Width.
			$header_search_icon_size_label = __( 'Search Input Width (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'header_search_width', $header_search_icon_size_label, 'responsive_header_search', 68, 300, null, 600, 100, 'postMessage', 1, 200, 150 );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator13', 1, 'responsive_header_search', 69, 1 );

			// Icon Size.
			$header_search_icon_size_label = __( 'Icon Size (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'header_search_icon_size', $header_search_icon_size_label, 'responsive_header_search', 70, 16, null, 100, 0, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator7', 1, 'responsive_header_search', 75, 1 );

			// Search Color.
			$header_search_color_label = __( 'Search Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_search', $header_search_color_label, 'responsive_header_search', 80, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_hover_color' ), 'header_search_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator8', 1, 'responsive_header_search', 85, 1 );

			// Search Background.
			$header_search_background_color_label = __( 'Search Background', 'responsive' );
			responsive_color_control( $wp_customize, 'header_search_background', $header_search_background_color_label, 'responsive_header_search', 90, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_hover_color' ), 'header_search_background_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator9', 1, 'responsive_header_search', 95, 1 );

			// Label Font
			$header_search_label_typography = __( 'Label Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_search_label_typography_group', $header_search_label_typography, 'responsive_header_search', 100, 'header_search_label_typography' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator10', 1, 'responsive_header_search', 105, 1 );

			// Search Padding.
			$header_search_padding_label = __( 'Search Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'header_search_padding', 'responsive_header_search', 110, 10, 10, null, $header_search_padding_label );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator11', 1, 'responsive_header_search', 115, 1 );

			// Search Margin.
			$search_margin_label = esc_html__( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'header_search_margin', 'responsive_header_search', 120, 0, 0, null, $search_margin_label );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator12', 2, 'responsive_header_search', 125, 1 );

			// Modal Options.
			$search_modal_options_label = __( 'Modal Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_search_modal_options_separator', $search_modal_options_label, 'responsive_header_search', 130 );

			// Text Color.
			$header_search_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_search_text', $header_search_text_color_label, 'responsive_header_search', 140, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_hover_color' ), 'header_search_text_hover' );

			responsive_horizontal_separator_control($wp_customize, 'header_search_separator4', 1, 'responsive_header_search', 145, 1 );

			// Modal Background.
			$header_search_text_color_label = __( 'Modal Background', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'header_search_modal_background', $header_search_text_color_label, 'responsive_header_search', 150, '#FFFFFF', null, '' );
		}
	}
endif;
return new Responsive_Header_Search_Customizer();