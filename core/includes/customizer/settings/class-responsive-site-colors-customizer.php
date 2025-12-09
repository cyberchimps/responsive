<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

use function Responsive\Core\get_responsive_customizer_defaults;

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

			// Global Colors.
			$site_background_label = esc_html__( 'Global Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'global_colors_separator', $site_background_label, 'responsive_colors', 20 );

			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_colors', 30, Responsive\Core\get_responsive_customizer_defaults( 'responsive_body_text_color' ) );

			// Link Color.
			$link_color_label = __( 'Links', 'responsive' );

			responsive_color_control( $wp_customize, 'link', $link_color_label, 'responsive_colors', 35, Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_color' ),null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_hover_color' ), 'link_hover' );

			// Meta Color.
			$meta_text_color_label = __( 'Meta Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_colors', 40, Responsive\Core\get_responsive_customizer_defaults( 'responsive_meta_text_color' ) );

			responsive_horizontal_separator_control( $wp_customize, 'all_heading_text_separator', 1, 'responsive_colors',45, 1 );

			// All Headings Color.
			$all_heading_color_label = __( 'All Headings (H1 - H6)', 'responsive' );
			responsive_color_control( $wp_customize, 'all_heading_text', $all_heading_color_label, 'responsive_colors', 50, get_responsive_customizer_defaults( 'responsive_all_heading_text_color' ) );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'Heading 1 (H1)', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_colors', 55, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h1_text_color' ) );
			
			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'Heading 2 (H2)', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_colors', 60, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h2_text_color' ) );
			
			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'Heading 3 (H3)', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_colors', 65, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h3_text_color' ) );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'Heading 4 (H4)', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_colors', 70, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h4_text_color' ) );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'Heading 5 (H5)', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_colors', 75, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h5_text_color' ) );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'Heading 6 (H6)', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_colors', 80, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h6_text_color' ) );

			responsive_horizontal_separator_control( $wp_customize, 'h6_text_separator', 1, 'responsive_colors',85, 1 );

			// Site Background Color.
			$site_background_color_label = __( 'Site Background', 'responsive' );
			responsive_color_control( 
				$wp_customize, 
				'site_background',
				$site_background_color_label,
				'responsive_colors',
				90,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_site_background_color' ),
				null,
				'',
				false,
				null,
				null,
				true,
				'site_background_gradient',
				Responsive\Core\get_responsive_customizer_defaults( 'background_gradient_color' ),
				'color',
			);

			// Box Background Color.
			$box_background_color_label = __( 'Content Background', 'responsive' );
			responsive_color_control( 
				$wp_customize,
				'box_background',
				$box_background_color_label,
				'responsive_colors',
				95,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_box_background_color' ),
				'responsive_not_active_site_style_flat',
				'',
				false,
				null,
				null,
				true,
				'box_background_gradient',
				Responsive\Core\get_responsive_customizer_defaults( 'background_gradient_color' ),
				'color',
			);

			// Alt Background Color for pre prequotes blockquotes etc.
			$alt_background_color_label = __( 'Alternate Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'alt_background', $alt_background_color_label, 'responsive_colors', 100, Responsive\Core\get_responsive_customizer_defaults( 'responsive_alt_background_color' ), null );

			// Backgrounds.
			$site_background_label = esc_html__( 'Background Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_site_background_separator', $site_background_label, 'responsive_colors', 100 );

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
			responsive_select_control( $wp_customize, 'site_background_img_position', $site_background_img_position, 'responsive_colors', 110, $site_background_img_posi_choices, 'left-top', 'responsive_site_background_image_present', 'postMessage' );

			// Background Image Attachment.
			$site_background_image_attachment         = esc_html__( 'Attachment', 'responsive' );
			$site_background_image_attachment_choices = array(
				'fixed'  => esc_html__( 'Fixed', 'responsive' ),
				'scroll' => esc_html__( 'Scroll', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_attachment', $site_background_image_attachment, 'responsive_colors', 110, $site_background_image_attachment_choices, 'fixed', 'responsive_site_background_image_present', 'postMessage' );

			// Background Image Repeat.
			$site_background_image_repeat         = esc_html__( 'Repeat', 'responsive' );
			$site_background_image_repeat_choices = array(
				'no-repeat' => esc_html__( 'No Repeat', 'responsive' ),
				'repeat'    => esc_html__( 'Repeat All', 'responsive' ),
				'repeat-x'  => esc_html__( 'Repeat Horizontally', 'responsive' ),
				'repeat-y'  => esc_html__( 'Repeat Vertically', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_repeat', $site_background_image_repeat, 'responsive_colors', 110, $site_background_image_repeat_choices, 'repeat', 'responsive_site_background_image_present', 'postMessage' );

			// Background Image Size.
			$site_background_image_size         = esc_html__( 'Size', 'responsive' );
			$site_background_image_size_choices = array(
				'auto'    => esc_html__( 'Auto', 'responsive' ),
				'cover'   => esc_html__( 'Cover', 'responsive' ),
				'contain' => esc_html__( 'Contain', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'site_background_image_size', $site_background_image_size, 'responsive_colors', 110, $site_background_image_size_choices, 'cover', 'responsive_site_background_image_present', 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'content_bg_image_separator', 1, 'responsive_colors',112, 1 );

			// Buttons.
			// $general_buttons_label = esc_html__( 'Buttons', 'responsive' );
			// responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_colors', 130 );

			// // Button Color.
			// $button_color_label = __( 'Color', 'responsive' );

			// responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_colors', 130, Responsive\Core\get_responsive_customizer_defaults( 'button' ) );

			// // Button Text Color.
			// $button_text_color_label = __( 'Text Color', 'responsive' );
			// responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_colors', 150, Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) );

			// // Button Border Color.
			// $button_border_color_label = __( 'Border Color', 'responsive' );
			// responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_colors', 170, Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) );

			// // Inputs.
			// $general_inputs_label = esc_html__( 'Inputs', 'responsive' );
			// responsive_separator_control( $wp_customize, 'responsive_general_inputs_separator', $general_inputs_label, 'responsive_colors', 190 );

			// // Inputs background Color.
			// $inputs_color_label = __( 'Color', 'responsive' );

			// responsive_color_control( $wp_customize, 'inputs_background', $inputs_color_label, 'responsive_colors', 200, Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) );

			// // Inputs Text Color.
			// $inputs_text_color_label = __( 'Text Color', 'responsive' );
			// responsive_color_control( $wp_customize, 'inputs_text', $inputs_text_color_label, 'responsive_colors', 210, Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) );

			// // Inputs Border Color.
			// $inputs_border_color_label = __( 'Border Color', 'responsive' );
			// responsive_color_control( $wp_customize, 'inputs_border', $inputs_border_color_label, 'responsive_colors', 220, Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) );

			// // Labels.
			// $label_label = esc_html__( 'Labels', 'responsive' );
			// responsive_separator_control( $wp_customize, 'responsive_general_labels_separator', $label_label, 'responsive_colors', 230 );

			// // Label Color.
			// $label_color_label = __( 'Label Color', 'responsive' );

			// responsive_color_control( $wp_customize, 'label', $inputs_text_color_label, 'responsive_colors', 240, Responsive\Core\get_responsive_customizer_defaults( 'label' ) );

		}


	}

endif;

return new Responsive_Site_Colors_Customizer();
