<?php
/**
 * button Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_site_colors_Customizer' ) ) :

	class Responsive_site_colors_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			//add_action( 'customize_register', array( $this, 'customizer_options' ) );
			//add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ) );

			// CSS output.
			if ( is_customize_preview() ) {
				//add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
				add_action( 'wp_head', array( $this, 'live_preview_styles' ), 999 );
			} else {
				add_filter( 'responsive_head_css', array( $this, 'head_css' ), 99 );
			}

		}

		/**
		 * Array of button settings to add to the customizer
		 *
		 * @since 1.0.0
		 */
		public function elements() {

			// Return settings.
			return apply_filters(
				'responsive_button_settings',
				array(
					'text-color'         => array(
						'label'    => esc_html__( 'Text Color', 'responsive' ),
						'target'   => 'body',
						'defaults' => array(
							'color' => '#333333',
						),
					),
					'heading-text-color' => array(
						'label'    => esc_html__( 'Heading Text Color', 'responsive' ),
						'target'   => 'h1,h2,h3,h4,h5,h6,.theme-heading,.widget-title,.responsive-widget-recent-posts-title,.comment-reply-title,.entry-title,.sidebar-box .widget-title',
						'defaults' => array(
							'color' => '#333333',
						),
					),
				)
			);

		}
		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @return [type]               [description]
		 */
		public function customizer_options( $wp_customize ) {

			// Get elements.
			$elements = self::elements();

			// Return if elements are empty.
			if ( empty( $elements ) ) {
				return;
			}
			// /**
			//  * Section
			//  */
			// $wp_customize->add_section(
			// 	'responsive_site_colors_section',
			// 	array(
			// 		'title'    => esc_html__( 'Site Colors', 'responsive' ),
			// 		'priority' => 201,
			// 	)
			// );

			// Lopp through elements.
			$count = '1';
			foreach ( $elements as $element => $array ) {
				$count++;

				// Get label.
				$label              = ! empty( $array['label'] ) ? $array['label'] : null;
				$exclude_attributes = ! empty( $array['exclude'] ) ? $array['exclude'] : false;
				$active_callback    = isset( $array['active_callback'] ) ? $array['active_callback'] : null;
				$transport          = 'refresh';

				// Get attributes.
				if ( ! empty( $array['attributes'] ) ) {
					$attributes = $array['attributes'];
				}

				// // Set keys equal to vals.
				// $attributes = array_combine( $attributes, $attributes );
				//
				// // Exclude attributes for specific options.
				// if ( $exclude_attributes ) {
				// foreach ( $exclude_attributes as $key => $val ) {
				// unset( $attributes[ $val ] );
				// }
				// }
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
								'section'         => 'colors',
								'settings'        => $element,
								'priority'        => 10,
								'active_callback' => $active_callback,
							)
						)
					);

				}
			}
		}

		/**
		 * Loads js file for customizer preview
		 *
		 * @since 1.0.0
		 */
		public function customize_preview_init() {
			wp_enqueue_script( 'responsive-site-color-customize-preview', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/js/button-customize-preview.min.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
			wp_localize_script(
				'responsive-site-color-customize-preview',
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
		 * @param  string $return CSS.
		 * @return [type]         [description]
		 */
		public function loop( $return = 'css' ) {

			// Define Vars.
			$css            = '';
			$fonts          = array();
			$elements       = self::elements();
			$preview_styles = array();

			// Loop through each elements that need button styling applied to them.
			foreach ( $elements as $element => $array ) {

				// Add empty css var.
				$add_css    = '';
				$tablet_css = '';
				$mobile_css = '';

				// Get target and current mod.
				$target         = isset( $array['target'] ) ? $array['target'] : '';
				$get_mod        = get_theme_mod( $element . '_button' );
				$tablet_get_mod = get_theme_mod( $element . '_tablet_button' );
				$mobile_get_mod = get_theme_mod( $element . '_mobile_button' );

				// Attributes to loop through.
				if ( ! empty( $array['attributes'] ) ) {
					$attributes = $array['attributes'];
				} else {
					$attributes = array(
						'font-family',
						'font-weight',
						'font-style',
						'font-size',
						'color',
						'line-height',
						'letter-spacing',
						'text-transform',
					);
				}

				// Loop through attributes.
				foreach ( $attributes as $attribute ) {

					// Define val
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
						if ( ( 'font-size' == $attribute
								&& is_numeric( $val ) )
							|| 'letter-spacing' == $attribute ) {
							$px = 'px';
						}

						// Add quotes around font-family && font family to scripts array.
						if ( 'font-family' == $attribute ) {
							$fonts[] = $val;

							// No brackets can be added as it cause issue with sans serif fonts.
							$val = $val;
						}

						// Add to inline CSS.
						if ( 'css' == $return ) {
							$add_css .= $attribute . ':' . $val . $px . ';';
						}

						// Customizer styles need to be added for each attribute.
						elseif ( 'preview_styles' == $return ) {
							$preview_styles[ 'customizer-button-' . $element . '-' . $attribute ] = $target . '{' . $attribute . ':' . $val . $px . ';}';
						}
					}

					// If there is a value lets do something.
					if ( $tablet_val
						&& ( 'font-size' == $attribute
							|| 'line-height' == $attribute
							|| 'letter-spacing' == $attribute ) ) {

						// Sanitize
						$tablet_val = str_replace( '"', '', $tablet_val );

						// Add px if font size or letter spacing.
						$px = '';
						if ( ( 'font-size' == $attribute
								&& is_numeric( $tablet_val ) )
							|| 'letter-spacing' == $attribute ) {
							$px = 'px';
						}

						// Add to inline CSS.
						if ( 'css' == $return ) {
							$tablet_css .= $attribute . ':' . $tablet_val . $px . ';';
						}

						// Customizer styles need to be added for each attribute.
						elseif ( 'preview_styles' == $return ) {
							$preview_styles[ 'customizer-button-' . $element . '-tablet-' . $attribute ] = '@media (max-width: 768px){' . $target . '{' . $attribute . ':' . $tablet_val . $px . ';}}';
						}
					}

					// If there is a value lets do something.
					if ( $mobile_val
						&& ( 'font-size' == $attribute
							|| 'line-height' == $attribute
							|| 'letter-spacing' == $attribute ) ) {

						// Sanitize.
						$mobile_val = str_replace( '"', '', $mobile_val );

						// Add px if font size or letter spacing.
						$px = '';
						if ( ( 'font-size' == $attribute
								&& is_numeric( $mobile_val ) )
							|| 'letter-spacing' == $attribute ) {
							$px = 'px';
						}

						// Add to inline CSS.
						if ( 'css' == $return ) {
							$mobile_css .= $attribute . ':' . $mobile_val . $px . ';';
						}

						// Customizer styles need to be added for each attribute.
						elseif ( 'preview_styles' == $return ) {
							$preview_styles[ 'customizer-button-' . $element . '-mobile-' . $attribute ] = '@media (max-width: 480px){' . $target . '{' . $attribute . ':' . $mobile_val . $px . ';}}';
						}
					}
				}

				// Front-end inline CSS.
				if ( $add_css && 'css' == $return ) {
					$css .= $target . '{' . $add_css . '}';
				}

				// Front-end inline tablet CSS.
				if ( $tablet_css && 'css' == $return ) {
					$css .= '@media (max-width: 768px){' . $target . '{' . $tablet_css . '}}';
				}

				// Front-end inline mobile CSS.
				if ( $mobile_css && 'css' == $return ) {
					$css .= '@media (max-width: 480px){' . $target . '{' . $mobile_css . '}}';
				}
			}

			// Return CSS.
			if ( 'css' == $return && ! empty( $css ) ) {
				$css = '/* button CSS */' . $css;
				return $css;
			}

			// Return styles
			if ( 'preview_styles' == $return && ! empty( $preview_styles ) ) {
				return $preview_styles;
			}

			// Return Fonts Array
			if ( 'fonts' == $return && ! empty( $fonts ) ) {
				return array_unique( $fonts );
			}

		}

		/**
		 * Get CSS
		 *
		 * @since 1.0.0
		 */
		public function head_css( $output ) {

			// Get CSS
			$button_css = self::loop( 'css' );

			// Loop css
			if ( $button_css ) {
				$output .= $button_css;
			}

			// Return output css
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
						echo '<style class="' . $key . '"> ' . $val . '</style>';
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

			// Get fonts
			$fonts = self::loop( 'fonts' );

			// Loop through and enqueue fonts
			if ( ! empty( $fonts ) && is_array( $fonts ) ) {
				foreach ( $fonts as $font ) {
					responsive_enqueue_google_font( $font );
				}
			}

		}

	}

endif;

return new Responsive_site_colors_Customizer();
