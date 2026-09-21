<?php
/**
 * WooCommerce Shop Breadcrumb, Toolbar, Box Shadow & Product Image Hover Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Product_Catalog_Customizer' ) ) :

	/**
	 * Product Catalog Options: breadcrumb/toolbar visibility, content alignment,
	 * product box shadow, and product image hover style.
	 */
	class Responsive_Woocommerce_Product_Catalog_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 6.5.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'product_flip_image' ), 10 );
		}

		/**
		 * Customizer options
		 *
		 * @param object $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_setting(
				'breadcrumbs_options',
				array(
					'default'           => 1,
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'breadcrumbs_options',
					array(
						'label'    => __( 'Breadcrumbs', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'breadcrumbs_options',
						'priority' => 3,
					)
				)
			);

			$wp_customize->add_setting(
				'toolbar_options',
				array(
					'default'           => 4,
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'toolbar_options',
					array(
						'label'    => __( 'Toolbar', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'toolbar_options',
					)
				)
			);

			$wp_customize->add_setting(
				'content_alignment_options',
				array(
					'default'           => 'left',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Button_Control(
					$wp_customize,
					'content_alignment_options',
					array(
						'label'    => esc_html__( 'Content Alignment', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'content_alignment_options',
						'priority' => 10,
						'choices'  => array(
							'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
							'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
							'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
						),
					)
				)
			);

			$wp_customize->add_setting(
				'box_shadow_options',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'refresh',
					'default'           => 0,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'box_shadow_options',
					array(
						'label'       => esc_html__( 'Box Shadow', 'responsive' ),
						'section'     => 'responsive_woocommerce_shop',
						'settings'    => 'box_shadow_options',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 5,
							'step' => 1,
						),
					)
				)
			);

			$wp_customize->add_setting(
				'box_shadow_hover_options',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'refresh',
					'default'           => 0,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'box_shadow_hover_options',
					array(
						'label'       => esc_html__( 'Box Hover Shadow', 'responsive' ),
						'section'     => 'responsive_woocommerce_shop',
						'settings'    => 'box_shadow_hover_options',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 5,
							'step' => 1,
						),
					)
				)
			);

			$wp_customize->add_setting(
				'product_image_hover_style_options',
				array(
					'default'           => 'none',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'product_image_hover_style_options',
					array(
						'label'    => esc_html__( 'Product Image Hover Style', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'product_image_hover_style_options',
						'priority' => 10,
						'choices'  => array(
							'none'        => esc_html__( 'None', 'responsive' ),
							'swap-images' => esc_html__( 'Swap Images', 'responsive' ),
							'fade'        => esc_html__( 'Fade', 'responsive' ),
							'zoom'        => esc_html__( 'Zoom', 'responsive' ),
							'zoom-fade'   => esc_html__( 'Zoom Fade', 'responsive' ),
						),
					)
				)
			);
		}

		/**
		 * Swaps the loop thumbnail for the gallery's next image on hover.
		 *
		 * @since 6.5.0
		 */
		public function product_flip_image() {

			global $product;

			$hover_style = get_theme_mod( 'product_image_hover_style_options' );

			if ( 'swap-images' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}
	}

endif;

return new Responsive_Woocommerce_Product_Catalog_Customizer();
