<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Layout_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Layout_Customizer {

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
				'responsive_header_layout',
				array(
					'title'    => esc_html__( 'Primary Header', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,

				)
			);

			// Full Width Header.
			$header_full_width_label = __( 'Full Width Header', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_full_width', $header_full_width_label, 'responsive_header_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			// Inline logo & site title.
			$inline_logo_site_title = __( 'Inline logo & Site Title', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'inline_logo_site_title', $inline_logo_site_title, 'responsive_header_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			// Enable Header Bottom Border.
			$enable_header_bottom_border_label = __( 'Enable Header Bottom Border', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_header_bottom_border', $enable_header_bottom_border_label, 'responsive_header_layout', 10, 1, null );

			/**
			 * Header Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_header_elements',
				array(
					'default'           => array( 'site-branding', 'main-navigation' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_header_elements',
					array(
						'label'    => esc_html__( 'Header Elements', 'responsive' ),
						'section'  => 'responsive_header_layout',
						'settings' => 'responsive_header_elements',
						'priority' => 10,
						'choices'  => responsive_header_elements(),
					)
				)
			);

			// Header Layout.
			$header_layout_label   = esc_html__( 'Header Layout', 'responsive' );
			$header_layout_choices = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_layout', $header_layout_label, 'responsive_header_layout', 20, $header_layout_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_layout' ), null );

			// Header Height.
			$header_height_label = __( 'Header Height', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_height', $header_height_label, 'responsive_header_layout', 20, 0, null, 300, 0, 'postMessage', 1 );

			// Header Alignment.
			$header_alignment_label   = esc_html__( 'Header Alignment', 'responsive' );
			$header_alignment_choices = array(
				'center' => esc_html__( 'Center', 'responsive' ),
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
			);

			if ( is_rtl() ) {
				$header_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'header_alignment', $header_alignment_label, 'responsive_header_layout', 30, $header_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_alignment' ), 'responsive_active_vertical_header', 'postMessage' );

			// Mobile Header Layout.
			$mobile_header_layout_label = esc_html__( 'Mobile Header Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_header_layout', $mobile_header_layout_label, 'responsive_header_layout', 30, $header_layout_choices, get_theme_mod( 'responsive_header_layout', 'horizontal' ), null );

			// Mobile Header Alignment.
			$mobile_header_alignment_label = esc_html__( 'Mobile Header Alignment', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_header_alignment', $mobile_header_alignment_label, 'responsive_header_layout', 35, $header_alignment_choices, get_theme_mod( 'responsive_header_alignment', 'center' ), 'responsive_active_mobile_vertical_header', 'postMessage' );

			// Logo Padding.
			$logo_padding_label = esc_html__( 'Logo Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'header', 'responsive_header_layout', 40, Responsive\Core\get_responsive_customizer_defaults( 'logo_padding' ), 0, null, $logo_padding_label );

			// Bottom Border.
			$bottom_border_label = __( 'Bottom Border Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_border', $bottom_border_label, 'responsive_header_layout', 45, 0, 'responsive_enable_header_bottom_border_check', 300, 0, 'postMessage', 1 );

			// HTML content.
			$header_html_content = __( 'HTML content', 'responsive' );
			responsive_text_control( $wp_customize, 'header_html_content', $header_html_content, 'responsive_header_layout', 80, '<p>Enter HTML here!</p>', null, 'sanitize_text_field', 'textarea' );

			$wpautop = __( 'Automatically Add Paragraphs', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_html_wpautop', $wpautop, 'responsive_header_layout', 80, 1 );

			$header_builder_settings_separator_label = esc_html__( 'Header Builder Settings', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_builder_settings_separator', $header_builder_settings_separator_label, 'responsive_header_layout', 75 );

			$header_desktop_tablet_mobile_layout_choices = array(
				'default'   => __( 'Standard', 'responsive' ),
				'fullwidth' => __( 'Full Width', 'responsive' ),
				'contained' => __( 'Contained', 'responsive' ),
			);

			$stretch_primary_navigation_label = __( 'Stretch Primary Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_primary_navigation', $stretch_primary_navigation_label, 'responsive_header_layout', 95, 0, null );

			$stretch_secondary_navigation_label = __( 'Stretch Secondary Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_secondary_navigation', $stretch_secondary_navigation_label, 'responsive_header_layout', 100, 0, null );

			$stretch_mobile_navigation_label = __( 'Stretch Mobile Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_mobile_navigation', $stretch_mobile_navigation_label, 'responsive_header_layout', 105, 0, null );

			$primary_navigation_fill_stretch_label = __( 'Fill and Center Primary Menu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'primary_navigation_fill_stretch', $primary_navigation_fill_stretch_label, 'responsive_header_layout', 110, 0, null );

			$secondary_navigation_fill_stretch_label = __( 'Fill and Center Secondary Menu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'secondary_navigation_fill_stretch', $secondary_navigation_fill_stretch_label, 'responsive_header_layout', 115, 0, null );

			$logo_layout_include_choices       = array(
				'logo'               => __( 'Logo', 'responsive' ),
				'logo_title'         => __( 'Logo & Title', 'responsive' ),
				'logo_title_tagline' => __( 'Logo, Title & Tagline', 'responsive' ),
			);
			$desktop_logo_layout_include_label = __( 'Desktop Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'desktop_logo_layout_include', $desktop_logo_layout_include_label, 'responsive_header_layout', 120, $logo_layout_include_choices, 'logo_title', null );
			$tablet_logo_layout_include_label = __( 'Tablet Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'tablet_logo_layout_include', $tablet_logo_layout_include_label, 'responsive_header_layout', 125, $logo_layout_include_choices, 'logo', null );
			$mobile_logo_layout_include_label = __( 'Mobile Logo Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_logo_layout_include', $mobile_logo_layout_include_label, 'responsive_header_layout', 130, $logo_layout_include_choices, 'logo', null );

			$logo_layout_structure_choices       = array(
				'standard'           => __( 'Standard', 'responsive' ),
				'title_tag_logo'     => __( 'Title - Tagline - Logo', 'responsive' ),
				'top_logo_title_tag' => __( 'Top Logo - Title - Tagline', 'responsive' ),
				'top_title_tag_logo' => __( 'Top Title - Tagline - Logo', 'responsive' ),
				'top_title_logo_tag' => __( 'Top Title - Logo - Tagline', 'responsive' ),
			);
			$desktop_logo_layout_structure_label = __( 'Desktop Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'desktop_logo_layout_structure', $desktop_logo_layout_structure_label, 'responsive_header_layout', 135, $logo_layout_structure_choices, 'standard', null );
			$tablet_logo_layout_structure_label = __( 'Tablet Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'tablet_logo_layout_structure', $tablet_logo_layout_structure_label, 'responsive_header_layout', 140, $logo_layout_structure_choices, 'standard', null );
			$mobile_logo_layout_structure_label = __( 'Mobile Logo Layout Structure', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_logo_layout_structure', $mobile_logo_layout_structure_label, 'responsive_header_layout', 145, $logo_layout_structure_choices, 'standard', null );

			$header_primary_navigation_style_choices = array(
				'standard'             => __( 'Standard', 'responsive' ),
				'fullheight'           => __( 'Full height', 'responsive' ),
				'underline'            => __( 'Underline', 'responsive' ),
				'underline-fullheight' => __( 'Underline - Full height', 'responsive' ),
			);
			$header_primary_navigation_style_label   = __( 'Primary Navigation Style', 'responsive' );
			responsive_select_control( $wp_customize, 'primary_navigation_style', $header_primary_navigation_style_label, 'responsive_header_layout', 150, $header_primary_navigation_style_choices, 'standard', null );

			$dropdown_navigation_reveal_choices = array(
				'none'      => __( 'None', 'responsive' ),
				'fade'      => __( 'Fade', 'responsive' ),
				'fade-up'   => __( 'Fade Up', 'responsive' ),
				'fade-down' => __( 'Fade Down', 'responsive' ),
			);
			$dropdown_navigation_reveal_label   = __( 'Dropdown Reveal', 'responsive' );
			responsive_select_control( $wp_customize, 'dropdown_navigation_reveal', $dropdown_navigation_reveal_label, 'responsive_header_layout', 155, $dropdown_navigation_reveal_choices, 'none', null );

			// Button Label.
			$header_button_label = __( 'Button Label', 'responsive' );
			responsive_text_control( $wp_customize, 'header_button_label', $header_button_label, 'responsive_header_layout', 160, 'Button', null, 'sanitize_text_field', 'text' );

			// Header Button Link.
			$header_button_link = __( 'Button URL', 'responsive' );
			responsive_text_control( $wp_customize, 'header_button_link', $header_button_link, 'responsive_header_layout', 165, '', null, 'sanitize_text_field', 'text' );

			// Header Button Target.
			$header_button_target = __( 'Open in New Tab', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_target', $header_button_target, 'responsive_header_layout', 170, 0, null );

			// Header Button nofollow.
			$header_button_nofollow = __( 'Set link to nofollow', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_nofollow', $header_button_nofollow, 'responsive_header_layout', 175, 0, null );

			// Header Button sponsored.
			$header_button_sponsored = __( 'Set link attribute Sponsored', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_sponsored', $header_button_sponsored, 'responsive_header_layout', 180, 0, null );

			// Header Button download.
			$header_button_download = __( 'Set link to download', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_download', $header_button_download, 'responsive_header_layout', 185, 0, null );

			// Header Button size.
			$header_button_size_choices = array(
				'small'  => __( 'Small', 'responsive' ),
				'medium' => __( 'Medium', 'responsive' ),
				'large'  => __( 'large', 'responsive' ),
			);
			$header_button_size         = __( 'Header Button Size', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_size', $header_button_size, 'responsive_header_layout', 190, $header_button_size_choices, 'medium', null );

			// Header Button Style.
			$header_button_style_choices = array(
				'filled'  => __( 'Filled', 'responsive' ),
				'outline' => __( 'Outline', 'responsive' ),
			);
			$header_button_style         = __( 'Header Button Style.', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_style', $header_button_style, 'responsive_header_layout', 190, $header_button_style_choices, 'medium', null );

			// Header Button visibility.
			$header_button_visibility_choices = array(
				'everyone'  => __( 'Everyone', 'responsive' ),
				'loggedin'  => __( 'Logged In Only', 'responsive' ),
				'loggedout' => __( 'Logged Out Only', 'responsive' ),
			);
			$header_button_visibility         = __( 'Header Button Visibility', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_visibility', $header_button_visibility, 'responsive_header_layout', 195, $header_button_visibility_choices, 'everyone', null );

		}
	}

endif;

return new Responsive_Header_Layout_Customizer();
