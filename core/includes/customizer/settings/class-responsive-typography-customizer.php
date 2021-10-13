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
			$selectorArray = self::getSelectorArray();
			// Return settings.
			return apply_filters(
				'responsive_typography_settings',
				array(
					'body'                       => array(
						'label'    => esc_html__( 'Body', 'responsive' ),
						'target'   => $selectorArray['body'],
						'section'  => 'responsive_typography',
						'priority' => 2,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '16px',
							'font-weight'    => '400',
							'line-height'    => '1.75',
							'text-transform' => 'inherit',
						),
					),

					'headings'                   => array(
						'label'    => esc_html__( 'All Headings', 'responsive' ),
						'target'   => $selectorArray['headings'],
						'section'  => 'responsive_typography',
						'priority' => 5,
						'exclude'  => array( 'font-color', 'font-size', 'font-style' ),
						'defaults' => array(
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),

					'heading_h1'                 => array(
						'label'    => esc_html__( 'Heading 1 (H1)', 'responsive' ),
						'target'   => $selectorArray['heading_h1'],
						'section'  => 'responsive_typography',
						'priority' => 7,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '33px',
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),
					'heading_h2'                 => array(
						'label'    => esc_html__( 'Heading 2 (H2)', 'responsive' ),
						'target'   => $selectorArray['heading_h2'],
						'section'  => 'responsive_typography',
						'priority' => 9,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '26px',
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),
					'heading_h3'                 => array(
						'label'    => esc_html__( 'Heading 3 (H3)', 'responsive' ),
						'target'   => $selectorArray['heading_h3'],
						'section'  => 'responsive_typography',
						'priority' => 11,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '20px',
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),
					'heading_h4'                 => array(
						'label'    => esc_html__( 'Heading 4 (H4)', 'responsive' ),
						'target'   => $selectorArray['heading_h4'],
						'section'  => 'responsive_typography',
						'priority' => 13,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '16px',
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),
					'heading_h5'                 => array(
						'label'    => esc_html__( 'Heading 5 (H5)', 'responsive' ),
						'target'   => $selectorArray['heading_h5'],
						'section'  => 'responsive_typography',
						'priority' => 15,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '13px',
							'line-height'    => '1.25',
							'text-transform' => 'inherit',
						),
					),
					'heading_h6'                 => array(
						'label'    => esc_html__( 'Heading 6 (H6)', 'responsive' ),
						'target'   => $selectorArray['heading_h6'],
						'section'  => 'responsive_typography',
						'priority' => 17,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '13px',
							'line-height' => '1.25',
						),
					),
					'meta'                       => array(
						'label'    => esc_html__( 'Meta', 'responsive' ),
						'target'   => $selectorArray['meta'],
						'section'  => 'responsive_typography',
						'priority' => 19,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '12px',
							'line-height'    => '1.75',
							'text-transform' => 'uppercase',
						),
					),
					'button'                     => array(
						'label'    => esc_html__( 'Body', 'responsive' ),
						'target'   => $selectorArray['button'],
						'section'  => 'responsive_button',
						'priority' => 21,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '16px',
							'line-height' => '1',
						),
					),
					'input'                      => array(
						'label'    => esc_html__( 'Body', 'responsive' ),
						'target'   => $selectorArray['input'],
						'section'  => 'responsive_form_fields',
						'priority' => 23,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '16px',
							'line-height' => '1.75',
						),
					),
					'header_site_title'          => array(
						'label'    => esc_html__( 'Site Title', 'responsive' ),
						'target'   => $selectorArray['header_site_title'],
						'section'  => 'responsive_header_title',
						'priority' => 15,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '20px',
							'line-height'    => '1',
							'letter-spacing' => '0',
						),
					),
					'header_site_tagline'        => array(
						'label'    => esc_html__( 'Site Tagline', 'responsive' ),
						'target'   => $selectorArray['header_site_tagline'],
						'section'  => 'responsive_header_tagline',
						'priority' => 15,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'      => '13px',
							'line-height'    => '1.25',
							'letter-spacing' => '0',
						),
					),
					'header_widgets'             => array(
						'label'    => esc_html__( 'Header Widgets', 'responsive' ),
						'target'   => $selectorArray['header_widgets'],
						'section'  => 'responsive_header_widget',
						'priority' => 160,
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size' => '13px',
						),
					),
					'header_menu'                => array(
						'label'           => esc_html__( 'Typography', 'responsive' ),
						'target'          => $selectorArray['header_menu'],
						'section'         => 'responsive_header_menu_layout',
						'exclude'         => array( 'font-color' ),
						'priority'        => 110,
						'active_callback' => 'responsive_disabled_main_menu',
						'defaults'        => array(
							'font-size'   => '16px',
							'font-weight' => '600',
							'line-height' => '1.75',
						),
					),
					'sidebar'                    => array(
						'label'    => esc_html__( 'Typography', 'responsive' ),
						'target'   => $selectorArray['sidebar'],
						'panel'    => 'responsive_sidebar',
						'exclude'  => array( 'font-color' ),
						'priority' => 30,
						'defaults' => array(
							'font-size' => '13px',
						),
					),
					'content_header_heading'     => array(
						'label'    => esc_html__( 'Typography', 'responsive' ),
						'target'   => $selectorArray['content_header_heading'],
						'priority' => 90,
						'section'  => 'responsive_content_header_layout',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '33px',
							'line-height' => '1.75',
						),
					),
					'content_header_description' => array(
						'label'    => esc_html__( 'Typography', 'responsive' ),
						'target'   => $selectorArray['content_header_description'],
						'priority' => 100,
						'section'  => 'responsive_content_header_layout',
						'exclude'  => array( 'font-color' ),
						'defaults' => array(
							'font-size'   => '16px',
							'line-height' => '1.75',
						),
					),
					'breadcrumb'                 => array(
						'label'           => esc_html__( 'Typography', 'responsive' ),
						'target'          => $selectorArray['breadcrumb'],
						'priority'        => 110,
						'section'         => 'responsive_content_header_layout',
						'exclude'         => array( 'font-color' ),
						'active_callback' => 'responsive_active_breadcrumb',
						'defaults'        => array(
							'font-size'   => '13px',
							'line-height' => '1.75',
						),
					),
					'footer'                     => array(
						'label'    => esc_html__( 'Typography', 'responsive' ),
						'target'   => $selectorArray['footer'],
						'panel'    => 'responsive_footer',
						'exclude'  => array( 'font-color' ),
						'priority' => 30,
						'defaults' => array(
							'font-size'   => '13px',
							'line-height' => '1.75',
						),
					),
				)
			);
		}

		/**
		 * Array of Typography settings selectors
		 */
		public function getSelectorArray() {
			$selectorArray = apply_filters(
				'responsive_typography_selectors',
				array(
					'body'                       => 'body',
					'headings'                   => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6',
					'heading_h1'                 => 'h1',
					'heading_h2'                 => 'h2',
					'heading_h3'                 => 'h3',
					'heading_h4'                 => 'h4',
					'heading_h5'                 => 'h5',
					'heading_h6'                 => 'h6',
					'meta'                       => '.hentry .post-data,.post-meta *',
					'button'                     => '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, .entry-content div.wpforms-container-full .wpforms-form input[type=submit], body .entry-content div.wpforms-container-full .wpforms-form button[type=submit], .entry-content div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,.entry-content div.wpforms-container-full .wpforms-form input[type=submit],.entry-content div.wpforms-container-full .wpforms-form button[type=submit],.entry-content div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link',
					'input'                      => 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],.entry-content div.wpforms-container-full .wpforms-form input[type=date],.entry-content div.wpforms-container-full .wpforms-form input[type=datetime],.entry-content div.wpforms-container-full .wpforms-form input[type=datetime-local],.entry-content div.wpforms-container-full .wpforms-form input[type=email],.entry-content div.wpforms-container-full .wpforms-form input[type=month],.entry-content div.wpforms-container-full .wpforms-form input[type=number],.entry-content div.wpforms-container-full .wpforms-form input[type=password],.entry-content div.wpforms-container-full .wpforms-form input[type=range],.entry-content div.wpforms-container-full .wpforms-form input[type=search],.entry-content div.wpforms-container-full .wpforms-form input[type=tel],.entry-content div.wpforms-container-full .wpforms-form input[type=text],.entry-content div.wpforms-container-full .wpforms-form input[type=time],.entry-content div.wpforms-container-full .wpforms-form input[type=url],.entry-content div.wpforms-container-full .wpforms-form input[type=week],.entry-content div.wpforms-container-full .wpforms-form select,.entry-content div.wpforms-container-full .wpforms-form textarea',
					'header_site_title'          => '.site-title',
					'header_site_title2'         => '.site-title a',
					'header_site_tagline'        => '.site-description',
					'header_widgets'             => '.header-widgets',
					'header_menu'                => '.main-navigation a',
					'sidebar'                    => '.site-content .widget-area:not(.home-widgets) .widget-wrapper',
					'content_header_heading'     => '.site-content-header .page-header .page-title,.site-content-header .page-title',
					'content_header_description' => '.site-content-header .page-header .page-description',
					'breadcrumb'                 => '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb',
					'footer'                     => '.site-footer',
				)
			);
			return $selectorArray;
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
					'priority' => 500,
				)
			);

			// Lopp through elements.
			$count = '1';
			foreach ( $elements as $element => $array ) {
				$count++;

				// Get label.
				$label              = ! empty( $array['label'] ) ? $array['label'] : null;
				$panel              = ! empty( $array['panel'] ) ? $array['panel'] : 'responsive_typography_panel';
				$exclude_attributes = ! empty( $array['exclude'] ) ? $array['exclude'] : false;
				$active_callback    = isset( $array['active_callback'] ) ? $array['active_callback'] : null;
				$transport          = 'postMessage';
				$section            = ! empty( $array['section'] ) ? $array['section'] : '';
				$priority           = ! empty( $array['priority'] ) ? $array['priority'] : 10;

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
					if ( ! $section ) {
						$wp_customize->add_section(
							'responsive_typography_' . $element,
							array(
								'title'    => $label,
								'priority' => $count,
								'panel'    => $panel,
							)
						);
						$section = 'responsive_typography_' . $element;
					}
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
									'name'            => $element . '_typography[font-family]',
									'label'           => esc_html__( 'Font Family', 'responsive' ),
									'section'         => $section,
									'responsive_setting_id' => 'responsive_font_family',
									'settings'        => $element . '_typography[font-family]',
									'priority'        => $priority,
									'type'            => 'responsive-typography',
									'active_callback' => $active_callback,
									'resp_inherit'    => __( 'Default', 'responsive' ),
									'connect'         => $element . '_typography[font-weight]',
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
							new Responsive_Customizer_Typography_Control(
								$wp_customize,
								$element . '_typography[font-weight]',
								array(
									'name'            => $element . '_typography[font-weight]',
									'label'           => esc_html__( 'Font Weight', 'responsive' ),
									'description'     => esc_html__( 'Important: Not all fonts support every font-weight.', 'responsive' ),
									'section'         => $section,
									'responsive_setting_id' => 'responsive_font_weight',
									'settings'        => $element . '_typography[font-weight]',
									'resp_inherit'    => __( 'Default', 'responsive' ),
									'connect'         => $element . '_typography[font-family]',
									'priority'        => $priority,
									'type'            => 'responsive-typography',
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
							new Responsive_Customizer_Select_Control(
								$wp_customize,
								$element . '_typography[font-style]',
								array(
									'label'           => esc_html__( 'Font Style', 'responsive' ),
									'section'         => $section,
									'settings'        => $element . '_typography[font-style]',
									'priority'        => $priority,
									'active_callback' => $active_callback,
									'choices'         => array(
										'normal' => esc_html__( 'Normal', 'responsive' ),
										'italic' => esc_html__( 'Italic', 'responsive' ),
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
							$element . '_typography[text-transform]',
							array(
								'type'              => 'theme_mod',
								'sanitize_callback' => 'responsive_sanitize_select',
								'transport'         => $transport,
								'default'           => '',
							)
						);

						$wp_customize->add_control(
							new Responsive_Customizer_Select_Control(
								$wp_customize,
								$element . '_typography[text-transform]',
								array(
									'label'           => esc_html__( 'Text Transform', 'responsive' ),
									'section'         => $section,
									'settings'        => $element . '_typography[text-transform]',
									'priority'        => $priority,
									'active_callback' => $active_callback,
									'choices'         => array(
										''           => esc_html__( 'Default', 'responsive' ),
										'capitalize' => esc_html__( 'Capitalize', 'responsive' ),
										'lowercase'  => esc_html__( 'Lowercase', 'responsive' ),
										'uppercase'  => esc_html__( 'Uppercase', 'responsive' ),
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

						$wp_customize->add_control(
							new Responsive_Customizer_Text_Control(
								$wp_customize,
								$element . '_typography[font-size]',
								array(
									'label'           => esc_html__( 'Font Size', 'responsive' ),
									'description'     => esc_html__( 'You can add: px-em-%', 'responsive' ),
									'section'         => $section,
									'settings'        => array(
										'desktop' => $element . '_typography[font-size]',
										'tablet'  => $element . '_tablet_typography[font-size]',
										'mobile'  => $element . '_mobile_typography[font-size]',
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
									'section'         => $section,
									'settings'        => $element . '_typography[line-height]',
									'priority'        => $priority,
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
									'section'         => $section,
									'settings'        => $element . '_typography[letter-spacing]',
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
									'section'         => $section,
									'settings'        => $element . '_typography[color]',
									'priority'        => $priority,
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

			wp_enqueue_script( 'responsive-typo-customize-preview', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/js/typography-customize-preview.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
			wp_localize_script(
				'responsive-typo-customize-preview',
				'responsive',
				array(
					'googleFontsUrl'    => '//fonts.googleapis.com',
					'googleFontsWeight' => '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
					'googleFonts'       => responsive_get_google_fonts(),
					'selectorArray'     => self::getSelectorArray(),
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

				// Check if font color is excluded.
				$color = ( in_array( 'font-color', $array['exclude'], true ) ) ? null : 'color';
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
						$color,

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
					if ( ( $val && $default !== $val ) || $default ) {

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
							if ( 'preview_styles' === $return ) {
								$val = str_replace( '\'', '', $val );
							} else {
								$val = $val;
							}
						}

						// Add to inline CSS.
						if ( 'css' === $return ) {
							$add_css .= $attribute . ':' . $val . $px . ';';
						} elseif ( 'preview_styles' === $return ) {
							$preview_styles[ 'customizer-typography-' . $element . '-' . $attribute ] = $target . '{' . $attribute . ':' . $val . $px . ';}';
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
						echo '<style class="' . esc_attr( $key ) . '"> ' . esc_html( $val ) . '</style>';
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
