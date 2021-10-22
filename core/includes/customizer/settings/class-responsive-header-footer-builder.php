<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Footer_Builder' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_Footer_Builder {

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
				'responsive_header_builder',
				array(
					'title'    => esc_html__( 'Header Builder', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 100,
				)
			);

			ob_start(); ?>
			<div class="responsive-build-tabs nav-tab-wrapper wp-clearfix">
				<a href="#" class="nav-tab preview-desktop responsive-build-tabs-button" data-device="desktop">
					<span class="dashicons dashicons-desktop"></span>
					<span><?php esc_html_e( 'Desktop', 'responsive' ); ?></span>
				</a>
				<a href="#" class="nav-tab preview-tablet preview-mobile responsive-build-tabs-button" data-device="tablet">
					<span class="dashicons dashicons-smartphone"></span>
					<span><?php esc_html_e( 'Tablet / Mobile', 'responsive' ); ?></span>
				</a>
			</div>
			<span class="button button-secondary responsive-builder-hide-button responsive-builder-tab-toggle"><span class="dashicons dashicons-no"></span><?php esc_html_e( 'Hide', 'responsive' ); ?></span>
			<span class="button button-secondary responsive-builder-show-button responsive-builder-tab-toggle"><span class="dashicons dashicons-edit"></span><?php esc_html_e( 'Header Builder', 'responsive' ); ?></span>
			<?php
			$builder_tabs = ob_get_clean();

			$wp_customize->add_control(
				new Responsive_Customizer_blank_control(
					$wp_customize,
					'header_builder',
					array(
						'section'     => 'responsive_header_builder',
						'settings'    => false,
						'description' => $builder_tabs,
					)
				)
			);
			$header_desktop_items = array(
				'top'    => array(
					'top_left'         => array(),
					'top_left_center'  => array(),
					'top_center'       => array(),
					'top_right_center' => array(),
					'top_right'        => array(),
				),
				'main'   => array(
					'main_left'         => array( 'logo' ),
					'main_left_center'  => array(),
					'main_center'       => array(),
					'main_right_center' => array(),
					'main_right'        => array( 'navigation' ),
				),
				'bottom' => array(
					'bottom_left'         => array(),
					'bottom_left_center'  => array(),
					'bottom_center'       => array(),
					'bottom_right_center' => array(),
					'bottom_right'        => array(),
				),
			);
			$wp_customize->add_setting(
				'responsive_header_scheme',
				array(
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
					'default'           => 'enabled',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Control(
					$wp_customize,
					'header_desktop_items',
					array(
						// 'type' => 'responsive-builder',
						'section'     => 'responsive_header_builder',
						'default'     => $header_desktop_items,
						'settings'    => 'responsive_header_scheme',
						'context'     => array(
							array(
								'setting' => '__device',
								'value'   => 'desktop',
							),
						),
						'partial'     => array(
							'selector'            => '#masthead',
							'container_inclusive' => true,
							'render_callback'     => 'responsive\header_markup',
						),
						'choices'     => array(
							'logo'         => array(
								'name'    => esc_html__( 'Logo', 'responsive' ),
								'section' => 'responsive_header_layout',
							),
							'navigation'   => array(
								'name'    => esc_html__( 'Primary Navigation', 'responsive' ),
								'section' => 'responsive_header_layout',
							),
							'navigation-2' => array(
								'name'    => esc_html__( 'Secondary Navigation', 'responsive' ),
								'section' => 'responsive_header_layout',
							),
							'search'       => array(
								'name'    => esc_html__( 'Search', 'responsive' ),
								'section' => 'responsive_header_layout',
							),
							'button'       => array(
								'name'    => esc_html__( 'Button', 'responsive' ),
								'section' => 'responsive_customizer_header_button',
							),
							'social'       => array(
								'name'    => esc_html__( 'Social', 'responsive' ),
								'section' => 'responsive_customizer_header_social',
							),
							'html'         => array(
								'name'    => esc_html__( 'HTML', 'responsive' ),
								'section' => 'responsive_customizer_header_html',
							),
						),
						'input_attrs' => array(
							'group' => 'header_desktop_items',
							'rows'  => array( 'top', 'main', 'bottom' ),
							'zones' => array(
								'top'    => array(
									'top_left'         => is_rtl() ? esc_html__( 'Top - Right', 'responsive' ) : esc_html__( 'Top - Left', 'responsive' ),
									'top_left_center'  => is_rtl() ? esc_html__( 'Top - Right Center', 'responsive' ) : esc_html__( 'Top - Left Center', 'responsive' ),
									'top_center'       => esc_html__( 'Top - Center', 'responsive' ),
									'top_right_center' => is_rtl() ? esc_html__( 'Top - Left Center', 'responsive' ) : esc_html__( 'Top - Right Center', 'responsive' ),
									'top_right'        => is_rtl() ? esc_html__( 'Top - Left', 'responsive' ) : esc_html__( 'Top - Right', 'responsive' ),
								),
								'main'   => array(
									'main_left'         => is_rtl() ? esc_html__( 'Main - Right', 'responsive' ) : esc_html__( 'Main - Left', 'responsive' ),
									'main_left_center'  => is_rtl() ? esc_html__( 'Main - Right Center', 'responsive' ) : esc_html__( 'Main - Left Center', 'responsive' ),
									'main_center'       => esc_html__( 'Main - Center', 'responsive' ),
									'main_right_center' => is_rtl() ? esc_html__( 'Main - Left Center', 'responsive' ) : esc_html__( 'Main - Right Center', 'responsive' ),
									'main_right'        => is_rtl() ? esc_html__( 'Main - Left', 'responsive' ) : esc_html__( 'Main - Right', 'responsive' ),
								),
								'bottom' => array(
									'bottom_left'         => is_rtl() ? esc_html__( 'Bottom - Right', 'responsive' ) : esc_html__( 'Bottom - Left', 'responsive' ),
									'bottom_left_center'  => is_rtl() ? esc_html__( 'Bottom - Right Center', 'responsive' ) : esc_html__( 'Bottom - Left Center', 'responsive' ),
									'bottom_center'       => esc_html__( 'Bottom - Center', 'responsive' ),
									'bottom_right_center' => is_rtl() ? esc_html__( 'Bottom - Left Center', 'responsive' ) : esc_html__( 'Bottom - Right Center', 'responsive' ),
									'bottom_right'        => is_rtl() ? esc_html__( 'Bottom - Left', 'responsive' ) : esc_html__( 'Bottom - Right', 'responsive' ),
								),
							),
						),
					)
				)
			);
		}

	}

endif;

return new Responsive_Header_Footer_Builder();
