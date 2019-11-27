<?php
/**
 * Responsive Blog Markup
 *
 * @package Responsive
 */

/**
 * Responsive Blog Markup
 */
if ( ! class_exists( 'Responsive_Blog_Markup' ) ) :

	/**
	 * Responsive Blog Markup
	 *
	 * @since 1.0.0
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
			add_action( 'wp_ajax_responsive_pagination_infinite', array( $this, 'responsive_pagination_infinite' ) );
			add_action( 'wp_ajax_nopriv_responsive_pagination_infinite', array( $this, 'responsive_pagination_infinite' ) );

			add_action( 'responsive_pagination_infinite_enqueue_script', array( $this, 'responsive_pagination_infinite_enqueue' ) );
		}

		/**
		 * Enqueue pagination js
		 */
		public function responsive_pagination_infinite_enqueue() {
			$suffix    = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
			$directory = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? 'js-dev' : 'js';
			wp_enqueue_script( 'responsive-pagination-infinite', get_stylesheet_directory_uri() . '/core/' . $directory . '/pagination-infinite' . $suffix . '.js', array( 'jquery', 'wp-util' ), '3.17.2', true );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'wp-util' );

			global $wp_query;

			$blog_pagination            = get_theme_mod( 'blog_pagination', 'default' );
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

			$data['show_comments'] = __( 'Show Comments', 'responsive' );

			wp_localize_script( 'responsive-pagination-infinite', 'responsivePaginationInfinite', $data );
		}

		/**
		 * Show Infinite post on scroll
		 */
		public function responsive_pagination_infinite() {

			check_ajax_referer( 'responsive-load-more-nonce', 'nonce' );

			do_action( 'responsive_pagination_infinite' );

			$query_vars                = json_decode( stripslashes( $_POST['query_vars'] ), true );
			$query_vars['paged']       = ( isset( $_POST['page_no'] ) ) ? stripslashes( $_POST['page_no'] ) : 1;
			$query_vars['post_status'] = 'publish';
			$posts                     = new WP_Query( $query_vars );

			global $responsive_options;
			$responsive_options = responsive_get_options();
			global $responsive_blog_layout_columns;

			if ( isset( $responsive_options['blog_posts_index_layout_default'] ) && ( in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_blog_layout_columns, true ) ) ) {
				if ( $posts->have_posts() ) {
					while ( $posts->have_posts() ) {
						$posts->the_post(); ?>
						<div class="section-<?php echo $responsive_options['blog_posts_index_layout_default']; ?> grid">
							<?php
							responsive_entry_before();
							get_template_part( 'partials/entry/layout', get_post_type() );
							responsive_entry_after();
							?>
						</div>
							<?php
					}
				}
			} else {
				if ( $posts->have_posts() ) {
					while ( $posts->have_posts() ) {
						$posts->the_post();
						responsive_entry_before();
						get_template_part( 'partials/entry/layout', get_post_type() );
						responsive_entry_after();
					}
				}
			}

			wp_reset_postdata();

			wp_die();
		}

	}

endif;
Responsive_Blog_Markup::get_instance();
