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

			add_action( 'wp_enqueue_scripts', array( $this, 'responsive_disable_woocommerce_cart_fragments' ), 11 );

			add_filter( 'body_class', array( $this, 'add_body_class' ) );

			add_action( 'wp', array( $this, 'cart_page_upselles' ) );

			add_action( 'widgets_init', array( $this, 'register_off_canvas_sidebar' ), 11 );
			add_action( 'wp_footer', array( $this, 'get_off_canvas_sidebar' ) );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'off_canvas_filter_button' ) );

			add_action( 'responsive_header_bottom', array( $this, 'single_product_page_floating_bar' ) );

			add_filter( 'loop_shop_per_page', array( $this, 'responsive_shop_loop_per_page' ), 99 );
			add_action( 'woocommerce_product_query', array( $this, 'responsive_woocommerce_product_query' ), 20 );
			add_action( 'pre_get_posts', array( $this, 'responsive_woocommerce_pre_get_posts' ), 20 );

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
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'responsive_woocommerce_shop_product_content' ) );

			if ( ! get_theme_mod( 'responsive_show_archive_results_count', Responsive\Core\get_responsive_customizer_defaults( 'responsive_show_archive_results_count' ) ) ) {
				remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
			}

			if ( ! get_theme_mod( 'responsive_show_archive_sorting_dropdown', Responsive\Core\get_responsive_customizer_defaults( 'responsive_show_archive_sorting_dropdown' ) ) ) {
				remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
			}

			$hover_style = get_theme_mod( 'responsive_product_image_hover_switch', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_image_hover_switch' ) );
			if ( 'none' !== $hover_style ) {
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'responsive_woocommerce_template_loop_product_thumbnail' ), 10 );
			}

			$btn_action_style = get_theme_mod( 'responsive_product_button_action_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_action_style' ) );
			$btn_style        = get_theme_mod( 'responsive_product_button_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_style' ) );

			if ( 'bottom_slide_up' === $btn_action_style || 'text_with_arrow' === $btn_style ) {
				add_filter( 'woocommerce_post_class', array( $this, 'responsive_woocommerce_loop_product_class' ), 10, 2 );
			}

			if ( 'text_with_arrow' === $btn_style ) {
				add_filter( 'woocommerce_loop_add_to_cart_link', array( $this, 'responsive_woocommerce_loop_add_to_cart_arrow' ), 10, 3 );
			}

			if ( 1 === (int) get_theme_mod( 'responsive_product_align_button_bottom', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_align_button_bottom' ) ) ) {
				add_filter( 'body_class', array( $this, 'responsive_woocommerce_align_button_bottom_body_class' ) );
			}

			// Design 2: bag icon overlay on product image hover.
			if ( 'design2' === get_theme_mod( 'responsive_product_card_design', 'design1' ) ) {
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'responsive_shop_product_bag_icon_overlay' ), 20 );
			}
		}
		/**
		 * Register Customizer sections and panel for woocommerce
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since 3.15.4
		 */
		public function customize_register( $wp_customize ) {
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-colors-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-single-product-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-cart-layout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/customizer/settings/class-responsive-header-woo-cart-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-cart-colors-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-checkout-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-native-cart-popup-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-distraction-free-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-product-catalog-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-pagination-style-customizer.php';
		}

		/**
		 *  Responsive_disable_woocommerce_cart_fragments Disable WooCommerce Ajax.
		 *
		 * @return void [description]
		 */
		public function responsive_disable_woocommerce_cart_fragments() {
			if ( get_theme_mod( 'responsive_disable_cart_fragments' ) ) {
				wp_dequeue_script( 'wc-cart-fragments' );
			} else {
				wp_enqueue_script( 'wc-cart-fragments' );
			}
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
		 * Change number of products per page if set in theme customizer.
		 *
		 * @param int $products_per_page Number of products per page.
		 * @return int Number of products per page.
		 */
		public function responsive_shop_loop_per_page( $products_per_page ) {
			$custom_per_page = get_theme_mod( 'responsive_shop_products_per_page', '' );
			if ( ! empty( $custom_per_page ) && is_numeric( $custom_per_page ) && $custom_per_page > 0 ) {
				return absint( $custom_per_page );
			}
			return $products_per_page;
		}

		/**
		 * Set products per page for WooCommerce product query.
		 *
		 * @param WP_Query $query The query instance.
		 */
		public function responsive_woocommerce_product_query( $query ) {
			$custom_per_page = get_theme_mod( 'responsive_shop_products_per_page', '' );
			if ( ! empty( $custom_per_page ) && is_numeric( $custom_per_page ) && $custom_per_page > 0 ) {
				$query->set( 'posts_per_page', absint( $custom_per_page ) );
			}
		}

		/**
		 * Set products per page on WooCommerce archive pre_get_posts.
		 *
		 * @param WP_Query $query The query instance.
		 */
		public function responsive_woocommerce_pre_get_posts( $query ) {
			if ( is_admin() || ! $query->is_main_query() ) {
				return;
			}

			if ( ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) || $query->is_post_type_archive( 'product' ) ) {
				$custom_per_page = get_theme_mod( 'responsive_shop_products_per_page', '' );
				if ( ! empty( $custom_per_page ) && is_numeric( $custom_per_page ) && $custom_per_page > 0 ) {
					$query->set( 'posts_per_page', absint( $custom_per_page ) );
				}
			}
		}


		/**
		 * Check if Elementor Editor is open.
		 *
		 * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
		 */
		public function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' === $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				return true;
			}

			return false;
		}

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 */
		public function responsive_woocommerce_shop_product_content() {
			if ( ! $this->is_elementor_editor() ) {
				$shop_structure = Responsive\WooCommerce\responsive_woocommerce_shop_elements_positioning();
				if ( is_array( $shop_structure ) && ! empty( $shop_structure ) ) {
					$btn_action_style = get_theme_mod( 'responsive_product_button_action_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_action_style' ) );
					$summary_classes  = 'responsive-shop-summary-wrap';
					if ( 'bottom_slide_up' === $btn_action_style ) {
						$summary_classes .= ' btn-action-bottom-slide-up';
					}
					echo '<div class="' . esc_attr( $summary_classes ) . '">';

					foreach ( $shop_structure as $value ) {

						switch ( $value ) {
							case 'title':
								/**
								 * Product Title on shop page.
								 */
								Responsive\WooCommerce\responsive_woo_woocommerce_template_loop_product_title();
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
								$review_count_format = get_theme_mod( 'responsive_product_review_count', 'default' );
								if ( 'count-text' === $review_count_format ) {
									ob_start();
									woocommerce_template_loop_rating();
									$rating_html = ob_get_clean();

									if ( ! empty( $rating_html ) ) {
										global $product;
										if ( ! is_a( $product, 'WC_Product' ) ) {
											$product = wc_get_product( get_the_ID() );
										}
										$review_count = $product ? $product->get_review_count() : 0;
										echo '<div class="responsive-product-rating-wrap">';
										echo $rating_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										/* translators: %s: number of reviews */
										echo '<span class="responsive-review-count">' . esc_html( sprintf( _n( '%s review', '%s reviews', $review_count, 'responsive' ), number_format_i18n( $review_count ) ) ) . '</span>';
										echo '</div>';
									}
								} else {
									woocommerce_template_loop_rating();
								}
								break;
							case 'category':
								/**
								 * Product category on shop page.
								 */
								Responsive\WooCommerce\responsive_woo_shop_parent_category();
								break;
							case 'short_desc':
								/*
								 * Short description on shop page.
								 */
								Responsive\WooCommerce\responsive_woo_shop_product_short_description();
								break;
							case 'add_cart':
								/**
								 * Add to cart button on shop page.
								 */
								echo '<div class="responsive-product-action-wrap">';
								woocommerce_template_loop_add_to_cart();
								echo '</div>';
								break;
							default:
								break;
						}
					}
					do_action( 'responsive_woo_shop_summary_wrap_bottom' );
					echo '</div>';
				}
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

			// if ( class_exists( 'Responsive_Addons_Pro' ) ) {
				$single_product_breadcrumb_flag = get_theme_mod( 'responsive_single_product_breadcrumbs', 1 );
				if ( ! $single_product_breadcrumb_flag ) {
					remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
					add_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
				}
			// }

			/* Add single product content */
			add_action( 'woocommerce_single_product_summary', array( $this, 'single_product_content_structure' ), 10 );
			add_filter( 'woocommerce_product_description_heading', '__return_false' );
			add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );
		}

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 *
		 * @param string $product_type product type.
		 */
		public function single_product_content_structure( $product_type = '' ) {

			$single_product_structure = Responsive\WooCommerce\responsive_woocommerce_product_elements_positioning();

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
			$classes     = array();
			$classes[]   = 'onsale';
			$card_design = get_theme_mod( 'responsive_product_card_design', 'design1' );
			if ( 'design2' !== $card_design ) {
				$classes[] = get_theme_mod( 'responsive_product_sale_style' );
			}
			$classes     = implode( ' ', $classes );

			// Generate markup.
			return '<span class="' . esc_attr( $classes ) . '">' . esc_html( $text ) . '</span>';

		}

		/**
		 * Outputs the bag icon overlay for Design 2 on product cards.
		 *
		 * Hooked to woocommerce_before_shop_loop_item_title at priority 20.
		 *
		 * @return void
		 */
		public function responsive_shop_product_bag_icon_overlay() {
			global $product;
			if ( ! is_a( $product, 'WC_Product' ) ) {
				$product = wc_get_product( get_the_ID() );
			}
			if ( ! $product ) {
				return;
			}
			?>
			<div class="responsive-design2-bag-wrap">
				<a
					href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
					data-quantity="1"
					class="responsive-design2-bag-btn button add_to_cart_button <?php echo esc_attr( $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '' ); ?>"
					data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
					data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
					aria-label="<?php echo esc_attr( $product->add_to_cart_description() ); ?>"
					rel="nofollow"
				>
					<span class="responsive-design2-bag-tooltip"><?php esc_html_e( 'Add to Cart', 'responsive' ); ?></span>
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="448" height="448" viewBox="0 0 448 448" aria-hidden="true" focusable="false"><path fill="currentColor" d="M439.25 352l8.75 78.25c0.5 4.5-1 9-4 12.5-3 3.25-7.5 5.25-12 5.25h-416c-4.5 0-9-2-12-5.25-3-3.5-4.5-8-4-12.5l8.75-78.25h430.5zM416 142.25l21.5 193.75h-427l21.5-193.75c1-8 7.75-14.25 16-14.25h64v32c0 17.75 14.25 32 32 32s32-14.25 32-32v-32h96v32c0 17.75 14.25 32 32 32s32-14.25 32-32v-32h64c8.25 0 15 6.25 16 14.25zM320 96v64c0 8.75-7.25 16-16 16s-16-7.25-16-16v-64c0-35.25-28.75-64-64-64s-64 28.75-64 64v64c0 8.75-7.25 16-16 16s-16-7.25-16-16v-64c0-53 43-96 96-96s96 43 96 96z"/></svg>
				</a>
			</div>
			<?php
		}

		/**
		 * Add Custom WooCommerce scripts.
		 *
		 * @since 3.15.4
		 */
		public function add_custom_scripts() {
			// If vertical thumbnails style.
			if ( 'vertical' === get_theme_mod( 'responsive_single_product_gallery_layout', 'horizontal' ) ) {
				wp_enqueue_script( 'responsive-woo-thumbnails', get_template_directory_uri() . '/core/includes/compatibility/woocommerce/js/woo-thumbnails.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
			}

			if ( 0 !== get_theme_mod( 'responsive_enable_off_canvas_filter', 0 ) ) {
				wp_enqueue_script( 'responsive-woo-off-canvas', get_template_directory_uri() . '/core/includes/compatibility/woocommerce/js/woo-off-canvas.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
			}
			if ( is_woocommerce() && is_singular( 'product' ) ) {
				wp_enqueue_script( 'responsive-woo-floating-bar', get_template_directory_uri() . '/core/includes/compatibility/woocommerce/js/woo-floating-bar.js', array( 'customize-preview', 'jquery' ), RESPONSIVE_THEME_VERSION, true );
			}

			if ( 'bottom_slide_up' === get_theme_mod( 'responsive_product_button_action_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_action_style' ) ) ) {
				wp_enqueue_script( 'responsive-woo-product-hover', get_template_directory_uri() . '/core/includes/compatibility/woocommerce/js/woo-product-hover.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
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
			// Single Product Page
			$global_sidebar_position = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
			$single_product_setting = get_theme_mod( 'responsive_single_product_sidebar_position', 'global' );
			$single_product_sidebar_position = ( $single_product_setting === 'global' || $single_product_setting === 'default' ) ? $global_sidebar_position : $single_product_setting;
			$classes[] = 'sidebar-position-' . $single_product_sidebar_position;
			$classes[] = 'product-gallery-layout-' . get_theme_mod( 'responsive_single_product_gallery_layout', 'horizontal' );
		}

		if ( ( is_woocommerce() && is_shop() ) || is_cart() || is_checkout() || is_product_category() ) {
			// Shop / Catalog Pages
			$global_sidebar_position = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
			$shop_setting = get_theme_mod( 'responsive_shop_sidebar_position', 'global' );
			$shop_sidebar_position = ( $shop_setting === 'global' || $shop_setting === 'default' ) ? $global_sidebar_position : $shop_setting;
			$classes[] = 'sidebar-position-' . $shop_sidebar_position;
			$classes[] = 'responsive-catalog-view-' . get_theme_mod( 'responsive_woocommerce_catalog_view', 'grid' );
		}

			// Global WooCommerce styling
			$classes[] = 'product-sale-style-' . get_theme_mod( 'responsive_product_sale_style', 'circle' );
			$classes[] = 'product-content-aligmnment-' . get_theme_mod( 'responsive_product_content_aligmnment', 'center' );

			$product_card_design = get_theme_mod( 'responsive_product_card_design', 'design1' );
			if ( 'design2' === $product_card_design ) {
				$classes[] = 'responsive-product-design-2';
			}

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

			register_sidebar(
				array(
					'name'          => __( 'Product Sidebar', 'responsive' ),
					'id'            => 'responsive-woo-product-sidebar',
					'description'   => __( 'This sidebar will be used only on the Single Product page.', 'responsive' ),
					'before_title'  => '<div class="widget-title"><h4>',
					'after_title'   => '</h4></div>',
					'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
					'after_widget'  => '</div>',
				)
			);
		}
		// Off Canvas filter.
		/**
		 * Get Off Canvas Sidebar.
		 *
		 * @since 1.5.0
		 */
		public static function get_off_canvas_sidebar() {

			// Return if is not in shop page.
			if ( ! is_woocommerce() && ! is_shop() ) {
				return;
			}
			?>
				<div id="responsive-off-canvas-sidebar-wrap">
					<div class="responsive-off-canvas-sidebar widget-area">
						<div id="secondary" class="<?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>
							<?php dynamic_sidebar( 'responsive_off_canvas_sidebar' ); ?>
						</div>
						<?php
						if ( 0 !== get_theme_mod( 'responsive_enable_off_canvas_close_btn', 0 ) ) {
							?>
							<button type="button" class="responsive-off-canvas-close" aria-label="<?php echo esc_attr__( 'Close off canvas panel', 'responsive' ); ?>">
								<svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" role="img" aria-hidden="true" focusable="false">
									<path d="M505.943,6.058c-8.077-8.077-21.172-8.077-29.249,0L6.058,476.693c-8.077,8.077-8.077,21.172,0,29.249
										C10.096,509.982,15.39,512,20.683,512c5.293,0,10.586-2.019,14.625-6.059L505.943,35.306
										C514.019,27.23,514.019,14.135,505.943,6.058z"/>
									<path d="M505.942,476.694L35.306,6.059c-8.076-8.077-21.172-8.077-29.248,0c-8.077,8.076-8.077,21.171,0,29.248l470.636,470.636
										c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.624-6.057C514.018,497.866,514.018,484.771,505.942,476.694z"/>
								</svg>
							</button>
							<?php
						}
						?>
					</div>
					<div class="responsive-off-canvas-overlay"></div>
				</div>
			<?php

		}
		/**
		 * Register off canvas filter sidebar.
		 *
		 * @since 1.5.0
		 */
		public static function register_off_canvas_sidebar() {

			register_sidebar(
				array(
					'name'          => __( 'Off-Canvas Filters', 'responsive' ),
					'id'            => 'responsive_off_canvas_sidebar',
					'description'   => __( 'Widgets in this area are used in the Off Canvas Filter. To enable the Off Canvas filter, go to the Product Catalog Option > Layout in customizer and check Enable Off Canvas Filter checkbox under Off Canvas Filter section.', 'responsive' ),
					'before_title'  => '<div class="widget-title"><h4>',
					'after_title'   => '</h4></div>',
					'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
					'after_widget'  => '</div>',
				)
			);

		}
		/**
		 * Register off canvas filter button.
		 *
		 * @since 1.5.0
		 */
		public function off_canvas_filter_button() {
			$text = responsive_hamburger_off_canvas_btn_label_text_label();

			if ( ! is_woocommerce() ) {
				return;
			}
			echo '<a href="#" class="off_canvas_filter_btn"><i class="icon-bars" aria-hidden="true"></i><span class="off-canvas-filter-text">' . esc_html( $text ) . '</span></a>';
		}

		/**
		 * Single Product Page Floating Bar.
		 */
		public function single_product_page_floating_bar() {
			if ( is_woocommerce() && is_singular( 'product' ) ) {
				$product                  = wc_get_product( get_the_ID() );
				$floating_bar_toggle_cond = get_theme_mod( 'responsive_single_product_floating_bar', 'hide' );
				$floating_bar_show_cond   = ( is_user_logged_in() );

				if ( $floating_bar_toggle_cond && 'display' === $floating_bar_toggle_cond ) {
					?>
				<div id="floating-bar" class="responsive-floating-bar" style="display: none;">
					<div class="floatingb-container">
						<div class="floatingb-left">
							<h2 class="floatingb-title"><span class="floatingb-selected"><?php esc_html_e( 'Selected : ', 'responsive' ); ?></span><?php echo wp_trim_words( $product->get_title(), '4' ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
						</div>
						<div class="floatingb-right">
							<div class="floatingb-productprice">
								<p class="floatingb-price"><?php echo $product->get_price_html(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							</div>
							<?php
							if ( 'outofstock' === $product->get_stock_status() ) {
								?>
									<p class="floatingb-outofstock"><?php esc_html_e( 'Out Of Stock', 'responsive' ); ?></p>
								<?php
							} else {
								if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
									echo self::floating_bar_add_to_cart( $product ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								} else {
									?>
										<a href="#primary" class="floatingb-select-btn floating-bar-addbtn button"><?php esc_html_e( 'Select options', 'responsive' ); ?></a>
									<?php
								}
							}
							?>
						</div>
					</div>
				</div>
					<?php
				}
			}
		}

		/**
		 * Floating bar add to cart button.
		 *
		 * @param mixed $product Product.
		 */
		public static function floating_bar_add_to_cart( $product ) {

			$html  = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="floating-bar-cart" method="post" enctype="multipart/form-data">';
			$html .= woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_verify_nonce( sanitize_key( wp_unslash( $_POST['quantity'] ) ) ) ) : $product->get_min_purchase_quantity(),
				),
				$product,
				false
			);
			$html .= '<button type="submit" name="add-to-cart" value="' . get_the_ID() . '" class="floating-bar-addbtn">' . esc_html( $product->add_to_cart_text() ) . '</button>';
			$html .= '</form>';

			return $html;
		}

		/**
		 * Product Image Hover Switch in product loop.
		 */
		public function responsive_woocommerce_template_loop_product_thumbnail() {
			global $product;

			if ( ! is_a( $product, 'WC_Product' ) ) {
				$product = wc_get_product( get_the_ID() );
			}

			$hover_style = get_theme_mod( 'responsive_product_image_hover_switch', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_image_hover_switch' ) );
			$gallery_ids = $product ? $product->get_gallery_image_ids() : array();

			if ( 'none' !== $hover_style && ! empty( $gallery_ids ) ) {
				$secondary_id = $gallery_ids[0];
				$size         = 'woocommerce_thumbnail';

				echo '<div class="responsive-product-image-hover-wrap hover-effect-' . esc_attr( $hover_style ) . '">';
				echo woocommerce_get_product_thumbnail(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo wp_get_attachment_image(
					$secondary_id,
					$size,
					false,
					array(
						'class' => 'responsive-product-secondary-image',
						'alt'   => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				echo '</div>';
			} else {
				woocommerce_template_loop_product_thumbnail();
			}
		}

		/**
		 * Add custom classes to WooCommerce loop products for button action and button style.
		 *
		 * @param array $classes Array of post classes.
		 * @param WC_Product|null $product Product object.
		 * @return array
		 */
		public function responsive_woocommerce_loop_product_class( $classes, $product = null ) {
			$btn_action_style = get_theme_mod( 'responsive_product_button_action_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_action_style' ) );
			if ( 'bottom_slide_up' === $btn_action_style ) {
				$classes[] = 'btn-action-bottom-slide-up';
			}

			$btn_style = get_theme_mod( 'responsive_product_button_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_style' ) );
			if ( 'text_with_arrow' === $btn_style ) {
				$classes[] = 'btn-style-text-with-arrow';
			}

			return $classes;
		}

		/**
		 * Inject an inline SVG arrow into the Add to Cart button link when
		 * Button Style is set to 'Text with Arrow'. The SVG uses currentColor
		 * so it inherits the surrounding text colour automatically.
		 *
		 * @param string     $link    Full <a> tag HTML for the Add to Cart button.
		 * @param WC_Product $product Product object.
		 * @param array      $args    Arguments passed to woocommerce_loop_add_to_cart_link.
		 * @return string
		 */
		public function responsive_woocommerce_loop_add_to_cart_arrow( $link, $product, $args ) {
			$arrow_svg = '<svg class="responsive-btn-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
			$link      = str_replace( '</a>', $arrow_svg . '</a>', $link );
			return $link;
		}

		/**
		 * Add body class when Align Button at Bottom is enabled.
		 * CSS uses this class to push the Add to Cart button to the
		 * bottom of each product card via flex column + margin-top: auto.
		 *
		 * @param array $classes Array of body class strings.
		 * @return array
		 */
		public function responsive_woocommerce_align_button_bottom_body_class( $classes ) {
			if ( is_shop() || is_product_taxonomy() ) {
				$classes[] = 'responsive-align-btn-bottom';
			}
			return $classes;
		}

	}

endif;
Responsive_Woocommerce::get_instance();
