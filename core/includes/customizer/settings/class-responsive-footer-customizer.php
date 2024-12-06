<?php
/**
 * Footer Copyright Options
 *
 * @package Responsive Addons Pro Plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Customizer' ) ) :
	/**
	 * Footer Customizer Options
	 */
	class Responsive_Footer_Customizer {

		/**
		 * Constructor
		 *
		 * @since 1.0.5
		 */
		public function __construct() {

			// add_action( 'customize_register', array( $this, 'customizer_options' ) );
			add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 1.0.5
		 */
		// public function customizer_options( $wp_customize ) {
		// 	$theme = wp_get_theme();

			/*
			------------------------------------------------------------------
				// Footer Elements Positioning
			-------------------------------------------------------------------
			*/
			// if ( 'Responsive' === $theme->name || 'Responsive' === $theme->parent_theme ) {
			// 	$wp_customize->add_setting(
			// 		'responsive_footer_elements_positioning',
			// 		array(
			// 			'default'           => array( 'social_icons', 'footer_menu', 'copy_right_text' ),
			// 			'sanitize_callback' => 'responsive_sanitize_multi_choices',
			// 			'transport'         => 'refresh',
			// 		)
			// 	);
			// 	$wp_customize->add_control(
			// 		new Responsive_Customizer_Sortable_Control(
			// 			$wp_customize,
			// 			'responsive_footer_elements_positioning',
			// 			array(
			// 				'label'    => esc_html__( 'Footer Elements', 'responsive' ),
			// 				'section'  => 'responsive_footer_layout',
			// 				'settings' => 'responsive_footer_elements_positioning',
			// 				'priority' => 11,
			// 				'choices'  =>
			// 					apply_filters(
			// 						'responsie_footer_elements',
			// 						array(
			// 							'social_icons'    => esc_html__( 'Social Icons', 'responsive' ),
			// 							'footer_menu'     => esc_html__( 'Footer Menu', 'responsive' ),
			// 							'copy_right_text' => esc_html__( 'Copy Right Text', 'responsive' ),
			// 						)
			// 					),
			// 			)
			// 		)
			// 	);
			// }
		// }

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

return new Responsive_Footer_Customizer();
