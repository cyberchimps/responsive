<?php
/**
 * Header Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Builder_Section_Customizer' ) ) :
	/**
	 *  Header Menu Customizer Options
	 */
	class Responsive_Header_Builder_Section_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
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
				'responsive_header_builder_section',
				array(
					'title'    => __( 'Header Builder Section', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 27, 
				)
			);

			$tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';

			$style_tab_ids = array(
				$tab_ids_prefix . 'responsive_header_builder_width',
				$tab_ids_prefix . 'responsive_header_builder_margin_padding',
				$tab_ids_prefix . 'responsive_mobile_menu_breakpoint',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_header_available_items',
				$tab_ids_prefix . 'responsive_header_mobile_tablet_available_items',
				$tab_ids_prefix . 'responsive_header_redirects_separator',
				$tab_ids_prefix . 'responsive_redirect_to_primary_header',
				$tab_ids_prefix . 'responsive_redirect_to_content_header',
				$tab_ids_prefix . 'responsive_redirect_to_sticky_header',
				$tab_ids_prefix . 'responsive_redirect_to_transparent_header',
			);

			responsive_tabs_button_control(
				$wp_customize,
				'header_builder_section_tabs',
				$tabs_label,
				'responsive_header_builder_section',
				1,
				'',
				'responsive_header_builder_general_tab',
				'responsive_header_builder_style_tab',
				$general_tab_ids,
				$style_tab_ids,
				null
			);

			$wp_customize->add_setting(
				'responsive_header_available_items',
				array(
					'sanitize_callback' => 'responsive_sanitize_builder',
					'transport'         => 'refresh',
				)
			);

			$header_builder_choices = Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_builder_choices' );
			if ( class_exists( 'woocommerce' ) ) {
				$header_builder_choices['woo-cart'] = array(
					'name'    => esc_html__( 'Cart', 'responsive' ),
					'section' => 'responsive_header_woo_cart',
					'icon'    => 'cart',
				);
			}

			// Desktop available items control
			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Available_Items_Drag_Control(
					$wp_customize,
					'responsive_header_available_items',
					array(
						'label'           => esc_html__( 'Available Items', 'responsive' ),
						'section'         => 'responsive_header_builder_section',
						'settings'        => 'responsive_header_available_items',
						'priority'        => 10,
						'input_attrs'     => array(
							'group' => 'header_desktop_items',
							'rows'  => array( 'above', 'primary', 'below' ),
						),
						'builder_choices' => $header_builder_choices,
					)
				)
			);

			// Mobile/Tablet available items control
			$wp_customize->add_setting(
				'responsive_header_mobile_tablet_available_items',
				array(
					'sanitize_callback' => 'responsive_sanitize_builder',
					'transport'         => 'refresh',
				)
			);

			$header_mobile_tablet_builder_choices = Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_builder_mobile_tablet_choices' );
			if ( class_exists( 'woocommerce' ) ) {
				$header_mobile_tablet_builder_choices['woo-cart'] = array(
					'name'    => esc_html__( 'Cart', 'responsive' ),
					'section' => 'responsive_mobile_header_woo_cart',
					'icon'    => 'cart',
				);
			}

			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Available_Items_Drag_Control(
					$wp_customize,
					'responsive_header_mobile_tablet_available_items',
					array(
						'label'           => esc_html__( 'Available Items', 'responsive' ),
						'section'         => 'responsive_header_builder_section',
						'settings'        => 'responsive_header_mobile_tablet_available_items',
						'priority'        => 11,
						'input_attrs'     => array(
							'group' => 'header_mobile_tablet_items',
							'rows'  => array( 'popup', 'above', 'primary', 'below' ),
						),
						'builder_choices' => $header_mobile_tablet_builder_choices,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'header_redirects_separator', 1, 'responsive_header_builder_section',10, 1 );

			$configure_footer_menu_redirect_label = __( 'Primary Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_primary_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_layout');

			$configure_footer_menu_redirect_label = __( 'Content Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_content_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_content_header_layout');

			// $configure_footer_menu_redirect_label = __( 'Header Widgets', 'responsive' );
			// responsive_redirect_control( $wp_customize, 'redirect_to_header_widgets_section', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_widget');

			$configure_footer_menu_redirect_label = __( 'Sticky Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_sticky_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_sticky_header_menu');

			$configure_footer_menu_redirect_label = __( 'Transparent Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_transparent_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_transparent');

			// Style Tab Controls.
			// Header Width.
			$header_width_label   = __( 'Header Width', 'responsive' );
			$header_width_choices = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Wide Container Width', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_builder_width', $header_width_label, 'responsive_header_builder_section', 20, $header_width_choices, 'contained', null, 'postMessage' );

			// Margin.
			$header_margin_label = esc_html__( 'Margin', 'responsive' );
			responsive_padding_control( $wp_customize, 'header_builder_margin', 'responsive_header_builder_section', 30, 0, 0, null, $header_margin_label );

			// Screen Size to switch to mobile header (breakpoint).
			$mobile_breakpoint_label = __( 'Screen Size to switch to mobile header (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_menu_breakpoint', $mobile_breakpoint_label, 'responsive_header_builder_section', 50, 767, null, 4096, 1, 'postMessage' );

		}

	}

endif;

// return null;
return new Responsive_Header_Builder_Section_Customizer();

