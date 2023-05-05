<?php
/**
 * Create LifterLMS Content section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'LifterLMS' ) ) {
	/**
	 * LifterLMS Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_LifterLMS_Content_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_LifterLMS_Content_Customizer {

			/**
			 * Setup class.
			 *
			 * @since 4.8.2
			 */
			public function __construct() {

				add_action( 'customize_register', array( $this, 'customizer_options' ) );

			}

			/**
			 * Customizer options
			 *
			 * @param  object $wp_customize WordPress customization option.
			 * @since 4.8.2
			 */
			public function customizer_options( $wp_customize ) {

				$wp_customize->add_section( 'responsive_lifterlms_layout',
				array(
					'title'         => __( 'Layout', 'responsive' ),
					'priority'      => 1,
					'panel'         => 'responsive_lifterlms'
				)
				);

				//Container width setting.

				// Course Archive layout Separator.
				$course_separator_label = esc_html__( 'Course Archive Layout', 'responsive' );
				responsive_separator_control( $wp_customize, 'course_separator', $course_separator_label, 'responsive_lifterlms_layout',1 );

				$wp_customize->add_setting( 'lifterlms_width' , array(
					'default'     => 'contained',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'   => 'postMessage',
					) );

				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifterlms_width', array(
					'label'	=>  'Width',
					'choices' 	=> array(
						'contained'         => esc_html__( 'Contained', 'responsive' ),
						'full-width' => esc_html__( 'Full Width', 'responsive' ),
					),
					'section' => 'responsive_lifterlms_layout',
					) ) );

				// Container Width.

				$wp_customize->add_setting( 'lifterlms_container_width' , array(
					'default'     => 1140,
					'transport'   => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Range_Control( $wp_customize, 'lifterlms_container_width', array(
					'label'	=>  'Container Width (px)',
					'input_attrs'     => array(
						'min'  => 1,
						'max'  => 4096,
						'step' => 1,
					),
					'section' => 'responsive_lifterlms_layout',
				) ) );


				//Style setting

				$wp_customize->add_setting( 'lifterlms_style' , array(
					'default'     => 'boxed',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'   => 'postMessage',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifterlms_style', array(
					'label'	=>  'Style',
					'choices' 	=> array(
					'boxed'         => esc_html__( 'Boxed', 'responsive' ),
					'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
					'flat'          => esc_html__( 'Flat', 'responsive' ),
					),
					'section' => 'responsive_lifterlms_layout',
				) ) );

				// Add BOX RADIUS Setting.
				$wp_customize->add_setting(
					'lifterlms_box_radius',
					array(
						'sanitize_callback' => 'responsive_sanitize_number',
						'transport'         => 'postMessage',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'lifterlms_box_radius',
						array(
							'label'           => 'Box Radius (px)',
							'section'         => 'responsive_lifterlms_layout',
							'type'            => 'number',
						)
					)
				);

				/**
				 *  Padding control.
				 */
				$wp_customize->add_setting(
					'lifterlms_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);

				$wp_customize->add_setting(
					'lifterlms_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);

				$wp_customize->add_setting(
					'lifterlms_tablet_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);

				$wp_customize->add_setting(
					'lifterlms_mobile_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
					)
				);

				$wp_customize->add_control(
					new Responsive_Customizer_Dimensions_Control(
						$wp_customize,
						'lifterlms_box_padding',
						array(
							'label'           => 'Inside Container (px)',
							'section'         => 'responsive_lifterlms_layout',
							'settings'        => array(
								'desktop_top'    => 'lifterlms_top_padding',
								'desktop_right'  => 'lifterlms_right_padding',
								'desktop_bottom' => 'lifterlms_bottom_padding',
								'desktop_left'   => 'lifterlms_left_padding',
								'tablet_top'     => 'lifterlms_tablet_top_padding',
								'tablet_right'   => 'lifterlms_tablet_right_padding',
								'tablet_bottom'  => 'lifterlms_tablet_bottom_padding',
								'tablet_left'    => 'lifterlms_tablet_left_padding',
								'mobile_top'     => 'lifterlms_mobile_top_padding',
								'mobile_right'   => 'lifterlms_mobile_right_padding',
								'mobile_bottom'  => 'lifterlms_mobile_bottom_padding',
								'mobile_left'    => 'lifterlms_mobile_left_padding',
							),
							'input_attrs'     => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),
						)
					)
				);

			// Columns Separator.
			$columns_separator_label = esc_html__( 'Columns', 'responsive' );
			responsive_separator_control( $wp_customize, 'columns_separator', $columns_separator_label, 'responsive_lifterlms_layout', 10 );


			//Columns settings.

			$wp_customize->add_setting( 'lifterlms_columns' , array(
				'default'     => 3,
				'transport'   => 'postMessage',
				'sanitize_callback' => 'responsive_sanitize_number',
			) );

			$wp_customize->add_control( new Responsive_Customizer_Range_Control( $wp_customize, 'lifterlms_columns', array(
				'label'	=>  'Course Columns',
				'input_attrs'     => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'section' => 'responsive_lifterlms_layout',
			) ) );






			}
		}

	endif;

	return new Responsive_LifterLMS_Content_Customizer();

}
