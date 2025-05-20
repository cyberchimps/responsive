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

		private $bg_image_color_map = array (
			'site_background'   				   => 'Background Color',
			'box_background'    				   => 'Content Background Color',
			'footer_background' 				   => 'Background Color',
			'header_background' 				   => 'Background Color',
			'header_widget_background'             => 'Background Color',
			'transparent_header_widget_background' => 'Background Color',
			'sidebar_background'                   => 'Background Color',
			'button_background'                    => 'Button Color',
			'inputs_background'                    => 'Input Color',
		);

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

			$wp_customize->add_setting(
				'responsive_' . $element . '_image_toggle',
				array(
					'default'           =>  false,
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
					'sanitize_callback' => 'responsive_checkbox_validate',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Background_Image_Control(
					$wp_customize,
					'responsive_' . $element . '_image',
					array(
						'label'           => $label,
						'section'         => $section,
						'settings'        => array(
							'image_url'    => 'responsive_' . $element . '_image',
							'enable' => 'responsive_' . $element . '_image_toggle',
						),
						'priority'        => $priority,
						'active_callback' => null,
						'map_bg_color'    => array(
							'label' => isset($this->bg_image_color_map[ $element ] ) ? $this->bg_image_color_map[ $element ] : 'Background Color',
							'control_id' => 'responsive_' . $element . '_color',
						),
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

				$background_label         = __( 'Background Image', 'responsive' );
				$site_background_label    = __( 'Site Background Image', 'responsive' );
				$content_background_label = __( 'Content Background Image', 'responsive' );

				$this->background_image_control( $wp_customize, 'site_background', $site_background_label, 'responsive_colors', 105 );
				$this->background_image_control( $wp_customize, 'footer_background', $background_label, 'responsive_footer_layout', 15 );
				$this->background_image_control( $wp_customize, 'header_background', $background_label, 'responsive_header_colors', 15 );
				$this->background_image_control( $wp_customize, 'header_widget_background', $background_label, 'responsive_header_widget', 145 );
				$this->background_image_control( $wp_customize, 'transparent_header_widget_background', $background_label, 'responsive_header_transparent', 295 );
				$this->background_image_control( $wp_customize, 'sidebar_background', $background_label, 'responsive_sidebar', 45 );
				$this->background_image_control( $wp_customize, 'box_background', $content_background_label, 'responsive_colors', 115 );
				$this->background_image_control( $wp_customize, 'button_background', $background_label, 'responsive_button', 135 );
				$this->background_image_control( $wp_customize, 'inputs_background', $background_label, 'responsive_form_fields', 205 );
			}
		}

	}

endif;

return new Responsive_Background_Image_Customizer();
