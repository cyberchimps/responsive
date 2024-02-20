<?php
/**
 * Responsive Custom Fonts Taxonomy
 *
 * @since  1.0.0
 * @package responsive_custom_fonts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

if ( ! class_exists( 'Responsive_Custom_Fonts_Taxonomy' ) ) :

	/**
	 * Responsive_Custom_Fonts_Taxonomy
	 */
	class Responsive_Custom_Fonts_Taxonomy {
		/**
		 * Instance of Responsive_Custom_Fonts_Taxonomy
		 *
		 * @since  1.0.0
		 * @var (Object) Responsive_Custom_Fonts_Taxonomy
		 */
		private static $instance = null;

		/**
		 * Fonts
		 *
		 * @since  1.0.0
		 * @var (string) $fonts
		 */
		public static $fonts = null;

		/**
		 * Capability required for this menu to be displayed
		 *
		 * @since  1.0.0
		 * @var (string) $capability
		 */
		public static $capability = 'edit_theme_options';

		/**
		 * Register Taxonomy
		 *
		 * @since  1.0.0
		 * @var (string) $register_taxonomy
		 */
		public static $register_taxonomy_slug = 'responsive_custom_fonts';

		/**
		 * Instance of responsive_custom_fonts_Admin.
		 *
		 * @since  1.0.0
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_custom_fonts_taxonomies' ) );
		}

		/**
		 * Register custom font taxonomy
		 *
		 * @since 1.0.0
		 */
		public function create_custom_fonts_taxonomies() {

			// Taxonomy: responsive_custom_fonts.
			$labels = array(
				'name'              => apply_filters( 'responsive_custom_fonts_menu_title', __( 'Custom Fonts', 'responsive' ) ),
				'singular_name'     => __( 'Font', 'responsive' ),
				'menu_name'         => _x( 'Custom Fonts', 'Admin menu name', 'responsive' ),
				'search_items'      => __( 'Search Fonts', 'responsive' ),
				'all_items'         => __( 'All Fonts', 'responsive' ),
				'parent_item'       => __( 'Parent Font', 'responsive' ),
				'parent_item_colon' => __( 'Parent Font:', 'responsive' ),
				'edit_item'         => __( 'Edit Font', 'responsive' ),
				'update_item'       => __( 'Update Font', 'responsive' ),
				'add_new_item'      => __( 'Add New Font', 'responsive' ),
				'new_item_name'     => __( 'New Font Name', 'responsive' ),
				'not_found'         => __( 'No fonts found', 'responsive' ),
			);

			$args = array(
				'hierarchical'      => false,
				'labels'            => $labels,
				'public'            => false,
				'show_in_nav_menus' => false,
				'show_ui'           => true,
				'capabilities'      => array( self::$capability ),
				'query_var'         => false,
				'rewrite'           => false,
			);

			register_taxonomy(
				self::$register_taxonomy_slug,
				apply_filters( 'responsive_taxonomy_objects_custom_fonts', array() ),
				apply_filters( 'responsive_taxonomy_args_custom_fonts', $args )
			);
		}

		/**
		 * Default fonts
		 *
		 * @since 1.0.0
		 * @param array $fonts fonts array of fonts.
		 */
		protected static function default_args( $fonts ) {
			return wp_parse_args(
				$fonts,
				array(
					'font_woff_2'  => '',
					'font_woff'    => '',
					'font_ttf'     => '',
					'font_svg'     => '',
					'font_eot'     => '',
					'font_otf'     => '',
					'font-display' => 'swap',
				)
			);
		}

		/**
		 * Get fonts
		 *
		 * @since 1.0.0
		 * @return array $fonts fonts array of fonts.
		 */
		public static function get_fonts() {

			if ( is_null( self::$fonts ) ) {
				self::$fonts = array();

				$terms = get_terms(
					self::$register_taxonomy_slug,
					array(
						'hide_empty' => false,
					)
				);

				if ( ! empty( $terms ) ) {
					foreach ( $terms as $term ) {
						self::$fonts[ $term->name ] = self::get_font_links( $term->term_id );
					}
				}
			}
			return self::$fonts;
		}

		/**
		 * Get font data from name
		 *
		 * @since 1.0.0
		 * @param string $name custom font name.
		 * @return array $font_links custom font data.
		 */
		public static function get_links_by_name( $name ) {

			$terms      = get_terms(
				self::$register_taxonomy_slug,
				array(
					'hide_empty' => false,
				)
			);
			$font_links = array();
			if ( ! empty( $terms ) ) {

				foreach ( $terms as $term ) {
					if ( $term->name == $name ) {
						$font_links[ $term->name ] = self::get_font_links( $term->term_id );
					}
				}
			}

			return $font_links;

		}

		/**
		 * Get font links
		 *
		 * @since 1.0.0
		 * @param int $term_id custom font term id.
		 * @return array $links custom font data links.
		 */
		public static function get_font_links( $term_id ) {
			$links = get_option( 'taxonomy_' . self::$register_taxonomy_slug . "_{$term_id}", array() );
			return self::default_args( $links );
		}

		/**
		 * Update font data from name
		 *
		 * @since 1.0.0
		 * @param array $posted custom font data.
		 * @param int   $term_id custom font term id.
		 */
		public static function update_font_links( $posted, $term_id ) {

			$links = self::get_font_links( $term_id );
			foreach ( array_keys( $links ) as $key ) {
				if ( isset( $posted[ $key ] ) ) {
					$links[ $key ] = $posted[ $key ];
				} else {
					$links[ $key ] = '';
				}
			}
			update_option( 'taxonomy_' . self::$register_taxonomy_slug . "_{$term_id}", $links );
		}

	}



	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Responsive_Custom_Fonts_Taxonomy::get_instance();

endif;
