<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Options
 *
 *
 * @file           theme-options.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.9.6
 * @filesource     wp-content/themes/responsive/includes/theme-options.php
 * @link           http://themeshaper.com/2010/06/03/sample-theme-options/
 * @since          available since Release 1.0
 */

/**
 * Call the options class
 */
require( get_template_directory() . '/core/includes/classes/Responsive_Options.php' );

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function responsive_admin_enqueue_scripts( $hook_suffix ) {
	$template_directory_uri = get_template_directory_uri();
	$suffix                 = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'responsive-theme-options', $template_directory_uri . '/core/includes/theme-options/theme-options' . $suffix . '.css', false, '1.0' );
	wp_enqueue_script( 'responsive-theme-options', $template_directory_uri . '/core/includes/theme-options/theme-options' . $suffix . '.js', array( 'jquery' ), '1.0' );
}

add_action( 'admin_print_styles-appearance_page_theme_options', 'responsive_admin_enqueue_scripts' );

/**
 * Init plugin options to white list our options
 */
function responsive_theme_options_init() {
	register_setting( 'responsive_options', 'responsive_theme_options', 'responsive_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function responsive_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'responsive' ), __( 'Theme Options', 'responsive' ), 'edit_theme_options', 'theme_options', 'responsive_theme_options_do_page' );
}

function responsive_inline_css() {
	global $responsive_options;
	if ( !empty( $responsive_options['responsive_inline_css'] ) ) {
		echo '<!-- Custom CSS Styles -->' . "\n";
		echo '<style type="text/css" media="screen">' . "\n";
		echo $responsive_options['responsive_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action( 'wp_head', 'responsive_inline_css', 110 );

function responsive_inline_js_head() {
	global $responsive_options;
	if ( !empty( $responsive_options['responsive_inline_js_head'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $responsive_options['responsive_inline_js_head'];
		echo "\n";
	}
}

add_action( 'wp_head', 'responsive_inline_js_head' );

function responsive_inline_js_footer() {
	global $responsive_options;
	if ( !empty( $responsive_options['responsive_inline_js_footer'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $responsive_options['responsive_inline_js_footer'];
		echo "\n";
	}
}

add_action( 'wp_footer', 'responsive_inline_js_footer' );

/**
 * Create the options page
 */
function responsive_theme_options_do_page() {

	if ( !isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	}

	// Set confirmaton text for restore default option as attributes of submit_button().
	$attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore?', 'responsive' ) . '\n' . __( 'All theme settings will be lost!', 'responsive' ) . '\n' . __( 'Click OK to Restore.', 'responsive' ) . '")';
	?>

	<div class="wrap">
	<?php $theme_name = wp_get_theme() ?>
	<?php echo "<h2>" . $theme_name . " " . __( 'Theme Options', 'responsive' ) . "</h2>"; ?>


	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options Saved', 'responsive' ); ?></strong></p></div>
	<?php endif; ?>

	<?php responsive_theme_options(); // Theme Options Hook ?>

	<?php

	/**
	 * Create array of option sections
	 *
	 * @Title The display title
	 * @id The id that the option array references so the options display in the correct section
	 */
	$sections = apply_filters( 'responsive_option_sections_filter', array(
																	  array(
																		  'title' => __( 'Theme Elements', 'responsive' ),
																		  'id'    => 'theme_elements'
																	  ),

																	  array(
																		  'title' => __( 'Logo Upload', 'responsive' ),
																		  'id'    => 'logo_upload'
																	  ),
																	  array(
																		  'title' => __( 'Home Page', 'responsive' ),
																		  'id'    => 'home_page'
																	  )
																  ,
																	  array(
																		  'title' => __( 'Default Layouts', 'responsive' ),
																		  'id'    => 'layouts'
																	  ),
																	  array(
																		  'title' => __( 'Social Icons', 'responsive' ),
																		  'id'    => 'social'
																	  ),
																	  array(
																		  'title' => __( 'CSS Styles', 'responsive' ),
																		  'id'    => 'css'
																	  ),
																	  array(
																		  'title' => __( 'Scripts', 'responsive' ),
																		  'id'    => 'scripts'
																	  )

																  )

	);

	/**
	 * Creates and array of options that get added to the relevant sections
	 *
	 * @key This must match the id of the section you want the options to appear in
	 *
	 * @title Title on the left hand side of the options
	 * @subtitle Displays underneath main title on left hand side
	 * @heading Right hand side above input
	 * @type The type of input e.g. text, textarea, checkbox
	 * @id The options id
	 * @description Instructions on what to enter in input
	 * @placeholder The placeholder for text and textarea
	 * @options array used by select dropdown lists
	 */
	$options = apply_filters( 'responsive_options_filter', array(
		'theme_elements' => array(
			array(
				'title'       => __( 'Disable breadcrumb list?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'breadcrumb',
				'description' => __( 'Check to disable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Disable Call to Action Button?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'cta_button',
				'description' => __( 'Check to disable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Enable minified css?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'minified_css',
				'description' => __( 'Check to enable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Enable Blog Title', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_post_title_toggle',
				'description' => __( 'Check to enable', 'responsive' ),
			),
			array(
				'title'       => __( 'Title Text', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'blog_post_title_text',
				'description' => '',
				'placeholder' => __( 'Blog', 'responsive' )
			),
			array(
				'title'       => __( 'Copyright Text', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'copyright_textbox',
				'description' => '',
				'placeholder' => __( 'Default Copyright Text', 'responsive' )
			),
			array(
				'title'       => __( 'Display Powered By WordPress Link', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'poweredby_link',
				'description' => '',
				'placeholder' => ''
			)
		),
		'logo_upload' => array(
			array(
				'title'       => __( 'Custom Header', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => __( 'Need to replace or remove default logo?', 'responsive' ) . sprintf( ' <a href="%s">' . __( 'Click here', 'responsive' ) . '</a>.',
				 admin_url( 'themes.php?page=custom-header' ) ),
				'placeholder' => ''
			)
		),
		'home_page' => array(
			array(
				'title'       => __( 'Enable Custom Front Page', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'front_page',
				'description' => sprintf( __( 'Overrides the WordPress %1sfront page option%2s', 'responsive' ), '<a href="options-reading.php">', '</a>' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Headline', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'home_headline',
				'description' => __( 'Enter your headline', 'responsive' ),
				'placeholder' => __( 'HAPPINESS', 'responsive' )
			),
			array(
				'title'       => __( 'Subheadline', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'home_subheadline',
				'description' => __( 'Enter your subheadline', 'responsive' ),
				'placeholder' => __( 'IS A WARM CUP', 'responsive' )
			),
			array(
				'title'       => __( 'Content Area', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'editor',
				'id'          => 'home_content_area',
				'description' => __( 'Enter your content', 'responsive' ),
				'placeholder' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' )
			),
			array(
				'title'       => __( 'Call to Action (URL)', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'cta_url',
				'description' => __( 'Enter your call to action URL', 'responsive' ),
				'placeholder' => '#nogo'
			),
			array(
				'title'       => __( 'Call to Action (Text)', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'cta_text',
				'description' => __( 'Enter your call to action text', 'responsive' ),
				'placeholder' => __( 'Call to Action', 'responsive' )
			),
			array(
				'title'       => __( 'Featured Content', 'responsive' ),
				'subtitle'    => '<a class="help-links" href="' . esc_url( 'http://cyberchimps.com/guide/responsive/' ) . '" title="' . esc_attr__( 'See Docs', 'responsive' ) . '" target="_blank">' .
				 __( 'See Docs', 'responsive' ) . '</a>',
				'heading'     => '',
				'type'        => 'editor',
				'id'          => 'featured_content',
				'description' => __( 'Paste your shortcode, video or image source', 'responsive' ),
				'placeholder' => "<img class='aligncenter' src='" . get_template_directory_uri() . "'/core/images/featured-image.png' width='440' height='300' alt='' />"
			)

		),
		'layouts' => array(
			array(
				'title'       => __( 'Default Static Page Layout', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'select',
				'id'          => 'static_page_layout_default',
				'description' => '',
				'placeholder' => '',
				'options'     => Responsive_Options::valid_layouts()
			),
			array(
				'title'       => __( 'Default Single Blog Post Layout', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'select',
				'id'          => 'single_post_layout_default',
				'description' => '',
				'placeholder' => '',
				'options'     => Responsive_Options::valid_layouts()
			),
			array(
				'title'       => __( 'Default Blog Posts Index Layout', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'select',
				'id'          => 'blog_posts_index_layout_default',
				'description' => '',
				'placeholder' => '',
				'options'     => Responsive_Options::valid_layouts()
			)

		),
		'social' => array(
			array(
				'title'       => __( 'Twitter', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'twitter_uid',
				'description' => __( 'Enter your Twitter URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Facebook', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'facebook_uid',
				'description' => __( 'Enter your Facebook URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'LinkedIn', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'linkedin_uid',
				'description' => __( 'Enter your LinkedIn URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'YouTube', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'youtube_uid',
				'description' => __( 'Enter your YouTube URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'StumbleUpon', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'stumble_uid',
				'description' => __( 'Enter your StumbleUpon URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'RSS Feed', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'rss_uid',
				'description' => __( 'Enter your RSS Feed URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Google+', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'google_plus_uid',
				'description' => __( 'Enter your Google+ URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Instagram', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'instagram_uid',
				'description' => __( 'Enter your Instagram URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Pinterest', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'pinterest_uid',
				'description' => __( 'Enter your Pinterest URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Yelp!', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'yelp_uid',
				'description' => __( 'Enter your Yelp! URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Vimeo', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'vimeo_uid',
				'description' => __( 'Enter your Vimeo URL', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'foursquare', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'foursquare_uid',
				'description' => __( 'Enter your foursquare URL', 'responsive' ),
				'placeholder' => ''
			)

		),
		'css' => array(
			array(
				'title'       => __( 'Custom CSS Styles', 'responsive' ),
				'subtitle'    => '<a class="help-links" href="https://developer.mozilla.org/en/CSS" title="CSS Tutorial" target="_blank">' . __( 'CSS Tutorial', 'responsive' ) . '</a>',
				'heading'     => '',
				'type'        => 'textarea',
				'id'          => 'responsive_inline_css',
				'description' => __( 'Enter your custom CSS styles.', 'responsive' ),
				'placeholder' => ''
			)
		),
		'scripts' => array(
			array(
				'title'       => __( 'Custom Scripts for Header and Footer', 'responsive' ),
				'subtitle'    => '<a class="help-links" href="http://codex.wordpress.org/Using_Javascript" title="Quick Tutorial" target="_blank">' . __( 'Quick Tutorial', 'responsive' ) . '</a>',
				'heading'     => __( 'Embeds to header.php &darr;', 'responsive' ),
				'type'        => 'textarea',
				'id'          => 'responsive_inline_js_head',
				'description' => __( 'Enter your custom header script.', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => '',
				'subtitle'    => '',
				'heading'     => __( 'Embeds to footer.php &darr;', 'responsive' ),
				'type'        => 'textarea',
				'id'          => 'responsive_inline_js_footer',
				'description' => __( 'Enter your custom footer script.', 'responsive' ),
				'placeholder' => ''
			)
		)
	) );

	if ( class_exists( 'Responsive_Pro_Options' ) ) {
		$display = new Responsive_Pro_Options( $sections, $options );
	}
	else {
		$display = new Responsive_Options( $sections, $options );
	}

	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'responsive_options' ); ?>
		<?php global $responsive_options; ?>

		<div id="rwd" class="grid col-940">
			<?php
			$display->render_display();
			?>
		</div>
		<!-- end of .grid col-940 -->
	</form>
	</div><!-- wrap -->
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function responsive_theme_options_validate( $input ) {

	global $responsive_options;
	$defaults = responsive_get_option_defaults();

	if ( isset( $input['reset'] ) ) {

		$input = $defaults;

	}
	else {

		// checkbox value is either 0 or 1
		foreach( array(
					'breadcrumb',
					'cta_button',
					'front_page'
				) as $checkbox ) {
			if ( !isset( $input[$checkbox] ) ) {
				$input[$checkbox] = null;
			}
			$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}
		foreach( array(
					'static_page_layout_default',
					'single_post_layout_default',
					'blog_posts_index_layout_default'
				) as $layout ) {
			$input[$layout] = ( isset( $input[$layout] ) && array_key_exists( $input[$layout], responsive_get_valid_layouts() ) ? $input[$layout] : $responsive_options[$layout] );
		}
		foreach( array(
					'home_headline',
					'home_subheadline',
					'home_content_area',
					'cta_text',
					'cta_url',
					'featured_content',
				) as $content ) {
			$input[$content] = ( in_array( $input[$content], array( $defaults[$content], '' ) ) ? $defaults[$content] : wp_kses_stripslashes( $input[$content] ) );
		}
		$input['google_site_verification']    = ( isset( $input['google_site_verification'] ) ) ? wp_filter_post_kses( $input['google_site_verification'] ) : null;
		$input['bing_site_verification']      = ( isset( $input['bing_site_verification'] ) ) ? wp_filter_post_kses( $input['bing_site_verification'] ) : null;
		$input['yahoo_site_verification']     = ( isset( $input['yahoo_site_verification'] ) ) ? wp_filter_post_kses( $input['yahoo_site_verification'] ) : null;
		$input['site_statistics_tracker']     = ( isset( $input['site_statistics_tracker'] ) ) ? wp_kses_stripslashes( $input['site_statistics_tracker'] ) : null;
		$input['twitter_uid']                 = esc_url_raw( $input['twitter_uid'] );
		$input['facebook_uid']                = esc_url_raw( $input['facebook_uid'] );
		$input['linkedin_uid']                = esc_url_raw( $input['linkedin_uid'] );
		$input['youtube_uid']                 = esc_url_raw( $input['youtube_uid'] );
		$input['stumble_uid']                 = esc_url_raw( $input['stumble_uid'] );
		$input['rss_uid']                     = esc_url_raw( $input['rss_uid'] );
		$input['google_plus_uid']             = esc_url_raw( $input['google_plus_uid'] );
		$input['instagram_uid']               = esc_url_raw( $input['instagram_uid'] );
		$input['pinterest_uid']               = esc_url_raw( $input['pinterest_uid'] );
		$input['yelp_uid']                    = esc_url_raw( $input['yelp_uid'] );
		$input['vimeo_uid']                   = esc_url_raw( $input['vimeo_uid'] );
		$input['foursquare_uid']              = esc_url_raw( $input['foursquare_uid'] );
		$input['responsive_inline_css']       = wp_kses_stripslashes( $input['responsive_inline_css'] );
		$input['responsive_inline_js_head']   = wp_kses_stripslashes( $input['responsive_inline_js_head'] );
		$input['responsive_inline_js_footer'] = wp_kses_stripslashes( $input['responsive_inline_js_footer'] );

		$input = apply_filters( 'responsive_options_validate', $input );
	}

	return $input;
}
