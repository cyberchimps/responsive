<?php
/**
 * Button Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Button_Customizer' ) ) :
	/**
	 * Button Customizer Options
	 */
	class Responsive_Button_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Array of button settings to add to the customizer
		 *
		 * @since 1.0.0
		 */
		public function elements() {

			// Return settings.
			return apply_filters(
				'responsive_button_settings',
				array(
					'button-color'             => array(
						'label'    => esc_html__( 'Button Color', 'responsive' ),
						'defaults' => array(
							'color' => '#1874cd',
						),
					),
					'button-hover-color'       => array(
						'label'    => esc_html__( 'Button hover Color', 'responsive' ),
						'defaults' => array(
							'color' => '#7db7f0',
						),
					),
					'button-hover-text-color'       => array(
						'label'    => esc_html__( 'Button hover Text Color', 'responsive' ),
						'defaults' => array(
							'color' => '#333333',
						),
					),
					'button-text-color'        => array(
						'label'    => esc_html__( 'Button Text Color', 'responsive' ),
						'defaults' => array(
							'color' => '#ffffff',
						),
					),
					'label-color'              => array(
						'label'    => esc_html__( 'Label Color', 'responsive' ),
						'defaults' => array(
							'color' => '#10659c',
						),
					),
					'input-background-color'   => array(
						'label'    => esc_html__( 'Input Background Color', 'responsive' ),
						'defaults' => array(
							'color' => '#ffffff',
						),
					),
					'input-border-color'       => array(
						'label'    => esc_html__( 'Input Border Color', 'responsive' ),
						'defaults' => array(
							'color' => '#eaeaea',
						),
					),
					'input-border-color-focus' => array(
						'label'    => esc_html__( 'Input Border Color Focus', 'responsive' ),
						'defaults' => array(
							'color' => '#eaeaea',
						),
					),
					'input-text-color'         => array(
						'label'    => esc_html__( 'Input Text Color', 'responsive' ),
						'defaults' => array(
							'color' => '#333333',
						),
					),
				)
			);

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {

			// Get elements.
			$elements = self::elements();

			// Return if elements are empty.
			if ( empty( $elements ) ) {
				return;
			}
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_button_section',
				array(
					'title'    => esc_html__( 'Buttons', 'responsive' ),
					'panel'    => 'responsive-appearance-options',
					'priority' => 202,
				)
			);

			// Lopp through elements.
			$count = '1';
			foreach ( $elements as $element => $array ) {
				$count++;

				// Get label.
				$label              = ! empty( $array['label'] ) ? $array['label'] : null;
				$exclude_attributes = ! empty( $array['exclude'] ) ? $array['exclude'] : false;
				$active_callback    = isset( $array['active_callback'] ) ? $array['active_callback'] : null;
				$transport          = 'refresh';

				// Register new setting if label isn't empty.
				if ( $label ) {
					// Get default.
					$default = ! empty( $array['defaults']['color'] ) ? $array['defaults']['color'] : null;

					$wp_customize->add_setting(
						$element,
						array(
							'type'              => 'theme_mod',
							'default'           => '',
							'sanitize_callback' => 'responsive_sanitize_color',
							'transport'         => $transport,
							'default'           => $default,
						)
					);
					$wp_customize->add_control(
						new WP_Customize_Color_Control(
							$wp_customize,
							$element,
							array(
								'label'           => $label,
								'section'         => 'responsive_button_section',
								'settings'        => $element,
								'priority'        => 10,
								'active_callback' => $active_callback,
							)
						)
					);

					/**
					 * Main Container Width
					 */
					$wp_customize->add_setting(
						'responsive_button_border_radius',
						array(
							'transport'         => 'refresh',
							'default'           => '2',
							'sanitize_callback' => 'responsive_sanitize_number',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Range_Control(
							$wp_customize,
							'responsive_button_border_radius',
							array(
								'label'       => __( 'Button Border Radius (px)', 'responsive' ),
								'section'     => 'responsive_button_section',
								'settings'    => 'responsive_button_border_radius',
								'priority'    => 10,
								'input_attrs' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 1,
								),
							)
						)
					);

				}
			}
		}
	}

endif;

return new Responsive_Button_Customizer();
