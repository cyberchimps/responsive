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

			$wp_customize->add_setting(
				'responsive_header_available_items',
				array(
					'sanitize_callback' => 'responsive_sanitize_builder',
					'transport'         => 'refresh',
				)
			);

			$header_builder_choices = Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_builder_choices' );

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

			$configure_footer_menu_redirect_label = __( 'Primary Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_primary_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_layout');

			$configure_footer_menu_redirect_label = __( 'Content Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_content_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_content_header_layout');

			$configure_footer_menu_redirect_label = __( 'Header Widgets', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_header_widgets', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_widget');

			$configure_footer_menu_redirect_label = __( 'Sticky Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_sticky_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_sticky_menu_layout');

			$configure_footer_menu_redirect_label = __( 'Transparent Header', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_transparent_header', $configure_footer_menu_redirect_label, 'responsive_header_builder_section', 10, 'section', 'responsive_header_transparent');

		}

	}

endif;

// return null;
return new Responsive_Header_Builder_Section_Customizer();
