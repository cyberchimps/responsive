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

			/**
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_header_builder',
				array(
					'title'    => esc_html__( 'Header Builder', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 100,
				)
			);

			$builder_tabs = '';

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
						'section'     => 'responsive_customizer_header_builder',
						'settings'    => false,
						'description' => $builder_tabs,
					)
				)
			);
			$header_desktop_items_choices = array(
				'logo'         => array(
					'name'    => esc_html__( 'Logo', 'responsive' ),
					'section' => 'responsive_customizer_logo',
				),
				'navigation'   => array(
					'name'    => esc_html__( 'Primary Navigation', 'responsive' ),
					'section' => 'responsive_customizer_primary_navigation',
				),
				'navigation-2' => array(
					'name'    => esc_html__( 'Secondary Navigation', 'responsive' ),
					'section' => 'responsive_customizer_secondary_navigation',
				),
				'search'       => array(
					'name'    => esc_html__( 'Search', 'responsive' ),
					'section' => 'responsive_customizer_header_search',
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

			);

			if ( class_exists( 'woocommerce' ) ) {
				$header_desktop_items_choices['cart'] = array(
					'name'    => esc_html__( 'Cart', 'responsive' ),
					'section' => 'responsive_customizer_header_cart',
				);
			}
			$header_desktop_items = Responsive\Core\get_responsive_customizer_defaults( 'header_desktop_items' );
			$wp_customize->add_setting(
				'header_desktop_items',
				array(
					'transport'         => 'postMessage',
					'default'           => $header_desktop_items,
					'sanitize_callback' => 'responsive_sanitize_builder',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'header_desktop_items',
				array(
					'selector'            => '#masthead',
					'container_inclusive' => true,
					'render_callback'     => 'header_markup',
					'fallback_refresh'    => true,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Control(
					$wp_customize,
					'header_desktop_items',
					array(
						'section'     => 'responsive_customizer_header_builder',
						'settings'    => 'header_desktop_items',
						'default'     => $header_desktop_items,
						'context'     => array(
							array(
								'setting' => '__device',
								'value'   => 'desktop',
							),
						),
						'choices'     => $header_desktop_items_choices,
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

			// Header Mobile  Options.
			$header_mobile_items_choices = array(
				'mobile-logo'       => array(
					'name'    => esc_html__( 'Logo', 'responsive' ),
					'section' => 'responsive_customizer_logo',
				),
				'mobile-navigation' => array(
					'name'    => esc_html__( 'Mobile Navigation', 'responsive' ),
					'section' => 'responsive_customizer_mobile_navigation',
				),
				'search'            => array(
					'name'    => esc_html__( 'Search', 'responsive' ),
					'section' => 'responsive_customizer_header_search',
				),
				'mobile-button'     => array(
					'name'    => esc_html__( 'Button', 'responsive' ),
					'section' => 'responsive_customizer_mobile_button',
				),
				'mobile-social'     => array(
					'name'    => esc_html__( 'Social', 'responsive' ),
					'section' => 'responsive_customizer_mobile_social',
				),
				'mobile-html'       => array(
					'name'    => esc_html__( 'HTML', 'responsive' ),
					'section' => 'responsive_customizer_mobile_html',
				),
				'popup-toggle'      => array(
					'name'    => esc_html__( 'Trigger', 'responsive' ),
					'section' => 'responsive_customizer_mobile_trigger',
				),

			);

			if ( class_exists( 'woocommerce' ) ) {
				$header_mobile_items_choices['mobile-cart'] = array(
					'name'    => esc_html__( 'Mobile Cart', 'responsive' ),
					'section' => 'responsive_customizer_mobile_cart',
				);
			}
			$header_mobile_items_default = Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_items' );
			$wp_customize->add_setting(
				'header_mobile_items',
				array(
					'transport'         => 'refresh',
					'default'           => $header_mobile_items_default,
					'sanitize_callback' => 'responsive_sanitize_builder',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'header_mobile_items',
				array(
					'selector'            => '#mobile-header',
					'container_inclusive' => true,
					'render_callback'     => 'mobile_header',
					'fallback_refresh'    => true,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Control(
					$wp_customize,
					'header_mobile_items',
					array(
						'section'     => 'responsive_customizer_header_builder',
						'settings'    => 'header_mobile_items',
						'default'     => $header_mobile_items_default,
						'context'     => array(
							array(
								'setting'  => '__device',
								'operator' => 'in',
								'value'    => array( 'tablet', 'mobile' ),
							),
						),
						'choices'     => $header_mobile_items_choices,
						'input_attrs' => array(
							'group' => 'header_mobile_items',
							'rows'  => array( 'popup', 'top', 'main', 'bottom' ),
							'zones' => array(
								'popup'  => array(
									'popup_content' => esc_html__( 'Popup Content', 'responsive' ),
								),
								'top'    => array(
									'top_left'   => is_rtl() ? esc_html__( 'Top - Right', 'responsive' ) : esc_html__( 'Top - Left', 'responsive' ),
									'top_center' => esc_html__( 'Top - Center', 'responsive' ),
									'top_right'  => is_rtl() ? esc_html__( 'Top - Left', 'responsive' ) : esc_html__( 'Top - Right', 'responsive' ),
								),
								'main'   => array(
									'main_left'   => is_rtl() ? esc_html__( 'Main - Right', 'responsive' ) : esc_html__( 'Main - Left', 'responsive' ),
									'main_center' => esc_html__( 'Main - Center', 'responsive' ),
									'main_right'  => is_rtl() ? esc_html__( 'Main - Left', 'responsive' ) : esc_html__( 'Main - Right', 'responsive' ),
								),
								'bottom' => array(
									'bottom_left'   => is_rtl() ? esc_html__( 'Bottom - Right', 'responsive' ) : esc_html__( 'Bottom - Left', 'responsive' ),
									'bottom_center' => esc_html__( 'Bottom - Center', 'responsive' ),
									'bottom_right'  => is_rtl() ? esc_html__( 'Bottom - Left', 'responsive' ) : esc_html__( 'Bottom - Right', 'responsive' ),
								),
							),
						),
					)
				)
			);

			/**
			 * Footer Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_footer_builder',
				array(
					'title'    => esc_html__( 'Footer Builder', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 100,
				)
			);

			ob_start();
			?>
			<span class="button button-secondary responsive-builder-hide-button responsive-builder-tab-toggle"><span class="dashicons dashicons-no"></span><?php esc_html_e( 'Hide', 'responsive' ); ?></span>
			<span class="button button-secondary responsive-builder-show-button responsive-builder-tab-toggle"><span class="dashicons dashicons-edit"></span><?php esc_html_e( 'Footer Builder', 'responsive' ); ?></span>
			<?php
			$builder_tabs = ob_get_clean();
			$wp_customize->add_control(
				new Responsive_Customizer_blank_control(
					$wp_customize,
					'footer_builder',
					array(
						'section'     => 'responsive_customizer_footer_builder',
						'settings'    => false,
						'description' => $builder_tabs,
					),
				)
			);

			$footer_items = Responsive\Core\get_responsive_customizer_defaults( 'footer_items' );
			$wp_customize->add_setting(
				'footer_items',
				array(
					'transport'         => 'refresh',
					'default'           => $footer_items,
					'sanitize_callback' => 'responsive_sanitize_builder',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'footer_items',
				array(
					'selector'            => '#colophon',
					'container_inclusive' => true,
					'render_callback'     => 'footer_markup',
					'fallback_refresh'    => true,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Control(
					$wp_customize,
					'footer_items',
					array(
						'section'     => 'responsive_customizer_footer_builder',
						'settings'    => 'footer_items',
						'default'     => $footer_items,
						'choices'     => array(
							'footer-navigation' => array(
								'name'    => esc_html__( 'Footer Navigation', 'responsive' ),
								'section' => 'responsive_customizer_footer_navigation',
							),
							'footer-social'     => array(
								'name'    => esc_html__( 'Social', 'responsive' ),
								'section' => 'responsive_customizer_footer_social',
							),
							'footer-html'       => array(
								'name'    => esc_html__( 'Copyright', 'responsive' ),
								'section' => 'responsive_customizer_footer_html',
							),
							'footer-widget1'    => array(
								'name'    => esc_html__( 'Widget 1', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-1',
							),
							'footer-widget2'    => array(
								'name'    => esc_html__( 'Widget 2', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-2',
							),
							'footer-widget3'    => array(
								'name'    => esc_html__( 'Widget 3', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-3',
							),
							'footer-widget4'    => array(
								'name'    => esc_html__( 'Widget 4', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-4',
							),
							'footer-widget5'    => array(
								'name'    => esc_html__( 'Widget 5', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-5',
							),
							'footer-widget6'    => array(
								'name'    => esc_html__( 'Widget 6', 'responsive' ),
								'section' => 'sidebar-widgets-footer-widget-6',
							),
						),
						'input_attrs' => array(
							'group' => 'footer_items',
							'rows'  => array( 'top', 'middle', 'bottom' ),
							'zones' => array(
								'top'    => array(
									'top_1' => esc_html__( 'Top - 1', 'responsive' ),
									'top_2' => esc_html__( 'Top - 2', 'responsive' ),
									'top_3' => esc_html__( 'Top - 3', 'responsive' ),
									'top_4' => esc_html__( 'Top - 4', 'responsive' ),
									'top_5' => esc_html__( 'Top - 5', 'responsive' ),
								),
								'middle' => array(
									'middle_1' => esc_html__( 'Middle - 1', 'responsive' ),
									'middle_2' => esc_html__( 'Middle - 2', 'responsive' ),
									'middle_3' => esc_html__( 'Middle - 3', 'responsive' ),
									'middle_4' => esc_html__( 'Middle - 4', 'responsive' ),
									'middle_5' => esc_html__( 'Middle - 5', 'responsive' ),
								),
								'bottom' => array(
									'bottom_1' => esc_html__( 'Bottom - 1', 'responsive' ),
									'bottom_2' => esc_html__( 'Bottom - 2', 'responsive' ),
									'bottom_3' => esc_html__( 'Bottom - 3', 'responsive' ),
									'bottom_4' => esc_html__( 'Bottom - 4', 'responsive' ),
									'bottom_5' => esc_html__( 'Bottom - 5', 'responsive' ),
								),
							),
						),
					),
				)
			);
		}

	}

endif;

return new Responsive_Header_Footer_Builder();
