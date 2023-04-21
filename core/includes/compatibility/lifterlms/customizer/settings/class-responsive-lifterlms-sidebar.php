<?php
/**
 * Create Sensei Content section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'LifterLMS' ) ) {
	/**
	 * Sensei Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_LifterLMS_Sidebar_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_LifterLMS_Sidebar_Customizer {

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

				// Text Options Section Inside Theme
				$wp_customize->add_section( 'responsive_lifterlms_sidebar',
				array(
					'title'         => __( 'Sidebar', 'responsive' ),
					'priority'      => 3,
					'panel'         => 'responsive_lifterlms'
				)
				);

				// // Setting for Copyright text.
				// $wp_customize->add_setting( 'responsive_dosth_copyright_text_side',
				// array(
				// 	'default'           => __( 'All rights reserved ', 'responsive' ),
				// 	'sanitize_callback' => 'sanitize_text_field',
				// 	'transport'         => 'refresh',
				// )
				// );

				// // Control for Copyright text
				// $wp_customize->add_control( 'responsive_dosth_copyright_text_side',
				// array(
				// 	'type'        => 'text',
				// 	'priority'    => 10,
				// 	'section'     => 'responsive_lifterlms_sidebar',
				// 	'label'       => 'Copyright text',
				// 	'description' => 'Text put here will be outputted in the footer',
				// )
				// );


			// Sidebar 1.
			// $sidebar_label   = esc_html__( 'Course Arcive Sidebar Position', 'responsive' );
			// $sidebar_choices = array(
			// 	'right' => esc_html__( 'Right Sidebar', 'responsive' ),
			// 	'left'  => esc_html__( 'Left Sidebar', 'responsive' ),
			// 	'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			// );
			// if ( is_rtl() ) {
			// 	$sidebar_choices = array(
			// 		'right' => esc_html__( 'Left Sidebar', 'responsive' ),
			// 		'left'  => esc_html__( 'Right Sidebar', 'responsive' ),
			// 		'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			// 	);
			// }
			// responsive_select_control( $wp_customize, 'lifter_page_sidebar_position', $sidebar_label, 'responsive_lifterlms_sidebar', 20, $sidebar_choices, 'right', null );


			//newsidebar
			$wp_customize->add_setting( 'lifter_page_sidebar_position' , array(
				'default'     => 'right',
				'transport'   => 'postMessage',
			) );

			$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifter_page_sidebar_position', array(
				'label'	=>  'SIDE BAR TEST',
				'choices' 	=> array(
				'right'         => esc_html__( 'Right', 'responsive' ),
				'left' => esc_html__( 'Left', 'responsive' ),
				'no'          => esc_html__( 'No', 'responsive' ),
				),
				'section' => 'responsive_lifterlms_sidebar',
			) ) );















			// Sidebar 2.
			$sidebar_label_mem   = esc_html__( 'Single Course Sidebar Position', 'responsive' );
			$sidebar_choices_mem = array(
				'right' => esc_html__( 'Right Sidebar', 'responsive' ),
				'left'  => esc_html__( 'Left Sidebar', 'responsive' ),
				'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices_mem = array(
					'right' => esc_html__( 'Left Sidebar', 'responsive' ),
					'left'  => esc_html__( 'Right Sidebar', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'lifter_page_sidebar_position_mem', $sidebar_label_mem, 'responsive_lifterlms_sidebar', 20, $sidebar_choices_mem, 'right', null );



			}
		}

	endif;

	return new Responsive_LifterLMS_Sidebar_Customizer();

}
