<?php
/**
 * Header Footer Builder Customizer Options
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
		 * @since 6.1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 6.1.0
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Header Builder options
			 */

            /**
             * Section for title.
             */
            $wp_customize->add_section(
                'responsive_header_builder',
                array(
                    'title'    => esc_html__( 'Header Builder', 'responsive' ),
                    'panel'    => 'responsive_header',
                    'priority' => 100,

                )
            );

			$header_desktop_items   = Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_desktop_items' );
			$header_desktop_choices = Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_builder_choices' );

			if ( class_exists( 'woocommerce' ) ) {
				$header_desktop_choices['woo-cart'] = array(
					'name'    => esc_html__( 'Cart', 'responsive' ),
					'section' => 'responsive_header_woo_cart',
					'icon'    => 'cart',
				);
			}

			$wp_customize->add_setting(
				'responsive_header_desktop_items',
				array(
					'default'           => $header_desktop_items,
					'sanitize_callback' => 'responsive_sanitize_builder',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Layout_Builder_Control(
					$wp_customize,
					'responsive_header_desktop_items',
					array(
						'section'  => 'responsive_header_builder',
						'settings' => 'responsive_header_desktop_items',
						'priority' => 20,
						'input_attrs'  => array(
							'group' => 'header_desktop_items',
							'rows'  => array( 'above', 'primary', 'below' ),
							'zones' => array(
								'above' => array(
									'above_left'         => is_rtl() ? esc_html__( 'Above - Right', 'responsive' ) : esc_html__( 'Above - Left', 'responsive' ),
									'above_left_center'  => is_rtl() ? esc_html__( 'Above - Right Center', 'responsive' ) : esc_html__( 'Above - Left Center', 'responsive' ),
									'above_center'       => esc_html__( 'Above - Center', 'responsive' ),
									'above_right_center' => is_rtl() ? esc_html__( 'Above - Left Center', 'responsive' ) : esc_html__( 'Above - Right Center', 'responsive' ),
									'above_right'        => is_rtl() ? esc_html__( 'Above - Left', 'responsive' ) : esc_html__( 'Above - Right', 'responsive' ),
								),
								'primary' => array(
									'primary_left'         => is_rtl() ? esc_html__( 'Primary - Right', 'responsive' ) : esc_html__( 'Primary - Left', 'responsive' ),
									'primary_left_center'  => is_rtl() ? esc_html__( 'Primary - Right Center', 'responsive' ) : esc_html__( 'Primary - Left Center', 'responsive' ),
									'primary_center'       => esc_html__( 'Primary - Center', 'responsive' ),
									'primary_right_center' => is_rtl() ? esc_html__( 'Primary - Left Center', 'responsive' ) : esc_html__( 'Primary - Right Center', 'responsive' ),
									'primary_right'        => is_rtl() ? esc_html__( 'Primary - Left', 'responsive' ) : esc_html__( 'Primary - Right', 'responsive' ),
								),
								'below' => array(
									'below_left'         => is_rtl() ? esc_html__( 'Below - Right', 'responsive' ) : esc_html__( 'Below - Left', 'responsive' ),
									'below_left_center'  => is_rtl() ? esc_html__( 'Below - Right Center', 'responsive' ) : esc_html__( 'Below - Left Center', 'responsive' ),
									'below_center'       => esc_html__( 'Below - Center', 'responsive' ),
									'below_right_center' => is_rtl() ? esc_html__( 'Below - Left Center', 'responsive' ) : esc_html__( 'Below - Right Center', 'responsive' ),
									'below_right'        => is_rtl() ? esc_html__( 'Below - Left', 'responsive' ) : esc_html__( 'Below - Right', 'responsive' ),
								),
							),
						),
						'builder_choices' => $header_desktop_choices,
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_hfb_header_builder',
				array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'refresh',
				)
			);

			ob_start(); ?>
			<span class="button button-secondary responsive-hfb-builder-hide-button responsive-hfb-builder-tab-toggle"><?php esc_html_e( 'Hide', 'responsive' ); ?><img class="rhfb-toggle-icon rhfb-no" src="<?php echo esc_url( get_stylesheet_directory_uri().'/core/includes/customizer/assets/images/hfb-hide.svg' ); ?>"></img></span>
			<span class="button button-secondary responsive-hfb-builder-show-button responsive-hfb-builder-tab-toggle"><?php esc_html_e( 'Header Builder', 'responsive' ); ?><img class="rhfb-toggle-icon rhfb-edit" src="<?php echo esc_url( get_template_directory_uri() .'/core/includes/customizer/assets/images/hfb-show.svg'  ) ?>"></img></span>
			<?php
			$responsive_hfb_header_builder_toggle = ob_get_clean();

			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Header_Blank_Control(
                    $wp_customize,
                    'responsive_hfb_header_builder',
                    array(
                        'description' => $responsive_hfb_header_builder_toggle,
                        'section'     => 'responsive_header_builder',
                        'priority'    => 10,
                    )
                )
			);

			/**
			 * Footer Builder options
			 */

            /**
             * Section for title.
             */
            $wp_customize->add_section(
                'responsive_footer_builder',
                array(
                    'title'    => esc_html__( 'Footer Builder', 'responsive' ),
                    'panel'    => 'responsive_footer',
                    'priority' => 20,

                )
            );

			$footer_items 			= Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_items' );
			$footer_builder_choices = Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_builder_choices' );

			$wp_customize->add_setting(
				'responsive_footer_items',
				array(
					'default'           => $footer_items,
					'sanitize_callback' => 'responsive_sanitize_builder',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Layout_Builder_Control(
					$wp_customize,
					'responsive_footer_items',
					array(
						'section'  => 'responsive_footer_builder',
						'settings' => 'responsive_footer_items',
						'priority' => 20,
						'input_attrs'  => array(
							'group' => 'footer_items',
							'rows'  => array( 'above', 'primary', 'below' ),
							'zones' => array(
								'above' => array(
									'above_1' => esc_html__( 'Above - 1', 'responsive' ),
									'above_2' => esc_html__( 'Above - 2', 'responsive' ),
									'above_3' => esc_html__( 'Above - 3', 'responsive' ),
									'above_4' => esc_html__( 'Above - 4', 'responsive' ),
									'above_5' => esc_html__( 'Above - 5', 'responsive' ),
									'above_6' => esc_html__( 'Above - 6', 'responsive' ),
								),
								'primary' => array(
									'primary_1' => esc_html__( 'Primary - 1', 'responsive' ),
									'primary_2' => esc_html__( 'Primary - 2', 'responsive' ),
									'primary_3' => esc_html__( 'Primary - 3', 'responsive' ),
									'primary_4' => esc_html__( 'Primary - 4', 'responsive' ),
									'primary_5' => esc_html__( 'Primary - 5', 'responsive' ),
									'primary_6' => esc_html__( 'Primary - 6', 'responsive' ),
								),
								'below' => array(
									'below_1' => esc_html__( 'Below - 1', 'responsive' ),
									'below_2' => esc_html__( 'Below - 2', 'responsive' ),
									'below_3' => esc_html__( 'Below - 3', 'responsive' ),
									'below_4' => esc_html__( 'Below - 4', 'responsive' ),
									'below_5' => esc_html__( 'Below - 5', 'responsive' ),
									'below_6' => esc_html__( 'Below - 6', 'responsive' ),
								),
							),
						),
						'builder_choices' => $footer_builder_choices,
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_hfb_footer_builder',
				array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'refresh',
				)
			);

			ob_start(); ?>
			<span class="button button-secondary responsive-hfb-builder-hide-button responsive-hfb-builder-tab-toggle"><?php esc_html_e( 'Hide', 'responsive' ); ?><img class="rhfb-toggle-icon rhfb-no" src="<?php echo esc_url( get_stylesheet_directory_uri().'/core/includes/customizer/assets/images/hfb-hide.svg' ); ?>"></img></span>
			<span class="button button-secondary responsive-hfb-builder-show-button responsive-hfb-builder-tab-toggle"><?php esc_html_e( 'Footer Builder', 'responsive' ); ?><img class="rhfb-toggle-icon rhfb-edit" src="<?php echo esc_url( get_template_directory_uri() .'/core/includes/customizer/assets/images/hfb-show.svg'  ) ?>"></img></span>
			<?php
			$responsive_hfb_footer_builder_toggle = ob_get_clean();

			$wp_customize->add_control(
				new Responsive_Customizer_Builder_Header_Blank_Control(
                    $wp_customize,
                    'responsive_hfb_footer_builder',
                    array(
                        'description' => $responsive_hfb_footer_builder_toggle,
                        'section'     => 'responsive_footer_builder',
                        'priority'    => 10,
                    )
                )
			);

        }

	}

endif;

return new Responsive_Header_Footer_Builder();