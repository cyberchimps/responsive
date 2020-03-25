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

require_once ABSPATH . 'wp-admin/includes/plugin.php';

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


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
	add_filter( 'pre_update_option_show_on_front', $n( 'responsive_front_page_override' ), 10, 2 );
	add_filter( 'body_class', $n( 'responsive_add_class' ) );
	add_filter( 'body_class', $n( 'responsive_add_custom_body_classes' ) );

	if ( ! class_exists( 'Responsive_Addons_Pro_Public' ) ) {
		add_action( 'customize_controls_print_footer_scripts', $n( 'responsive_add_pro_button' ) );
	}

}

/*
 * Globalize Theme options
 */
$responsive_options = responsive_get_options();

/** Function to load controls */
function responsive_load_customize_controls() {

	require_once trailingslashit( get_template_directory() ) . 'core/includes/customizer/class-responsive-customize-control-checkbox-multiple.php';
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
		'res_hide_tagline'                => false,
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
				'footer-menu' => __( 'Footer Menu', 'responsive' ),
			)
		);

		add_theme_support( 'custom-background' );

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
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'              => 100,
				'width'               => 300,
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
				if ( 'page' == get_option( 'show_on_front' ) && 'default' == $template ) {
					$responsive_options['front_page'] = 1;
				} else {
					$responsive_options['front_page'] = 0;
				}
				update_option( 'responsive_theme_options', $responsive_options );
			}
		}
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
	$full_width = is_page_template( 'full-width-page.php' ) || is_404() || 'full-width-page' == responsive_get_layout();
	if ( $full_width ) {
		$content_width = 918;
	}
}

/**
 * Set a fallback menu that will show a home link.
 */
