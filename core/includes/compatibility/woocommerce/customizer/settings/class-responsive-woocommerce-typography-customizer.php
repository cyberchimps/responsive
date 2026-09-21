<?php
/**
 * WooCommerce Typography Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

if ( ! class_exists( 'Responsive_Woocommerce_Typography_Customizer' ) ) :

	/**
	 * WooCommerce Typography Loader
	 *
	 * @since 6.5.0
	 */
	class Responsive_Woocommerce_Typography_Customizer {
		/**
		 * Setup class.
		 *
		 * @since 6.5.0
		 */
		public function __construct() {
			// Priority 20: must run after Responsive\Customizer\responsive_custom_controls()
			// (hooked at the default priority 10 via Responsive\Customizer\setup()),
			// which is what loads the Responsive_Customizer_*_Control classes used below.
			add_action( 'customize_register', array( $this, 'customizer_options' ), 20 );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'load_fonts' ) );

			add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
			add_action( 'wp_head', array( $this, 'live_preview_styles' ), 9 );
			add_filter( 'responsive_head_css', array( $this, 'head_css' ), 99 );
		}

		/**
		 * Array of Typography settings to add to the customizer
		 */
		public function elements() {

			return apply_filters(
				'responsive_woocommerce_typography_settings',
				array(
					'product_title'                  => array(
						'label'    => esc_html__( 'Product Title', 'responsive' ),
						'target'   => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title',
						'priority' => 173,
						'section'  => 'responsive_woocommerce_shop',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'single_product_title'           => array(
						'label'    => esc_html__( 'Product Title', 'responsive' ),
						'target'   => '.single-product div.product .entry-title',
						'priority' => 79,
						'type'     => 'control',
						'section'  => 'responsive_woocommerce_single_product_layout',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'product_price'                  => array(
						'label'    => esc_html__( 'Product Price', 'responsive' ),
						'target'   => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price',
						'priority' => 175,
						'section'  => 'responsive_woocommerce_shop',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'single_product_price'           => array(
						'label'    => esc_html__( 'Product Price', 'responsive' ),
						'target'   => '.single-product div.product p.price,.single-product div.product p.price ins',
						'priority' => 81,
						'exclude'  => array( 'text-transform' ),
						'type'     => 'control',
						'section'  => 'responsive_woocommerce_single_product_layout',
						'defaults' => array(
							'font-size'   => '20px',
							'color'       => '#555555',
							'font-weight' => '700',
							'line-height' => '1.4',
						),
					),
					'product_content'                => array(
						'label'    => esc_html__( 'Product Content', 'responsive' ),
						'target'   => '.responsive-shop-summary-wrap p, .responsive-shop-summary-wrap .responsive_woo_shop_parent_category ',
						'priority' => 177,
						'section'  => 'responsive_woocommerce_shop',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'single_product_content'         => array(
						'label'    => esc_html__( 'Product Content', 'responsive' ),
						'target'   => '.single-product .woocommerce-product-details__short-description, .single-product .woocommerce-Tabs-panel--description',
						'priority' => 83,
						'type'     => 'control',
						'section'  => 'responsive_woocommerce_single_product_layout',
						'defaults' => array(
							'font-size'      => '2.250em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'shop_page_title'                => array(
						'label'    => esc_html__( 'Shop Page Title', 'responsive' ),
						'target'   => '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title',
						'priority' => 171,
						'section'  => 'responsive_woocommerce_shop',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'single_product_page_breadcrumb' => array(
						'label'    => esc_html__( 'Breadcrumb', 'responsive' ),
						'target'   => '.single-product .woocommerce-breadcrumb, .single-product .woocommerce-breadcrumb a',
						'priority' => 85,
						'type'     => 'control',
						'section'  => 'responsive_woocommerce_single_product_layout',
						'defaults' => array(
							'font-size'      => '2.625em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
				)
			);
		}

		/**
		 * Customizer options
		 *
		 * @param object $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$elements = self::elements();
			if ( empty( $elements ) ) {
				return;
			}

			foreach ( $elements as $element => $array ) {

				$label              = ! empty( $array['label'] ) ? $array['label'] : null;
				$exclude_attributes = ! empty( $array['exclude'] ) ? $array['exclude'] : false;
				$active_callback    = isset( $array['active_callback'] ) ? $array['active_callback'] : null;
				$transport          = 'postMessage';
				$section            = ! empty( $array['section'] ) ? $array['section'] : null;
				$priority           = ! empty( $array['section'] ) ? $array['priority'] : null;

				if ( ! empty( $array['attributes'] ) ) {
					$attributes = $array['attributes'];
				} else {
					$attributes = array(
						'font-family',
						'font-weight',
						'font-style',
						'text-transform',
						'font-size',
						'line-height',
						'letter-spacing',
						'font-color',
					);
				}

				$attributes = array_combine( $attributes, $attributes );

				if ( $exclude_attributes ) {
					foreach ( $exclude_attributes as $key => $val ) {
						unset( $attributes[ $val ] );
					}
				}

				if ( ! $label ) {
					continue;
				}

				/*
				 * Separators
				 */
				$seperator_priority = $priority - 1;
				$control_priority   = $seperator_priority;
				$seperator_count    = 1;
				if ( 'shop_page_title' === $element || 'single_product_title' === $element ) {
					$seperator_count = 2;
				}
				responsive_horizontal_separator_control( $wp_customize, $element . '_shop_typography_group_seperator', $seperator_count, $section, $seperator_priority, 1 );

				responsive_typography_group_control( $wp_customize, $element . '_shop_typography_group', $label . ' Font', $section, $control_priority, $element . '_shop_typography' );

				/**
				 * Font Family
				 */
				if ( in_array( 'font-family', $attributes, true ) ) {

					$wp_customize->add_setting(
						$element . '_shop_typography[font-family]',
						array(
							'type'              => 'theme_mod',
							'transport'         => $transport,
							'sanitize_callback' => 'sanitize_text_field',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Typography_Control(
							$wp_customize,
							$element . '_shop_typography[font-family]',
							array(
								'name'                  => $element . '_shop_typography[font-family]',
								'label'                 => esc_html__( 'Family', 'responsive' ),
								'section'               => $section,
								'responsive_setting_id' => 'responsive_font_family',
								'settings'              => $element . '_shop_typography[font-family]',
								'priority'              => $priority,
								'active_callback'       => $active_callback,
								'resp_inherit'          => __( 'Default', 'responsive' ),
								'connect'               => $element . '_shop_typography[font-weight]',
							)
						)
					);

				}

				/**
				 * Font Weight
				 */
				if ( in_array( 'font-weight', $attributes, true ) ) {

					$wp_customize->add_setting(
						$element . '_shop_typography[font-weight]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_select',
							'transport'         => $transport,
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Typography_Control(
							$wp_customize,
							$element . '_shop_typography[font-weight]',
							array(
								'name'                  => $element . '_shop_typography[font-weight]',
								'label'                 => esc_html__( 'Font Weight', 'responsive' ),
								'description'           => esc_html__( '', 'responsive' ),
								'section'               => $section,
								'responsive_setting_id' => 'responsive_font_weight',
								'settings'              => $element . '_shop_typography[font-weight]',
								'resp_inherit'          => __( 'Default', 'responsive' ),
								'connect'               => $element . '_shop_typography[font-family]',
								'priority'              => $priority,
								'active_callback'       => $active_callback,
								'choices'               => array(
									''    => esc_html__( 'Default', 'responsive' ),
									'100' => esc_html__( 'Thin: 100', 'responsive' ),
									'200' => esc_html__( 'Light: 200', 'responsive' ),
									'300' => esc_html__( 'Book: 300', 'responsive' ),
									'400' => esc_html__( 'Normal: 400', 'responsive' ),
									'500' => esc_html__( 'Medium: 500', 'responsive' ),
									'600' => esc_html__( 'Semibold: 600', 'responsive' ),
									'700' => esc_html__( 'Bold: 700', 'responsive' ),
									'800' => esc_html__( 'Extra Bold: 800', 'responsive' ),
									'900' => esc_html__( 'Black: 900', 'responsive' ),
								),
							)
						)
					);
				}

				/**
				 * Font Style
				 */
				if ( in_array( 'font-style', $attributes, true ) ) {

					$wp_customize->add_setting(
						$element . '_shop_typography[font-style]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_select',
							'transport'         => $transport,
							'default'           => 'normal',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Select_Button_Control(
							$wp_customize,
							$element . '_shop_typography[font-style]',
							array(
								'label'           => esc_html__( '', 'responsive' ),
								'section'         => $section,
								'settings'        => $element . '_shop_typography[font-style]',
								'priority'        => $priority,
								'active_callback' => $active_callback,
								'choices'         => array(
									'italic' => esc_html__( 'T', 'responsive' ),
									'normal' => esc_html__( 'T', 'responsive' ),
								),
							)
						)
					);
				}

				/**
				 * Text Transform
				 */
				if ( in_array( 'text-transform', $attributes, true ) ) {

					$wp_customize->add_setting(
						$element . '_shop_typography[text-transform]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_select',
							'transport'         => $transport,
							'default'           => '',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Select_Button_Control(
							$wp_customize,
							$element . '_shop_typography[text-transform]',
							array(
								'label'           => esc_html__( '', 'responsive' ),
								'section'         => $section,
								'settings'        => $element . '_shop_typography[text-transform]',
								'priority'        => $priority,
								'active_callback' => $active_callback,
								'choices'         => array(
									'capitalize' => esc_html__( 'Aa', 'responsive' ),
									'lowercase'  => esc_html__( 'aa', 'responsive' ),
									'uppercase'  => esc_html__( 'AA', 'responsive' ),
								),
							)
						)
					);
				}

				/**
				 * Font Size
				 */
				if ( in_array( 'font-size', $attributes, true ) ) {

					$default = ! empty( $array['defaults']['font-size'] ) ? $array['defaults']['font-size'] : null;
					$wp_customize->add_setting(
						$element . '_shop_typography[font-size]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'sanitize_text_field',
							'transport'         => $transport,
							'default'           => $default,
						)
					);

					$wp_customize->add_setting(
						$element . '_tablet_typography[font-size]',
						array(
							'transport'         => $transport,
							'sanitize_callback' => 'sanitize_text_field',
							'default'           => $default,
						)
					);

					$wp_customize->add_setting(
						$element . '_mobile_typography[font-size]',
						array(
							'transport'         => $transport,
							'sanitize_callback' => 'sanitize_text_field',
							'default'           => $default,
						)
					);
					$wp_customize->add_setting(
						$element . '_shop_typography_font_size_value',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_number',
							'transport'         => $transport,
							'default'           => '16',
						)
					);
					$wp_customize->add_setting(
						$element . '_tablet_typography_font_size_value',
						array(
							'sanitize_callback' => 'responsive_sanitize_number',
							'transport'         => $transport,
							'default'           => '16',
						)
					);
					$wp_customize->add_setting(
						$element . '_mobile_typography_font_size_value',
						array(
							'sanitize_callback' => 'responsive_sanitize_number',
							'transport'         => $transport,
							'default'           => '16',
						)
					);
					$wp_customize->add_setting(
						$element . '_shop_typography_font_size_unit',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'sanitize_text_field',
							'transport'         => $transport,
							'default'           => 'px',
						)
					);
					$wp_customize->add_setting(
						$element . '_tablet_typography_font_size_unit',
						array(
							'sanitize_callback' => 'sanitize_text_field',
							'transport'         => $transport,
							'default'           => 'px',
						)
					);
					$wp_customize->add_setting(
						$element . '_mobile_typography_font_size_unit',
						array(
							'sanitize_callback' => 'sanitize_text_field',
							'transport'         => $transport,
							'default'           => 'px',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Text_Control(
							$wp_customize,
							$element . '_shop_typography[font-size]',
							array(
								'label'           => esc_html__( 'Size', 'responsive' ),
								'description'     => esc_html__( '', 'responsive' ),
								'section'         => $section,
								'settings'        => array(
									'desktop'           => $element . '_shop_typography[font-size]',
									'tablet'            => $element . '_tablet_typography[font-size]',
									'mobile'            => $element . '_mobile_typography[font-size]',
									'desktop_value'     => $element . '_shop_typography_font_size_value',
									'tablet_value'      => $element . '_tablet_typography_font_size_value',
									'mobile_value'      => $element . '_mobile_typography_font_size_value',
									'desktop_font_unit' => $element . '_shop_typography_font_size_unit',
									'tablet_font_unit'  => $element . '_tablet_typography_font_size_unit',
									'mobile_font_unit'  => $element . '_mobile_typography_font_size_unit',
								),
								'priority'        => $priority,
								'active_callback' => $active_callback,
							)
						)
					);

				}

				/**
				 * Line Height
				 */
				if ( in_array( 'line-height', $attributes, true ) ) {

					$default = ! empty( $array['defaults']['line-height'] ) ? $array['defaults']['line-height'] : null;

					$wp_customize->add_setting(
						$element . '_shop_typography[line-height]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_number',
							'transport'         => $transport,
							'default'           => $default,
						)
					);

					$wp_customize->add_setting(
						$element . '_tablet_typography[line-height]',
						array(
							'transport'         => $transport,
							'sanitize_callback' => 'responsive_sanitize_number_blank',
						)
					);

					$wp_customize->add_setting(
						$element . '_mobile_typography[line-height]',
						array(
							'transport'         => $transport,
							'sanitize_callback' => 'responsive_sanitize_number_blank',
						)
					);
					$wp_customize->add_control(
						new Responsive_Customizer_Range_Control(
							$wp_customize,
							$element . '_shop_typography[line-height]',
							array(
								'label'           => esc_html__( 'Line Height', 'responsive' ),
								'section'         => $section,
								'priority'        => $priority,
								'settings'        => $element . '_shop_typography[line-height]',
								'active_callback' => $active_callback,
								'input_attrs'     => array(
									'min'  => 1,
									'max'  => 4,
									'step' => 0.1,
								),
							)
						)
					);

				}

				/**
				 * Letter Spacing
				 */
				if ( in_array( 'letter-spacing', $attributes, true ) ) {

					$wp_customize->add_setting(
						$element . '_shop_typography[letter-spacing]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_number',
							'transport'         => $transport,
							'default'           => '0',
						)
					);

					$wp_customize->add_control(
						new Responsive_Customizer_Range_Control(
							$wp_customize,
							$element . '_shop_typography[letter-spacing]',
							array(
								'label'           => esc_html__( 'Letter Spacing (px)', 'responsive' ),
								'section'         => $section,
								'settings'        => $element . '_shop_typography[letter-spacing]',
								'priority'        => $priority,
								'active_callback' => $active_callback,
								'input_attrs'     => array(
									'min'  => 0,
									'max'  => 10,
									'step' => 0.1,
								),
							)
						)
					);

				}

				/**
				 * Font Color
				 */
				if ( in_array( 'font-color', $attributes, true ) ) {

					$default = ! empty( $array['defaults']['color'] ) ? $array['defaults']['color'] : null;

					$wp_customize->add_setting(
						$element . '_shop_typography[color]',
						array(
							'type'              => 'theme_mod',
							'sanitize_callback' => 'responsive_sanitize_color',
							'transport'         => $transport,
							'default'           => $default,
						)
					);
					$wp_customize->add_control(
						new Responsive_Customizer_Color_Control(
							$wp_customize,
							$element . '_shop_typography[color]',
							array(
								'label'              => esc_html__( 'Font Color', 'responsive' ),
								'section'            => $section,
								'is_hover_required'  => false,
								'settings'           => $element . '_shop_typography[color]',
								'priority'           => $priority,
								'active_callback'    => $active_callback,
							)
						)
					);
				}
			}
		}

		/**
		 * Loads js file for customizer preview
		 */
		public function customize_preview_init() {
			$path = get_template_directory_uri() . '/core/includes/compatibility/woocommerce/js/woocommerce-typography-customize-preview.js';
			wp_enqueue_script( 'responsive-woocommerce-typography-customize-preview', $path, array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
			wp_localize_script(
				'responsive-woocommerce-typography-customize-preview',
				'responsive',
				array(
					'googleFontsUrl'    => '//fonts.googleapis.com',
					'googleFontsWeight' => '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
				)
			);
		}

		/**
		 * Loop through settings
		 *
		 * @param string $return Return type: 'css', 'preview_styles' or 'fonts'.
		 * @since 6.5.0
		 */
		public function loop( $return = 'css' ) {

			$css            = '';
			$fonts          = array();
			$elements       = self::elements();
			$preview_styles = array();

			foreach ( $elements as $element => $array ) {

				$add_css    = '';
				$tablet_css = '';
				$mobile_css = '';

				$target         = isset( $array['target'] ) ? $array['target'] : '';
				$get_mod        = get_theme_mod( $element . '_shop_typography' );
				$tablet_get_mod = get_theme_mod( $element . '_tablet_typography' );
				$mobile_get_mod = get_theme_mod( $element . '_mobile_typography' );

				if ( ! empty( $array['attributes'] ) ) {
					$attributes = $array['attributes'];
				} else {
					$attributes = array(
						'font-family',
						'font-weight',
						'font-style',
						'text-transform',
						'font-size',
						'line-height',
						'letter-spacing',
						'color',
					);
				}

				foreach ( $attributes as $attribute ) {

					$default    = isset( $array['defaults'][ $attribute ] ) ? $array['defaults'][ $attribute ] : null;
					$val        = isset( $get_mod[ $attribute ] ) ? $get_mod[ $attribute ] : $default;
					$tablet_val = isset( $tablet_get_mod[ $attribute ] ) ? $tablet_get_mod[ $attribute ] : '';
					$mobile_val = isset( $mobile_get_mod[ $attribute ] ) ? $mobile_get_mod[ $attribute ] : '';

					if ( $val && $default !== $val ) {

						$val = str_replace( '"', '', $val );

						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						if ( 'font-family' === $attribute ) {
							$fonts[] = $val;
							$val     = $val;
						}

						if ( 'css' === $return ) {
							$add_css .= $attribute . ':' . $val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-' . $attribute ] = $target . '{' . $attribute . ':' . $val . $px . ';}.post-meta .fa{ font-family:fontAwesome;}';
						}
					}

					if ( $tablet_val
						&& ( 'font-size' === $attribute
							|| 'line-height' === $attribute
							|| 'letter-spacing' === $attribute ) ) {

						$tablet_val = str_replace( '"', '', $tablet_val );

						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $tablet_val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						if ( 'css' === $return ) {
							$tablet_css .= $attribute . ':' . $tablet_val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-tablet-' . $attribute ] = '@media (max-width: 768px){' . $target . '{' . $attribute . ':' . $tablet_val . $px . ';}}';
						}
					}

					if ( $mobile_val
						&& ( 'font-size' === $attribute
							|| 'line-height' === $attribute
							|| 'letter-spacing' === $attribute ) ) {

						$mobile_val = str_replace( '"', '', $mobile_val );

						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $mobile_val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						if ( 'css' === $return ) {
							$mobile_css .= $attribute . ':' . $mobile_val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-mobile-' . $attribute ] = '@media (max-width: 480px){' . $target . '{' . $attribute . ':' . $mobile_val . $px . ';}}';
						}
					}
				}

				if ( $add_css && 'css' === $return ) {
					$css .= $target . '{' . $add_css . '}';
				}

				if ( $tablet_css && 'css' === $return ) {
					$css .= '@media (max-width: 768px){' . $target . '{' . $tablet_css . '}}';
				}

				if ( $mobile_css && 'css' === $return ) {
					$css .= '@media (max-width: 480px){' . $target . '{' . $mobile_css . '}}';
				}
			}

			if ( 'css' === $return && ! empty( $css ) ) {
				$css = '/* Typography CSS */' . $css;
				return $css;
			}

			if ( 'preview_styles' === $return && ! empty( $preview_styles ) ) {
				return $preview_styles;
			}

			if ( 'fonts' === $return && ! empty( $fonts ) ) {
				return array_unique( $fonts );
			}
		}

		/**
		 * Get CSS
		 *
		 * @param string $output Existing CSS output.
		 * @since 6.5.0
		 */
		public function head_css( $output ) {
			$typography_css = self::loop( 'css' );

			if ( $typography_css ) {
				$output .= $typography_css;
			}
			return $output;
		}

		/**
		 * Returns correct CSS to output to wp_head
		 *
		 * @since 6.5.0
		 */
		public function live_preview_styles() {

			$live_preview_styles = self::loop( 'preview_styles' );
			if ( $live_preview_styles ) {
				foreach ( $live_preview_styles as $key => $val ) {
					if ( ! empty( $val ) ) {
						echo '<style class="' . esc_html( $key ) . '"> ' . esc_html( $val ) . '</style>';
					}
				}
			}
		}

		/**
		 * Loads Google fonts
		 *
		 * @since 6.5.0
		 */
		public function load_fonts() {

			$fonts = self::loop( 'fonts' );

			if ( ! empty( $fonts ) && is_array( $fonts ) ) {
				foreach ( $fonts as $font ) {
					responsive_enqueue_google_font( $font );
				}
			}
		}
	}

endif;

return new Responsive_Woocommerce_Typography_Customizer();
