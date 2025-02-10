<?php
/**
 * Home Starter Content Compatibility.
 */
/**
 * Class Responsive_Home_Starter_Content
 */
class Responsive_Home_Starter_Content {
	const HOME_SLUG          = 'home';
	const ABOUT_SLUG         = '#about';
	const SERVICES_SLUG      = '#services';
	const TESTIMONIALS_SLUG  = '#testimonials';
	const WHY_US_SLUG        = '#whyus';
	const CONTACT_SLUG       = '#contact';
	/**
	 * Constructor
	 */
	public function __construct() {
        $is_fresh_site = get_option( 'fresh_site' );
		error_log( 'is_fresh_site: ' . print_r( $is_fresh_site, true ) );
		if ( ! $is_fresh_site ) {
			return;
		}

		// Adding post meta and inserting post.
		add_action(
			'wp_insert_post',
			array(
				$this,
				'register_listener',
			),
			3,
			99
		);
		// Save responsiiive settings into database.
		// add_action(
		// 	'customize_save_after',
		// 	array(
		// 		$this,
		// 		'save_responsive_settings',
		// 	),
		// 	10,
		// 	3
		// );
		if ( ! is_customize_preview() ) {
			return;
		}

		add_filter( 'body_class', array( $this, 'responsive_add_custom_home_body_class' ), 999 );

		// preview customizer values.
		// add_filter( 'default_post_metadata', array( $this, 'starter_meta' ), 99, 3 );

		// add_filter( 'responsive_theme_defaults', array( $this, 'theme_defaults' ) );

		// add_filter( 'responsive_global_color_palette', array( $this, 'theme_color_palettes_defaults' ) );

	}

	/**
	 * Funtion to add CSS class to body
	 *
	 * @param array $classes html classes.
	 */
	function responsive_add_custom_home_body_class( $classes ) {
		$classes[] = 'custom-home-page-set';
		return $classes;
	}

