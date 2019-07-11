<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Links_Customizer' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Links_Customizer {

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
				'responsive_links_settings',
				array(
					'link-color'       => array(
						'label'    => esc_html__( 'Link Color', 'responsive' ),
						'target'   => 'h1,h2,h3,h4,h5,h6,.theme-heading,.widget-title,.responsive-widget-recent-posts-title,.comment-reply-title,.entry-title,.sidebar-box .widget-title',
						'defaults' => array(
							'color' => '#078ce1',
						),
					),
					'link-hover-color' => array(
						'label'    => esc_html__( 'Link Hover Color', 'responsive' ),
						'target'   => 'h1,h2,h3,h4,h5,h6,.theme-heading,.widget-title,.responsive-widget-recent-posts-title,.comment-reply-title,.entry-title,.sidebar-box .widget-title',
						'defaults' => array(
							'color' => '#10659c',
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
				'responsive_links_section',
				array(
					'title'    => esc_html__( 'Links', 'responsive' ),
					'panel'    => 'responsive_typography_panel',
					'priority' => 203,
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
								'section'         => 'responsive_links_section',
								'settings'        => $element,
								'priority'        => 10,
								'active_callback' => $active_callback,
							)
						)
					);

				}
			}
		}
	}

endif;

return new Responsive_Links_Customizer();
