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

	if ( ! class_exists( 'Responsive_LifterLMS_Content_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_LifterLMS_Content_Customizer {

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
				$wp_customize->add_section( 'responsive_lifterlms_layout',
				array(
					'title'         => __( 'Container Layout', 'responsive' ),
					'priority'      => 1,
					'panel'         => 'responsive_lifterlms'
				)
				);

				// // Site Width.
				// $responsive_width_label  = __( 'Width', 'responsive' );
				// $responsive_width_choice = array(
				// 	'contained'  => esc_html__( 'Contained', 'responsive' ),
				// 	'full-width' => esc_html__( 'Full Width', 'responsive' ),
				// );
				// responsive_select_control( $wp_customize, 'lifter_width', $responsive_width_label, 'responsive_lifterlms_layout', 10, $responsive_width_choice, 'contained', null, 'postMessage' );

				/*************************/

				//Container width setting

				$wp_customize->add_setting( 'lifterlms_width' , array(
					'default'     => 'contained',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'   => 'postMessage',
					) );

				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifterlms_width', array(
					'label'	=>  'Container Width Test',
					'choices' 	=> array(
						'contained'         => esc_html__( 'Contained', 'responsive' ),
						'full-width' => esc_html__( 'Full Width', 'responsive' ),
					),
					'section' => 'responsive_lifterlms_layout',
					) ) );

				// lifter container width



				// $wp_customize->add_setting( 'lifterlms_container_width' , array(
				// 	'default'     => 1140,
				// 	'sanitize_callback' => 'responsive_sanitize_select',
				// 	'transport'   => 'postMessage',
				// 	) );

				// $wp_customize->add_control( new Responsive_Customizer_Range_Control( $wp_customize, 'lifterlms_container_width', array(
				// 	'label'	=>  'Container Width Test PX PX',
				// 	'input_attrs'     => array(
				// 		'min'  => 1,
				// 		'max'  => 4096,
				// 		'step' => 1,
				// 	),
				// 	'section' => 'responsive_lifterlms_layout',
				// 	) ) );


				// $container_width_label = __( 'Container Width (px)', 'responsive' );
				// responsive_drag_number_control( $wp_customize, 'lifterlms_container_width', $container_width_label, 'responsive_lifterlms_layout', 20, 1140, 'responsive_active_site_layout_contained', 4096, 1, 'postMessage' );




				/*************************/


				//Style setting

				$wp_customize->add_setting( 'lifterlms_style' , array(
					'default'     => 'boxed',
					'transport'   => 'postMessage',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifterlms_style', array(
					'label'	=>  'Style Test',
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
						'default'           => 50,
						'sanitize_callback' => 'responsive_sanitize_number',
						'transport'         => 'postMessage',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'lifterlms_box_radius',
						array(
							// 'active_callback' => $active_call,
							'label'           => 'BOX RADIUS TEST',
							// 'priority'        => $priority,
							'section'         => 'responsive_lifterlms_layout',
							// 'settings'        => 'responsive_' . $element,
							'type'            => 'number',
						)
					)
				);



				// Box Padding (px).
				// $box_padding_label = __( 'Inside Container PADDING (px)', 'responsive' );
				// responsive_padding_control( $wp_customize, 'lifterlms_box_padding', 'responsive_lifterlms_layout', 80, Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), 'responsive_not_active_site_style_flat', $box_padding_label );


				/**
				 *  Padding control.
				 */
				$wp_customize->add_setting(
					'lifterlms_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);

				$wp_customize->add_setting(
					'lifterlms_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);

				$wp_customize->add_setting(
					'lifterlms_tablet_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_tablet_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);

				$wp_customize->add_setting(
					'lifterlms_mobile_top_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_right_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_bottom_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);
				$wp_customize->add_setting(
					'lifterlms_mobile_left_padding',
					array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_number',
						'default'           => 20,
					)
				);

				$wp_customize->add_control(
					new Responsive_Customizer_Dimensions_Control(
						$wp_customize,
						'lifterlms_box_padding',
						array(
							'label'           => 'Padding Px',
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
							// 'priority'        => $priority,
							// 'active_callback' => $active_call,
							'input_attrs'     => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),
						)
					)
				);






			}
		}

	endif;

	return new Responsive_LifterLMS_Content_Customizer();

}
