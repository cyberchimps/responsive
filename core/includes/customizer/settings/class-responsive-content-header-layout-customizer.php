<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Layout_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Content_Header_Layout_Customizer {

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
				'responsive_content_header_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_content_header',
					'priority' => 1,

				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[breadcrumb]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
					'default'           => 0,
				)
			);
			$wp_customize->add_control(
				'res_breadcrumb',
				array(
					'label'    => __( 'Disable breadcrumb list?', 'responsive' ),
					'section'  => 'responsive_content_header_layout',
					'settings' => 'responsive_theme_options[breadcrumb]',
					'type'     => 'checkbox',
					'priority' => 1,
				)
			);

			// Breadcrumb Position.
			$wp_customize->add_setting(
				'responsive_breadcrumb_position',
				array(
					'default'           => 'before',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_breadcrumb_position',
				array(
					'label'           => __( 'Breadcrumb Position', 'responsive' ),
					'section'         => 'responsive_content_header_layout',
					'settings'        => 'responsive_breadcrumb_position',
					'type'            => 'select',
					'priority'        => 2,
					'active_callback' => 'responsive_active_breadcrumb',
					'choices'         => apply_filters(
						'responsive_breadcrumb_position_choices',
						array(
							'before' => esc_html__( 'Before Heading', 'responsive' ),
							'after'  => esc_html__( 'After Heading', 'responsive' ),
						)
					),
				)
			);

			// Content Header Allignment.
			$wp_customize->add_setting(
				'responsive_content_header_alignment',
				array(
					'default'           => 'center',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_content_header_alignment',
				array(
					'label'           => __( 'Alignment', 'responsive' ),
					'section'         => 'responsive_content_header_layout',
					'settings'        => 'responsive_content_header_alignment',
					'type'            => 'select',
					'priority'        => 3,
					'active_callback' => null,
					'choices'         => apply_filters(
						'responsive_content_header_layout_choices',
						array(
							'center' => esc_html__( 'Center', 'responsive' ),
							'left'   => esc_html__( 'Left', 'responsive' ),
							'right'  => esc_html__( 'Right', 'responsive' ),
						)
					),
				)
			);

			// Padding.
			responsive_padding_control( $wp_customize, 'content_header', 'responsive_content_header_layout', 4, 28, 28 );

		}
	}

endif;

return new Responsive_Content_Header_Layout_Customizer();
