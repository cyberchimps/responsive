<?php
/**
 * Responsive  Theme Customizer
 *
 * @package responsive
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';







/*--------------------------------------------------------------
	// Default Layouts
--------------------------------------------------------------*/

	$wp_customize->add_section( 'default_layouts', array(
		'title'                 => __( 'Default Layouts', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[static_page_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_default_layouts', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_static_page_layout_default', array(
		'label'                 => __( 'Default Static Page Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[static_page_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::valid_layouts()
	) );
	// $wp_customize->add_setting( 'responsive_theme_options[single_post_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_default_layouts', 'type' => 'option' ) );
	// $wp_customize->add_control( 'res_single_post_layout_default', array(
	// 	'label'                 => __( 'Default Single Blog Post Layout', 'responsive' ),
	// 	'section'               => 'default_layouts',
	// 	'settings'              => 'responsive_theme_options[single_post_layout_default]',
	// 	'type'                  => 'select',
	// 	'choices'               => Responsive_Options::valid_layouts()
	// ) );
	$wp_customize->add_setting('responsive_theme_options[blog_posts_index_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_blog_default_layouts', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_hblog_posts_index_layout_default', array(
		'label'                 => __( 'Default Blog Posts Index Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[blog_posts_index_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::blog_valid_layouts()
	) );


/*--------------------------------------------------------------
	// CSS Styles
--------------------------------------------------------------*/
$wp_version = get_bloginfo('version');
if (!($wp_version >= 4.7))
{
	$wp_customize->add_section( 'css_styles', array(
		'title'                 => __( 'CSS Styles', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_css]' ,array( 'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_responsive_inline_css', array(
		'label'                 => __( 'Custom CSS Styles', 'responsive' ),
		'section'               => 'css_styles',
		'settings'              => 'responsive_theme_options[responsive_inline_css]',
		'type'                  => 'textarea'
	) );
}





}
add_action( 'customize_register', 'responsive_customize_register' );


        /**
 * Validates the Call to Action Button styles
 *
 * @param $input select
 *
 * @return string
 */
function responsive_pro_button_style_validate( $input ) {
	// An array of valid results
	//$valid = responsive_get_valid_featured_area_layouts();
         $valid = array(
             'default' => 'Gradient',
             'flat_style' => 'Flat'
         );

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function responsive_validate_site_layout( $input ) {
	// An array of valid results

	$valid = array(
			'default-layout' => 'Default',
			'full-width-layout' => 'Full Width Layout',
			'full-width-no-box' =>'Full Width Without boxes'
	);

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}
function responsive_sanitize_checkbox( $input ) {
		if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

function responsive_sanitize_textarea( $input ) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}

function responsive_sanitize_posts( $input ) {
	$output = '';
	$options_posts = array();
	$options_posts_obj = get_posts('posts_per_page=-1');
	$options_posts[''] = esc_html(__( 'Choose Post', 'responsive' ));
	foreach ( $options_posts_obj as $posts ) {
		$options_posts[$posts->ID] = $posts->post_title;
	}
	$option = $options_posts;
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}

function responsive_sanitize_default_layouts( $input ) {
	$output = '';
	$option = Responsive_Options::valid_layouts();
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}

	return $output;
}
function responsive_sanitize_blog_default_layouts( $input ) {
	$output = '';
	$option = Responsive_Options::blog_valid_layouts();
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}
function responsive_sanitize_multiple_checkboxes( $values ) {

	$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

	return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

function responsive_validate_site_footer_layout( $input ) {
	// An array of valid results

	$valid = array(
			'footer-default-layout' => 'Default (3 column)',
			'footer-2-col' => '2 Column Layout',
	);

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function responsive_customize_preview_js() {
	wp_enqueue_script( 'responsive_customizer', get_template_directory_uri() . '/core/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'responsive_customize_preview_js' );

/**
 * Adds customizer options
 *
 */
function register_options() {
	// Var.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/settings/';

	// Customizer files array.
	$files = array(
		'site-colors',
		'button',
		'typoghraphy',
		'theme-options',
		'layout',
		'home-page',
		'links',
		'footer',
		'footer-copyrights',
	);

	foreach ( $files as $key ) {

		$setting = str_replace( '-', '_', $key );
		require_once $dir . $key . '.php';

	}
}

add_action( 'after_setup_theme', 'register_options' );

/**
 * Adds custom controls.
 *
 * @param object $wp_customize WordPress customizer.
 *
 * @since 1.0.0
 */
function custom_controls( $wp_customize ) {

	// Path.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/';

	// Load customize control classes.
	//require_once $dir . 'buttonset/class-control-buttonset.php';
	 require_once $dir . 'color/class-control-color.php';
	// require_once $dir . 'dimensions/class-control-dimensions.php';
	// require_once $dir . 'dropdown-pages/class-control-dropdown-pages.php';
	// require_once $dir . 'heading/class-control-heading.php';
	// require_once $dir . 'icon-select/class-control-icon-select.php';
	// require_once $dir . 'multicheck/class-control-multicheck.php';
	// require_once $dir . 'multiple-select/class-control-multiple-select.php';
	// require_once $dir . 'radio-image/class-control-radio-image.php';
	 require_once $dir . 'range/class-control-range.php';
	 require_once $dir . 'slider/class-control-slider.php';
	 require_once $dir . 'sortable/class-control-sortable.php';
	 require_once $dir . 'text/class-control-text.php';
	// require_once $dir . 'textarea/class-control-textarea.php';
	// require_once $dir . 'typo/class-control-typo.php';
	require_once $dir . 'typography/class-control-typography.php';

	// Register JS control types.
	// $wp_customize->register_control_type( 'Responsive_Customizer_Buttonset_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Dimensions_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Dropdown_Pages' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Heading_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Icon_Select_Control' );
	 //$wp_customize->register_control_type( 'Responsive_Customize_Multicheck_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customize_Multiple_Select_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Range_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Slider_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Radio_Image_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Sortable_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Text_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Textarea_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Typo_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Typography_Control' );

}
add_action( 'customize_register', 'custom_controls' );

/**
 * Adds customizer helpers
 *
 */
function controls_helpers() {
	//require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/customizer-helpers.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/sanitization-callbacks.php';
}
add_action( 'customize_register', 'controls_helpers' );
