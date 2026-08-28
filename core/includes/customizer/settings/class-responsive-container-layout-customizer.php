<?php
/**
 * Container Layout Customizer Options
 *
 * Adds a "Container Layout" (Default / Normal / Full Width) override and a
 * "Container Style" (Default / Boxed / Unboxed) override to the Page,
 * Blog / Archive, and Single Post customizer sections. "Default" inherits
 * the corresponding site-wide Layout settings registered in
 * class-responsive-site-layouts-customizer.php.
 * The actual class swap on the front end happens in
 * responsive_add_container_layout_body_classes() and
 * responsive_add_container_style_body_classes() in core/includes/functions.php.
 *
 * @package Responsive WordPress theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Container_Layout_Customizer' ) ) :
	/**
	 * Container Layout Customizer Options
	 */
	class Responsive_Container_Layout_Customizer {
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
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			// Adding Single Blog Post Title Layout Setting
			$wp_customize->add_section(
				'responsive_single_blog_post_title_layout',
				array(
					'title'    => esc_html__( 'Post Title Area', 'responsive' ),
					'panel'    => 'responsive_post_types',
					'priority' => 30,
				)
			);

			// Adding Single Page - Page Title Layout Setting
			$wp_customize->add_section(
				'responsive_page_title_area_layout',
				array(
					'title'    => esc_html__( 'Page Title Area', 'responsive' ),
					'panel'    => 'responsive_post_types',
					'priority' => 35,
				)
			);
			
			// Adding Blog/Archive - Blog Title Layout Setting
			$wp_customize->add_section(
				'responsive_blog_title_layout',
				array(
					'title'    => esc_html( 'Blog Title Area', 'resposnive' ),
					'panel'    => 'responsive_post_types',
					'priority' => 40
				)
			);

			$container_layout_choices = array(
				'default_container'    => esc_html__( 'Default', 'responsive' ),
				'normal'     => esc_html__( 'Normal', 'responsive' ),
				'narrow'     => esc_html__( 'Narrow', 'responsive' ),
				'full-width' => esc_html__( 'Full Width', 'responsive' ),
			);

			// Page Container Layout.
			$page_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_container_layout_separator', $page_container_layout_label, 'responsive_page', 14 );

			//$page_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_imageradio_button_control( $wp_customize, 'page_container_layout', $page_container_layout_label, 'responsive_page', 15, $container_layout_choices, 'default_container', null, 'svg', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'page_container_style_separator', 1, 'responsive_page', 16, 1 );

			// Page Container Style.
			$wp_customize->add_setting(
                'responsive_page_container_style',
                array(
                    'default'           => 'default',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'responsive_page_container_style',
                array(
                    'label'           => __( 'Container Style', 'responsive' ),
                    'section'         => 'responsive_page',
                    'type'            => 'select',
                    'choices'         => array(
                        'default' => __( 'Default', 'responsive' ),
						'boxed' => __( 'Boxed', 'responsive' ),
                        'content-boxed'    => __( 'Content Boxed', 'responsive' ),
                        'flat'    => __( 'Flat', 'responsive' ),
                    ),
                    'priority'        => 17,
                    'active_callback' => '',
                )
            );

			// Blog/Archive Container Layout.
			$blog_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_container_layout_separator', $blog_container_layout_label, 'responsive_blog_layout', 10 );

			responsive_imageradio_button_control( $wp_customize, 'blog_container_layout', $blog_container_layout_label, 'responsive_blog_layout', 11, $container_layout_choices, 'default_container', null, 'svg', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'blog_container_style_separator', 1, 'responsive_blog_layout', 12, 1 );


			// Blog/Archive Container Style.

			$wp_customize->add_setting(
                'responsive_blog_container_style',
                array(
                    'default'           => 'default',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'responsive_blog_container_style',
                array(
                    'label'           => __( 'Container Style', 'responsive' ),
                    'section'         => 'responsive_blog_layout',
                    'type'            => 'select',
                    'choices'         => array(
                        'default' => __( 'Default', 'responsive' ),
						'boxed' => __( 'Boxed', 'responsive' ),
                        'content-boxed'    => __( 'Content Boxed', 'responsive' ),
                        'flat'    => __( 'Flat', 'responsive' ),
                    ),
                    'priority'        => 12,
                    'active_callback' => '',
                )
            );
			// Single Post Container Layout.
			$single_blog_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_container_layout_separator', $single_blog_container_layout_label, 'responsive_single_blog_layout', 5 );

			responsive_imageradio_button_control( $wp_customize, 'single_blog_container_layout', $single_blog_container_layout_label, 'responsive_single_blog_layout', 6, $container_layout_choices, 'default_container', null, 'svg', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_container_style_separator', 1, 'responsive_single_blog_layout', 7, 1 );

			// Single Post Container Style.
			$wp_customize->add_setting(
                'responsive_single_blog_container_style',
                array(
                    'default'           => 'default',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'responsive_single_blog_container_style',
                array(
                    'label'           => __( 'Container Style', 'responsive' ),
                    'section'         => 'responsive_single_blog_layout',
                    'type'            => 'select',
                    'choices'         => array(
                        'default' => __( 'Default', 'responsive' ),
						'boxed' => __( 'Boxed', 'responsive' ),
                        'content-boxed'    => __( 'Content Boxed', 'responsive' ),
                        'flat'    => __( 'Flat', 'responsive' ),
                    ),
                    'priority'        => 8,
                    'active_callback' => '',
                )
            );
			// Woocommerce Single Product Container Layout.
			$single_product_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_container_layout_separator', $single_product_container_layout_label, 'responsive_woocommerce_single_product_layout', 6 );

			responsive_imageradio_button_control( $wp_customize, 'single_product_container_layout', $single_product_container_layout_label, 'responsive_woocommerce_single_product_layout', 6, $container_layout_choices, 'default_container', null, 'svg', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'single_product_container_style_separator', 1, 'responsive_woocommerce_single_product_layout', 7, 1 );

			// Woocommerce Single Product Container Style.
			$single_product_container_style_label   = esc_html__( 'Container Style', 'responsive' );
			$single_product_container_style_choices = array(
				'default' => esc_html__( 'Default', 'responsive' ),
				'boxed'   => esc_html__( 'Boxed', 'responsive' ),
				'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_product_container_style', $single_product_container_style_label, 'responsive_woocommerce_single_product_layout', 8, $single_product_container_style_choices, 'default', null, 'refresh' );

			// Woocommerce Product Catalog Container Layout.
			$product_catalog_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'product_catalog_container_layout_separator', $product_catalog_container_layout_label, 'responsive_woocommerce_shop', 5 );

			responsive_imageradio_button_control( $wp_customize, 'product_catalog_container_layout', $product_catalog_container_layout_label, 'responsive_woocommerce_shop', 6, $container_layout_choices, 'default_container', null, 'svg', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'product_catalog_container_style_separator', 1, 'responsive_woocommerce_shop', 7, 1 );

			// Woocommerce Product Catalog Container Style.
			$product_catalog_container_style_label   = esc_html__( 'Container Style', 'responsive' );
			$product_catalog_container_style_choices = array(
				'default' => esc_html__( 'Default', 'responsive' ),
				'boxed'   => esc_html__( 'Boxed', 'responsive' ),
				'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'product_catalog_container_style', $product_catalog_container_style_label, 'responsive_woocommerce_shop', 8, $product_catalog_container_style_choices, 'default', null, 'refresh' );

		}
	}
endif;
return new Responsive_Container_Layout_Customizer();