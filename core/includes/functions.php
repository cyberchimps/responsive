<?php
/**
 * Theme's Functions and Definitions
 *
 * @file           functions.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2.1
 * @filesource     wp-content/themes/responsive/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */

namespace Responsive\Core;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require get_template_directory() . '/core/includes/page-custom-meta.php';
// Load the template hooks.
require get_template_directory() . '/core/includes/template-hooks.php';

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'customize_register', $n( 'responsive_load_customize_controls' ) );
	add_action( 'after_setup_theme', $n( 'responsive_setup' ) );
	add_action( 'template_redirect', $n( 'responsive_content_width' ) );
	add_action( 'wp_enqueue_scripts', $n( 'responsive_css' ) );
	add_action( 'wp_enqueue_scripts', $n( 'responsive_js' ) );
	add_action( 'add_meta_boxes', $n( 'responsive_team_add_meta_box' ) );
	add_action( 'save_post', $n( 'responsive_team_meta_box_save' ) );
	add_action( 'wp_enqueue_scripts', $n( 'responsive_enqueue_comment_reply' ) );
	add_action( 'wp_enqueue_scripts', $n( 'responsive_enqueue_scrolltotop' ) );
	add_action( 'widgets_init', $n( 'responsive_register_widgets' ) );
	add_filter( 'pre_update_option_show_on_front', $n( 'responsive_front_page_override' ), 10, 2 );
	add_filter( 'body_class', $n( 'responsive_add_class' ), 999 );
	add_filter( 'body_class', $n( 'responsive_add_custom_body_classes' ), 999 );
	add_filter( 'get_custom_logo', $n( 'responsive_transparent_custom_logo', 10, 1 ) );

	if ( ! class_exists( 'Responsive_Addons_Pro_Public' ) && !responsive_is_user_pro()) {
		add_action( 'customize_controls_print_footer_scripts', $n( 'responsive_add_pro_button' ) );
	}
	// Add Fragment Support.
	add_filter( 'woocommerce_add_to_cart_fragments', $n( 'responsive_get_refreshed_fragments_number'), 11 );
	add_action( 'responsive_header_woo_cart_label_markup', $n( 'responsive_woo_cart_label_markup' ), 10 );

	require_once trailingslashit( get_template_directory() ) . '/core/includes/theme-updates/class-responsive-theme-background-updater.php';
}

/*
 * Globalize Theme options
 */
$responsive_options = responsive_get_options();

/** Function to load controls */
function responsive_load_customize_controls() {

	require_once trailingslashit( get_template_directory() ) . 'core/includes/customizer/class-responsive-customize-control-checkbox-multiple.php';
	require_once trailingslashit( get_template_directory() ) . 'core/includes/customizer/controls/builder-layout/class-responsive-customizer-builder-header-blank-control.php';
}

/**
 * Retrieve Theme option settings
 */
function responsive_get_options() {
	/** Globalize the variable that holds the Theme options */
	global $responsive_options;
	/** Parse array of option defaults against user-configured Theme options */
	$responsive_options = wp_parse_args( get_option( 'responsive_theme_options', array() ), responsive_get_option_defaults() );

	/** Return parsed args array */
	return $responsive_options;
}

/**
 * Responsive Theme option defaults
 */
function responsive_get_option_defaults() {
	$defaults = array(
		'featured_images'                 => false,
		'breadcrumb'                      => false,
		'cta_button'                      => false,
		'minified_css'                    => false,
		'front_page'                      => 0,
		'home_headline'                   => __( 'HAPPINESS', 'responsive' ),
		'home_subheadline'                => __( 'IS A WARM CUP', 'responsive' ),
		'home_content_area'               => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ),
		'cta_text'                        => __( 'Call to Action', 'responsive' ),
		'cta_url'                         => '#nogo',
		'featured_content'                => null,
		'testimonials'                    => 0,
		'testimonial_title'               => null,
		'google_site_verification'        => '',
		'bing_site_verification'          => '',
		'yahoo_site_verification'         => '',
		'site_statistics_tracker'         => '',
		'twitter_uid'                     => '',
		'facebook_uid'                    => '',
		'linkedin_uid'                    => '',
		'youtube_uid'                     => '',
		'stumble_uid'                     => '',
		'rss_uid'                         => '',
		'google_plus_uid'                 => '',
		'instagram_uid'                   => '',
		'pinterest_uid'                   => '',
		'yelp_uid'                        => '',
		'vimeo_uid'                       => '',
		'foursquare_uid'                  => '',
		'email_uid'                       => '',
		'testimonial_val'                 => null,
		'teammember1'                     => null,
		'teammember2'                     => null,
		'teammember3'                     => null,
		'feature1'                        => null,
		'feature2'                        => null,
		'feature3'                        => null,
		'responsive_inline_css'           => '',
		'responsive_inline_js_head'       => '',
		'responsive_inline_js_footer'     => '',
		'responsive_inline_css_js_footer' => '',
		'static_page_layout_default'      => 'default',
		'single_post_layout_default'      => 'default',
		'blog_posts_index_layout_default' => 'default',
		'site_layout_option'              => 'boxed',
		'button_style'                    => 'default',
		'home-widgets'                    => false,
		'site_footer_option'              => 'footer-3-col',
		'res_hide_site_title'             => false,
		'res_hide_tagline'                => true,
		'theme_version'                   => RESPONSIVE_THEME_VERSION,
	);

	return apply_filters( 'responsive_option_defaults', $defaults );
}

/**
 * Fire up the engines boys and girls let's start theme setup.
 */
if ( ! function_exists( 'responsive_setup' ) ) :
	/** Function to setup */
	function responsive_setup() {

		global $content_width;
		global $responsive_options;

		$template_directory = get_template_directory();

		/**
		 * Global content width.
		 */
		if ( ! isset( $content_width ) ) {
			$content_width = 605;
		}

		/** WordPress V4.7 or greater */
		if ( function_exists( 'wp_update_custom_css_post' ) ) {
			$responsive_custom_css = isset( $responsive_options['responsive_inline_css'] ) ? $responsive_options['responsive_inline_css'] : '';

			if ( $responsive_custom_css ) {
				$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
				$return   = wp_update_custom_css_post( $core_css . $responsive_custom_css );
				if ( ! is_wp_error( $return ) ) {

					/** Set css to blank */
						$responsive_options['responsive_inline_css'] = '';
						update_option( 'responsive_theme_options', $responsive_options );
				}
			}
		}

		/**
		 * Responsive is now available for translations.
		 * The translation files are in the /languages/ directory.
		 * Translations are pulled from the WordPress default lanaguge folder
		 * then from the child theme and then lastly from the parent theme.
		 *
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
		 */

		$domain = 'responsive';

		load_theme_textdomain( $domain, WP_LANG_DIR . '/responsive/' );
		load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages/' );
		load_theme_textdomain( $domain, get_template_directory() . '/languages/' );

		/**
		 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
		 *
		 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
		 */
		add_editor_style();

		/**
		 * This feature enables post and comment RSS feed links to head.
		 *
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * This feature enables post-thumbnail support for a theme.
		 *
		 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'yoast-seo-breadcrumbs' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/**
		 * This feature enables woocommerce support for a theme.
		 *
		 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
		 */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/**
		 * This feature enables custom-menus support for a theme.
		 *
		 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu', 'responsive' ),
				'secondary-menu' => __( 'Secondary Menu', 'responsive' ),
				'footer-menu' => __( 'Footer Menu', 'responsive' ),
			)
		);
		
		/* WP-6540 - This part is commented out as it was overlaying the background image 
		it was causing a bug when updating from 5.1.2 to 6.0.1, */
		// add_theme_support( 'custom-background' );

		add_theme_support(
			'custom-header',
			array(
				// Header text display default.
				'header-text'         => false,
				// Header image flex width.
				'flex-width'          => true,
				// Header image width (in pixels).
				'width'               => 300,
				// Header image flex height.
				'flex-height'         => true,
				// Header image height (in pixels).
				'height'              => 100,
				// Admin header style callback.
				'admin-head-callback' => 'responsive_admin_header_style',
			)
		);

		// Custom logo.
		$responsive_logo_width  = 300;
		$responsive_logo_height = 100;

		// If the retina setting is active, double the recommended width and height.
		if ( get_theme_mod( 'responsive_retina_logo', 0 ) ) {
			$responsive_logo_width  = floor( $responsive_logo_width * 2 );
			$responsive_logo_height = floor( $responsive_logo_height * 2 );
		}

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'              => $responsive_logo_height,
				'width'               => $responsive_logo_width,
				'flex-width'          => true,
				'flex-height'         => true,
				'admin-head-callback' => 'responsive_admin_header_style',
			)
		);
		/** Gets included in the admin header */
		function responsive_admin_header_style() {
			?>
			<style type="text/css">
				.appearance_page_custom-header #headimg {
					background-repeat: no-repeat;
					border: none;
				}
			</style>
			<?php
		}

		// While upgrading set theme option front page toggle not to affect old setup.
		$responsive_options = get_option( 'responsive_theme_options' );
		if ( $responsive_options && isset( $_GET['activated'] ) ) {

			// If front_page is not in theme option previously then set it.
			if ( ! isset( $responsive_options['front_page'] ) ) {

				/** Get template of page which is set as static front page */
				$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );

				/** If static front page template is set to default then set front page toggle of theme option to 1 */
				if ( 'page' === get_option( 'show_on_front' ) && 'default' === $template ) {
					$responsive_options['front_page'] = 1;
				} else {
					$responsive_options['front_page'] = 0;
				}
				update_option( 'responsive_theme_options', $responsive_options );
			}
		}

		responsive_background_images_backward_compatibility();
		responsive_font_sizes_backward_compatibility();
		responsive_border_width_backward_compatibility();

		if ( ! get_option( 'responsive_header_menu_background_color_backward_compatibility_v2' ) ) {
			responsive_header_menu_background_color_backward_compatibility();
            update_option( 'responsive_header_menu_background_color_backward_compatibility_v2', true );
		}
		if ( ! get_option( 'responsive_header_footer_builder_compatibility_header_widgets' ) ) {
			if ( 1 === get_theme_mod( 'responsive_enable_header_widget', 1 ) ) {
				if ( is_active_sidebar( 'header-widgets' ) ) {
					responsive_header_footer_builder_compatibility_header_widgets();
				}
			}
			update_option( 'responsive_header_footer_builder_compatibility_header_widgets', true );
		}
		if( ! get_option( 'responsive_old_header_footer_comaptibility_with_header_builder_done' ) ) {
			responsive_old_header_footer_comaptibility_with_hfb();
			update_option( 'responsive_old_header_footer_comaptibility_with_header_builder_done', true );
		}
		if( ! get_option( 'responsive_old_woo_cart_comaptibility_with_header_builder_woo_cart' ) ) {
			responsive_old_woo_cart_comaptibility_with_header_builder_woo_cart();
			update_option( 'responsive_old_woo_cart_comaptibility_with_header_builder_woo_cart', true );
		}
		if ( ! get_option( 'responsive_old_header_search_compatibility_with_hfb_header_search' ) ) {
			responsive_old_header_search_compatibility_with_hfb_header_search_element();
            update_option( 'responsive_old_header_search_compatibility_with_hfb_header_search', true );
		}
		if ( ! get_option( 'responsive_footer_rows_inner_column_spacing_compatibility_with_new_control' ) ) {
			responsive_footer_rows_inner_column_spacing_backward_compatibility();
            update_option( 'responsive_footer_rows_inner_column_spacing_compatibility_with_new_control', true );
		}
		if ( ! get_option( 'responsive_footer_widgets_padding_backward_compatibility' ) ) {
			responsive_footer_widgets_padding_backward_compatibility();
            update_option( 'responsive_footer_widgets_padding_backward_compatibility', true );
		}

		responsive_site_backwardcompatibility_with_new_blog_frontend_layout();
	}

