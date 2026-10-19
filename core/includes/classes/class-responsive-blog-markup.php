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

			// Send the main query's real page size (after pre_get_posts and Customizer changes) so page 2+ matches page 1.
			$client_query                   = $wp_query->query;
			$client_query['posts_per_page'] = (int) $wp_query->get( 'posts_per_page' );

			$data['query_vars']            = wp_json_encode( $client_query );
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

			$query_vars = $this->get_sanitized_query_vars( isset( $_POST['query_vars'] ) ? wp_unslash( $_POST['query_vars'] ) : '' );

			$query_vars['paged']       = isset( $_POST['page_no'] ) ? max( 1, absint( $_POST['page_no'] ) ) : 1;
			$query_vars['post_status'] = 'publish';

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

		/**
		 * Rebuild the main query's vars from client input using a strict allowlist and per-key sanitizers.
		 *
		 * @param mixed $json Raw JSON string sent by the browser.
		 * @return array
		 */
		private function get_sanitized_query_vars( $json ) {
			$raw = is_string( $json ) ? json_decode( $json, true ) : null;
			$raw = is_array( $raw ) ? $raw : array();

			$query_vars = array();

			// Comma lists of IDs. Negative values are kept for category/author exclusion.
			foreach ( array( 'cat', 'author' ) as $key ) {
				if ( ! isset( $raw[ $key ] ) || ! ( is_string( $raw[ $key ] ) || is_int( $raw[ $key ] ) ) ) {
					continue;
				}
				$ids = array_filter(
					array_map( 'trim', explode( ',', (string) $raw[ $key ] ) ),
					function ( $id ) {
						return (bool) preg_match( '/^-?\d+$/', $id );
					}
				);
				if ( $ids ) {
					$query_vars[ $key ] = implode( ',', $ids );
				}
			}

			// Date and numeric values.
			foreach ( array( 'year', 'monthnum', 'day', 'm' ) as $key ) {
				if ( isset( $raw[ $key ] ) && is_scalar( $raw[ $key ] ) ) {
					$query_vars[ $key ] = absint( $raw[ $key ] );
				}
			}

			// Text values: slugs, search terms and every public taxonomy's query var.
			foreach ( $this->get_allowed_text_query_vars() as $key ) {
				if ( isset( $raw[ $key ] ) && is_string( $raw[ $key ] ) ) {
					$query_vars[ $key ] = sanitize_text_field( $raw[ $key ] );
				}
			}

			// Post type(s), limited to publicly queryable types.
			$public_post_types = get_post_types( array( 'publicly_queryable' => true ) );
			$requested         = isset( $raw['post_type'] ) ? $raw['post_type'] : 'post';
			$requested         = array_filter( array_map( 'sanitize_key', (array) $requested ), 'is_string' );
			$post_types        = array_values( array_intersect( $requested, $public_post_types ) );

			$query_vars['post_type'] = $post_types ? ( 1 === count( $post_types ) ? $post_types[0] : $post_types ) : 'post';

			// Page size, bounded so a client cannot request an arbitrarily large query.
			$query_vars['posts_per_page'] = isset( $raw['posts_per_page'] ) && is_scalar( $raw['posts_per_page'] )
				? min( 100, max( 1, absint( $raw['posts_per_page'] ) ) )
				: max( 1, (int) get_option( 'posts_per_page' ) );

			return $query_vars;
		}

		/**
		 * Text query vars allowed from the client: fixed keys plus public taxonomies' query vars.
		 *
		 * @return array
		 */
		private function get_allowed_text_query_vars() {
			$keys = array( 'category_name', 'tag', 'author_name', 's', 'post_format' );

			foreach ( get_taxonomies( array( 'public' => true ), 'objects' ) as $taxonomy ) {
				if ( ! empty( $taxonomy->query_var ) ) {
					$keys[] = $taxonomy->query_var;
				}
			}

			return array_unique( $keys );
		}

	}

endif;
Responsive_Blog_Markup::get_instance();
