<?php
/**
 * Background Image Customizer Options
 *
 * @package Responsive Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Background_Image_Customizer' ) ) :
	/**
	 * Background Image Customizer Options
	 */
	class Responsive_Background_Image_Customizer {

		/**
		 * Constructor
		 *
		 * @since 4.9.7
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * [background_image_control description]
		 *
		 * @param  [type] $wp_customize [description].
		 * @param  [type] $element      [description].
		 * @param  [type] $label        [description].
		 * @param  [type] $section      [description].
		 * @param  [type] $priority     [description].
		 * @return void               [description]
		 */
		public function background_image_control( $wp_customize, $element, $label, $section, $priority ) {
			$wp_customize->add_setting(
				'responsive_' . $element . '_image',
				array(
					'transport'         => 'postMessage',
					'sanitize_callback' => 'responsive_sanitize_image',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'responsive_' . $element . '_image',
					array(
						'label'           => $label,
						'description'     => __( 'Please reduce the opacity of background color to make the background image visible. You can change the opacity by using drag control in background color options. Set the value as per your requirements.', 'responsive' ),
						'section'         => $section,
						'settings'        => 'responsive_' . $element . '_image',
						'priority'        => $priority,
						'active_callback' => null,
					)
				)
			);

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 4.9.7
		 */
		public function customizer_options( $wp_customize ) {
			$theme = wp_get_theme();

			/*
			------------------------------------------------------------------
				// Footer Elements Positioning
			-------------------------------------------------------------------
			*/
			if ( 'Responsive' === $theme->name || 'Responsive' === $theme->parent_theme ) {
				$background_label = __( 'Background Image', 'responsive' );
				$this->background_image_control( $wp_customize, 'footer_background', $background_label, 'responsive_footer_colors', 15 );
				$this->background_image_control( $wp_customize, 'header_background', $background_label, 'responsive_header_colors', 15 );
				$this->background_image_control( $wp_customize, 'header_widget_background', $background_label, 'responsive_header_widget', 145 );
				$this->background_image_control( $wp_customize, 'transparent_header_widget_background', $background_label, 'responsive_header_transparent', 295 );
				$this->background_image_control( $wp_customize, 'sidebar_background', $background_label, 'responsive_sidebar_colors', 25 );
				$this->background_image_control( $wp_customize, 'box_background', $background_label, 'responsive_colors', 21 );
				$this->background_image_control( $wp_customize, 'button_background', $background_label, 'responsive_colors', 135 );
				$this->background_image_control( $wp_customize, 'inputs_background', $background_label, 'responsive_colors', 205 );
			}
		}

	}

endif;

return new Responsive_Background_Image_Customizer();