endif;

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 */
function responsive_content_width() {
	global $content_width;
	$full_width = is_page_template( 'full-width-page.php' ) || is_404() || 'full-width-page' === responsive_get_layout();
	if ( $full_width ) {
		$content_width = 918;
	}
}

/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */
if ( ! function_exists( 'responsive_css' ) ) {

	/**
	 * [responsive_css description]
	 *
	 * @return void [description]
	 */
	function responsive_css() {
		$theme              = wp_get_theme();
		$responsive         = wp_get_theme( 'responsive' );
		$responsive_options = responsive_get_options();
		$suffix             = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		if ( is_rtl() ) {
			$suffix = '-rtl' . $suffix;
		}

		// If plugin - 'Sensei' is active.
		if ( class_exists( 'Sensei_Main' ) ) {
			wp_enqueue_style( 'responsive-sensei_content', get_template_directory_uri() . "/core/css/sensei_content{$suffix}.css", false, $responsive['Version'] );
		}
		

		wp_enqueue_style( 'responsive-style', get_template_directory_uri() . "/core/css/content.min.css", false, $responsive['Version'] );
		wp_enqueue_style( 'wordpress-core-style', get_template_directory_uri() . "/core/css/wordpress.min.css", false, $responsive['Version'] );
		wp_enqueue_style( 'gutenberg-front-style', get_template_directory_uri() . "/core/css/gutenberg-front.min.css", false, $responsive['Version'] );
		if ( is_home() || is_archive() || is_search() || is_category() || is_tag() ) {
			wp_enqueue_style(
				'blog-archive-style',
				get_template_directory_uri() . '/core/css/blog.min.css',
				false,
				$responsive['Version']
			);
		}
		wp_enqueue_style( 'header-mixin-style', get_template_directory_uri() . "/core/css/header_mixin_pro.min.css", false, $responsive['Version'] );
		
		wp_add_inline_style( 'responsive-style', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
		wp_enqueue_style( 'icomoon-style', get_template_directory_uri() . "/core/css/icomoon/style{$suffix}.css", false, $responsive['Version'] );

		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			wp_enqueue_style(
				'woocommerce-style',
				get_template_directory_uri() . '/core/css/woocommerce-pro.min.css',
				false,
				$responsive['Version']
			);
		}
		// If plugin - 'WooCommerce' is active.
		if ( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_style( 'responsive-woocommerce-style', get_template_directory_uri() . "/core/css/woocommerce{$suffix}.css", false, $responsive['Version'] );
		}
	}
}

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
if ( ! function_exists( 'responsive_js' ) ) {
	/** Function to load Js */
	function responsive_js() {
		$suffix                 = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		$directory              = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? 'js-dev' : 'js';
		$template_directory_uri = get_template_directory_uri();

		wp_enqueue_script( 'navigation-scripts', $template_directory_uri . '/core/' . $directory . '/navigation' . $suffix . '.js', array(), RESPONSIVE_THEME_VERSION, true );
		
		// enqueue searchform script only when search element is present in builder.
		if ( responsive_check_element_present_in_hfb( 'search', 'header' ) ) {
			wp_enqueue_script( 'searchform-script', $template_directory_uri . '/core/' . $directory . '/searchform' . $suffix . '.js', array(), RESPONSIVE_THEME_VERSION, true );
		}

		$mobile_menu_breakpoint = array( 'mobileBreakpoint' => get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );
		wp_localize_script( 'navigation-scripts', 'responsive_breakpoint', $mobile_menu_breakpoint );
		if ( responsive_check_element_present_in_hfb( 'primary_navigation', 'header' ) ) {
			wp_enqueue_script( 'responsive_theme_nested_menus', $template_directory_uri . '/core/' . $directory . '/nested-menus' . $suffix . '.js', array('customize-preview'), RESPONSIVE_THEME_VERSION, true );
		}

	}
}

