<?php
/**
 * Page Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Page_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Page_Customizer {

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
				'responsive_page_section',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive-page-options',
					'priority' => 209,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[static_page_layout_default]',
				array(
					'sanitize_callback' => 'responsive_sanitize_default_layouts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_static_page_layout_default',
				array(
					'label'    => __( 'Sidebar Position', 'responsive' ),
					'section'  => 'responsive_page_section',
					'settings' => 'responsive_theme_options[static_page_layout_default]',
					'type'     => 'select',
					'choices'  => Responsive_Options::valid_layouts(),
				)
			);
			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_page_single_elements_positioning',
				array(
					'default'           => array( 'title', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_page_section',
						'settings' => 'responsive_page_single_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_page_elements(),
					)
				)
			);
		}

	}

endif;

return new Responsive_Page_Customizer();
