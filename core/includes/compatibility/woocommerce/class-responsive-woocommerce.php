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

            add_action( 'woocommerce_after_shop_loop_item', array( $this, 'responsive_woocommerce_shop_product_content' ));

            add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );

            add_action( 'customize_register', array( $this, 'customize_register' ), 2 );

			add_filter( 'woocommerce_sale_flash', array( $this, 'sale_flash' ), 10, 3 );

        }

        /**
         * Remove Woo-Commerce Default actions
         *
         * @since 3.15.4
         */
        function woocommerce_init() {
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
            remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        }

        /**
         * Register Customizer sections and panel for woocommerce
         *
         * @since 3.15.4
         * @param WP_Customize_Manager $wp_customize Theme Customizer object.
         */
        function customize_register( $wp_customize ) {

            require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-layout-customizer.php';
            require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-single-product-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-general-customizer.php';

        }

        /**
         * Show the product title in the product loop. By default this is an H2.
         */
        function responsive_woocommerce_shop_product_content()
        {
            $shop_structure = responsive_woocommerce_shop_elements_positioning();

            if (is_array($shop_structure) && !empty($shop_structure)) {

                echo '<div class="ressponsive-shop-summary-wrap">';

                foreach ($shop_structure as $value) {

                    switch ($value) {
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
                             * rating on shop page.
                             */
                            woocommerce_template_loop_rating();
                            break;
                        case 'short_desc':
                            responsive_woo_shop_product_short_description();
                            break;
                        case 'add_cart':
                            woocommerce_template_loop_add_to_cart();
                            break;
                        default:
                            break;
                    }
                }

                echo '</div>';
            }
        }

		/**
		 * Sale bubble flash
		 *
		 * @param  mixed  $markup  HTML markup of the the sale bubble / flash.
		 * @param  string $post Post.
		 * @param  string $product Product.
		 * @return string bubble markup.
		 */
		function sale_flash( $markup, $post, $product ) {

			$sale_notification = get_theme_mod( 'responsive_product_sale_notification', '', 'default' );

			// If none? then return!
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

    }

endif;
    Responsive_Woocommerce::get_instance();
