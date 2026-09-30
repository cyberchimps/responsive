<?php
/**
 * Responsive Pro Blog Markup
 *
 * @package Responsive Pro
 */

/**
 * Responsive Pro Blog Markup
 */
if ( ! class_exists( 'Responsive_Blog_Markup' ) ) :

	/**
	 * Responsive Pro Blog Markup
	 */
	class Responsive_Blog_Markup {

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

			add_action( 'wp_ajax_responsive_pagination_infinite', array( $this, 'responsive_pro_pagination_infinite' ) );
			add_action( 'wp_ajax_nopriv_responsive_pagination_infinite', array( $this, 'responsive_pro_pagination_infinite' ) );

			add_action( 'responsive_pro_pagination_infinite_enqueue_script', array( $this, 'responsive_pro_pagination_infinite_enqueue' ) );
		}

		/**
		 * Enqueue pagination js
		 */
		public function responsive_pro_pagination_infinite_enqueue() {
			wp_enqueue_script( 'responsive-pagination-infinite', get_template_directory_uri() . '/core/js/pagination-infinite.min.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'wp-util' );

			global $wp_query;

			$blog_pagination            = responsive_blog_pagination();
			$blog_infinite_scroll_event = 'scroll';

			$data['query_vars']            = wp_json_encode( $wp_query->query );
			$data['edit_post_url']         = admin_url( 'post.php?post={{id}}&action=edit' );
			$data['ajax_url']              = admin_url( 'admin-ajax.php' );
			$data['infinite_count']        = 2;
			$data['infinite_total']        = $wp_query->max_num_pages;
			$data['pagination']            = $blog_pagination;
			$data['infinite_scroll_event'] = $blog_infinite_scroll_event;
			$data['infinite_nonce']        = wp_create_nonce( 'responsive-load-more-nonce' );
			$data['no_more_post_message']  = apply_filters( 'responsive_blog_no_more_post', __( 'No more posts to show.', 'responsive' ) );
			$data['site_url']              = get_site_url();
			$data['in_customizer']         = is_customize_preview();

			$data['show_comments'] = __( 'Show Comments', 'responsive' );

			wp_localize_script( 'responsive-pagination-infinite', 'responsivePaginationInfinite', $data );
		}

		/**
		 * Show Infinite post on scroll
		 */
		public function responsive_pro_pagination_infinite() {

			check_ajax_referer( 'responsive-load-more-nonce', 'nonce' );

			do_action( 'responsive_pagination_infinite' );

			$raw_query_vars = isset( $_POST['query_vars'] ) ? json_decode( wp_unslash( $_POST['query_vars'] ), true ) : array();
			$raw_query_vars = is_array( $raw_query_vars ) ? $raw_query_vars : array();

			// Only pass through the query vars a normal blog/archive/search query can have; drop everything else (meta_query, tax_query, posts_per_page, etc.).
			$allowed_query_vars = array( 'cat', 'category_name', 'tag', 'author', 'author_name', 'year', 'monthnum', 'day', 's' );
			$query_vars         = array_intersect_key( $raw_query_vars, array_flip( $allowed_query_vars ) );

			$requested_post_type    = isset( $raw_query_vars['post_type'] ) ? sanitize_key( $raw_query_vars['post_type'] ) : 'post';
			$public_post_types      = get_post_types( array( 'publicly_queryable' => true ) );
			$query_vars['post_type'] = in_array( $requested_post_type, $public_post_types, true ) ? $requested_post_type : 'post';

			$query_vars['paged']          = isset( $_POST['page_no'] ) ? absint( $_POST['page_no'] ) : 1;
			$query_vars['post_status']    = 'publish';
			$query_vars['posts_per_page'] = (int) get_option( 'posts_per_page' );

			$posts = new WP_Query( $query_vars );

			if ( $posts->have_posts() ) {
				while ( $posts->have_posts() ) {
					$posts->the_post();
					Responsive\responsive_entry_before();
					get_template_part( 'partials/entry/layout', get_post_type() );
					Responsive\responsive_entry_after();
				}
			}

			wp_reset_postdata();

			wp_die();
		}

	}

endif;
Responsive_Blog_Markup::get_instance();
