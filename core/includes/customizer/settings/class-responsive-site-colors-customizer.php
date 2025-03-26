<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Colors_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Colors_Customizer {

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

			/**
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_colors',
				array(
					'title'    => esc_html__( 'Colors & Backgrounds', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 20,
				)
			);

			$wp_customize->remove_section( 'header_image' );
			$wp_customize->remove_section( 'colors' );
			$wp_customize->remove_section( 'background_image' );

			// Site Background Color.
			$site_background_color_label = __( 'Background Color', 'responsive' );

			responsive_color_control( $wp_customize, 'site_background', $site_background_color_label, 'responsive_colors', 11, Responsive\Core\get_responsive_customizer_defaults( 'background_color' ) );

			// Backgrounds.
			$site_background_label = esc_html__( 'Backgrounds', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_site_background_separator', $site_background_label, 'responsive_colors', 10 );

			// Background Image Position.
			$site_background_img_position     = esc_html__( 'Image Position', 'responsive' );
			$site_background_img_posi_choices = array(
				'left-top'      => esc_html__( 'Left Top', 'responsive' ),
				'left-center'   => esc_html__( 'Left Center', 'responsive' ),
				'left-bottom'   => esc_html__( 'Left Bottom', 'responsive' ),
				'right-top'     => esc_html__( 'Right Top', 'responsive' ),
				'right-center'  => esc_html__( 'Right Center', 'responsive' ),
				'right-bottom'  => esc_html__( 'Right Bottom', 'responsive' ),
				'center-top'    => esc_html__( 'Center Top', 'responsive' ),
				'center-center' => esc_html__( 'Center Center', 'responsive' ),
				'center-bottom' => esc_html__( 'Center Bottom', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_img_position', $site_background_img_position, 'responsive_colors', 20, $site_background_img_posi_choices, 'left-top', null, 'postMessage' );

			// Background Image Attachment.
			$site_background_image_attachment         = esc_html__( 'Attachment', 'responsive' );
			$site_background_image_attachment_choices = array(
				'fixed'  => esc_html__( 'Fixed', 'responsive' ),
				'scroll' => esc_html__( 'Scroll', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_attachment', $site_background_image_attachment, 'responsive_colors', 20, $site_background_image_attachment_choices, 'fixed', null, 'postMessage' );

			// Background Image Repeat.
			$site_background_image_repeat         = esc_html__( 'Repeat', 'responsive' );
			$site_background_image_repeat_choices = array(
				'no-repeat' => esc_html__( 'No Repeat', 'responsive' ),
				'repeat'    => esc_html__( 'Repeat All', 'responsive' ),
				'repeat-x'  => esc_html__( 'Repeat Horizontally', 'responsive' ),
				'repeat-y'  => esc_html__( 'Repeat Vertically', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_repeat', $site_background_image_repeat, 'responsive_colors', 20, $site_background_image_repeat_choices, 'repeat', null, 'postMessage' );

			// Background Image Size.
			$site_background_image_size         = esc_html__( 'Size', 'responsive' );
			$site_background_image_size_choices = array(
				'auto'    => esc_html__( 'Auto', 'responsive' ),
				'cover'   => esc_html__( 'Cover', 'responsive' ),
				'contain' => esc_html__( 'Contain', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_size', $site_background_image_size, 'responsive_colors', 20, $site_background_image_size_choices, 'cover', null, 'postMessage' );

			// Box Background Color.
			$box_background_color_label = __( 'Box Background Color', 'responsive' );

			responsive_color_control( $wp_customize, 'box_background', $box_background_color_label, 'responsive_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'box_background' ), 'responsive_not_active_site_style_flat' );

			// Alt Background Color for pre prequotes blockquotes etc.
			$alt_background_color_label = __( 'Alternate Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'alt_background', $alt_background_color_label, 'responsive_colors', 21, Responsive\Core\get_responsive_customizer_defaults( 'alt_background' ), null );

			// Links.
			$general_links_label = esc_html__( 'Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_links_separator', $general_links_label, 'responsive_colors', 110 );

			// Link Color.
			$link_color_label = __( 'Links', 'responsive' );

			responsive_color_control( $wp_customize, 'link', $link_color_label, 'responsive_colors', 110, Responsive\Core\get_responsive_customizer_defaults( 'link' ),null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'link_hover' ), 'link_hover' );

			// Buttons.
			$general_buttons_label = esc_html__( 'Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_colors', 130 );

			// Button Color.
			$button_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_colors', 130, Responsive\Core\get_responsive_customizer_defaults( 'button' ) );

			// Button Text Color.
			$button_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_colors', 150, Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) );

			// Button Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_colors', 170, Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) );

			// Inputs.
			$general_inputs_label = esc_html__( 'Inputs', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_inputs_separator', $general_inputs_label, 'responsive_colors', 190 );

			// Inputs background Color.
			$inputs_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'inputs_background', $inputs_color_label, 'responsive_colors', 200, Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) );

			// Inputs Text Color.
			$inputs_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_text', $inputs_text_color_label, 'responsive_colors', 210, Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) );

			// Inputs Border Color.
			$inputs_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_border', $inputs_border_color_label, 'responsive_colors', 220, Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) );

			// Labels.
			$label_label = esc_html__( 'Labels', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_labels_separator', $label_label, 'responsive_colors', 230 );

			// Label Color.
			$label_color_label = __( 'Label Color', 'responsive' );

			responsive_color_control( $wp_customize, 'label', $inputs_text_color_label, 'responsive_colors', 240, Responsive\Core\get_responsive_customizer_defaults( 'label' ) );

		}


	}

endif;

return new Responsive_Site_Colors_Customizer();
