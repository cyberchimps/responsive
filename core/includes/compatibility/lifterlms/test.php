<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// If plugin - 'Lifter LMS' not exist then return.
if ( ! class_exists( 'LifterLMS' ) ) {
	return;
}

if ( ! class_exists( 'Responsive_Test' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Test {

		/**
		 * Setup class.
		 *
		 * @since 4.3.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 4.3.0
		 */
		public function customizer_options( $wp_customize ) {
			error_log('Inside main lifter Panel file');

			// $wp_customize->add_panel(
			// 	'responsive_lifterlms_settings',
			// 	array(
			// 		'title'       => __( 'Lifter LMS', 'responsive' ),
			// 		'description' => __( 'Lifter LMS Settings', 'responsive' ),
			// 		'priority'    => 1,
			// 	)
			// );



			// Theme Options Panel
				$wp_customize->add_panel( 'responsive_lifterlms',
				array(
					//'priority'       => 100,
					'title'            => __( 'LifterLMS', 'responsive' ),
					'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'responsive_dosth' ),
					'priority'    => 10,
				)
				);


				// Text Options Section Inside Theme
				$wp_customize->add_section( 'responsive_dosth_text_options',
				array(
					'title'         => __( 'Container Layout', 'responsive' ),
					'priority'      => 1,
					'panel'         => 'responsive_lifterlms'
				)
				);

				// Setting for Copyright text.
				$wp_customize->add_setting( 'responsive_dosth_copyright_text',
				array(
					'default'           => __( 'All rights reserved ', 'responsive' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
				);

				// Control for Copyright text
				$wp_customize->add_control( 'responsive_dosth_copyright_text',
				array(
					'type'        => 'text',
					'priority'    => 10,
					'section'     => 'responsive_dosth_text_options',
					'label'       => 'Copyright text',
					'description' => 'Text put here will be outputted in the footer',
				)
				);

			// // Site Width.
			// $responsive_width_label  = __( 'Width', 'responsive' );
			// $responsive_width_choice = array(
			// 	'contained'  => esc_html__( 'Contained', 'responsive' ),
			// 	'full-width' => esc_html__( 'Full Width', 'responsive' ),
			// );
			// responsive_select_control( $wp_customize, 'width', $responsive_width_label, 'responsive_dosth_text_options', 10, $responsive_width_choice, 'contained', null, 'postMessage' );

			// // Container Width.
			// $container_width_label = __( 'Container Width (px)', 'responsive' );
			// responsive_drag_number_control( $wp_customize, 'container_width', $container_width_label, 'responsive_dosth_text_options', 20, 1140, 'responsive_active_site_layout_contained', 4096, 1, 'postMessage' );

			// // Header Allignment.
			// $responsive_style_label  = __( 'Style', 'responsive' );
			// $responsive_style_choice = array(
			// 	'boxed'         => esc_html__( 'Boxed', 'responsive' ),
			// 	'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
			// 	'flat'          => esc_html__( 'Flat', 'responsive' ),
			// );
			// responsive_select_control( $wp_customize, 'style', $responsive_style_label, 'responsive_dosth_text_options', 30, $responsive_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_style' ), null, 'postMessage' );

			// // Box Padding (px).
			// $box_padding_label = __( 'Inside Container (px)', 'responsive' );
			// responsive_padding_control( $wp_customize, 'box', 'responsive_dosth_text_options', 80, Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), 'responsive_not_active_site_style_flat', $box_padding_label );

			// // Box Radius.
			// $box_radius_label = __( 'Box Radius (px)', 'responsive' );
			// responsive_number_control( $wp_customize, 'box_radius', $box_radius_label, 'responsive_dosth_text_options', 50, 0, 'responsive_not_active_site_style_flat' );





		}
	}

endif;

return new Responsive_Test();
