<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Responsive
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Responsive WooCommerce Compatibility
 */
if ( ! class_exists( 'Responsive_Woocommerce' ) ) :

	/**
	 * Responsive WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Responsive_Woocommerce {



		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			require_once RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/woocommerce-helper.php';

			// Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'store_widgets_init' ), 9 );

			add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );

			add_action( 'wp', array( $this, 'single_product_customization' ) );

			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );

			add_filter( 'woocommerce_sale_flash', array( $this, 'sale_flash' ), 10, 3 );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_custom_scripts' ) );

			add_filter( 'body_class', array( $this, 'add_body_class' ) );

			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'responsive_woocommerce_shop_product_content' ) );

			add_action( 'wp', array( $this, 'cart_page_upselles' ) );
		}
		/**
		 * Remove Woo-Commerce Default actions
		 *
		 * @since 3.15.4
		 */
		public function woocommerce_init() {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		}
		/**
		 * Register Customizer sections and panel for woocommerce
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since 3.15.4
		 */
		public function customize_register( $wp_customize ) {
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-panel.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-colors-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-single-product-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-cart-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-cart-colors-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-checkout-customizer.php';
		}

		/**
		 * Disables Upsells
		 */
		public function cart_page_upselles() {
			$crossselles_enabled = get_theme_mod( 'responsive_enable_crosssells_options', 1 );
			if ( ! $crossselles_enabled ) {
				remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			}
		}

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 */
		public function responsive_woocommerce_shop_product_content() {
			$shop_structure = responsive_woocommerce_shop_elements_positioning();
			if ( is_array( $shop_structure ) && ! empty( $shop_structure ) ) {
				echo '<div class="responsive-shop-summary-wrap">';

				foreach ( $shop_structure as $value ) {

					switch ( $value ) {
						case 'title':
							/**
							 * Product Title on shop page.
							 */
							responsive_woo_woocommerce_template_loop_product_title();
							break;
						case 'price':
							/**
							 * Product Price on shop page.
							 */
							woocommerce_template_loop_price();
							break;
						case 'ratings':
							/**
							 * Rating on shop page.
							 */
							woocommerce_template_loop_rating();
							break;
						case 'category':
							/**
							 * Product category on shop page.
							 */
							responsive_woo_shop_parent_category();
							break;
						case 'short_desc':
							/*
							 * Short description on shop page.
							 */
							responsive_woo_shop_product_short_description();
							break;
						case 'add_cart':
							/**
							 * Add to cart button on shop page.
							 */
							woocommerce_template_loop_add_to_cart();
							break;
						default:
							break;
					}
				}
				do_action( 'responsive_woo_shop_summary_wrap_bottom' );
				echo '</div>';
			}
		}
		/**
		 * Single product structure customization.
		 *
		 * @return void
		 */
		public function single_product_customization() {

			if ( ! is_product() ) {
				return;
			}

			// Remove Default actions.
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

			/* Add single product content */
			add_action( 'woocommerce_single_product_summary', array( $this, 'single_product_content_structure' ), 10 );
		}

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 *
		 * @param string $product_type product type.
		 */
		public function single_product_content_structure( $product_type = '' ) {

			$single_product_structure = responsive_woocommerce_product_elements_positioning();

			if ( is_array( $single_product_structure ) && ! empty( $single_product_structure ) ) {

				foreach ( $single_product_structure as $value ) {

					switch ( $value ) {
						case 'title':
							/**
							 * Product Title on single product page.
							 */
							woocommerce_template_single_title();
							break;
						case 'price':
							/**
							 * Product Price on single product.
							 */
							woocommerce_template_single_price();
							break;
						case 'ratings':
							/**
							 * Rating on single product.
							 */
							woocommerce_template_single_rating();
							break;
						case 'short_desc':
							/**
							 * Short description on single product.
							 */
							woocommerce_template_single_excerpt();
							break;
						case 'add_cart':
							/**
							 * Add to cart action on single product
							 */
							woocommerce_template_single_add_to_cart();
							break;
						case 'meta':
							/**
							 * Meta content on single product
							 */
							woocommerce_template_single_meta();
							break;
						default:
							break;
					}
				}
			}
		}

		/**
		 * Sale bubble flash
		 *
		 * @param mixed  $markup HTML markup of the the sale bubble / flash.
		 * @param string $post Post.
		 * @param string $product Product.
		 *
		 * @return string bubble markup.
		 */
		public function sale_flash( $markup, $post, $product ) {

			$sale_notification = get_theme_mod( 'responsive_product_sale_notification', '', 'default' );

			// If none then return.
			if ( 'none' === $sale_notification ) {
				return;
			}

			// Default text.
			$text = __( 'Sale!', 'responsive' );

			switch ( $sale_notification ) {

				// Display % instead of "Sale!".
				case 'sale-percentage':
					$sale_percent_value = get_theme_mod( 'responsive_sale_percent_value' );
					// if not variable product.
					if ( ! $product->is_type( 'variable' ) ) {
						$sale_price = $product->get_sale_price();

						if ( $sale_price ) {
							$regular_price      = $product->get_regular_price();
							$percent_sale       = round( ( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ), 0 );
							$sale_percent_value = $sale_percent_value ? $sale_percent_value : '-[value]%';
							$text               = str_replace( '[value]', $percent_sale, $sale_percent_value );
						}
					} else {
						// if variable product.
						foreach ( $product->get_children() as $child_id ) {
							$variation  = wc_get_product( $child_id );
							$sale_price = $variation->get_sale_price();
							if ( $sale_price ) {
								$regular_price      = $variation->get_regular_price();
								$percent_sale       = round( ( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ), 0 );
								$sale_percent_value = $sale_percent_value ? $sale_percent_value : '-[value]%';
								$text               = str_replace( '[value]', $percent_sale, $sale_percent_value );
							}
						}
					}
					break;
			}

			// CSS classes.
			$classes   = array();
			$classes[] = 'onsale';
			$classes[] = get_theme_mod( 'responsive_product_sale_style' );
			$classes   = implode( ' ', $classes );

			// Generate markup.
			return '<span class="' . esc_attr( $classes ) . '">' . esc_html( $text ) . '</span>';

		}

		/**
		 * Add Custom WooCommerce scripts.
		 *
		 * @since 3.15.4
		 */
		public function add_custom_scripts() {
			// If vertical thumbnails style.
			if ( 'vertical' === get_theme_mod( 'responsive_single_product_gallery_layout', 'horizontal' ) ) {
				wp_enqueue_script( 'responsive-woo-thumbnails', get_stylesheet_directory_uri() . '/core/includes/compatibility/woocommerce/js/woo-thumbnails.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
			}
		}

		/**
		 * Body Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		public function add_body_class( $classes ) {

			if ( is_woocommerce() && is_product() ) {
				// Single Product Page sidebar Position.
				$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_single_product_sidebar_position', 'no' );
				$classes[] = 'product-gallery-layout-' . get_theme_mod( 'responsive_single_product_gallery_layout', 'horizontal' );
			}

			if ( is_woocommerce() && is_shop() ) {
				// Product catalog Page sidebar Position.
				$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_shop_sidebar_position', 'no' );
				$classes[] = 'responsive-catalog-view-' . get_theme_mod( 'responsive_woocommerce_catalog_view', 'grid' );
			}

			$classes[] = 'product-sale-style-' . get_theme_mod( 'responsive_product_sale_style', 'circle' );
			$classes[] = 'product-content-aligmnment-' . get_theme_mod( 'responsive_product_content_aligmnment', 'center' );

			return $classes;
		}

		/**
		 * Store widgets init
		 */
		public function store_widgets_init() {
			register_sidebar(
				array(
					'name'          => __( 'WooCommerce Sidebar', 'responsive' ),
					'id'            => 'responsive-woo-shop-sidebar',
					'description'   => __( 'This sidebar will be used on Product archive, Cart, Checkout and My Account pages.', 'responsive' ),
					'before_title'  => '<div class="widget-title"><h4>',
					'after_title'   => '</h4></div>',
					'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
					'after_widget'  => '</div>',
				)
			);
		}
	}

endif;
Responsive_Woocommerce::get_instance();
