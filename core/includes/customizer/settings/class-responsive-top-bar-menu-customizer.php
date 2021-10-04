<?php
/**
 * Top Bar Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Top_Bar_Menu_Customizer' ) ) :
	/**
	 * Top Bar Menu Customizer Options */
	class Responsive_Top_Bar_Menu_Customizer {

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

			/**
			 * Section for top bar menu.
			 */
			$wp_customize->add_section(
				'responsive_top_bar_menu',
				array(
					'title'    => esc_html__( 'Top Bar Menu', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 26,

				)
			);

			$top_bar_menu_settings_label = esc_html__( 'Top Bar Menu Settings', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_bar_menu_settings', $top_bar_menu_settings_label, 'responsive_top_bar_menu', 5 );

			// Enable Top Bar Menu.
			$enable_top_bar_menu_label = __( 'Enable Top Bar Menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_top_bar_menu', $enable_top_bar_menu_label, 'responsive_top_bar_menu', 10, 1, null );

			// Top Bar Menu Full Width.
			$top_bar_menu_full_width_label = __( 'Top Bar Menu Full Width', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_top_bar_menu_full_width', $top_bar_menu_full_width_label, 'responsive_top_bar_menu', 15, 0, 'responsive_top_bar_menu_active' );

			// Top Bar Menu Width.
			$top_bar_menu_width_label = __( 'Top Bar Menu Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_bar_menu_width', $top_bar_menu_width_label, 'responsive_top_bar_menu', 20, 1140, 'responsive_top_bar_menu_width_selected', 2000, 1, 'postMessage' );

			// Top Bar Menu Alignment.
			$top_bar_menu_alignment_label   = __( 'Top Bar Menu Alignment', 'responsive' );
			$top_bar_menu_alignment_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'top_bar_menu_alignment', $top_bar_menu_alignment_label, 'responsive_top_bar_menu', 25, $top_bar_menu_alignment_choices, 'left', 'responsive_top_bar_menu_active', 'postMessage' );

			// Top Bar Menu Items Padding.
			$top_bar_menu_items_horizontal_padding = __( 'Menu Items Padding', 'responsive' );
			responsive_padding_control( $wp_customize, 'top_bar_menu_items_padding', 'responsive_top_bar_menu', 30, 10, 10, 'responsive_top_bar_menu_active', $top_bar_menu_items_horizontal_padding );

			// Top Bar Menu Colors.
			$top_bar_menu_colors_label = __( 'Top Bar Menu Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_bar_menu_colors', $top_bar_menu_colors_label, 'responsive_top_bar_menu', 35, 'responsive_top_bar_menu_active' );

			// Top Bar Menu Background Color.
			$top_bar_menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_background', $top_bar_menu_background_color_label, 'responsive_top_bar_menu', 40, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Item Background Color.
			$top_bar_menu_item_bg_color_label = __( 'Menu Item Background', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_item_background', $top_bar_menu_item_bg_color_label, 'responsive_top_bar_menu', 45, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Item Background Hover Color.
			$top_bar_menu_item_bg_hover_color_label = __( 'Menu Item Background Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_item_background_hover', $top_bar_menu_item_bg_hover_color_label, 'responsive_top_bar_menu', 50, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Active Item Background Color.
			$top_bar_menu_active_item_bg_color_label = __( 'Active Menu Item Background', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_active_item_bg', $top_bar_menu_active_item_bg_color_label, 'responsive_top_bar_menu', 55, '#0066CC', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Active Item Background Hover Color.
			$top_bar_menu_active_item_bg_hover_color_label = __( 'Active Menu Item Background Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_active_item_bg_hover', $top_bar_menu_active_item_bg_hover_color_label, 'responsive_top_bar_menu', 60, '#10659C', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Item Link Color.
			$top_bar_menu_item_link_color_label = __( 'Menu Item Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_item_link', $top_bar_menu_item_link_color_label, 'responsive_top_bar_menu', 65, '#333333', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Item Link Hover Color.
			$top_bar_menu_item_link_hover_color_label = __( 'Menu Item Text Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_item_link_hover', $top_bar_menu_item_link_hover_color_label, 'responsive_top_bar_menu', 70, '#10659C', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Active Item Link Color.
			$top_bar_menu_active_link_color_label = __( 'Active Menu Item Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_active_item_link', $top_bar_menu_active_link_color_label, 'responsive_top_bar_menu', 75, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Menu Active Item Link Hover Color.
			$top_bar_menu_active_item_link_hover_label = __( 'Active Menu Item Text Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_menu_active_item_link_hover', $top_bar_menu_active_item_link_hover_label, 'responsive_top_bar_menu', 80, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Settings.
			$top_bar_sub_menu_settings_label = __( 'Top Bar Sub-Menu Settings', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_bar_sub_menu_settings', $top_bar_sub_menu_settings_label, 'responsive_top_bar_menu', 85, 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Padding.
			$top_bar_sub_menu_padding_label = __( 'Sub-Menu Padding', 'responsive' );
			responsive_padding_control( $wp_customize, 'top_bar_sub_menu_item_padding', 'responsive_top_bar_menu', 90, 10, 10, 'responsive_top_bar_menu_active', $top_bar_sub_menu_padding_label );

			// Top Bar Sub Menu Colors.
			$top_bar_sub_menu_colors_label = __( 'Top Bar Sub-Menu Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_bar_sub_menu_colors', $top_bar_sub_menu_colors_label, 'responsive_top_bar_menu', 95, 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Background Color.
			$top_bar_sub_menu_item_bg_color_label = __( 'Sub-Menu Item Background', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_sub_menu_item_background', $top_bar_sub_menu_item_bg_color_label, 'responsive_top_bar_menu', 100, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Background Hover Color.
			$top_bar_sub_menu_item_bg_hover_color_label = __( 'Sub-Menu Item Background Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_sub_menu_item_background_hover', $top_bar_sub_menu_item_bg_hover_color_label, 'responsive_top_bar_menu', 105, '#FFFFFF', 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Item Link Color.
			$top_bar_sub_menu_item_link_color_label = __( 'Sub-Menu Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_sub_menu_item_link', $top_bar_sub_menu_item_link_color_label, 'responsive_top_bar_menu', 110, '#333333', 'responsive_top_bar_menu_active' );

			// Top Bar Sub Menu Item Link Hover Color.
			$top_bar_sub_menu_item_link_hover_color_label = __( 'Sub-Menu Text Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_bar_sub_menu_item_link_hover', $top_bar_sub_menu_item_link_hover_color_label, 'responsive_top_bar_menu', 115, '#10659C', 'responsive_top_bar_menu_active' );
		}
	}

endif;

return new Responsive_Top_Bar_Menu_Customizer();
