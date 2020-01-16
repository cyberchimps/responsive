<?php
/**
 * Typography Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Typography_Customizer' ) ) :

	/**
	 * Typography Loader
	 *
	 * @since 1.0.0
	 */
	class Responsive_Typography_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'load_fonts' ) );

			// CSS output.
			if ( is_customize_preview() ) {
				add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
				add_action( 'wp_head', array( $this, 'live_preview_styles' ), 9 );
			} else {
				add_filter( 'responsive_head_css', array( $this, 'head_css' ), 99 );
			}

		}

		/**
		 * Array of Typography settings to add to the customizer
		 *
		 * @since 1.0.0
		 */
		public function elements() {

			// Return settings.
			return apply_filters(
				'responsive_typography_settings',
				array(
					'body'                 => array(
						'label'    => esc_html__( 'Body', 'responsive' ),
						'target'   => 'body',
						'defaults' => array(
							'font-size'      => '14px',
							'font-weight'    => '400',
							'color'          => '#555555',
							'line-height'    => '1.8',
							'text-transform' => 'inherit',
						),
					),
					'headings'             => array(
						'label'    => esc_html__( 'All Headings', 'responsive' ),
						'target'   => 'h1,h2,h3,h4,h5,h6,.theme-heading,.widget-title,.responsive-widget-recent-posts-title,.comment-reply-title,.sidebar-box .widget-title',
						'exclude'  => array( 'font-size' ),
						'defaults' => array(
							'color'          => '#555555',
							'font-weight'    => '700',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h1'           => array(
						'label'    => esc_html__( 'Heading 1 (H1)', 'responsive' ),
						'target'   => 'h1',
						'defaults' => array(
							'font-size'      => '2.625em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h2'           => array(
						'label'    => esc_html__( 'Heading 2 (H2)', 'responsive' ),
						'target'   => 'h2',
						'defaults' => array(
							'font-size'      => '2.250em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h3'           => array(
						'label'    => esc_html__( 'Heading 3 (H3)', 'responsive' ),
						'target'   => 'h3',
						'defaults' => array(
							'font-size'      => '1.875em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h4'           => array(
						'label'    => esc_html__( 'Heading 4 (H4)', 'responsive' ),
						'target'   => 'h4',
						'defaults' => array(
							'font-size'      => '1.500em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h5'           => array(
						'label'    => esc_html__( 'Heading 5 (H5)', 'responsive' ),
						'target'   => 'h5',
						'defaults' => array(
							'font-size'      => '1.125em',
							'color'          => '#555555',
							'line-height'    => '1.4',
							'text-transform' => 'inherit',
						),
					),
					'heading_h6'           => array(
						'label'    => esc_html__( 'Heading 6 (H6)', 'responsive' ),
						'target'   => 'h6',
						'defaults' => array(
							'font-size'   => '1.000em',
							'color'       => '#555555',
							'line-height' => '1.4',
						),
					),
					'site_title'           => array(
						'label'    => esc_html__( 'Site Title', 'responsive' ),
						'target'   => '.site-name',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '2.063em',
							'line-height'    => '1',
							'letter-spacing' => '0',
						),
					),
					'site_tagline'         => array(
						'label'    => esc_html__( 'Site Tagline', 'responsive' ),
						'target'   => '.site-description',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '0.875em',
							'line-height'    => '1.4',
							'letter-spacing' => '0',
						),
					),
					'menu'                 => array(
						'label'    => esc_html__( 'Main Menu', 'responsive' ),
						'target'   => '.main-nav .menu > li > a, .main-nav .menu .sub-menu > li > a',
						'exclude'  => array( 'font-color', 'line-height' ),
						'defaults' => array(
							'font-size'      => '13px',
							'letter-spacing' => '0.6',
						),
					),
					'menu_dropdown'        => array(
						'label'    => esc_html__( 'Main Menu: Dropdowns', 'responsive' ),
						'target'   => '.menu li li a, .main-nav ul li li a',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '12px',
							'line-height'    => '1.2',
							'letter-spacing' => '0.6',
						),
					),
					'mobile_menu_dropdown' => array(
						'label'    => esc_html__( 'Mobile Menu', 'responsive' ),
						'target'   => '#mobile-sidebar .menu li a, mobile-sidebar-inner a, .responsive-mobile-sidebar #mobile-sidebar ul li a, #mobile-fullscreen .menu li a, mobile-fullscreen-inner a, .responsive-mobile-fullscreen #mobile-fullscreen ul li a, .responsive-mobile-dropdown .main-nav.mobile-dropdown-inner .menu > li > a,.js .responsive-mobile-dropdown .main-nav.mobile-dropdown-inner ul li a',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '15px',
							'line-height' => '1.8',
						),
					),
					'page_title'           => array(
						'label'    => esc_html__( 'Page Title', 'responsive' ),
						'target'   => '.page .post-title, #main-blog h1',
						'defaults' => array(
							'color'       => '#333333',
							'font-size'   => '32px',
							'line-height' => '1.4',
						),
					),
					'blog_entry_title'     => array(
						'label'    => esc_html__( 'Blog Entry Title', 'responsive' ),
						'target'   => '#primary .post .post-entry .entry-title a, .wp-block-latest-posts li a',
						'defaults' => array(
							'font-size'      => '24px',
							'color'          => '#333333',
							'line-height'    => '1.4',
							'letter-spacing' => '0.6',
						),
					),
					'blog_post_title'      => array(
						'label'    => esc_html__( 'Blog Post Title', 'responsive' ),
						'target'   => '.single-post #primary .post .post-entry .entry-title',
						'defaults' => array(
							'font-size'      => '34px',
							'color'          => '#333333',
							'line-height'    => '1.4',
							'letter-spacing' => '0.6',
						),
					),
					'post_meta'            => array(
						'label'    => esc_html__( 'Post Meta', 'responsive' ),
						'target'   => '.post-meta *',
						'defaults' => array(
							'font-size'      => '12px',
							'line-height'    => '1.8',
							'text-transform' => 'uppercase',
						),
					),
					'buttons'              => array(
						'label'    => esc_html__( 'Buttons Typography', 'responsive' ),
						'target'   => '.wp-block-button, #content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button, input[type=submit], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #searchsubmit, #footer-widgets #searchsubmit,.wp-block-button__link, .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button, div.wpforms-container-full .wpforms-form button',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '0.875em',
							'font-weight'    => '400',
							'line-height'    => '1.4',
							'letter-spacing' => '0',
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

			// Get elements.
			$elements = self::elements();

			// Return if elements are empty.
			if ( empty( $elements ) ) {
				return;
			}

			// Panel.
			$wp_customize->add_panel(
				'responsive_typography_panel',
				array(
					'title'    => esc_html__( 'General Typography', 'responsive' ),
					'priority' => 16,
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
				$transport          = 'postMessage';

				// Get attributes.
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

				// Set keys equal to vals.
				$attributes = array_combine( $attributes, $attributes );

				// Exclude attributes for specific options.
				if ( $exclude_attributes ) {
					foreach ( $exclude_attributes as $key => $val ) {
						unset( $attributes[ $val ] );
					}
				}

				// Register new setting if label isn't empty.
				if ( $label ) {

					/**
					 * Section
					 */
					$wp_customize->add_section(
						'responsive_typography_' . $element,
						array(
							'title'    => $label,
							'priority' => $count,
							'panel'    => 'responsive_typography_panel',
						)
					);

					/**
					 * Font Family
					 */
					if ( in_array( 'font-family', $attributes, true ) ) {

						$wp_customize->add_setting(
							$element . '_typography[font-family]',
							array(
								'type'              => 'theme_mod',
								'transport'         => $transport,
								'sanitize_callback' => 'sanitize_text_field',
							)
						);

						$wp_customize->add_control(
							new Responsive_Customizer_Typography_Control(
								$wp_customize,
								$element . '_typography[font-family]',
								array(
									'label'           => esc_html__( 'Font Family', 'responsive' ),
									'section'         => 'responsive_typography_' . $element,
									'settings'        => $element . '_typography[font-family]',
									'priority'        => 10,
									'type'            => 'select',
									'active_callback' => $active_callback,
								)
							)
						);

					}

					/**
					 * Font Weight
					 */
					if ( in_array( 'font-weight', $attributes, true ) ) {

						$wp_customize->add_setting(
							$element . '_typography[font-weight]',
							array(
								'type'              => 'theme_mod',
								'sanitize_callback' => 'responsive_sanitize_select',
								'transport'         => $transport,
							)
						);

						$wp_customize->add_control(
							$element . '_typography[font-weight]',
							array(
								'label'           => esc_html__( 'Font Weight', 'responsive' ),
								'description'     => esc_html__( 'Important: Not all fonts support every font-weight.', 'responsive' ),
								'section'         => 'responsive_typography_' . $element,
								'settings'        => $element . '_typography[font-weight]',
								'priority'        => 10,
								'type'            => 'select',
								'active_callback' => $active_callback,
								'choices'         => array(
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
						);
					}

					/**
					 * Font Style
					 */
					if ( in_array( 'font-style', $attributes, true ) ) {

						$wp_customize->add_setting(
							$element . '_typography[font-style]',
							array(
								'type'              => 'theme_mod',
								'sanitize_callback' => 'responsive_sanitize_select',
								'transport'         => $transport,
								'default'           => 'normal',
							)
						);

						$wp_customize->add_control(
							$element . '_typography[font-style]',
							array(
								'label'           => esc_html__( 'Font Style', 'responsive' ),
								'section'         => 'responsive_typography_' . $element,
								'settings'        => $element . '_typography[font-style]',
								'priority'        => 10,
								'type'            => 'select',
								'active_callback' => $active_callback,
								'choices'         => array(
									'normal' => esc_html__( 'Normal', 'responsive' ),
									'italic' => esc_html__( 'Italic', 'responsive' ),
								),
							)
						);

					}

					/**
					 * Text Transform
					 */
					if ( in_array( 'text-transform', $attributes, true ) ) {

						$wp_customize->add_setting(
							$element . '_typography[text-transform]',
							array(
								'type'              => 'theme_mod',
								'sanitize_callback' => 'responsive_sanitize_select',
								'transport'         => $transport,
								'default'           => '',
							)
						);

						$wp_customize->add_control(
							$element . '_typography[text-transform]',
							array(
								'label'           => esc_html__( 'Text Transform', 'responsive' ),
								'section'         => 'responsive_typography_' . $element,
								'settings'        => $element . '_typography[text-transform]',
								'priority'        => 10,
								'type'            => 'select',
								'active_callback' => $active_callback,
								'choices'         => array(
									''           => esc_html__( 'Default', 'responsive' ),
									'capitalize' => esc_html__( 'Capitalize', 'responsive' ),
									'lowercase'  => esc_html__( 'Lowercase', 'responsive' ),
									'uppercase'  => esc_html__( 'Uppercase', 'responsive' ),
								),
							)
						);

					}

					/**
					 * Font Size
					 */
					if ( in_array( 'font-size', $attributes, true ) ) {

						$default = ! empty( $array['defaults']['font-size'] ) ? $array['defaults']['font-size'] : NULL;
						$wp_customize->add_setting(
							$element . '_typography[font-size]',
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
							)
						);

						$wp_customize->add_setting(
							$element . '_mobile_typography[font-size]',
							array(
								'transport'         => $transport,
								'sanitize_callback' => 'sanitize_text_field',
							)
						);

						$wp_customize->add_control(
							new Responsive_Customizer_Text_Control(
								$wp_customize,
								$element . '_typography[font-size]',
								array(
									'label'           => esc_html__( 'Font Size', 'responsive' ),
									'description'     => esc_html__( 'You can add: px-em-%', 'responsive' ),
									'section'         => 'responsive_typography_' . $element,
									'settings'        => array(
										'desktop' => $element . '_typography[font-size]',
										'tablet'  => $element . '_tablet_typography[font-size]',
										'mobile'  => $element . '_mobile_typography[font-size]',
									),
									'priority'        => 10,
									'active_callback' => $active_callback,
								)
							)
						);

					}

					/**
					 * Line Height
					 */
					if ( in_array( 'line-height', $attributes, true ) ) {

						// Get default.
						$default = ! empty( $array['defaults']['line-height'] ) ? $array['defaults']['line-height'] : null;

						$wp_customize->add_setting(
							$element . '_typography[line-height]',
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
								$element . '_typography[line-height]',
								array(
									'label'           => esc_html__( 'Line Height', 'responsive' ),
									'section'         => 'responsive_typography_' . $element,
									'settings'        => $element . '_typography[line-height]',
									'priority'        => 10,
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
							$element . '_typography[letter-spacing]',
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
								$element . '_typography[letter-spacing]',
								array(
									'label'           => esc_html__( 'Letter Spacing (px)', 'responsive' ),
									'section'         => 'responsive_typography_' . $element,
									'settings'        => $element . '_typography[letter-spacing]',
									'priority'        => 10,
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

						// Get default.
						$default = ! empty( $array['defaults']['color'] ) ? $array['defaults']['color'] : null;

						$wp_customize->add_setting(
							$element . '_typography[color]',
							array(
								'type'              => 'theme_mod',
								'sanitize_callback' => 'responsive_sanitize_color',
								'transport'         => $transport,
								'default'           => $default,
							)
						);
						$wp_customize->add_control(
							new WP_Customize_Color_Control(
								$wp_customize,
								$element . '_typography[color]',
								array(
									'label'           => esc_html__( 'Font Color', 'responsive' ),
									'section'         => 'responsive_typography_' . $element,
									'settings'        => $element . '_typography[color]',
									'priority'        => 10,
									'active_callback' => $active_callback,
								)
							)
						);
					}
				}
			}
		}

		/**
		 * Loads js file for customizer preview
		 *
		 * @since 1.0.0
		 */
		public function customize_preview_init() {
			wp_enqueue_script( 'responsive-typography-customize-preview', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/js/typography-customize-preview.min.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
			wp_localize_script(
				'responsive-typography-customize-preview',
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
		 * @param  object $return    arguments.
		 * @since 1.0.0
		 */
		public function loop( $return = 'css' ) {

			// Define Vars.
			$css            = '';
			$fonts          = array();
			$elements       = self::elements();
			$preview_styles = array();

			// Loop through each elements that need typography styling applied to them.
			foreach ( $elements as $element => $array ) {

				// Add empty css var.
				$add_css    = '';
				$tablet_css = '';
				$mobile_css = '';

				// Get target and current mod.
				$target         = isset( $array['target'] ) ? $array['target'] : '';
				$get_mod        = get_theme_mod( $element . '_typography' );
				$tablet_get_mod = get_theme_mod( $element . '_tablet_typography' );
				$mobile_get_mod = get_theme_mod( $element . '_mobile_typography' );

				// Attributes to loop through.
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

				// Loop through attributes.
				foreach ( $attributes as $attribute ) {

					// Define val.
					$default    = isset( $array['defaults'][ $attribute ] ) ? $array['defaults'][ $attribute ] : null;
					$val        = isset( $get_mod[ $attribute ] ) ? $get_mod[ $attribute ] : $default;
					$tablet_val = isset( $tablet_get_mod[ $attribute ] ) ? $tablet_get_mod[ $attribute ] : '';
					$mobile_val = isset( $mobile_get_mod[ $attribute ] ) ? $mobile_get_mod[ $attribute ] : '';

					// If there is a value lets do something.
					if ( $val && $default != $val ) {

						// Sanitize.
						$val = str_replace( '"', '', $val );

						// Add px if font size or letter spacing.
						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						// Add quotes around font-family && font family to scripts array.
						if ( 'font-family' === $attribute ) {
							$fonts[] = $val;

							// No brackets can be added as it cause issue with sans serif fonts.
							$val = $val;
						}

						// Add to inline CSS.
						if ( 'css' === $return ) {
							$add_css .= $attribute . ':' . $val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-' . $attribute ] = $target . '{' . $attribute . ':' . $val . $px . ';}.post-meta .fa{ font-family:fontAwesome;}';
						}
					}

					// If there is a value lets do something.
					if ( $tablet_val
						&& ( 'font-size' === $attribute
							|| 'line-height' === $attribute
							|| 'letter-spacing' === $attribute ) ) {

						// Sanitize.
						$tablet_val = str_replace( '"', '', $tablet_val );

						// Add px if font size or letter spacing.
						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $tablet_val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						// Add to inline CSS.
						if ( 'css' === $return ) {
							$tablet_css .= $attribute . ':' . $tablet_val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-tablet-' . $attribute ] = '@media (max-width: 768px){' . $target . '{' . $attribute . ':' . $tablet_val . $px . ';}}';
						}
					}

					// If there is a value lets do something.
					if ( $mobile_val
						&& ( 'font-size' === $attribute
							|| 'line-height' === $attribute
							|| 'letter-spacing' === $attribute ) ) {

						// Sanitize.
						$mobile_val = str_replace( '"', '', $mobile_val );

						// Add px if font size or letter spacing.
						$px = '';
						if ( ( 'font-size' === $attribute
								&& is_numeric( $mobile_val ) )
							|| 'letter-spacing' === $attribute ) {
							$px = 'px';
						}

						// Add to inline CSS.
						if ( 'css' === $return ) {
							$mobile_css .= $attribute . ':' . $mobile_val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-mobile-' . $attribute ] = '@media (max-width: 480px){' . $target . '{' . $attribute . ':' . $mobile_val . $px . ';}}';
						}
					}
				}

				// Front-end inline CSS.
				if ( $add_css && 'css' === $return ) {
					if ( '#mobile-sidebar .menu li a, mobile-sidebar-inner a, .responsive-mobile-sidebar #mobile-sidebar ul li a, #mobile-fullscreen .menu li a, mobile-fullscreen-inner a, .responsive-mobile-fullscreen #mobile-fullscreen ul li a, .responsive-mobile-dropdown #main-nav.mobile-dropdown-inner .menu > li > a' === $target ) {
						$css .= '@media (max-width: 480px){' . $target . '{' . $add_css . '}}';
					} else {
						$css .= $target . '{' . $add_css . '}';
					}
				}

				// Front-end inline tablet CSS.
				if ( $tablet_css && 'css' === $return ) {
					$css .= '@media (max-width: 768px){' . $target . '{' . $tablet_css . '}}';
				}

				// Front-end inline mobile CSS.
				if ( $mobile_css && 'css' === $return ) {
					$css .= '@media (max-width: 480px){' . $target . '{' . $mobile_css . '}}';
				}
			}
			// Return CSS.
			if ( 'css' === $return && ! empty( $css ) ) {
				$css = '/* Typography CSS */' . $css;
				return $css;
			}

			// Return styles.
			if ( 'preview_styles' === $return && ! empty( $preview_styles ) ) {
				return $preview_styles;
			}

			// Return Fonts Array.
			if ( 'fonts' === $return && ! empty( $fonts ) ) {
				return array_unique( $fonts );
			}

		}

		/**
		 * Get CSS
		 *
		 * @param  object $output    arguments.
		 * @since 1.0.0
		 */
		public function head_css( $output ) {
			// Get CSS.
			$typography_css = self::loop( 'css' );

			// Loop css.
			if ( $typography_css ) {
				$output .= $typography_css;
			}
			// Return output css.
			return $output;

		}

		/**
		 * Returns correct CSS to output to wp_head
		 *
		 * @since 1.0.0
		 */
		public function live_preview_styles() {

			$live_preview_styles = self::loop( 'preview_styles' );
			if ( $live_preview_styles ) {
				foreach ( $live_preview_styles as $key => $val ) {
					if ( ! empty( $val ) ) {
						echo '<style class="' . esc_html( $key ) . '"> ' . ( $val ) . '</style>';
					}
				}
			}

		}

		/**
		 * Loads Google fonts
		 *
		 * @since 1.0.0
		 */
		public function load_fonts() {

			// Get fonts.
			$fonts = self::loop( 'fonts' );

			// Loop through and enqueue fonts.
			if ( ! empty( $fonts ) && is_array( $fonts ) ) {
				foreach ( $fonts as $font ) {
					responsive_enqueue_google_font( $font );
				}
			}

		}

	}

endif;

return new Responsive_Typography_Customizer();
