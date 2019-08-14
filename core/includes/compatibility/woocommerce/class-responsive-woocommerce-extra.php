<?php
/**
 * WooCommerce Markup
 *
 * @package Responsive Addon
 */

if ( ! class_exists( 'Responsive-Woocommerce-Extra' ) ) {

	/**
	 * Advanced Search Markup Initial Setup
	 *
	 * @since 1.0.0
	 */
	class Responsive_WooCommerce_Extra {

		/**
		 * Member Varible
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
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

			add_action( 'responsive_get_css_files', array( $this, 'add_styles' ) );
			add_action( 'responsive_get_js_files', array( $this, 'add_scripts' ) );

			add_filter( 'body_class', array( $this, 'body_class' ) );
			add_filter( 'post_class', array( $this, 'post_class' ) );

			// Pagination.
			add_action( 'wp', array( $this, 'common_actions' ), 999 );
			add_action( 'responsive_shop_pagination_infinite', array( $this, 'common_actions' ), 999 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_filter( 'responsive_theme_js_localize', array( $this, 'shop_js_localize' ) );
			add_action( 'wp_ajax_responsive_shop_pagination_infinite', array( $this, 'responsive_shop_pagination_infinite' ) );    // for logged in user.
			add_action( 'wp_ajax_nopriv_responsive_shop_pagination_infinite', array( $this, 'responsive_shop_pagination_infinite' ) );    // if user not logged in.
		}

		/**
		 * Infinite Posts Show on scroll
		 */
		public function responsive_shop_pagination_infinite() {

			check_ajax_referer( 'responsive-shop-load-more-nonce', 'nonce' );

			do_action( 'responsive_shop_pagination_infinite' );

			$query_vars                   = json_decode( stripslashes( $_POST['query_vars'] ), true );
			$query_vars['paged']          = isset( $_POST['page_no'] ) ? absint( $_POST['page_no'] ) : 1;
			$query_vars['post_status']    = 'publish';
			$query_vars['posts_per_page'] = get_theme_mod( 'shop-no-of-products' );
			$query_vars                   = array_merge( $query_vars, wc()->query->get_catalog_ordering_args() );

			$posts = new WP_Query( $query_vars );

			if ( $posts->have_posts() ) {
				while ( $posts->have_posts() ) {
					$posts->the_post();

					/**
					 * Woocommerce: woocommerce_shop_loop hook.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );
					wc_get_template_part( 'content', 'product' );
				}
			}

			wp_reset_query();

			wp_die();
		}

		/**
		 * Common Actions.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function common_actions() {
			// Shop Pagination.
			$this->shop_pagination();
		}

		/**
		 * Shop Pagination.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		public function shop_pagination() {

			$pagination = get_theme_mod( 'responsive_woo_pagination_style' );

			if ( 'infinite' === $pagination ) {
				remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
				add_action( 'woocommerce_after_shop_loop', array( $this, 'responsive_shop_pagination' ), 10 );
			}
		}

		/**
		 * Responsive Shop Pagination
		 *
		 * @since 1.1.0
		 * @param html $output Pagination markup.
		 * @return void
		 */
		public function responsive_shop_pagination( $output ) {

			global $wp_query;

			$infinite_event = get_theme_mod( 'shop-infinite-scroll-event' );
			$load_more_text = get_theme_mod( 'shop-load-more-text' );

			if ( '' === $load_more_text ) {
				$load_more_text = __( 'Load More', 'responsive' );
			}

			if ( $wp_query->max_num_pages > 1 ) {
				?>
				<nav class="responsive-shop-pagination-infinite">
					<div class="responsive-loader">
							<div class="responsive-loader-1"></div>
							<div class="responsive-loader-2"></div>
							<div class="responsive-loader-3"></div>
					</div>
					<?php if ( 'click' == $infinite_event ) { ?>
						<span class="responsive-shop-load-more active">
							<?php echo apply_filters( 'responsive_load_more_text', esc_html( $load_more_text ) ); ?>
						</span>
					<?php } ?>
				</nav>
				<?php
			}
		}

		/**
		 * Frontend scripts.
		 *
		 * @since 1.0
		 *
		 * @return void.
		 */
		function enqueue_frontend_scripts() {

			/* Directory and Extension */
			$file_prefix = '.min';
			$dir_name    = 'minified';

			if ( SCRIPT_DEBUG ) {
				$file_prefix = '';
				$dir_name    = 'unminified';
			}

			$js_gen_path  = ASTRA_EXT_WOOCOMMERCE_URI . 'assets/js/' . $dir_name . '/';
			$css_gen_path = ASTRA_EXT_WOOCOMMERCE_URI . 'assets/css/' . $dir_name . '/';

			if ( is_shop() || is_product_taxonomy() ) {

				if ( is_shop() ) {
					$shop_page_display = get_option( 'woocommerce_shop_page_display', false );

					if ( 'subcategories' !== $shop_page_display || is_search() ) {
						wp_enqueue_script( 'responsive-shop-pagination-infinite', $js_gen_path . 'pagination-infinite' . $file_prefix . '.js');//phpcs:ignore
					}
				} elseif ( is_product_taxonomy() ) {
					wp_enqueue_script( 'responsive-shop-pagination-infinite', $js_gen_path . 'pagination-infinite' . $file_prefix . '.js' ); //phpcs:ignore
				}
			}

		}

		/**
		 * Breadcrumb wrapper Start
		 */
		public function product_navigation_wrapper_start() {
			$nav_style = get_theme_mod( 'single-product-nav-style' );
			?>
			<div class="responsive-product-navigation-wrapper <?php echo esc_attr( $nav_style ); ?>">
			<?php
		}

		/**
		 * Breadcrumb wrapper End
		 */
		public function product_navigation_wrapper_end() {
			?>
			</div><!-- .responsiveproduct-navigation-wrapper -->
			<?php
		}


		/**
		 * Body Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		public function body_class( $classes ) {
			if ( is_shop() || is_product_taxonomy() ) {

				$shop_style = get_theme_mod( 'shop-style' );
				if ( 'shop-page-list-style' == $shop_style ) {
					$classes[] = 'responsive-woocommerce-' . $shop_style;
				}
				$pagination_type = get_theme_mod( 'responsive_woo_pagination_style' );

				if ( 'number' === $pagination_type ) {

					$classes[] = 'responsive-woocommerce-pagination-' . get_theme_mod( 'shop-pagination-style' );
				}
			}
			return $classes;
		}

		/**
		 * Post Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		public function post_class( $classes ) {

			$is_ajax_pagination = $this->is_ajax_pagination();

			if ( is_shop() || is_product_taxonomy() || ( post_type_exists( 'product' ) && 'product' === get_post_type() ) || $is_ajax_pagination ) {

				// Single product normal & hover box shadow.
				$classes[] = get_theme_mod( 'shop-product-align' );
				// Add Product Hover class only for infinite scroll products.
				if ( $is_ajax_pagination ) {
					$hover_style = get_theme_mod( 'shop-hover-style' );

					if ( '' !== $hover_style ) {
						$classes[] = 'responsive-woo-hover-' . $hover_style;
					}
				}
			}

			return $classes;
		}

		/**
		 * Check if ajax pagination is calling.
		 *
		 * @return boolean classes
		 */
		public function is_ajax_pagination() {

			$pagination = false;

			if ( isset( $_POST['responsive_infinite'] ) && wp_doing_ajax() && check_ajax_referer( 'responsive-shop-load-more-nonce', 'nonce', false ) ) {
				$pagination = true;
			}

			return $pagination;
		}

	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
ASTRA_Ext_WooCommerce_Markup::get_instance();