	/**
	 * Load default starter meta.
	 *
	 * @since 4.0.2
	 * @param mixed  $value Value.
	 * @param int    $post_id Post id.
	 * @param string $meta_key Meta key.
	 *
	 * @return string Meta value.
	 */
	public function starter_meta( $value, $post_id, $meta_key ) {
		if ( get_post_type( $post_id ) !== 'page' ) {
			return $value;
		}
		if ( 'site-content-layout' === $meta_key ) {
			return 'plain-container';
		}
		if ( 'theme-transparent-header-meta' === $meta_key ) {
			return 'enabled';
		}
		if ( 'site-sidebar-layout' === $meta_key ) {
			return 'no-sidebar';
		}
		if ( 'site-post-title' === $meta_key ) {
			return 'disabled';
		}
		return $value;
	}
	/**
	 * Register listener to insert post.
	 *
	 * @since 4.0.0
	 * @param int      $post_ID Post Id.
	 * @param \WP_Post $post Post object.
	 * @param bool     $update Is update.
	 */
	public function register_listener( $post_ID, $post, $update ) {
		if ( $update ) {
			return;
		}
		$custom_draft_post_name = get_post_meta( $post_ID, '_customize_draft_post_name', true );

		$is_from_starter_content = ! empty( $custom_draft_post_name );
    
		if ( ! $is_from_starter_content ) {
			return;
		}
		if ( 'page' === $post->post_type ) {
			update_post_meta( $post_ID, 'site-content-layout', 'plain-container' );
			update_post_meta( $post_ID, 'theme-transparent-header-meta', 'enabled' );
			update_post_meta( $post_ID, 'site-sidebar-layout', 'no-sidebar' );
			update_post_meta( $post_ID, 'site-post-title', 'disabled' );
		}
	}
	/**
	 *  Get customizer json
	 *
	 * @since 4.0.0
	 *  @return mixed value.
	 */
	public function get_customizer_json() {
		try {
			$request = wp_remote_get( RESPONSIVE_THEME_URI . 'admin/starter-template/responsive-settings-export.json' );
		} catch ( Exception $ex ) {
			$request = null;
		}
		if ( is_wp_error( $request ) ) {
			return false; // Bail early.
		}
		// @codingStandardsIgnoreStart
		/**
		 * @psalm-suppress PossiblyNullReference
		 * @psalm-suppress UndefinedMethod
		 * @psalm-suppress PossiblyNullArrayAccess
		 * @psalm-suppress PossiblyNullArgument
		 * @psalm-suppress InvalidScalarArgument
		 */
		return json_decode( $request['body'], 1 );
		// @codingStandardsIgnoreEnd
	}
	/**
	 *  Save repsonsive customizer settings into database.
	 *
	 * @since 4.0.0
	 */
	public function save_responsive_settings() {
        delete_option( 'responsive_insert_custom_home' );
		// $settings = self::get_customizer_json();
		// // Delete existing dynamic CSS cache.
		// delete_option( 'responsive-settings' );
		// if ( ! empty( $settings['customizer-settings'] ) ) {
		// 	foreach ( $settings['customizer-settings'] as $option => $value ) {
		// 		update_option( $option, $value );
		// 	}
		// }
	}
	/**
	 * Load default responsive settings.
	 *
	 * @since 4.0.0
	 * @param mixed $defaults defaults.
	 * @return mixed value.
	 */
	public function theme_defaults( $defaults ) {
		$json     = '';
		$settings = self::get_customizer_json();
		if ( ! empty( $settings['customizer-settings'] ) ) {
			$json = $settings['customizer-settings']['responsive-settings'];
		}
		return $json ? $json : $defaults;
	}
	/**
	 * Load default color palettes.
	 *
	 * @since 4.0.0
	 * @param mixed $defaults defaults.
	 * @return mixed value.
	 */
	public function theme_color_palettes_defaults( $defaults ) {
		$json     = '';
		$settings = self::get_customizer_json();
		if ( ! empty( $settings['customizer-settings'] ) ) {
			$json = $settings['customizer-settings']['responsive-color-palettes'];
		}
		return $json ? $json : $defaults;
	}
	/**
	 * Return starter content definition.
	 *
	 * @return mixed|void
	 * @since 4.0.0
	 */
	public function get() {
		$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
		if ( ! in_array( 'social', $header_hfb_elements['primary']['primary_right'], true ) ) {
			array_push( $header_hfb_elements['primary']['primary_right'], 'social' );
		}
		set_theme_mod( 'responsive_header_desktop_items', $header_hfb_elements );
        update_option( 'responsive_insert_custom_home', true );
		$nav_items_header = array(
			'home'     => array(
				'type'      => 'post_type',
				'object'    => 'page',
				'object_id' => '{{' . self::HOME_SLUG . '}}',
			),
			'services'    => array(
				'title' => __( 'Services', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::SERVICES_SLUG . '}}',
			),
			'about' => array(
				'title' => __( 'About', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::ABOUT_SLUG . '}}',
			),
			'testimonials'  => array(
				'title' => __( 'Testimonials', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::TESTIMONIALS_SLUG . '}}',
			),
			'whyus'      => array(
				'title' => __( 'Why us', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::WHY_US_SLUG . '}}',
			),
			'contact'  => array(
				'title' => __( 'Contact', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::CONTACT_SLUG . '}}',
			),
		);
		$content = array(
			'attachments' => array(
				'logo' => array(
					'post_title' => _x( 'Logo', 'Theme starter content', 'responsive' ),
					'file'       => 'admin/images/home-logo.png',
				),
			),
			'nav_menus'   => array(
				'header-menu'     => array(
					'name'  => esc_html__( 'Primary Menu', 'responsive' ),
					'items' => $nav_items_header,
				),
				// 'mobile_menu' => array(
				// 	'name'  => esc_html__( 'Primary', 'responsive' ),
				// 	'items' => $nav_items_header,
				// ),
			),
			'theme_mods'  => array(
				'custom_logo' => '{{logo}}',
				'nav_menu_locations' => array(
    			    'header-menu' => '{{header-menu}}', // Assign the menu to the primary location
    			),
                // 'responsive_width' => 'full-width',
                'responsive_style' => 'contained',
				'responsive_hide_title' => true,
                'responsive_h1_text_color' => '#ffffff',
				'responsive_h2_text_color' => '#200c47',
				'responsive_h3_text_color' => '#200c47',
				'heading_h1_typography_font_size_value' => 64,
				'heading_h1_typography[font-size]' => '64px',
				'heading_h1_mobile_typography_font_size_value' => 50,
				'heading_h1_mobile_typography[font-size]' => '50px',
				'heading_h2_typography_font_size_value' => 52,
				'heading_h2_typography[font-size]' => '52px',
				'heading_h2_mobile_typography_font_size_value' => 24,
				'heading_h2_mobile_typography[font-size]' => '24px',
				'heading_h3_typography_font_size_value' => 26,
				'heading_h3_typography[font-size]' => '26px',
				'heading_h3_mobile_typography_font_size_value' => 24,
				'heading_h3_mobile_typography[font-size]' => '24px',
				'responsive_body_text_color' => '#1f1f1f',
				// 'responsive_header_full_width' => true,
				'responsive_button_color' => '#ffc300',
				'responsive_button_hover_color' => '#ffc300',
				'responsive_button_border_color' => '#ffc300',
				'responsive_button_hover_border_color' => '#ffc300',
				'responsive_button_text_color' => '#1c1c1c',
				'responsive_button_hover_text_color' => '#1c1c1c',
				'responsive_buttons_radius_bottom_left_radius' => 13,
				'responsive_buttons_radius_top_left_radius' => 13,
				'responsive_buttons_radius_top_right_radius' => 13,
				'responsive_buttons_radius_bottom_right_radius' => 13,
				'responsive_buttons_radius_mobile_top_left_radius' => 10,
				'responsive_buttons_radius_mobile_top_right_radius' => 10,
				'responsive_buttons_radius_mobile_bottom_right_radius' => 10,
				'responsive_buttons_radius_mobile_bottom_left_radius' => 10,
				'responsive_buttons_top_padding' => 22,
				'responsive_buttons_left_padding' => 27,
				'responsive_buttons_bottom_padding' => 22,
				'responsive_buttons_right_padding' => 27,
				'responsive_buttons_mobile_top_padding' => 20,
				'responsive_buttons_mobile_right_padding' => 20,
				'responsive_buttons_mobile_bottom_padding' => 20,
				'responsive_buttons_mobile_left_padding' => 20,
				'responsive_meta_text_color' => '#3a1d74',
				'responsive_header_background_color' => '#2d2c52',
				'responsive_header_mobile_menu_background_color' => '#2d2c52',
				'responsive_header_primary_row_bg_color' => '#2d2c52',
				'responsive_header_primary_row_bg_hover_color' => '#2d2c52',
				'responsive_header_active_menu_link_color' => '#ffffff',
				// 'responsive_footer_background_color' => '#ffffff',
				// 'responsive_footer_text_color' => '#747474',
				// 'responsive_footer_links_color' => '#3a1d74',
				// 'responsive_footer_links_hover_color' => '#3a1d74',
				'responsive_footer_copyright_text_color' => '#747474',
				'responsive_footer_copyright_text_hover_color' => '#747474',
				'responsive_footer_copyright_links_color' => '#3a1d74',
				'responsive_footer_copyright_links_hovercolor' => '#3a1d74',
				'responsive_content_header_heading_color' => '#ffffff',
				// 'footer_typography_font_size_value' => 18,
				// 'footer_typography[font-size]' => '18px',
				// 'footer_mobile_typography_font_size_value' => 8,
				// 'footer_mobile_typography[font-size]' => '8px',
				'footer_copyright_typography_font_size_value' => 18,
				'footer_copyright_typography[font-size]' => '18px',
				'footer_copyright_mobile_typography_font_size_value' => 8,
				'footer_copyright_mobile_typography[font-size]' => '8px',
				'responsive_footer_bar_layout' => 'vertical',
                'responsive_header_active_menu_background_color' => '#2d2c52',
                'responsive_header_hover_menu_background_color' => '#2d2c52',
                'responsive_header_menu_link_color' => '#ffffff',
                'responsive_header_menu_link_hover_color' => '#ffffff',
                'responsive_menu_item_hover_style' => 'underline',
                'body_typography[font-family]' => "'Libre Franklin', sans-serif",
                'button_typography[font-family]' => "'Libre Franklin', sans-serif",
                'button_typography[font-size]' => '20px',
                'button_typography[font-weight]' => '600',
                'heading_h2_typography[font-weight]' => '500',
                'button_typography_font_size_value' => 20,
                'responsive_footer_bar_top_padding' => 0,
				'responsive_footer_bar_left_padding' => 0,
				'responsive_footer_bar_bottom_padding' => 0,
				'responsive_footer_bar_right_padding' => 0,
                'responsive_footer_bar_tablet_top_padding' => 0,
				'responsive_footer_bar_tablet_left_padding' => 0,
				'responsive_footer_bar_tablet_bottom_padding' => 0,
				'responsive_footer_bar_tablet_right_padding' => 0,
                'responsive_footer_bar_mobile_top_padding' => 0,
				'responsive_footer_bar_mobile_left_padding' => 0,
				'responsive_footer_bar_mobile_bottom_padding' => 0,
				'responsive_footer_bar_mobile_right_padding' => 0,
				'responsive_header_menu_toggle_color' => '#ffffff',
				'responsive_theme_options[twitter_uid]' => '#',
				'responsive_theme_options[facebook_uid]' => '#',
				'responsive_theme_options[instagram_uid]' => '#',
				'responsive_footer_primary_row_bg_color' => '#ffffff',
			),
			'options'     => array(
				'show_on_front' => 'page',
                'page_on_front' => '{{' . self::HOME_SLUG . '}}',
			),
			'posts'       => array(
				self::HOME_SLUG => require RESPONSIVE_THEME_DIR . 'admin/starter-custom-page/responsive-home.php', // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			),
		);
		return apply_filters( 'responsive_home_starter_content', $content );
	}
}