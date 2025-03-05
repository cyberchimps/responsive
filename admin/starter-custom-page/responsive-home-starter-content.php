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

		if ( ! $is_fresh_site ) {
			return;
		}

		// Adding post meta and inserting post.
		add_action( 'wp_insert_post', array( $this,	'register_listener'	), 99, 3 );
		// Save responsiiive settings into database.
		add_action(	'customize_save_after',	array( $this,'save_responsive_settings' ), 10 );
	}

	/**
	 * Register listener to insert post.
	 *
	 * @since 6.1.2
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
			update_post_meta( $post_ID, 'page-sidebar-layout', 'no-sidebar' );
			update_post_meta( $post_ID, 'responsive-is-custom-home-page', true );
		}
	}

	/**
	 *  Save repsonsive customizer settings into database.
	 *
	 * @since 6.1.2
	 */
	public function save_responsive_settings() {
        delete_option( 'responsive_insert_custom_home' );
	}
	/**
	 * Return starter content definition.
	 *
	 * @return mixed|void
	 * @since 6.1.2
	 */
	public function get() {
		$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
		if ( ! Responsive\Core\responsive_check_element_present_in_hfb( 'social', 'header' ) ) {
			array_push( $header_hfb_elements['primary']['primary_right'], 'social' );
		}
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
			'whyus'      => array(
				'title' => __( 'Why us', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::WHY_US_SLUG . '}}',
			),
			'testimonials'  => array(
				'title' => __( 'Testimonials', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::TESTIMONIALS_SLUG . '}}',
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
			),
			'theme_mods'  => array(
				'custom_logo'                                         => '{{logo}}',
				'nav_menu_locations'                                  => array(
    			    'header-menu' => '{{header-menu}}', // Assign the menu to the primary location
    			),
				// Layout & Design
				'responsive_style'                                    => 'flat',
				'responsive_hide_title'                               => true,
				'responsive_page_content_width'                       => 100,
				'responsive_container_width'                          => 1200,
			
				// Header Settings
				'responsive_header_background_color'                  => '#2d2c52',
				'responsive_header_mobile_menu_background_color'      => '#2d2c52',
				'responsive_header_primary_row_bg_color'              => '#2d2c52',
				'responsive_header_primary_row_bg_hover_color'        => '#2d2c52',
				'responsive_header_active_menu_link_color'            => '#ffffff',
				'responsive_header_active_menu_background_color'      => '#2d2c52',
				'responsive_header_hover_menu_background_color'       => '#2d2c52',
				'responsive_header_menu_link_color'                   => '#ffffff',
				'responsive_header_menu_link_hover_color'             => '#ffffff',
				'responsive_header_menu_toggle_color'                 => '#ffffff',
				'responsive_header_social_item_style'                 => 'outline',
				'responsive_header_social_item_color'                 => '#ffffff',
				'responsive_header_social_item_spacing'               => 0,
				'responsive_menu_item_hover_style'                    => 'underline',
				'responsive_header_menu_background_color'             => '#2D2C52',
				'responsive_header_menu_toggle_background_color'      => '#2D2C52',
			
				// Header Primary Row Padding
				'responsive_header_primary_row_padding_right_padding' => 50,
				'responsive_header_primary_row_padding_left_padding'  => 50,
			
				// Footer Settings
				'responsive_footer_copyright_text_color'              => '#747474',
				'responsive_footer_copyright_text_hover_color'        => '#747474',
				'responsive_footer_copyright_links_color'             => '#3a1d74',
				'responsive_footer_copyright_links_hover_color'       => '#3a1d74',
				'responsive_footer_primary_row_bg_color'              => '#ffffff',
				'responsive_footer_primary_columns'                   => 1,
				'responsive_footer_primary_layout'                    => 'full',
				'responsive_footer_bar_layout'                        => 'vertical',
			
				// Footer Bar Padding
				'responsive_footer_bar_top_padding'                   => 0,
				'responsive_footer_bar_left_padding'                  => 0,
				'responsive_footer_bar_bottom_padding'                => 0,
				'responsive_footer_bar_right_padding'                 => 0,
			
				// Footer Tablet Padding
				'responsive_footer_bar_tablet_top_padding'            => 0,
				'responsive_footer_bar_tablet_left_padding'           => 0,
				'responsive_footer_bar_tablet_bottom_padding'         => 0,
				'responsive_footer_bar_tablet_right_padding'          => 0,
			
				// Footer Mobile Padding
				'responsive_footer_bar_mobile_top_padding'            => 0,
				'responsive_footer_bar_mobile_left_padding'           => 0,
				'responsive_footer_bar_mobile_bottom_padding'         => 0,
				'responsive_footer_bar_mobile_right_padding'          => 0,
			
				// Typography
				'body_typography[font-family]'                        => "'Libre Franklin', sans-serif",
				'button_typography[font-family]'                      => "'Libre Franklin', sans-serif",
				'button_typography[font-size]'                        => '22px',
				'button_typography_font_size_value'                   => 22,
				'button_tablet_typography[font-size]'                 => '20px',
				'button_tablet_typography_font_size_value'            => 20,
				'button_typography[font-weight]'                      => '600',
				'heading_h2_typography[font-weight]'                  => '500',
			
				// H1 Typography
				'heading_h1_typography_font_size_value'               => 64,
				'heading_h1_typography[font-size]'                    => '64px',
				'heading_h1_mobile_typography_font_size_value'        => 52,
				'heading_h1_mobile_typography[font-size]'             => '52px',
				'heading_h1_tablet_typography_font_size_value'        => 64,
				'heading_h1_tablet_typography[font-size]'             => '64px',
			
				// H2 Typography
				'heading_h2_typography_font_size_value'                => 52,
				'heading_h2_typography[font-size]'                     => '52px',
				'heading_h2_tablet_typography_font_size_value'         => 32,
				'heading_h2_tablet_typography[font-size]'              => '32px',
				'heading_h2_mobile_typography_font_size_value'         => 24,
				'heading_h2_mobile_typography[font-size]'              => '24px',
			
				// H3 Typography
				'heading_h3_typography_font_size_value'                => 26,
				'heading_h3_typography[font-size]'                     => '26px',
				'heading_h3_tablet_typography_font_size_value'         => 26,
				'heading_h3_tablet_typography[font-size]'              => '26px',
				'heading_h3_mobile_typography_font_size_value'         => 24,
				'heading_h3_mobile_typography[font-size]'              => '24px',
				'heading_h3_typography[font-weight]'                   => '600',

				// H4 Typography
				'heading_h4_typography_font_size_value'                => 52,
				'heading_h4_typography[font-size]'                     => '52px',
				'heading_h4_tablet_typography_font_size_value'         => 32,
				'heading_h4_tablet_typography[font-size]'              => '32px',
				'heading_h4_mobile_typography_font_size_value'         => 24,
				'heading_h4_mobile_typography[font-size]'              => '24px',
				'heading_h4_typography[font-weight]'                   => '700',
			
				// Footer Typography
				'footer_copyright_typography_font_size_value'          => 18,
				'footer_copyright_typography[font-size]'               => '18px',
				'footer_copyright_mobile_typography_font_size_value'   => 8,
				'footer_copyright_mobile_typography[font-size]'        => '8px',
			
				// Colors
				'responsive_h1_text_color'                             => '#ffffff',
				'responsive_h2_text_color'                             => '#200c47',
				'responsive_h3_text_color'                             => '#200c47',
				'responsive_h4_text_color'                             => '#ffffff',
				'responsive_body_text_color'                           => '#1f1f1f',
				'responsive_button_color'                              => '#ffc300',
				'responsive_button_hover_color'                        => '#ffc300',
				'responsive_button_border_color'                       => '#ffc300',
				'responsive_button_hover_border_color'                 => '#ffc300',
				'responsive_button_text_color'                         => '#1c1c1c',
				'responsive_button_hover_text_color'                   => '#1c1c1c',
				'responsive_content_header_heading_color'              => '#ffffff',
			
				// Buttons Radius
				'responsive_buttons_radius_bottom_left_radius'         => 13,
				'responsive_buttons_radius_top_left_radius'            => 13,
				'responsive_buttons_radius_top_right_radius'           => 13,
				'responsive_buttons_radius_bottom_right_radius'        => 13,
			
				// Buttons Tablet Radius
				'responsive_buttons_radius_tablet_top_left_radius'     => 13,
				'responsive_buttons_radius_tablet_top_right_radius'    => 13,
				'responsive_buttons_radius_tablet_bottom_right_radius' => 13,
				'responsive_buttons_radius_tablet_bottom_left_radius'  => 13,

				// Buttons Mobile Radius
				'responsive_buttons_radius_mobile_top_left_radius'     => 10,
				'responsive_buttons_radius_mobile_top_right_radius'    => 10,
				'responsive_buttons_radius_mobile_bottom_right_radius' => 10,
				'responsive_buttons_radius_mobile_bottom_left_radius'  => 10,
			
				// Buttons Padding
				'responsive_buttons_top_padding'                       => 22,
				'responsive_buttons_left_padding'                      => 27,
				'responsive_buttons_bottom_padding'                    => 22,
				'responsive_buttons_right_padding'                     => 27,
			
				// Buttons Tablet Padding
				'responsive_buttons_tablet_top_padding'                => 22,
				'responsive_buttons_tablet_right_padding'              => 27,
				'responsive_buttons_tablet_bottom_padding'             => 22,
				'responsive_buttons_tablet_left_padding'               => 27,

				// Buttons Mobile Padding
				'responsive_buttons_mobile_top_padding'                => 20,
				'responsive_buttons_mobile_right_padding'              => 20,
				'responsive_buttons_mobile_bottom_padding'             => 20,
				'responsive_buttons_mobile_left_padding'               => 20,
			
				// Social Media Links
				'responsive_theme_options[twitter_uid]'                => '#',
				'responsive_theme_options[facebook_uid]'               => '#',
				'responsive_theme_options[instagram_uid]'              => '#',
			
				// Header Builder Elements
				'responsive_header_desktop_items'               	   => $header_hfb_elements,
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