/** Function for team section options */
function responsive_team_add_meta_box() {
	global $post;

	add_meta_box( 'responsive_team_meta_box', __( 'Team Section Options', 'responsive' ), 'responsive_team_meta_box_cb', 'post', 'normal', 'high' );
}
/** Function for team meta box */
function responsive_team_meta_box_cb() {
	global $post;
	$values                          = get_post_custom( $post->ID );
	$responsive_meta_box_designation = isset( $values['responsive_meta_box_designation'] ) ? $values['responsive_meta_box_designation'][0] : '';
	$responsive_meta_box_facebook    = isset( $values['responsive_meta_box_facebook'] ) ? $values['responsive_meta_box_facebook'][0] : '';
	$responsive_meta_box_twitter     = isset( $values['responsive_meta_box_twitter'] ) ? $values['responsive_meta_box_twitter'][0] : '';
	$responsive_meta_box_googleplus  = isset( $values['responsive_meta_box_googleplus'] ) ? $values['responsive_meta_box_googleplus'][0] : '';
	$responsive_meta_box_linkedin    = isset( $values['responsive_meta_box_text_linkedin'] ) ? $values['responsive_meta_box_text_linkedin'][0] : '';

	wp_nonce_field( 'responsive_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p><?php echo esc_html( __( "To use this post for front page's team section, please enter below details:", 'responsive' ) ); ?>
	</p>
	<p>
		<label for="responsive_meta_box_designation"><?php echo esc_html( __( 'Member designation', 'responsive' ) ); ?></label>
		<input type="text" name="responsive_meta_box_designation" id="responsive_meta_box_designationion" value="<?php echo esc_attr( $responsive_meta_box_designation ); ?>" />
	</p>
	<p>
		<label for="responsive_meta_box_facebook"><?php echo esc_html( __( 'Facebook Link', 'responsive' ) ); ?></label>
		<input type="text" name="responsive_meta_box_facebook" id="responsive_meta_box_facebook" value="<?php echo esc_attr( $responsive_meta_box_facebook ); ?>" />
	</p>
	<p>
		<label for="responsive_meta_box_twitter"><?php echo esc_html( __( 'Twitter Link', 'responsive' ) ); ?></label>
		<input type="text" name="responsive_meta_box_twitter" id="responsive_meta_box_twitter" value="<?php echo esc_attr( $responsive_meta_box_twitter ); ?>" />
	</p>
	<p>
		<label for="responsive_meta_box_googleplus"><?php echo esc_html( __( 'GooglePlus Link', 'responsive' ) ); ?></label>
		<input type="text" name="responsive_meta_box_googleplus" id="responsive_meta_box_googleplus" value="<?php echo esc_attr( $responsive_meta_box_googleplus ); ?>" />
	</p>
	<p>
		<label for="responsive_meta_box_text_linkedin"><?php echo esc_html( __( 'LinkedIn Link', 'responsive' ) ); ?></label>
		<input type="text" name="responsive_meta_box_text_linkedin" id="responsive_meta_box_text_linkedin" value="<?php echo esc_attr( $responsive_meta_box_linkedin ); ?>" />
	</p>

	<?php
}

/**
 * Save team member meta data
 *
 * @param int $post_id Post id.
 */
function responsive_team_meta_box_save( $post_id ) {
	$allowed = array(
		'a' => array(
			/** On allow a tags */
			'href' => array(), /** And those anchors can only have href attribute */
		),
	);

	if ( isset( $_POST['responsive_meta_box_designation'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_designation', wp_verify_nonce( wp_kses( wp_unslash( $_POST['responsive_meta_box_designation'] ), $allowed ) ) );
	}
	if ( isset( $_POST['responsive_meta_box_facebook'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_facebook', wp_verify_nonce( wp_kses( wp_unslash( $_POST['responsive_meta_box_facebook'] ), $allowed ) ) );
	}
	if ( isset( $_POST['responsive_meta_box_twitter'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_twitter', wp_verify_nonce( wp_kses( wp_unslash( $_POST['responsive_meta_box_twitter'] ), $allowed ) ) );
	}
	if ( isset( $_POST['responsive_meta_box_googleplus'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_googleplus', wp_verify_nonce( wp_kses( wp_unslash( $_POST['responsive_meta_box_googleplus'] ), $allowed ) ) );
	}
	if ( isset( $_POST['responsive_meta_box_text_linkedin'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_text_linkedin', wp_verify_nonce( wp_kses( wp_unslash( $_POST['responsive_meta_box_text_linkedin'] ), $allowed ) ) );
	}
}


/**
 * A comment reply.
 */
function responsive_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/*
 * Function enqueues scroll-to-top JS file
 */
function responsive_enqueue_scrolltotop() {
	if ( responsive_check_element_present_in_hfb( 'scroll_to_top', 'footer' ) ) {
        // Enqueue scroll-to-top JS file.
		wp_enqueue_script( 'responsive_theme_scroll-to-top', get_template_directory_uri() . '/core/includes/customizer/assets/js/scroll-to-top.js', array(), RESPONSIVE_THEME_VERSION, true );
	}
}

/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 *
 * @param int $new New Page.
 * @param int $orig Original Page.
 */

function responsive_front_page_override( $new, $orig ) {
	global $responsive_options;

	if ( $orig !== $new ) {
		$responsive_options['front_page'] = 0;

		update_option( 'responsive_theme_options', $responsive_options );
	}

	return $new;
}

/**
 * Funtion to add CSS class to body
 *
 * @param array $classes html classes.
 */
function responsive_add_class( $classes ) {

	// Get Responsive theme option.
	global $responsive_options;
	if ( 1 == $responsive_options['front_page'] && is_front_page() ) {
		$classes[] = 'front-page';
	}

	return $classes;
}

/**
 * [responsive_add_custom_body_classes Funtion to add CSS class to body].
 *
 * @param [type] $classes [description].
 */
function responsive_add_custom_body_classes( $classes ) {

	// Adds element order class.
	// $elements = get_theme_mod(
	// 	'responsive_header_elements',
	// 	array(
	// 		'site-branding',
	// 		'main-navigation',
	// 	)
	// );

	// $classes[] = 'site-header-' . implode( '-', $elements );

	
	if ( responsive_check_element_present_in_hfb( 'primary_navigation', 'header' ) ) {
		$classes[] = 'site-header-main-navigation';
	}

	$classes[] = 'responsive-site-' . get_theme_mod( 'responsive_width', 'contained' );

	if ( is_page() ) {
		$site_style = get_post_meta( get_the_ID(), 'responsive_page_meta_layout_style', true );
		$site_style = $site_style ? $site_style : get_theme_mod( 'responsive_style', 'boxed' );
		$classes[]  = 'responsive-site-style-' . $site_style;

	} else {
		$classes[] = 'responsive-site-style-' . get_theme_mod( 'responsive_style', 'boxed' );
	}

	$search_screen = get_theme_mod( 'search_style', 'search' );
	if ( 'full-screen' == $search_screen ) {
		$classes[] = 'full-screen';
	}

	// Header width.
	if ( get_theme_mod( 'responsive_header_full_width', 0 ) && 'contained' === get_theme_mod( 'responsive_width', 'contained' ) ) {
		$classes[] = 'header-full-width';
	}
	// Transparent Header.
	if ( responsive_is_transparent_header() ) {
		$classes[] = 'res-transparent-header';
	}
	// Header Element layout class.
	// $classes[] = 'site-header-layout-' . get_theme_mod( 'responsive_header_layout', get_responsive_customizer_defaults( 'responsive_header_layout' ) );
	// Header alignment class.
	// $classes[] = 'site-header-alignment-' . get_theme_mod( 'responsive_header_alignment', get_responsive_customizer_defaults( 'responsive_header_alignment' ) );
	// Mobile Header Element layout class.
	// $classes[] = 'site-mobile-header-layout-' . get_theme_mod( 'responsive_mobile_header_layout', 'horizontal' );
	// Mobile Header alignment class.
	// $classes[] = 'site-mobile-header-alignment-' . get_theme_mod( 'responsive_mobile_header_alignment', 'center' );

	// if ( get_theme_mod( 'responsive_enable_header_widget', 1 ) ) {
	// 	// Header Widget Aligmnmnet.
	// 	$classes[] = 'header-widget-alignment-' . get_theme_mod( 'responsive_header_widget_alignment', 'spread' );
	// 	// Header Widget POsition.
	// 	$classes[] = 'header-widget-position-' . get_theme_mod( 'responsive_header_widget_position', 'top' );
	// }

	// Header width.
	if ( get_theme_mod( 'responsive_inline_logo_site_title', 0 ) ) {
		$classes[] = 'inline-logo-site-title';
	}

	// Full idth menu class.
	if ( get_theme_mod( 'responsive_header_menu_full_width', 0 ) ) {
		$classes[] = 'site-header-full-width-main-navigation';
	}
	// if ( get_theme_mod( 'responsive_last_item_floating', 0 ) ) {
	// 	$classes[] = 'last-item-spread-away';
	// }
	if ( 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) {
		$classes[] = 'mobile-menu-style-sidebar';
	}
	// Content Header Alignment class.
	$classes[] = 'site-content-header-alignment-' . get_theme_mod( 'responsive_content_header_alignment', get_responsive_customizer_defaults( 'breadcrumb_alignment' ) );

	// Custom Homepage Class class.
	$responsive_options = responsive_get_options();
	if ( is_front_page() && $responsive_options['front_page'] ) {
		$classes[] = 'custom-home-page-active';
	}

	if ( is_page() ) {

		if ( class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() || is_product_category() ) ) {

			// Do not Add Class.
			$classes[] = '';

		} else {

			$sidebar_position = get_post_meta( get_the_ID(), 'responsive_page_meta_sidebar_position', true );
			$sidebar_position = $sidebar_position ? $sidebar_position : get_theme_mod( 'responsive_page_sidebar_position', 'right' );
			// Page sidebar Position.
			$classes[] = 'sidebar-position-' . $sidebar_position;
			// Page Featured Image Aligmnmnet.
			$classes[] = 'featured-image-alignment-' . get_theme_mod( 'responsive_page_featured_image_alignment', 'left' );
			// Page Title Aligmnmnet.
			$classes[] = 'title-alignment-' . get_theme_mod( 'responsive_page_title_alignment', 'left' );
			// Page Content Aligmnmnet.
			$classes[] = 'content-alignment-' . get_theme_mod( 'responsive_page_content_alignment', 'left' );

		}
		if ( is_page_template( array( 'full-width-page.php', 'gutenberg-fullwidth.php' ) ) ) {
			// Page sidebar Position.
			$classes[] = 'sidebar-position-no';
		}
	} elseif ( is_single() ) {

		if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() ) ) {

			// Do not Add Class.
			$classes[] = '';

		} else {

			// Single Blog sidebar Position.
			$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_single_blog_sidebar_position', 'right' );
			// Single Blog Featured Image Aligmnmnet.
			$classes[] = 'featured-image-alignment-' . get_theme_mod( 'responsive_single_blog_featured_image_alignment', 'left' );
			// Single Blog Title Aligmnmnet.
			$classes[] = 'title-alignment-' . get_theme_mod( 'responsive_single_blog_title_alignment', 'left' );
			// Single Blog Meta Aligmnmnet.
			$classes[] = 'meta-alignment-' . get_theme_mod( 'responsive_single_blog_meta_alignment', 'left' );
			// Single Blog Content Aligmnmnet.
			$classes[] = 'content-alignment-' . get_theme_mod( 'responsive_single_blog_content_alignment', 'left' );

		}
	} else {
		if ( class_exists( 'Sensei_Main' ) ) {
			$classes[] = 'sensei-courses-columns-' . get_theme_mod( 'responsive_sensei_courses_per_row', 3 );
		}
		if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() ) ) {

			// Do not Add Class.
			$classes[] = '';

		} else {

			// Blog Entry Read More Type.
			$classes[] = 'read-more-' . get_theme_mod( 'responsive_blog_entry_read_more_type', 'link' );
			// Entry Blog Featured Image Aligmnmnet.
			$classes[] = 'featured-image-alignment-' . get_theme_mod( 'responsive_blog_entry_featured_image_alignment', 'left' );
			// Entry Blog Title Aligmnmnet.
			$classes[] = 'title-alignment-' . get_theme_mod( 'responsive_blog_entry_title_alignment', get_responsive_customizer_defaults( 'blog_entry_title_alignment' ) );
			// Entry Blog Meta Aligmnmnet.
			$classes[] = 'meta-alignment-' . get_theme_mod( 'responsive_blog_entry_meta_alignment', get_responsive_customizer_defaults( 'blog_entry_meta_alignment' ) );
			// Entry Blog Content Aligmnmnet.
			$classes[] = 'content-alignment-' . get_theme_mod( 'responsive_blog_entry_content_alignment', 'left' );
			// Entry Blog Columns.
			$masonry   = ( 1 === get_theme_mod( 'responsive_blog_entry_display_masonry', 0 ) ) ? '-masonry' : '';
			if ( get_theme_mod( 'responsive_blog_layout', 'grid' ) === 'grid' ) {
				$classes[] = 'blog-entry-columns-' . get_theme_mod( 'responsive_blog_entry_columns', get_responsive_customizer_defaults( 'entry_columns' ) ) . $masonry;
			}
			// Entry Blog sidebar Position.
			$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_blog_sidebar_position', get_responsive_customizer_defaults( 'blog_sidebar_position' ) );

		}
	}

	// Footer width.
	// if ( get_theme_mod( 'responsive_footer_full_width', 0 ) && 'contained' === get_theme_mod( 'responsive_width', 'contained' ) ) {
	// 	$classes[] = 'footer-full-width';
	// }
	// Footer Element layout class.
	$classes[] = 'footer-bar-layout-' . get_theme_mod( 'responsive_footer_bar_layout', 'horizontal' );
	// Footer Widget columns class.
	$classes[] = 'footer-widgets-columns-' . get_theme_mod( 'responsive_footer_widgets_columns', 0 );

	// Scroll To Top Device class.
	$classes[] = 'scroll-to-top-device-' . get_theme_mod( 'responsive_scroll_to_top_on_devices', 'both' );
	// Scroll To Top Aligmnment class.
	$classes[] = 'scroll-to-top-aligmnment-' . get_theme_mod( 'responsive_scroll_to_top_icon_aligmnment', 'right' );

	// Blog/Archive layout classes.
	if (
		( version_compare( RESPONSIVE_THEME_VERSION, '4.9.9', '<' ) && class_exists( 'Responsive_Addons_Pro' ) ) ||
		( version_compare( RESPONSIVE_THEME_VERSION, '4.9.8', '>' ) )
	) {
		if ( ! is_front_page() || is_home() ) {
			if ( get_theme_mod( 'responsive_blog_entry_columns' ) ) {
				$blog_entry_columns_count = esc_html( get_theme_mod( 'responsive_blog_entry_columns' ) );
			} else {
				$blog_entry_columns_count = 1;
			}

			if ( get_theme_mod( 'responsive_blog_layout_options' ) ) {
				if ( 'blog-layout-1' === get_theme_mod( 'responsive_blog_layout_options' ) ) {
					$classes[] = 'standard-blog-layout';
				} elseif ( 'blog-layout-2' === get_theme_mod( 'responsive_blog_layout_options' ) && get_theme_mod( 'responsive_blog_layout' ) === 'list' ) {
					$classes[] = 'blog-layout-two';
				} elseif ( 'blog-layout-3' === get_theme_mod( 'responsive_blog_layout_options' ) && get_theme_mod( 'responsive_blog_layout'  ) === 'list' ) {
					$classes[] = 'blog-layout-three';
				}
			}
		}
	}

	// Menu Item Hover Style Classes.
	if ( get_theme_mod( 'responsive_menu_item_hover_style', 'none' ) ) {
		$menu_item_hover_style_chosen_option = get_theme_mod( 'responsive_menu_item_hover_style', 'none' );
		if ( 'none' === $menu_item_hover_style_chosen_option ) {
			$classes[] = 'menu-item-hover-style-none';
		} elseif ( 'zoom' === $menu_item_hover_style_chosen_option ) {
			$classes[] = 'menu-item-hover-style-zoom';
		} elseif ( 'underline' === $menu_item_hover_style_chosen_option ) {
			$classes[] = 'menu-item-hover-style-underline';
		} elseif ( 'overline' === $menu_item_hover_style_chosen_option ) {
			$classes[] = 'menu-item-hover-style-overline';
		}
	}
	
	//---------------------------------------------------------------------
	//******************* Classes for secodary menu ***********************
	//---------------------------------------------------------------------
	
	$elements = array('secondary-navigation');
	
	$classes[] = 'site-header-' . implode( '-', $elements );
	
	// Secondary Menu Item Hover Style Classes.
	if ( get_theme_mod( 'responsive_secondary_menu_item_hover_style', 'none' ) ) {
		$secondary_menu_item_hover_style_chosen_option = get_theme_mod( 'responsive_secondary_menu_item_hover_style', 'none' );
		if ( 'none' === $secondary_menu_item_hover_style_chosen_option ) {
			$classes[] = 'secondary-menu-item-hover-style-none';
		} elseif ( 'zoom' === $secondary_menu_item_hover_style_chosen_option ) {
			$classes[] = 'secondary-menu-item-hover-style-zoom';
		} elseif ( 'underline' === $secondary_menu_item_hover_style_chosen_option ) {
			$classes[] = 'secondary-menu-item-hover-style-underline';
		} elseif ( 'overline' === $secondary_menu_item_hover_style_chosen_option ) {
			$classes[] = 'secondary-menu-item-hover-style-overline';
		}
	}

	if ( get_theme_mod( 'responsive_site_background_image_toggle' ) && get_theme_mod( 'responsive_site_background_image' ) || get_theme_mod( 'responsive_site_background_color' ) ) {
		$classes[] = 'custom-background';
	}
	
	return $classes;
}

/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution
 */
if ( ! function_exists( 'responsive_post_meta_data' ) ) {

	/**
	 * Prints meta data
	 */
	function responsive_post_meta_data() {
		?>
		<span class="entry-author" <?php responsive_schema_markup( 'entry-author' ); ?>>
			<?php
				printf(
					'<i class="icon-calendar" aria-hidden="true"></i><span class="%1$s">' . esc_html_e( 'Posted on', 'responsive' ) . '</span>%2$s<span class="%3$s"> ' . esc_html_e( 'By', 'responsive' ) . ' </span>%4$s',
					'meta-prep meta-prep-author posted',
					sprintf(
						'<a href="%1$s" aria-label="%2$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s">%4$s</time></a>',
						esc_url( get_permalink() ),
						esc_attr( get_the_title() ),
						esc_html( get_the_date( 'c' ) ),
						esc_html( get_the_date() )
					),
					'byline',
					sprintf(
						'<span class="author vcard">
							<a class="url fn n" href="%1$s" aria-label="%2$s" title="%2$s" itemprop="url">
								<i class="icon-user"></i>
								<span itemprop="name">%3$s</span>
							</a>
						</span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						/* translators: %s: view post by */
						esc_attr( sprintf( __( 'View all posts by %s', 'responsive' ), get_the_author() ) ),
						esc_attr( wp_kses_post( get_the_author() ) )
					)
				);
			?>
		</span>

		<span class="entry-category">
			<span class='posted-in'><i class="icon-folder-open" aria-hidden="true"></i>
				<?php
				/* translators: %s: category list */
				printf( esc_html__( 'Posted in %s', 'responsive' ), wp_kses_post( get_the_category_list( __( ', ', 'responsive' ) ) ) );
				?>
			</span>
		</span>

		<?php
	}
}

/**
 * Add Upgrade to pro button
 */
function responsive_add_pro_button() {
	$upgrade_link = esc_url_raw( 'https://cyberchimps.com/pricing/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=cstmzer&utm_content=upgrade-to-pro' );
	?>
<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			jQuery( '#customize-info .accordion-section-title' ).append( '<a target="_blank" class="button btn-upgrade" href="<?php echo esc_url( $upgrade_link ); ?>"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>' );
			jQuery( '#customize-info .btn-upgrade' ).click( function( event ) {
				event.stopPropagation();
			} );
		} );

	jQuery(document).ready(function($) {
	var sectionTitle = $('#accordion-section-responsive_upsell_section .accordion-section-title');	
	if (sectionTitle.length) {
		sectionTitle.click(function(event) {
			event.preventDefault(); // Prevent the default behavior
			window.open('https://cyberchimps.com/pricing/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=cstmzer&utm_content=view-pro-features', '_blank'); // Open in a new tab
		});
	}
});

	</script>
	<style>
		.wp-core-ui .btn-upgrade {
			color: #fff;
			background: none repeat scroll 0 0 #5BC0DE;
			border-color: #CCCCCC;
			box-shadow: 0 1px 0 #5BC0DE inset, 0 1px 0 rgba(0, 0, 0, 0.08);
			float: right;
			margin-top: 15px;
			font-size: 14px;
			height: 30px;
			margin-bottom: 15px;

		}
		.wp-core-ui .btn-upgrade:hover {
			color: #fff;
			background: none repeat scroll 0 0 #39B3D7;
			box-shadow: 0 1px 0 #39B3D7 inset, 0 1px 0 rgba(0, 0, 0, 0.08);
		}
		.wp-core-ui #customize-info .theme-name{
					word-break: break-all;
					padding-right: 120px;
		}
		.wp-full-overlay-sidebar-content #customize-info {background-color: #fff;}

	</style>
	<?php
}


if ( ! function_exists( 'responsive_is_transparent_header' ) ) {
	/**
	 * Returns true if transparent header is enabled
	 */
	function responsive_is_transparent_header() {
		$enable_trans_header = get_theme_mod( 'responsive_transparent_header', 0 ) || ( is_page() && get_post_meta( get_the_ID(), 'responsive_page_meta_transparent_header', true ) ) ? true : false;
		if ( $enable_trans_header ) {

			if ( ( is_archive() || is_search() || is_404() ) && get_theme_mod( 'responsive_disable_archive_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_home() && get_theme_mod( 'responsive_disable_blog_page_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_front_page() && ( 'disabled' === get_post_meta( get_the_ID(), 'responsive_page_meta_transparent_header', true ) || get_theme_mod( 'responsive_disable_homepage_transparent_header', 0 ) ) ) {
				$enable_trans_header = false;
			}

			if ( ! is_front_page() && is_page() && ( 'disabled' === get_post_meta( get_the_ID(), 'responsive_page_meta_transparent_header', true ) || get_theme_mod( 'responsive_disable_pages_transparent_header', 0 ) ) ) {
				$enable_trans_header = false;
			}

			if ( is_single() && get_theme_mod( 'responsive_disable_posts_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}
		}

		if ( class_exists( 'WooCommerce' ) ) {
			if ( ( is_product() || is_cart() || is_shop() || is_checkout() || is_woocommerce() || is_account_page() ) && get_theme_mod( 'responsive_disable_woo_products_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}
		}

		return $enable_trans_header;
	}
}


/**
 * [responsive_transparent_custom_logo description]
 *
 * @param  [type] $html [description].
 * @return [type]       [description]
 */
function responsive_transparent_custom_logo( $html ) {

	$responsive_transparent_logo_option = get_theme_mod( 'responsive_transparent_header_logo_option', 0 );
	$responsive_transparent_logo        = get_theme_mod( 'responsive_transparent_header_logo' );

	if ( $responsive_transparent_logo_option && $responsive_transparent_logo && responsive_is_transparent_header() ) {

		/* Replace transparent header logo and width */

		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link transparent-custom-logo" rel="home" itemprop="url">%2$s</a>',
			esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ),
			wp_get_attachment_image(
				$responsive_transparent_logo,
				'full',
				false,
				array(
					'alt'      => get_bloginfo( 'name' ),
					'class'    => 'custom-logo',
					'itemprop' => 'logo',
					'size'     => '(max-width: 204px) 100vw, 204px',
				)
			)
		);
	}

	return $html;
}

if (
	( version_compare( RESPONSIVE_THEME_VERSION, '4.9.9', '<' ) && class_exists( 'Responsive_Addons_Pro' ) ) ||
	( version_compare( RESPONSIVE_THEME_VERSION, '4.9.8', '>' ) )
) {

	if ( ! function_exists( 'responsive_is_sticky_header_enabled' ) ) {
		/**
		 * Returns true if transparent header is enabled
		 */
		function responsive_is_sticky_header_enabled() {
			$responsive_options = wp_parse_args( get_option( 'responsive_theme_options', array() ) );
			if ( isset( $responsive_options['sticky-header'] ) && 1 === $responsive_options['sticky-header'] ) {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * [responsive_sticky_custom_logo description]
	 *
	 * @param  [type] $html Html.
	 * @return [type]       [description]
	 */
	function responsive_sticky_custom_logo() {

		$responsive_sticky_logo_option = get_theme_mod( 'responsive_sticky_header_logo_option', 0 );
		$responsive_sticky_logo        = get_theme_mod( 'responsive_sticky_header_logo' );

		$html = '';

		if ( $responsive_sticky_logo_option && $responsive_sticky_logo && responsive_is_sticky_header_enabled() ) {

			/* Replace transparent header logo and width */

			$html = sprintf(
				'<a href="%1$s" class="custom-logo-link sticky-custom-logo" rel="home" itemprop="url">%2$s</a>',
				esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ),
				wp_get_attachment_image(
					$responsive_sticky_logo,
					'full',
					false,
					array(
						'alt'      => get_bloginfo( 'name' ),
						'class'    => 'custom-logo',
						'itemprop' => 'logo',
						'size'     => '(max-width: 204px) 100vw, 204px',
					)
				)
			);
		}
		return $html;
	}
}

/**
 * Function returns the default color for the color controls.
 *
 * @param string $color  Which color to return.
 */
function get_responsive_customizer_defaults( $option ) {

	$theme_options = defaults();
	$default_value = '';
	if ( isset( $theme_options[ $option ] ) ) {
		$default_value = $theme_options[ $option ];
	}
	return $default_value;
}

/**
 * Set default theme option values
 *
 * @return default values of the theme.
 */
function defaults() {
	// Defaults list of options.
	$theme_options = apply_filters(
		'responsive_theme_defaults',
		array(
			'entry_columns'                       => 2,
			'buttons_radius'                      => 0,
			'responsive_border_box'               => 8,
			'shop_content_width'                  => 100,
			'blog_content_width'                  => 66,
			'single_blog_content_width'           => 66,
			'page_content_width'                  => 66,
			'breadcrumb_alignment'                => 'center',
			'read_more_text'                      => 'Read more &raquo;',
			'blog_entry_elements_positioning'     => array( 'title', 'meta', 'featured_image', 'content' ),
			'blog_single_elements_positioning'    => array( 'title', 'meta', 'featured_image', 'content' ),

			// alignment.
			'blog_entry_title_alignment'          => 'left',
			'blog_entry_meta_alignment'           => 'left',
			// Padding.
			'box_padding'                         => 30,
			'logo_padding'                        => 28,
			// Colors.
			'background_color'                    => '#F0F5FA',
			'scroll_to_top_icon'                  => '#ffffff',
			'scroll_to_top_icon_hover'            => '#ffffff',
			'scroll_to_top_icon_background'       => '#a8a6a6',
			'scroll_to_top_icon_background_hover' => '#d1cfcf',
			'add_to_cart_button'                  => '#0066CC',
			'shop_product_price'                  => '#333333',
			'content_header_heading'              => '#333333',
			'content_header_description'          => '#999999',
			'breadcrumb'                          => '#1e73be',
			'footer_background'                   => '#333333',
			'footer_text'                         => '#ffffff',
			'footer_links'                        => '#eaeaea',
			'footer_links_hover'                  => '#ffffff',
			'header_background'                   => '#ffffff',
			'header_border'                       => '#eaeaea',
			'header_site_title'                   => '#333333',
			'header_site_title_hover'             => '#10659C',
			'header_text'                         => '#999999',
			'header_widget_text'                  => '#333333',
			'header_widget_background'            => '#ffffff',
			'header_widget_border'                => '#eaeaea',
			'header_widget_link'                  => '#0066CC',
			'header_widget_link_hover'            => '#10659C',

			// hamburger menu padding
			'hamburger_menu_padding'              => 15,
			'secondary_menu_padding'              => 0,
			'secondary_menu_margin'               => 0,
			'header_menu_background'              => 'transparent',
			'header_mobile_menu_background'       => '#ffffff',
			'header_menu_border'                  => '#eaeaea',
			'header_active_menu_background'       => '#ffffff',
			'header_menu_link'                    => '#333333',
			'header_menu_link_hover'              => '#10659C',
			'header_sub_menu_background'          => '#ffffff',
			'header_sub_menu_link'                => '#333333',
			'header_sub_menu_link_hover'          => '#10659C',
			'header_menu_toggle_background'       => '#ffffff',
			'header_menu_toggle'                  => '#333333',
			'hamburger_secondary_menu_padding'    => 15,
			'header_secondary_menu_background'    => '#ffffff',
			'header_secondary_menu_border'        => '#eaeaea',
			'header_active_secondary_menu_background'       => '#ffffff',
			'header_secondary_menu_link'                    => '#333333',
			'header_secondary_menu_link_hover'            	=> '#10659C',
			'header_sub_secondary_menu_background'          => '#ffffff',
			'header_sub_secondary_menu_link'                => '#333333',
			'header_html_content'                 => 'Insert HTML here',
			'header_html_auto_add_paragraph'      => 1,
			'header_html_link_style'              => 'underline',
			'header_html_link_color'              => '#000000',
			'header_html_link_color_hover'        => '#0066CC',
			'header_html_margin_x'                => 0,
			'header_html_margin_y'                => 0,
			'mobile_menu_toggle_border_color'     => '#333333',
			'menu_button_radius'                  => 0,
			'box_background'                      => '#ffffff',
			'alt_background'                      => '#eaeaea',
			'body_text'                           => '#333333',
			'h1_text'                             => '#333333',
			'h2_text'                             => '#333333',
			'h3_text'                             => '#333333',
			'h4_text'                             => '#333333',
			'h5_text'                             => '#333333',
			'h6_text'                             => '#333333',
			'meta_text'                           => '#999999',
			'link'                                => '#0066CC',
			'link_hover'                          => '#10659C',
			'button'                              => '#0066CC',
			'button_hover'                        => '#10659C',
			'button_text'                         => '#ffffff',
			'button_hover_text'                   => '#ffffff',
			'button_border'                       => '#10659C',
			'button_hover_border'                 => '#0066CC',
			'inputs_background'                   => '#ffffff',
			'inputs_text'                         => '#333333',
			'inputs_border'                       => '#cccccc',
			'label'                               => '#333333',

			'responsive_style'                    => 'boxed',
			// 'responsive_header_layout'            => 'horizontal',
			// 'responsive_header_alignment'         => 'center',
			'header_menu_full_width'              => 1,
			'header_secondary_menu_full_width'    => 1,
			'blog_content_width'                  => 66,
			'res_breadcrumb'                      => 1,
			'blog_sidebar_position'               => 'no',
			'header_social_show_label'            => 0,
			'header_social_item_color'            => '#2D3748',
			'header_social_item_hover_color'      => '#FFFFFF',
			'header_social_border_radius'         => 0,
			'header_social_border_color'          => '#FFFFFF',
			'header_social_border_hover_color'    => '#FFFFFF',
			'header_social_margin_x'              => 0,
			'header_social_margin_y'              => 0,
			'header_social_item_bg_color'         => '#FFFFFF',
			'header_social_item_bg_hover_color'   => '#FFFFFF',
			'footer_social_show_label'            => 0,
			'footer_social_item_color'            => '#EAEAEA',
			'footer_social_item_hover_color'      => '#EAEAEA',
			'footer_social_border_radius'         => 0,
			'footer_social_border_color'          => '#FFFFFF',
			'footer_social_border_hover_color'    => '#FFFFFF',
			'footer_social_margin_x'              => 0,
			'footer_social_margin_y'              => 0,
			'footer_social_item_bg_color'         => '#FFFFFF00',
			'footer_social_item_bg_hover_color'   => '#FFFFFF00',
			'responsive_h4_text_color'            => '#333333',
			'responsive_box_background_color'     => '#ffffff',
			'responsive_body_text_color'          => '#333333',
			'responsive_link_color'               => '#0066CC',
			'responsive_link_hover_color'         => '#10659C',
			'responsive_header_search_color'      => '#333333',
			'responsive_header_search_hover_color'=> '#333333',
			'responsive_header_search_background_color'       => '#ffffff',
			'responsive_header_search_background_hover_color' => '#ffffff',
			'responsive_header_search_text_color'             => '#333333',
			'responsive_header_search_text_hover_color'       => '#333333',
			'responsive_header_desktop_items'     => array(
				'above' => array(
					'above_left'           => array(),
					'above_left_center'    => array(),
					'above_center'         => array(),
					'above_right_center'   => array(),
					'above_right'          => array(),
				),
				'primary' => array(
					'primary_left'         => array( 'logo' ),
					'primary_left_center'  => array(),
					'primary_center'       => array(),
					'primary_right_center' => array(),
					'primary_right'        => array( 'primary_navigation' ),
				),
				'below' => array(
					'below_left'           => array(),
					'below_left_center'    => array(),
					'below_center'         => array(),
					'below_right_center'   => array(),
					'below_right'          => array(),
				),
			),
			'responsive_header_primary_row_bg_color'                  => '#FFFFFF',
			'responsive_header_primary_row_bg_hover_color'            => '#FFFFFF',
			'responsive_header_primary_row_bottom_border_color'       => '#0066CC',
			'responsive_header_primary_row_bottom_border_hover_color' => '#0066CC',
			'responsive_header_above_row_bg_color'                    => '#FFFFFF',
			'responsive_header_above_row_bg_hover_color'              => '#FFFFFF',
			'responsive_header_above_row_bottom_border_color'         => '#007CBA',
			'responsive_header_above_row_bottom_border_hover_color'   => '#D9D9D9',
			'responsive_header_below_row_bg_color'                    => '#FFFFFF',
			'responsive_header_below_row_bg_hover_color'              => '#FFFFFF',
			'responsive_header_below_row_bottom_border_color'         => '#007CBA',
			'responsive_header_below_row_bottom_border_hover_color'   => '#D9D9D9',
			'responsive_footer_above_row_bg_color'                    => '#333333',
			'responsive_footer_above_row_border_color'                => '#FFFFFF',
			'responsive_footer_primary_row_bg_color'                  => '#333333',
			'responsive_footer_primary_row_border_color'              => '#aaaaaa',
			'responsive_footer_below_row_bg_color'                    => '#FFFFFF',
			'responsive_footer_below_row_border_color'                => '#0066CC',
			'responsive_header_button_label'                          => 'Button',
			'responsive_header_button_url'                            => '',
			'responsive_header_button_open_in_new_tab'                => 0,
			'responsive_header_button_set_nofollow'                   => 0,
			'responsive_header_button_set_sponsored'                  => 0,
			'responsive_header_button_set_download'                   => 0,
			'responsive_header_button_style'                          => 'filled',
			'responsive_header_button_visibility'                     => 'everyone',
			'responsive_header_button_size'                           => 'md',
			'responsive_header_button_padding_y'                      => 0,
			'responsive_header_button_padding_x'                      => 0,
			'responsive_header_button_color'                          => '#000000',
			'responsive_header_button_hover_color'                    => '#2B6CB0',
			'responsive_header_button_bg_color'                       => '#2B6CB0',
			'responsive_header_button_bg_hover_color'                 => '#215387',
			'responsive_header_button_border_color'                   => '#000000',
			'responsive_header_button_border_color_hover'             => '#000000',
			'responsive_header_button_shadow_color'                   => '#FFFFFF',
			'responsive_header_button_shadow_x'                       => 0,
			'responsive_header_button_shadow_y'                       => 0,
			'responsive_header_button_shadow_blur'                    => 0,
			'responsive_header_button_shadow_spread'                  => 0,
			'responsive_header_button_shadow_inset'                   => false,
			'responsive_header_button_padding_x'                      => 0,
			'responsive_header_button_radius_y'                       => 0,
			'responsive_header_button_radius_x'                       => 0,
			'responsive_header_button_margin_y'                       => 0,
			'responsive_header_button_margin_x'                       => 0,
			'responsive_header_button_border_style'                   => 'none',
			'responsive_header_button_border_width'                   => 1,
			'responsive_header_contact_info_icon_style'               => 'filled',
			'responsive_header_contact_info_icon_shape'               => 'rounded',
			'responsive_header_contact_info_icon_size'                => 15,
			'responsive_header_contact_info_item_spacing'             => 15,
			'responsive_header_contact_info_icons_color'              => '#292929E6',
			'responsive_header_contact_info_icons_hover_color'        => '#216BDB',
			'responsive_header_contact_info_background_color'         => '#EDF2FE',
			'responsive_header_contact_info_background_hover_color'   => '#DADEE3B5',
			'responsive_header_contact_info_font_color'               => '#292929E6',
			'responsive_header_contact_info_font_hover_color'         => '#216BDB',
			'responsive_header_contact_info_margin_y'                 => 0,
			'responsive_header_contact_info_margin_x'                 => 0,
			'responsive_footer_items'     					          => array(
																			'above' => array(
																				'above_1' => array(),
																				'above_2' => array(),
																				'above_3' => array(),
																				'above_4' => array(),
																				'above_5' => array(),
																				'above_6' => array(),
																			),
																			'primary' => array(
																				'primary_1' => array(),
																				'primary_2' => array(),
																				'primary_3' => array(),
																				'primary_4' => array(),
																				'primary_5' => array(),
																				'primary_6' => array(),
																			),
																			'below' => array(
																				'below_1' => array('footer_copyright'),
																				'below_2' => array(),
																				'below_3' => array(),
																				'below_4' => array(),
																				'below_5' => array(),
																				'below_6' => array(),
																			),
																		),
			'footer_copyright_text'                         			=> '#333333',
			'footer_copyright_text_hover'                         		=> '#333333',
			'footer_copyright_links'                                    => '#0066CC',
			'footer_copyright_links_hover'                              => '#0066CC',
			'footer_menu_background'                                    => '#333333',
			'footer_menu_background_hover'                              => '#333333',
			'responsive_footer_builder_choices'      				    => array(
																			'footer_copyright'          => array(
																				'name'    => esc_html__( 'Copyright', 'responsive' ),
																				'section' => 'responsive_footer_copyright',
																			),
																			'footer_navigation'          => array(
																				'name'    => esc_html__( 'Footer Menu', 'responsive' ),
																				'section' => 'responsive_footer_menu',
																			),
																			'social'      => array(
																				'name'    => esc_html__( 'Social', 'responsive' ),
																				'section' => 'responsive_footer_social',
																			),
																			'widget-1' => array(
																				'name'    => esc_html__( 'Widget 1', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-1',
																				'icon'    => 'wordpress',
																			),
																			'widget-2' => array(
																				'name'    => esc_html__( 'Widget 2', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-2',
																				'icon'    => 'wordpress',
																			),
																			'widget-3' => array(
																				'name'    => esc_html__( 'Widget 3', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-3',
																				'icon'    => 'wordpress',
																			),
																			'widget-4' => array(
																				'name'    => esc_html__( 'Widget 4', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-4',
																				'icon'    => 'wordpress',
																			),
																			'widget-5' => array(
																				'name'    => esc_html__( 'Widget 5', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-5',
																				'icon'    => 'wordpress',
																			),
																			'widget-6' => array(
																				'name'    => esc_html__( 'Widget 6', 'responsive' ),
																				'section' => 'sidebar-widgets-footer-widget-6',
																				'icon'    => 'wordpress',
																			),
																			'colophon-widget' => array(
																				'name'    => esc_html__( 'Colophon Widget', 'responsive' ),
																				'section' => 'sidebar-widgets-colophon-widget',
																				'icon'    => 'wordpress',
																			),
																			'scroll_to_top'          => array(
																				'name'    => esc_html__( 'Scroll to Top', 'responsive' ),
																				'section' => 'responsive_scrolltotop_section',
																			),
																		),
			'responsive_header_builder_choices'      				    => array(
																			'logo'                 => array(
																				'name'    => esc_html__( 'Site Title & Logo', 'responsive' ),
																				'section' => 'responsive_header_site_logo_title',
																				'icon'    => 'search',
																			),
																			'primary_navigation'   => array(
																				'name'    => esc_html__( 'Primary Menu', 'responsive' ),
																				'section' => 'responsive_header_menu_layout',
																				'icon'    => 'menu',
																			),
																			'secondary_navigation' => array(
																				'name'    => esc_html__( 'Secondary Menu', 'responsive' ),
																				'section' => 'responsive_header_secondary_menu_layout',
																				'icon'    => 'menu',
																			),
																			'social'               => array(
																				'name'    => esc_html__( 'Social', 'responsive' ),
																				'section' => 'responsive_header_social',
																				'icon'    => 'share',
																			),
																			'header_html'          => array(
																				'name'    => esc_html__( 'HTML', 'responsive' ),
																				'section' => 'responsive_header_html',
																				'icon'    => 'html',
																			),
																			'header_button'        => array(
																				'name'    => esc_html__( 'Button', 'responsive' ),
																				'section' => 'responsive_header_button',
																				'icon'    => 'button',
																			),
																			'header_widgets1'        => array(
																				'name'    => esc_html__( 'Header Widgets', 'responsive' ),
																				'section' => 'responsive_header_widget',
																				'icon'    => 'wordpress',
																			),
																			'header_contact_info'  => array(
																				'name'    => esc_html__( 'Contact Info', 'responsive' ),
																				'section' => 'responsive_header_contact_info',
																				'icon'    => 'id-alt',
																			),
																			'search'          => array(
																				'name'    => esc_html__( 'Search', 'responsive' ),
																				'section' => 'responsive_header_search',
																				'icon'    => 'search',
																			),
																		),
		)
	);
	return $theme_options;
}

/**
 * [responsive_mobile_custom_logo description]
 *
 * @param  [type] $html Html.
 * @return [type]       [description]
 */
function responsive_mobile_custom_logo() {

	$responsive_mobile_logo_option = get_theme_mod( 'responsive_mobile_logo_option', 0 );
	$responsive_mobile_logo        = get_theme_mod( 'responsive_mobile_logo' );

	$html = '';

	if ( '' !== $responsive_mobile_logo && '1' == $responsive_mobile_logo_option ) {

		/* Replace transparent header logo and width */

		$html = sprintf(
			'<a href="%1$s" class="mobile-custom-logo" rel="home" itemprop="url">%2$s</a>',
			esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ),
			wp_get_attachment_image(
				$responsive_mobile_logo,
				'full',
				false,
				array(
					'alt'      => get_bloginfo( 'name' ),
					'class'    => 'custom-logo',
					'itemprop' => 'logo',
					'size'     => '(max-width: 204px) 100vw, 204px',
				)
			)
		);
	}
	return $html;
}

/**
 * Register Widgets for the theme.
 */
function responsive_register_widgets() {
	/**
	 * Add widget classname as key and class file name as value.
	 */
	$responsive_widgets = array(
		'Responsive_About_Me' => 'class-responsive-about-me.php',
	);

	foreach ( $responsive_widgets as $classname => $filename ) {
		require_once get_theme_file_path( 'core/includes/widgets/' . $filename );

		register_widget( $classname );
	}
}

/**
 * Function to make old background image control with new control.
 * @since 6.0.0
 */

if ( ! function_exists( 'responsive_background_images_backward_compatibility' ) ) :

	function responsive_background_images_backward_compatibility() {
		if ( ! get_option( 'responsive_old_background_images_compatible_done' ) ) {
			$background_image_elements = array( 'footer_background', 'header_background', 'header_widget_background', 'transparent_header_widget_background', 'sidebar_background', 'box_background', 'button_background', 'inputs_background' );
			
			foreach( $background_image_elements as $element ) {
				if ( get_theme_mod( 'responsive_' . $element . '_image' ) ) {
					set_theme_mod( 'responsive_' . $element . '_image_toggle', true ); 
				}
			}
			
			if ( get_theme_mod( 'background_image' ) ) {
				set_theme_mod( 'responsive_site_background_image', get_theme_mod( 'background_image' ) );
				set_theme_mod( 'responsive_site_background_image_toggle', true );
			}
			if ( get_theme_mod( 'background_color' ) ) {
				set_theme_mod( 'responsive_site_background_color', get_theme_mod( 'background_color' ) );
			}
			update_option( 'responsive_old_background_images_compatible_done', true );
		}
	}
endif;

/**
 * Function to make old font sizes control with new control.
 * @since 6.0.0
 */

if ( ! function_exists( 'responsive_font_sizes_backward_compatibility' ) ) :

	function responsive_font_sizes_backward_compatibility() {
		if ( ! get_option( 'responsive_old_font_sizes_compatible_done' ) ) {
			$font_size_typo_elements = array(
				'body',
				'heading_h1',
				'heading_h2',
				'heading_h3',
				'heading_h4',
				'heading_h5',
				'heading_h6',
				'meta',
				'button',
				'input',
				'header_site_title',
				'header_site_tagline',
				'header_widgets',
				'header_menu',
				'header_secondary_menu',
				'sidebar',
				'content_header_heading',
				'content_header_description',
				'breadcrumb',
				'footer',
				'page_title',
				'product_title_shop',
				'single_product_title_shop',
				'product_price_shop',
				'single_product_price_shop',
				'product_content_shop',
				'single_product_content_shop',
				'shop_page_title_shop',
				'single_product_page_breadcrumb_shop',

			);
			
			foreach( $font_size_typo_elements as $element ) {

				$desktop_typography = get_theme_mod( $element . '_typography' );
				
				if ( $desktop_typography && array_key_exists( 'font-size', $desktop_typography ) ) {
					$font_size = responsive_extract_numeric_font_size( $desktop_typography['font-size'] );
					set_theme_mod( $element . '_typography_font_size_value', $font_size ); 
				}

				if( ($element === 'product_title_shop') ||
				($element === 'single_product_title_shop') ||
				($element === 'product_price_shop') ||
				($element === 'single_product_title_shop') ||
				($element === 'product_content_shop') ||
				($element === 'single_product_content_shop') ||
				($element === 'shop_page_title_shop') ||
				($element === 'single_product_page_breadcrumb_shop')){
					$element = substr($element,  0 , strlen($element) - 5);
				}
				$tablet_typography = get_theme_mod( $element . '_tablet_typography' );
				
				if ( $tablet_typography && array_key_exists( 'font-size', $tablet_typography ) ) {
					$font_size = responsive_extract_numeric_font_size( $tablet_typography['font-size'] );
					set_theme_mod( $element . '_tablet_typography_font_size_value', $font_size ); 
				}

				$mobile_typography = get_theme_mod( $element . '_mobile_typography' );

				if ( $mobile_typography && array_key_exists( 'font-size', $mobile_typography ) ) {
					$font_size = responsive_extract_numeric_font_size( $mobile_typography['font-size'] );
					set_theme_mod( $element . '_mobile_typography_font_size_value', $font_size ); 
				}

			}
			update_option( 'responsive_old_font_sizes_compatible_done', true );
		}
	}
endif;

/**
 * Function to make old border width control with new control.
 * @since 6.1.2
 */

 if ( ! function_exists( 'responsive_border_width_backward_compatibility' ) ) :

	function responsive_border_width_backward_compatibility() {
		if ( ! get_option( 'responsive_old_border_width_compatible_done' ) ) {
			// Set default fallback value
			$default_value = 1;
			
			// Inputs border width 
			$input_border_width = get_theme_mod( 'responsive_inputs_border_width', $default_value );

			$sides = [ 'top', 'right', 'bottom', 'left' ];

			foreach ( $sides as $side ) {
				$option_name = "responsive_inputs_border_width_{$side}_border";
				if ( false === get_theme_mod( $option_name ) ) {
					set_theme_mod( $option_name, $input_border_width );
				}
			}

			// Mobile inputs border width
			foreach ( $sides as $side ) {
				$mobile_option_name = "responsive_inputs_border_width_mobile_{$side}_border";
				$desktop_option_name = "responsive_inputs_border_width_{$side}_border";
				if ( false === get_theme_mod( $mobile_option_name ) ) {
					set_theme_mod(
						$mobile_option_name,
						get_theme_mod( $desktop_option_name, $input_border_width )
					);
				}
			}

			// Tablet inputs border width 
			foreach ( $sides as $side ) {
				$tablet_option_name = "responsive_inputs_border_width_tablet_{$side}_border";
				$desktop_option_name = "responsive_inputs_border_width_{$side}_border";
				if ( false === get_theme_mod( $tablet_option_name ) ) {
					set_theme_mod(
						$tablet_option_name,
						get_theme_mod( $desktop_option_name, $input_border_width )
					);
				}
			}

			// Buttons border width 
			$button_border_width = get_theme_mod( 'responsive_buttons_border_width', $default_value );

			foreach ( $sides as $side ) {
				set_theme_mod( "responsive_buttons_border_width_{$side}_border", $button_border_width );
				set_theme_mod( "responsive_buttons_border_width_mobile_{$side}_border", $button_border_width );
				set_theme_mod( "responsive_buttons_border_width_tablet_{$side}_border", $button_border_width );
			}

			update_option( 'responsive_old_border_width_compatible_done', true );
		}
	}

endif;

function responsive_extract_numeric_font_size($value) {

    preg_match('/[-+]?[0-9]+/', $value, $matches);

    return isset($matches[0]) ? $matches[0] : '16';
}

if( ! function_exists( 'responsive_old_header_footer_comaptibility_with_hfb' ) ) :
	function responsive_old_header_footer_comaptibility_with_hfb() {

		$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );

		// Secondary Menu backward compatibility
		if( has_nav_menu( 'secondary-menu' ) ) {
			array_push( $header_hfb_elements['above']['above_right'], 'secondary_navigation' );
		}
		
		// Header Elements Backward Compatibility.
		$prev_header_elements = get_theme_mod( 'responsive_header_elements' );
		if(  ! isset( $prev_header_elements ) && ! in_array( 'site-branding', $prev_header_elements ) ) {
			$header_hfb_elements['primary']['primary_left'] = array();
		}
		if( ! isset( $prev_header_elements ) && ! in_array( 'main-navigation', $prev_header_elements ) ) {
			$header_hfb_elements['primary']['primary_right'] = array();
		}

		// Vertical Header backward compatibility.
		$responsive_header_layout = get_theme_mod( 'responsive_header_layout' );
        if ( 'vertical' === $responsive_header_layout ) {
			// Vertical Header Alignment preserve with hfb.
			$vertical_header_alignment = get_theme_mod( 'responsive_header_alignment' );
			if ( 'left' === $vertical_header_alignment ) {
				$header_hfb_elements['primary']['primary_right'] = array();
				$header_hfb_elements['below']['below_left']      = array();
				array_push( $header_hfb_elements['below']['below_left'], 'primary_navigation' );
			} else if ( 'right' === $vertical_header_alignment ) {
				$header_hfb_elements['primary']['primary_left']  = array();
				$header_hfb_elements['primary']['primary_right'] = array();
				array_push( $header_hfb_elements['primary']['primary_right'], 'logo' );
                array_push( $header_hfb_elements['below']['below_right'], 'primary_navigation' );
			} else {
				$header_hfb_elements['primary']['primary_left']  = array();
				$header_hfb_elements['primary']['primary_right'] = array();
				$header_hfb_elements['below']['below_center']    = array();
				array_push( $header_hfb_elements['primary']['primary_center'], 'logo' );
				array_push( $header_hfb_elements['below']['below_center'], 'primary_navigation' );
			}
        }


		set_theme_mod( 'responsive_header_desktop_items', $header_hfb_elements );
		
		if( get_theme_mod( 'responsive_header_height', 0 ) !== 0 ) {
			set_theme_mod( 'responsive_header_primary_row_height', get_theme_mod( 'responsive_header_height' ) );
		}

		if( get_theme_mod( 'responsive_transparent_header', 0 ) && get_theme_mod( 'responsive_transparent_header_height', 0 ) > 0 ) {
			set_theme_mod( 'responsive_header_primary_row_height', get_theme_mod( 'responsive_transparent_header_height' ) );
		}

		if( get_theme_mod( 'responsive_header_background_color' ) ) {
			set_theme_mod( 'responsive_header_primary_row_bg_color', get_theme_mod( 'responsive_header_background_color' ) );
			set_theme_mod( 'responsive_header_primary_row_bg_hover_color', get_theme_mod( 'responsive_header_background_color' ) );
		}

		if( get_theme_mod( 'responsive_enable_header_bottom_border', 1 ) && get_theme_mod( 'responsive_bottom_border', 0 ) > 0 ) {
			set_theme_mod( 'responsive_header_primary_row_bottom_border_size', get_theme_mod( 'responsive_bottom_border' ) );
			set_theme_mod( 'responsive_header_primary_row_bottom_border_color', get_theme_mod( 'responsive_header_border_color' ) );
			set_theme_mod( 'responsive_header_primary_row_bottom_border_hover_color', get_theme_mod( 'responsive_header_border_color' ) );
		}

		// Footer compatibility with new footer builder.
		$footer_hfb_elements = get_theme_mod( 'responsive_footer_items', get_responsive_customizer_defaults( 'responsive_footer_items' ) );
		if( get_theme_mod( 'responsive_scroll_to_top' ) ) {
			array_push( $footer_hfb_elements['below']['below_1'], 'scroll_to_top' );
			set_theme_mod( 'responsive_footer_below_width', 'fullwidth' );
		}
		if( get_theme_mod( 'responsive_footer_full_width' ) ) {
			set_theme_mod( 'responsive_footer_above_width', 'fullwidth' );
			set_theme_mod( 'responsive_footer_primary_width', 'fullwidth' );
		}

		// Get sections from Customizer.
		$footer_layout_elements = get_theme_mod( 'responsive_footer_elements_positioning', array() );

		$responsive_options = responsive_get_options();

		$icons = array(
			'twitter'     => __( 'Twitter', 'responsive' ),
			'facebook'    => __( 'Facebook', 'responsive' ),
			'linkedin'    => __( 'LinkedIn', 'responsive' ),
			'youtube'     => __( 'YouTube', 'responsive' ),
			'stumbleupon' => __( 'StumbleUpon', 'responsive' ),
			'rss'         => __( 'RSS Feed', 'responsive' ),
			'instagram'   => __( 'Instagram', 'responsive' ),
			'pinterest'   => __( 'Pinterest', 'responsive' ),
			'yelp'        => __( 'Yelp!', 'responsive' ),
			'vimeo'       => __( 'Vimeo', 'responsive' ),
			'foursquare'  => __( 'foursquare', 'responsive' ),
			'email'       => __( 'Email', 'responsive' ),
		);
		$has_footer_social_icons = false;
		foreach ( $icons as $key => $value ) {
			if ( ! empty( $responsive_options[ $key . '_uid' ] ) ) {
				$footer_hfb_elements['primary']['primary_1'] = array();
				set_theme_mod( 'responsive_footer_primary_columns', 2 );
				array_push( $footer_hfb_elements['primary']['primary_1'], 'social' );
				array_push( $footer_hfb_elements['primary']['primary_2'], 'footer_copyright' );
				$has_footer_social_icons = true;
				break;
			}
		}

		if ( has_nav_menu( ( 'footer-menu' )) ) {
			if ( $has_footer_social_icons ) {
				set_theme_mod( 'responsive_footer_primary_columns', '3' );
				$footer_hfb_elements['primary']['primary_2'] = array();
				array_push( $footer_hfb_elements['primary']['primary_2'], 'footer_navigation' );
				array_push( $footer_hfb_elements['primary']['primary_3'], 'footer_copyright' );
				set_theme_mod( 'responsive_footer_primary_layout', 'equal' );
			} else {
				set_theme_mod( 'responsive_footer_primary_columns', '2' );
				$footer_hfb_elements['primary']['primary_1'] = array();
				array_push( $footer_hfb_elements['primary']['primary_1'], 'footer_navigation' );
				array_push( $footer_hfb_elements['primary']['primary_2'], 'footer_copyright' );
				set_theme_mod( 'responsive_footer_primary_layout', 'left-heavy' );
			}
		}

		// backward compatibility of colophon widget
		if( is_active_sidebar( 'colophon-widget' ) ) {
			$footer_hfb_elements['primary']['primary_1'] = array();
			$footer_hfb_elements['primary']['primary_2'] = array();
			$footer_hfb_elements['primary']['primary_3'] = array();
			if( $has_footer_social_icons && has_nav_menu( 'footer-menu' ) ) {
				set_theme_mod( 'responsive_footer_primary_columns', '4' );
                array_push( $footer_hfb_elements['primary']['primary_1'], 'colophon-widget' );
                array_push( $footer_hfb_elements['primary']['primary_2'], 'social' );
                array_push( $footer_hfb_elements['primary']['primary_3'], 'footer_navigation' );
                array_push( $footer_hfb_elements['primary']['primary_4'], 'footer_copyright' );
			} else if ( $has_footer_social_icons && ! has_nav_menu( 'footer-menu' ) ) {
				set_theme_mod( 'responsive_footer_primary_columns', '3' );
                array_push( $footer_hfb_elements['primary']['primary_1'], 'colophon-widget' );
                array_push( $footer_hfb_elements['primary']['primary_2'], 'social' );
                array_push( $footer_hfb_elements['primary']['primary_3'], 'footer_copyright' );
			} else if ( ! $has_footer_social_icons && has_nav_menu( 'footer-menu' ) ) {
				set_theme_mod( 'responsive_footer_primary_columns', '3' );
                array_push( $footer_hfb_elements['primary']['primary_1'], 'colophon-widget' );
                array_push( $footer_hfb_elements['primary']['primary_2'], 'footer_navigation' );
                array_push( $footer_hfb_elements['primary']['primary_3'], 'footer_copyright' );
			} else {
				set_theme_mod( 'responsive_footer_primary_columns', '2' );
                array_push( $footer_hfb_elements['primary']['primary_1'], 'colophon-widget' );
                array_push( $footer_hfb_elements['primary']['primary_2'], 'footer_copyright' );
			}

		}

		if ( 'vertical' === get_theme_mod( 'responsive_footer_bar_layout' ) ) {
			$footer_hfb_elements['primary']['primary_1'] = array();
			$footer_hfb_elements['primary']['primary_2'] = array();
			$footer_hfb_elements['primary']['primary_3'] = array();
			$footer_hfb_elements['primary']['primary_4'] = array();
			set_theme_mod( 'responsive_footer_primary_columns', '1' );
			if ( is_active_sidebar( 'colophon-widget' ) ) array_push( $footer_hfb_elements['primary']['primary_1'], 'colophon-widget' );
			array_push( $footer_hfb_elements['primary']['primary_1'], 'social' );
			if ( has_nav_menu( 'footer-menu' ) )  array_push( $footer_hfb_elements['primary']['primary_1'], 'footer_navigation' );
			array_push( $footer_hfb_elements['primary']['primary_1'], 'footer_copyright' );
			set_theme_mod( 'responsive_footer_primary_inner_elements_layout', 'stack' );
		}

		$padding_types = [
			'top_padding',
			'right_padding',
			'bottom_padding',
			'left_padding',
			'tablet_top_padding',
			'tablet_right_padding',
			'tablet_bottom_padding',
			'tablet_left_padding',
			'mobile_top_padding',
			'mobile_right_padding',
			'mobile_bottom_padding',
			'mobile_left_padding',
		];
		
		foreach ( $padding_types as $type ) {
			$source_mod = "responsive_footer_bar_$type";
			$target_mod = "responsive_footer_primary_row_padding_$type";

			if ( get_theme_mod( $source_mod ) ) {
				set_theme_mod( $target_mod, get_theme_mod( $source_mod ) );
			}
			set_theme_mod( $source_mod, 0 );
		}

		$footer_widgets_columns     = get_theme_mod( 'responsive_footer_widgets_columns' );
		$above_footer_row_col_count = 0;

		$row_column = 0;
		if ( $footer_widgets_columns ) {
			for ( $i=1; $i <= $footer_widgets_columns; $i++ ) {
				if ( is_active_sidebar( 'footer-widget-' . $i ) ) {
					$above_footer_row_col_count++;
					$row_column++;
					array_push( $footer_hfb_elements['above']['above_'.$row_column], 'widget-'.$i );
				}
			}
		}
		set_theme_mod( 'responsive_footer_above_columns', $row_column > 0 ? strval( $row_column ) : '3' );

		if( $above_footer_row_col_count > 0 ) {

			foreach ( $padding_types as $type ) {
				$source_mod = "responsive_footer_widgets_$type";
				$target_mod = "responsive_footer_above_row_padding_$type";

				if ( get_theme_mod( $source_mod ) ) {
					set_theme_mod( $target_mod, get_theme_mod( $source_mod ) );
				}
			}
		}

		// backward compatibility of copyright text and links color with layout -> text and links color.
		if ( get_theme_mod( 'responsive_footer_text_color' ) ) {
			set_theme_mod( 'responsive_footer_copyright_text_color', get_theme_mod( 'responsive_footer_text_color' ) );
			set_theme_mod( 'responsive_footer_copyright_text_hover_color', get_theme_mod( 'responsive_footer_text_color' ) );
		}
		if ( get_theme_mod( 'responsive_footer_links_color' ) ) {
			set_theme_mod( 'responsive_footer_copyright_links_color', get_theme_mod( 'responsive_footer_links_color' ) );
		}
		if ( get_theme_mod( 'responsive_footer_links_hover_color' ) ) {
			set_theme_mod( 'responsive_footer_copyright_links_hover_color', get_theme_mod( 'responsive_footer_links_hover_color' ) );
		}

		// backward compatibility of layout -> background color.
		if ( get_theme_mod( 'responsive_footer_background_color' ) && get_theme_mod( 'responsive_footer_background_image_toggle' ) ) {
			$prev_footer_background_color = 'transparent';
			set_theme_mod( 'responsive_footer_primary_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_above_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_below_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_menu_background_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_menu_background_hover_color', $prev_footer_background_color );
		} else if( get_theme_mod( 'responsive_footer_background_color' ) ) {
			$prev_footer_background_color = get_theme_mod( 'responsive_footer_background_color' );
			set_theme_mod( 'responsive_footer_primary_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_above_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_below_row_bg_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_menu_background_color', $prev_footer_background_color );
			set_theme_mod( 'responsive_footer_menu_background_hover_color', $prev_footer_background_color );
		}

		// Copyright typography backward compatibility
		set_theme_mod( 'footer_copyright_typography', get_theme_mod( 'footer_typography' ) );

		if ( ! empty( $footer_layout_elements ) ) {

			// Footer Layout Elements backward compatibility.
			$footer_layout_elements_count = count( $footer_layout_elements );
			set_theme_mod( 'responsive_footer_primary_columns', is_active_sidebar( 'colophon-widget' ) ? (string) $footer_layout_elements_count + 1: (string) $footer_layout_elements_count );
	
			$footer_element_map = array(
				'social_icons'      => 'social',
				'footer_menu'       => 'footer_navigation',
				'copy_right_text'   => 'footer_copyright',
			);
	
			// Clean up previous assignments (remove social, footer_navigation, and footer_copyright from all positions).
			$footer_elements_to_reorder = array('social', 'footer_navigation', 'footer_copyright');
	
			foreach ( $footer_hfb_elements['primary'] as $key => &$section ) {
				foreach ( $section as $index => $element ) {
					if ( in_array( $element, $footer_elements_to_reorder, true ) ) {
						unset( $section[$index] );
					}
				}
			}
			$footer_hfb_elements['below']['below_1'] = array();
			// Reindex the arrays to prevent empty gaps.
			foreach ( $footer_hfb_elements['primary'] as &$section ) {
				$section = array_values($section);
			}
	
			// Now reassign based on the layout order.
			$position = is_active_sidebar( 'colophon-widget' ) ? 2 : 1;
			foreach ( $footer_layout_elements as $layout_key ) {
				if ( isset( $footer_element_map[ $layout_key ] ) ) {
					$element = $footer_element_map[ $layout_key ];
					$primary_key = 'primary_' . $position;
					array_push( $footer_hfb_elements['primary'][ $primary_key ], $element );
					$position++;
				}
			}
		}

		set_theme_mod( 'responsive_footer_items', $footer_hfb_elements );
	}
endif;

/**
 * Adjusts the header widgets for compatibility with the Header Footer Builder.
 *
 * Retrieves and modifies the desktop header elements based on the header widget's
 * position and alignment settings to ensure backward compatibility. The function
 * updates the header layout dynamically based on the user's customizer settings.
 */
function responsive_header_footer_builder_compatibility_header_widgets() {
	$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );

	$header_widget_position  		= get_theme_mod( 'responsive_header_widget_position', 'top' );
	$header_widget_alignment 		= get_theme_mod( 'responsive_header_widget_alignment', 'center' );
	$header_widget_background_color = get_theme_mod( 'responsive_header_widget_background_color', '#ffffff' );

	$position_mapping = [
		'top' => 'above',
		'with_logo' => 'primary',
		'bottom' => 'below'
	];

	$alignment_positions = [
		'spread' => 'center',
		'space-around' => 'center',
		'center' => 'center',
		'left' => 'left',
		'right' => 'right'
	];

	if (isset($position_mapping[$header_widget_position], $alignment_positions[$header_widget_alignment])) {
		$section   = $position_mapping[$header_widget_position];
		$alignment = $alignment_positions[$header_widget_alignment];

		if ( ! responsive_check_element_present_in_hfb( 'header_widgets1', 'header' ) ) {
			array_push($header_hfb_elements[$section][$section . "_" . $alignment], 'header_widgets1');
		}
		if ( 'primary' !== $section ) {
			set_theme_mod( 'responsive_header_'. $section .'_row_bg_color', $header_widget_background_color );
			set_theme_mod( 'responsive_header_'. $section .'_row_bg_hover_color', $header_widget_background_color );
		}
	}
	set_theme_mod( 'responsive_header_desktop_items', $header_hfb_elements );
}

/**
 * Function to check whethere an element present in given array.
 * @since 6.1.0
 */

 function responsive_check_element_present_in_hfb( $component, $builder_type ) {
	if ( 'header' === $builder_type ) {
		$haystack = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
	} else if ( 'footer' === $builder_type ) {
		$haystack = get_theme_mod( 'responsive_footer_items', get_responsive_customizer_defaults( 'responsive_footer_items' ) );
	}
	// If component is empty or not an array, return false immediately.
	if ( empty( $haystack ) || ! is_array( $haystack ) || empty( $component ) ) {
		return false;
    }
	return responsive_check_for_element( $component, $haystack );
}
function responsive_check_for_element($component, $haystack) {
	foreach ( $haystack as $key => $value ) {
		if ( is_array( $value ) ) {
			// Recursive check for nested arrays.
			if ( responsive_check_for_element( $component, $value ) ) {
				return true;
			}
		} elseif ( $value === $component ) {
			// Found the component
			return true;
		}
	}
	return false;
}
/**
 * Refresh the cart for ajax adds.
 *
 * @param object $fragments the cart object.
 */
function responsive_get_refreshed_fragments_number( $fragments ) {
	
	ob_start();
	
	?><span class="responsive-header-cart-total"><?php echo wp_kses_post( WC()->cart->get_cart_contents_count() ); ?></span> 
	<?php
	$fragments['span.responsive-header-cart-total'] = ob_get_clean();
	ob_start();
	responsive_woo_cart_label_markup();
	$fragments['span.responsive-woo-header-cart-info-wrap'] = ob_get_clean();
	return $fragments;
}
function responsive_woo_cart_label_markup(){
    $cart_title             = apply_filters( 'responsive_header_cart_title', __( 'Cart', 'responsive' ) );
    $cart_title_markup      = '<span class="responsive-woo-header-cart-title">' . esc_html( $cart_title ) . '</span>';
    $cart_total_markup      = '';
    $cart_total_only_markup = '';
    $cart_check_total = get_theme_mod( 'responsive_hide_cart_total_label' ) && null !== WC()->cart ? intval( WC()->cart->get_cart_contents_total() ) > 0 : true;
    if ( null !== WC()->cart ) {
        if ( $cart_check_total ) {
            $cart_total_markup      = '<span class="responsive-woo-header-cart-total">' . WC()->cart->get_cart_subtotal() . '</span>';
            $cart_total_only_markup = '<span class="responsive-woo-header-cart-total-only">' . WC()->cart->get_cart_contents_total() . '</span>';
        }
    }
    $cart_cur_name_markup = '';
    if ( function_exists( 'get_woocommerce_currency' ) && $cart_check_total ) {
        $cart_cur_name_markup = '<span class="responsive-woo-header-cart-cur-name">' . get_woocommerce_currency() . '</span>';
    }
    $cart_cur_sym_markup = '';
    if ( function_exists( 'get_woocommerce_currency_symbol' ) && $cart_check_total ) {
        $cart_cur_sym_markup = '<span class="responsive-woo-header-cart-cur-symbol">' . get_woocommerce_currency_symbol() . '</span>';
    }
    $woo_cart_label_val = get_theme_mod( 'responsive_woo_cart_label', '' );
    $shortcode_label       = array( '{cart_total_currency_symbol}', '{cart_title}', '{cart_total}', '{cart_currency_name}', '{cart_currency_symbol}' );
    $shortcode_label_value = array( $cart_total_markup, $cart_title_markup, $cart_total_only_markup, $cart_cur_name_markup, $cart_cur_sym_markup );
    $cart_label_markup = '';
    $cart_label_markup = str_replace( $shortcode_label, $shortcode_label_value, $woo_cart_label_val );
    $cart_info_markup = sprintf(
        '<span class="responsive-woo-header-cart-info-wrap">
                %1$s
            </span>',
        $cart_label_markup
    );
    echo $cart_info_markup;
}
/**
 * Make Old Woo Cart compatible with new header builder woo cart
 * 
 * @since 6.1.1
 */
if( ! function_exists( 'responsive_old_woo_cart_comaptibility_with_header_builder_woo_cart' ) ) {
	function responsive_old_woo_cart_comaptibility_with_header_builder_woo_cart() {
		$is_cart_element_loaded = responsive_check_element_present_in_hfb( 'woo-cart', 'header' );
		if ( $is_cart_element_loaded || ! class_exists( 'WooCommerce') ) {
			return;
		}
		$menu_cart = get_theme_mod( 'responsive_menu_cart_icon' );
		if ( 'icon-opencart' === $menu_cart ) {
			$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
			array_push( $header_hfb_elements['primary']['primary_right'], 'woo-cart' );
			set_theme_mod( 'responsive_header_desktop_items', $header_hfb_elements );
			set_theme_mod( 'responsive_header_woo_cart_click_action', 'redirect' );
			set_theme_mod( 'responsive_cart_hover_color', get_theme_mod( 'responsive_cart_color' ) );
			if ( get_theme_mod( 'responsive_cart_title' ) && get_theme_mod( 'responsive_cart_count' ) ) {
				set_theme_mod( 'responsive_woo_cart_label', 'Cart / {cart_total_currency_symbol}' );
			} else {
				if ( get_theme_mod( 'responsive_cart_title' ) ) {
					set_theme_mod( 'responsive_woo_cart_label', 'Cart' );
				}
				if ( get_theme_mod( 'responsive_cart_count' ) ) {
					set_theme_mod( 'responsive_woo_cart_label', '{cart_total_currency_symbol}' );
					set_theme_mod( 'responsive_cart_label_position', 'right' );
				}
			}
			//make cart icon color backward compatible.
			$menu_items_color = get_theme_mod( 'responsive_header_menu_link_color' );
			if( $menu_items_color ) {
				set_theme_mod( 'responsive_cart_color', $menu_items_color );
				set_theme_mod( 'responsive_cart_hover_color', $menu_items_color );
			}

			$padding_properties = [
				'top_padding',
				'right_padding',
				'bottom_padding',
				'left_padding',
				'tablet_top_padding',
				'tablet_right_padding',
				'tablet_bottom_padding',
				'tablet_left_padding',
				'mobile_top_padding',
				'mobile_right_padding',
				'mobile_bottom_padding',
				'mobile_left_padding',
			];
			
			foreach ( $padding_properties as $type ) {
				$target_mod = "responsive_header_woo_cart_padding_$type";
				set_theme_mod( $target_mod, 4 );
			}
		}
	}
}

/**
 * Make Search Icon in Menu compatible with new hfb header Search element.
 * @since 6.1.3
 */
if ( ! function_exists( 'responsive_old_header_search_compatibility_with_hfb_header_search_element' ) ) {

	/**
	 * Make Search Icon in Menu (deprecated) compatible with new hfb header Search element.
	 * @since 6.1.3
	 */
	function responsive_old_header_search_compatibility_with_hfb_header_search_element() {

		$is_search_element_already_loaded = responsive_check_element_present_in_hfb( 'search', 'header' );
		if ( $is_search_element_already_loaded ) {
			return;
		}

		$search_icon = get_theme_mod( 'responsive_menu_last_item', 'none' );
		if ( 'search' === $search_icon ) {
			$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
			array_push( $header_hfb_elements['primary']['primary_right'], 'search' );
			set_theme_mod( 'responsive_header_desktop_items', $header_hfb_elements );
			//make search border color backward compatible.
			$menu_items_color       = get_theme_mod( 'responsive_header_menu_link_color' );
			$menu_items_hover_color = get_theme_mod( 'responsive_header_menu_link_hover_color' );
			if( $menu_items_color ) {
				set_theme_mod( 'responsive_header_search_color', $menu_items_color );
				set_theme_mod( 'responsive_header_search_hover_color', $menu_items_color );
			}
			if( $menu_items_hover_color ) {
				set_theme_mod( 'responsive_header_search_hover_color', $menu_items_hover_color );
			}
		}
	}
}

/**
 * Make footer rows inner column spacing compatible with new control.
 * @since 6.1.3
 */
if( ! function_exists('responsive_footer_rows_inner_column_spacing_backward_compatibility') ) :

	/**
	 * Make footer rows inner column spacing compatible with new control.
	 * @since 6.1.3
	 */
	function responsive_footer_rows_inner_column_spacing_backward_compatibility() {
		$rows = array( 'above', 'primary', 'below' );
		foreach ( $rows as $row ) {
            $spacing_control_id = "responsive_footer_{$row}_inner_column_spacing";
            $spacing_value      = get_theme_mod( $spacing_control_id, 30 );
            set_theme_mod( "responsive_footer_{$row}_inner_column_spacing_tablet", $spacing_value );
            set_theme_mod( "responsive_footer_{$row}_inner_column_spacing_mobile", $spacing_value );
        }
	}

endif;

/**
 * Make header menu background coolor backward compatible.
 * 
 * @since 6.1.4
 * 
 */
if( ! function_exists('responsive_header_menu_background_color_backward_compatibility') ) :

	/**
	 * Make header menu background coolor backward compatible.
	 * 
	 * @since 6.1.4
	 * 
	 */
	function responsive_header_menu_background_color_backward_compatibility() {
		if( get_option( 'responsive_old_header_footer_comaptibility_with_header_builder_done' ) ) {
			$header_hfb_elements = get_theme_mod( 'responsive_header_desktop_items', get_responsive_customizer_defaults( 'responsive_header_desktop_items' ) );
			foreach ( $header_hfb_elements as $section => $positions ) {
				foreach ( $positions as $values ) {
					if ( in_array( 'primary_navigation', $values, true ) ) {
						$header_row_bg_color = get_theme_mod( "responsive_header_{$section}_row_bg_color", '#ffffff' );
						set_theme_mod( 'responsive_header_menu_background_color', $header_row_bg_color );
						return;
					}
				}
			}
		} else {
			if ( 'vertical' !== get_theme_mod( 'responsive_header_layout', 'horizontal' ) ) {
				set_theme_mod( 'responsive_header_menu_background_color', get_theme_mod( 'responsive_header_background_color', get_responsive_customizer_defaults( 'header_menu_background' ) ) );
			}
		}
	}

endif;

/**
 * Make Footer Widgets padding backward compatible.
 * 
 * @since 6.1.4
 * 
 */
if( ! function_exists('responsive_footer_widgets_padding_backward_compatibility') ) :

	/**
	 * Make Footer Widgets padding backward compatible.
	 * 
	 * @since 6.1.4
	 * 
	 */
	function responsive_footer_widgets_padding_backward_compatibility() {
		
		$above_footer_row_col_count = 0;

		for ( $i=1; $i <= 4; $i++ ) {
			if ( is_active_sidebar( 'footer-widget-' . $i ) ) {
				$above_footer_row_col_count++;
			}
		}

		if ( $above_footer_row_col_count > 0 ) {
			$padding_types = [
				'top_padding',
				'right_padding',
				'bottom_padding',
				'left_padding',
				'tablet_top_padding',
				'tablet_right_padding',
				'tablet_bottom_padding',
				'tablet_left_padding',
				'mobile_top_padding',
				'mobile_right_padding',
				'mobile_bottom_padding',
				'mobile_left_padding',
			];
			
			foreach ( $padding_types as $type ) {
				$source_mod = "responsiv_box_$type";
				$target_mod = "responsive_footer_above_row_item_padding_$type";
				if ( get_theme_mod( $source_mod, 30 ) ) {
					set_theme_mod( $target_mod, get_theme_mod( $source_mod, 30 ) );
				}
			}
		}
	}

endif;

if ( ! function_exists( 'responsive_site_backwardcompatibility_with_new_blog_frontend_layout' ) ):

	/**
	 * Make Site backward compatible with new blog page layout WP-8436.
	 * 
	 * @since 6.1.6
	 * 
	 */
	function responsive_site_backwardcompatibility_with_new_blog_frontend_layout() {
		if( ! get_option( 'responsive_site_backwardcompatibility_with_new_blog_frontend_layout_done' ) ) {

			$footer_hfb_elements = get_theme_mod( 'responsive_footer_items', get_responsive_customizer_defaults( 'responsive_footer_items' ) );

			$has_footer_copyright = false;

			foreach ( $footer_hfb_elements['below'] as $value ) {
				if ( in_array( 'footer_copyright', $value, true ) ) {
					$has_footer_copyright = true;
					break;
				}
			}

			if ( ! $has_footer_copyright ) {
				set_theme_mod( 'responsive_footer_copyright_text_color', get_theme_mod( 'responsive_footer_copyright_text_color', '#ffffff' ) );
				set_theme_mod( 'responsive_footer_copyright_text_hover_color', get_theme_mod( 'responsive_footer_copyright_text_hover_color', '#ffffff' ) );
				set_theme_mod( 'responsive_footer_copyright_links_color', get_theme_mod( 'responsive_footer_copyright_links_color', '#eaeaea' ) );
				set_theme_mod( 'responsive_footer_copyright_links_hover_color', get_theme_mod( 'responsive_footer_copyright_links_hover_color', '#ffffff' ) );
				set_theme_mod( 'responsive_header_primary_row_bottom_border_size', get_theme_mod( 'responsive_header_primary_row_bottom_border_size', 0 ) );
			}
			update_option( 'responsive_site_backwardcompatibility_with_new_blog_frontend_layout_done', true );
		}
	}
endif;