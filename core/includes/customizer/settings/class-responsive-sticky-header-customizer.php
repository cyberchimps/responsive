<?php
/**
 * Footer Copyright Options
 *
 * @package Responsive Addons Pro Plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Sticky_Header_Customizer' ) ) :
	/**
	 * Footer Customizer Options
	 */
	class Responsive_Sticky_Header_Customizer {

		/**
		 * Constructor
		 *
		 * @since 1.0.5
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );
			add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 1.0.5
		 */
		public function customizer_options( $wp_customize ) {
			$theme = wp_get_theme();

			/*
			------------------------------------------------------------------
				// Footer Elements Positioning
			-------------------------------------------------------------------
			*/
			if ( 'Responsive' === $theme->name || 'Responsive' === $theme->parent_theme ) {
				/**
				 * Menu Layouts.
				 */
				$wp_customize->add_section(
					'responsive_header_sticky_menu_layout',
					array(
						'title'    => __( 'Sticky Header', 'responsive' ),
						'panel'    => 'responsive_header',
						'priority' => 27,
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[sticky-header]',
					array(
						'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
						'type'              => 'option',
						'transport'         => 'postMessage',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Toggle_Control(
						$wp_customize,
						'res_sticky-header',
						array(
							'label'    => __( 'Enable Sticky Header?', 'responsive' ),
							'section'  => 'responsive_header_sticky_menu_layout',
							'settings' => 'responsive_theme_options[sticky-header]',
							'priority' => 10,
						)
					)
				);

				$wp_customize->add_setting(
					'responsive_shrink_sticky_header',
					array(
						'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
						'transport'         => 'postMessage',
						'default'           => 0,
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Toggle_Control(
						$wp_customize,
						'responsive_shrink_sticky_header',
						array(
							'label'    => __( ' Shrink Logo On Scroll ?', 'responsive' ),
							'section'  => 'responsive_header_sticky_menu_layout',
							'settings' => 'responsive_shrink_sticky_header',
							'priority' => 20,
						)
					)
				);

				// Disable Sticky Header on Mobile.
				$disable_sticky_header_mobile_menu_label = __( 'Disable Sticky Header on Mobile Menu', 'responsive' );
				responsive_toggle_control( $wp_customize, 'disable_sticky_header_mobile_menu', $disable_sticky_header_mobile_menu_label, 'responsive_header_sticky_menu_layout', 25, 0, null );

				// Different Logo For Transparent Header.
				$sticky_header_logo_option_label = __( 'Different Logo For Sticky Header', 'responsive' );
				responsive_toggle_control( $wp_customize, 'sticky_header_logo_option', $sticky_header_logo_option_label, 'responsive_header_sticky_menu_layout', 30, 0, null );

				$wp_customize->add_setting(
					'responsive_sticky_header_logo',
					array(
						'sanitize_callback' => 'absint',
					)
				);

				$wp_customize->add_control(
					new WP_Customize_Cropped_Image_Control(
						$wp_customize,
						'responsive_sticky_header_logo',
						array(
							'label'           => esc_html__( 'Logo For Sticky Header', 'responsive' ),
							'section'         => 'responsive_header_sticky_menu_layout',
							'flex-height'     => true,
							'flex-width'      => true,
							'height'          => 100, // pixels.
							'width'           => 300, // pixels.
							'priority'        => 40,
							'active_callback' => 'responsive_different_logo_sticky_header',
						)
					)
				);

				$sticky_header_color_separator_label = esc_html__( 'Sticky Header Colors', 'responsive' );
				responsive_separator_control( $wp_customize, 'sticky_header_color_separator', $sticky_header_color_separator_label, 'responsive_header_sticky_menu_layout', 50, null );

				$sticky_header_background_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_background', $sticky_header_background_label, 'responsive_header_sticky_menu_layout', 100, '' );

				$sticky_header_site_title_color_label = __( 'Site Title Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_site_title', $sticky_header_site_title_color_label, 'responsive_header_sticky_menu_layout', 110, '' );

				$sticky_header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_site_title_hover', $sticky_header_site_title_hover_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				$sticky_header_text_color_label = __( 'Site Tagline Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_text', $sticky_header_text_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				$sticky_menu_background_color_label = __( 'Menu Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_menu_background', $sticky_menu_background_color_label, 'responsive_header_sticky_menu_layout', 120, '', null );

				// Active Menu Color.
				$sticky_menu_border_color_label = __( 'Active Menu Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_active_menu_background', $sticky_menu_border_color_label, 'responsive_header_sticky_menu_layout', 120, '', null );

				// Link Color.
				$sticky_menu_link_color_label = __( 'Menu Item Link Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_menu_link', $sticky_menu_link_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				// Link Hover Color.
				$sticky_menu_link_hover_color_label = __( 'Menu Item Link Hover Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_menu_link_hover', $sticky_menu_link_hover_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				// Sub Menu Background Color.
				$sticky_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_sub_menu_background', $sticky_header_sub_menu_background_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				// Sub Menu Link Color.
				$sticky_sub_menu_link_color_label = __( 'Sub Menu Item Link Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_sub_menu_link', $sticky_sub_menu_link_color_label, 'responsive_header_sticky_menu_layout', 120, '' );

				// Sub Menu Link Hover Color.
				$sticky_sub_menu_link_hover_color_label = __( 'Sub Menu Item Link Hover Color', 'responsive' );
				responsive_color_control( $wp_customize, 'sticky_header_sub_menu_link_hover', $sticky_sub_menu_link_hover_color_label, 'responsive_header_sticky_menu_layout', 120, '' );
			}
		}

		/**
		 * Loads js file for customizer preview
		 *
		 * @since 1.0.6
		 */
		public function customize_preview_init() {
			$path = get_stylesheet_directory_uri() . '/core/includes/customizer/assets/js/customize-preview.js';
			wp_enqueue_script( 'responsive-customize-preview', $path, array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
			$localize_array = array(
				'isProGreater'   => $this->is_version_greater( 'responsive-pro' ),
				'isThemeGreater' => $this->is_version_greater( 'responsive' ),
			);
			wp_localize_script( 'responsive-customize-preview', 'responsive_pro', $localize_array );

		}

		/**
		 * Verify if the version of specified products is greater or not.
		 * Specify 'responsive' to target responsive theme as product.
		 * Specify 'responsive-pro' to target responsive pro as product.
		 *
		 * @param  boolean $product responsive theme or responsive pro.
		 * @since 2.6.4
		 */
		public function is_version_greater( $product = 'responsive' ) {
			if ( 'responsive' === $product ) {
				$theme                    = wp_get_theme();
				$is_theme_version_greater = false;
				if ( 'Responsive' === $theme->name || 'Responsive' === $theme->parent_theme ) {
					if ( 'Responsive' === $theme->parent_theme ) {
						$theme = wp_get_theme( 'responsive' );
					}
				}
				if ( version_compare( $theme['Version'], '4.9.6', '>' ) ) {
					$is_theme_version_greater = true;
				}
				return $is_theme_version_greater;
			} else {
				$is_pro_version_greater = false;
				if ( version_compare( RESPONSIVE_THEME_VERSION, '2.6.3', '>' ) ) {
					$is_pro_version_greater = true;
				}
				return $is_pro_version_greater;
			}
		}
	}

endif;

return new Responsive_Sticky_Header_Customizer();