function responsive_fallback_menu() {
	$args    = array(
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => '',
	);
	$pages   = wp_page_menu( $args );
	$prepend = '<div id="header-menu" class="menu">';
	$append  = '</div>';
	$output  = $prepend . $pages . $append;
	echo wp_kses_post( $output );
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

		wp_enqueue_style( 'responsive-style', get_template_directory_uri() . "/core/css/style{$suffix}.css", false, $responsive['Version'] );
		wp_add_inline_style( 'responsive-style', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
		wp_enqueue_style( 'icomoon-style', get_template_directory_uri() . "/core/css/icomoon/style{$suffix}.css", false, $responsive['Version'] );

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
		update_post_meta( $post_id, 'responsive_meta_box_designation', wp_kses( $_POST['responsive_meta_box_designation'], $allowed ) );
	}
	if ( isset( $_POST['responsive_meta_box_facebook'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_facebook', wp_kses( $_POST['responsive_meta_box_facebook'], $allowed ) );
	}
	if ( isset( $_POST['responsive_meta_box_twitter'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_twitter', wp_kses( $_POST['responsive_meta_box_twitter'], $allowed ) );
	}
	if ( isset( $_POST['responsive_meta_box_googleplus'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_googleplus', wp_kses( $_POST['responsive_meta_box_googleplus'], $allowed ) );
	}
	if ( isset( $_POST['responsive_meta_box_text_linkedin'] ) ) {
		update_post_meta( $post_id, 'responsive_meta_box_text_linkedin', wp_kses( $_POST['responsive_meta_box_text_linkedin'], $allowed ) );
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
	$elements = get_theme_mod(
		'responsive_header_elements',
		array(
			'site-branding',
			'main-navigation',
		)
	);

	$classes[] = 'site-header-' . implode( '-', $elements );

	// Site Width class.
	$classes[] = 'responsive-site-' . get_theme_mod( 'responsive_width', 'contained' );
	// Site Style class.
	$classes[] = 'responsive-site-style-' . get_theme_mod( 'responsive_style', 'boxed' );

	// Header width.
	if ( get_theme_mod( 'responsive_header_full_width', 0 ) && 'contained' === get_theme_mod( 'responsive_width', 'contained' ) ) {
		$classes[] = 'header-full-width';
	}
	// Transparent Header.
	if ( responsive_is_transparent_header() ) {
		$classes[] = 'res-transparent-header';
	}
	// Header Element layout class.
	$classes[] = 'site-header-layout-' . get_theme_mod( 'responsive_header_layout', 'horizontal' );
	// Header alignment class.
	$classes[] = 'site-header-alignment-' . get_theme_mod( 'responsive_header_alignment', 'center' );

	if ( get_theme_mod( 'responsive_enable_header_widget', 1 ) ) {
		// Header Widget Aligmnmnet.
		$classes[] = 'header-widget-alignment-' . get_theme_mod( 'responsive_header_widget_alignment', 'spread' );
		// Header Widget POsition.
		$classes[] = 'header-widget-position-' . get_theme_mod( 'responsive_header_widget_position', 'top' );
	}

	// Header width.
	if ( get_theme_mod( 'responsive_inline_logo_site_title', 0 ) ) {
		$classes[] = 'inline-logo-site-title';
	}

	// Full idth menu class.
	if ( get_theme_mod( 'responsive_header_menu_full_width', 0 ) ) {
		$classes[] = 'site-header-full-width-main-navigation';
	}
	if ( 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) {
		$classes[] = 'mobile-menu-style-sidebar';
	}
	// Content Header Alignment class.
	$classes[] = 'site-content-header-alignment-' . get_theme_mod( 'responsive_content_header_alignment', 'center' );

	// Custom Homepage Class class.
	$responsive_options = responsive_get_options();
	if ( is_front_page() && $responsive_options['front_page'] ) {
		$classes[] = 'custom-home-page-active';
	}

	if ( is_page() ) {

		if ( class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() ) ) {

			// Do not Add Class.
			$classes[] = '';

		} else {

			// Page sidebar Position.
			$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_page_sidebar_position', 'right' );
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
		if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() ) ) {

			// Do not Add Class.
			$classes[] = '';

		} else {

			// Blog Entry Read More Type.
			$classes[] = 'read-more-' . get_theme_mod( 'responsive_blog_entry_read_more_type', 'link' );
			// Entry Blog Featured Image Aligmnmnet.
			$classes[] = 'featured-image-alignment-' . get_theme_mod( 'responsive_blog_entry_featured_image_alignment', 'left' );
			// Entry Blog Title Aligmnmnet.
			$classes[] = 'title-alignment-' . get_theme_mod( 'responsive_blog_entry_title_alignment', 'left' );
			// Entry Blog Meta Aligmnmnet.
			$classes[] = 'meta-alignment-' . get_theme_mod( 'responsive_blog_entry_meta_alignment', 'left' );
			// Entry Blog Content Aligmnmnet.
			$classes[] = 'content-alignment-' . get_theme_mod( 'responsive_blog_entry_content_alignment', 'left' );
			// Entry Blog Columns.
			$masonry   = ( 1 === get_theme_mod( 'responsive_blog_entry_display_masonry', 0 ) ) ? '-masonry' : '';
			$classes[] = 'blog-entry-columns-' . get_theme_mod( 'responsive_blog_entry_columns', 1 ) . $masonry;
			// Entry Blog sidebar Position.
			$classes[] = 'sidebar-position-' . get_theme_mod( 'responsive_blog_sidebar_position', 'right' );

		}
	}

	// Footer width.
	if ( get_theme_mod( 'responsive_footer_full_width', 0 ) && 'contained' === get_theme_mod( 'responsive_width', 'contained' ) ) {
		$classes[] = 'footer-full-width';
	}
	// Footer Element layout class.
	$classes[] = 'footer-bar-layout-' . get_theme_mod( 'responsive_footer_bar_layout', 'horizontal' );
	// Footer Widget columns class.
	$classes[] = 'footer-widgets-columns-' . get_theme_mod( 'responsive_footer_widgets_columns', 0 );

	// Scroll To Top Device class.
	$classes[] = 'scroll-to-top-device-' . get_theme_mod( 'responsive_scroll_to_top_on_devices', 'both' );
	// Scroll To Top Aligmnment class.
	$classes[] = 'scroll-to-top-aligmnment-' . get_theme_mod( 'responsive_scroll_to_top_icon_aligmnment', 'right' );

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
						sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
						esc_attr( get_the_author() )
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
	$upgrade_link = esc_url_raw( 'https://cyberchimps.com/responsive-go-pro/?utm_source=free-to-pro&utm_medium=responsive-theme&utm_campaign=responsive-pro&utm_content=customizer' );
	?>
<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			jQuery( '#customize-info .accordion-section-title' ).append( '<a target="_blank" class="button btn-upgrade" href="<?php echo esc_url( $upgrade_link ); ?>"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>' );
			jQuery( '#customize-info .btn-upgrade' ).click( function( event ) {
				event.stopPropagation();
			} );
		} );
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

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}
if ( ! function_exists( 'responsive_is_transparent_header' ) ) {
	/**
	 * Returns true if transparent header is enabled
	 */
	function responsive_is_transparent_header() {
		$enable_trans_header = get_theme_mod( 'responsive_transparent_header', 0 );
		if ( $enable_trans_header ) {

			if ( ( is_archive() || is_search() || is_404() ) && get_theme_mod( 'responsive_disable_archive_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_home() && get_theme_mod( 'responsive_disable_blog_page_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_front_page() && get_theme_mod( 'responsive_disable_latest_posts_page_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_page() && get_theme_mod( 'responsive_disable_pages_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}

			if ( is_single() && get_theme_mod( 'responsive_disable_posts_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}
		}

		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_product() && get_theme_mod( 'responsive_disable_woo_products_transparent_header', 0 ) ) {
				$enable_trans_header = false;
			}
		}

		return $enable_trans_header;
	}
}
