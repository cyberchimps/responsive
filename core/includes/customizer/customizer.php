<?php
/**
 * Responsive  Theme Customizer
 *
 * @package responsive
 */

namespace Responsive\Customizer;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'customize_register', $n( 'responsive_customize_register' ) );
	add_action( 'customize_preview_init', $n( 'responsive_customize_preview_js' ) );
	add_action( 'after_setup_theme', $n( 'responsive_register_options' ) );
	add_action( 'customize_register', $n( 'responsive_custom_controls' ) );
	add_action( 'customize_controls_print_scripts', $n( 'responsive_tooltip_script' ) );
	add_action( 'customize_register', $n( 'responsive_controls_helpers' ) );
	add_action( 'customize_controls_enqueue_scripts', $n( 'responsive_custom_customize_enqueue' ) );

}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image' )->transport    = 'refresh';
	$wp_customize->get_setting( 'custom_logo' )->transport     = 'refresh';

	/*
	--------------------------------------------------------------
	// CSS Styles
	--------------------------------------------------------------
	*/
	$wp_version = get_bloginfo( 'version' );
	if ( ! ( $wp_version >= 4.7 ) ) {
		$wp_customize->add_section(
			'css_styles',
			array(
				'title'    => __( 'CSS Styles', 'responsive' ),
				'priority' => 30,
			)
		);
		$wp_customize->add_setting(
			'responsive_theme_options[responsive_inline_css]',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'type'              => 'option',
			)
		);
		$wp_customize->add_control(
			'res_responsive_inline_css',
			array(
				'label'    => __( 'Custom CSS Styles', 'responsive' ),
				'section'  => 'css_styles',
				'settings' => 'responsive_theme_options[responsive_inline_css]',
				'type'     => 'textarea',
			)
		);
	}

}

/**
 * Validates the Call to Action Button styles
 *
 * @param  object $input    arguments.
 *
 * @return string
 */
function responsive_pro_button_style_validate( $input = '' ) {
	/** An array of valid results */
	$valid = array(
		'default'    => __( 'Gradient', 'responsive' ),
		'flat_style' => __( 'Flat', 'responsive' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Function for sanitizing
 *
 * @param object $input arguments.
 */
function responsive_sanitize_checkbox( $input = '' ) {
	if ( $input ) {
		$output = 1;
	} else {
		$output = 0;
	}
	return $output;
}

/**
 * Function for sanitizing
 *
 * @param object $input arguments.
 */
function responsive_sanitize_posts( $input = '' ) {
	$output            = '';
	$options_posts     = array();
	$options_posts_obj = get_posts( 'posts_per_page=-1' );
	$options_posts[''] = esc_html( __( 'Choose Post', 'responsive' ) );
	foreach ( $options_posts_obj as $posts ) {
		$options_posts[ $posts->ID ] = $posts->post_title;
	}
	$option = $options_posts;
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}

/**
 * Function for sanitizing checkboxes
 *
 * @param object $values arguments.
 */
function responsive_sanitize_multiple_checkboxes( $values = '' ) {

	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

	return ! empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function responsive_customize_preview_js() {
	wp_enqueue_script( 'responsive_customizer', get_template_directory_uri() . '/core/js/customizer.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_color', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-color-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_checkbox', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-checkbox-control.js', array( 'customize-preview', 'jquery', 'customize-base' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_padding', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-padding-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_number', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-number-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_drag_number', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-drag-number-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_select', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-select-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive_theme_customizer_text', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-text-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
}

/**
 * Adds customizer options
 */
function responsive_register_options() {
	// Var.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/settings/';
	require get_template_directory() . '/admin/class-responsive-plugin-install-helper.php';

	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-abstract-main.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-register-customizer-controls.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/types/class-responsive-customizer-panel.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/types/class-responsive-customizer-control.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/types/class-responsive-customizer-partial.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/types/class-responsive-customizer-section.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-upsell-manager.php';

	// Customizer files array.
	$files = array(
		'class-responsive-panel',
		'class-responsive-site-layouts-customizer',
		'class-responsive-site-colors-customizer',
		'class-responsive-site-typography-customizer',
		'class-responsive-header-layout-customizer',
		'class-responsive-header-colors-customizer',
		'class-responsive-header-typography-customizer',
		'class-responsive-header-scripts-customizer',
		'class-responsive-header-menu-layouts-customizer',
		'class-responsive-header-menu-colors-customizer',
		'class-responsive-content-header-colors-customizer',
		'class-responsive-content-header-layout-customizer',
		'class-responsive-content-header-typography-customizer',
		'class-responsive-blog-content-header-customizer',
		'class-responsive-blog-layout-customizer',
		'class-responsive-blog-content-customizer',
		'class-responsive-single-blog-layout-customizer',
		'class-responsive-single-blog-content-customizer',
		'class-responsive-page-layout-customizer',
		'class-responsive-page-content-customizer',
		'class-responsive-footer-layout-customizer',
		'class-responsive-footer-colors-customizer',
		'class-responsive-footer-scripts-customizer',
		'class-responsive-typography-customizer',
		'class-responsive-theme-options-customizer',
		'class-responsive-home-page-customizer',
		'class-responsive-customizer-notices',
	);

	foreach ( $files as $key ) {

		$setting = str_replace( '-', '_', $key );
		require_once $dir . $key . '.php';

	}
}

/**
 * Adds custom controls.
 *
 * @param object $wp_customize WordPress customizer.
 *
 * @since 1.0.0
 */
function responsive_custom_controls( $wp_customize ) {

	// Path.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/';

	// Load customize control classes.
	require_once $dir . 'color/class-responsive-customizer-color-control.php';
	require_once $dir . 'range/class-responsive-customizer-range-control.php';
	require_once $dir . 'slider/class-responsive-customizer-slider-control.php';
	require_once $dir . 'sortable/class-responsive-customizer-sortable-control.php';
	require_once $dir . 'text/class-responsive-customizer-text-control.php';
	require_once $dir . 'typography/class-responsive-customizer-typography-control.php';
	require_once $dir . 'dimensions/class-responsive-customizer-dimensions-control.php';
	require_once $dir . 'heading/class-responsive-customizer-heading-control.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-control-upsell.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-generic-notice-section.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-main-notice-section.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-section-docs.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-section-upsell.php';
	// Register JS control types.
	$wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Range_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Slider_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Sortable_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Text_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Typography_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Dimensions_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Heading_Control' );

}

/**
 * Adds customizer helpers
 */
function responsive_controls_helpers() {
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/sanitization-callbacks.php';
}

/**
 * Custom styles and js for customizer
 */
function responsive_custom_customize_enqueue() {
	wp_enqueue_style( 'responsive-general', get_template_directory_uri() . '/core/includes/customizer/assets/min/css/general.min.css', RESPONSIVE_THEME_VERSION, true );
	wp_enqueue_script( 'responsive-general', get_template_directory_uri() . '/core/includes/customizer/assets/min/js/general.min.js', array( 'jquery', 'customize-base' ), RESPONSIVE_THEME_VERSION, true );
}

/**
 * Tooltip script
 *
 * @since 3.23
 * @return void
 */
function responsive_tooltip_script() {
	$output  = '<script type="text/javascript">';
	$output .= '
	        	wp.customize.bind(\'ready\', function() {
	            	wp.customize.control.each(function(ctrl, i) {
	                	var desc = ctrl.container.find(".customize-control-description");
	                	if( desc.length) {
	                    	var title 		= ctrl.container.find(".customize-control-title");
	                    	var li_wrapper 	= desc.closest("li");
	                    	var tooltip = desc.text().replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
	                    			return \'&#\'+i.charCodeAt(0)+\';\';
								});
	                    	desc.remove();
	                    	li_wrapper.append(" <i class=\'res-control-tooltip dashicons dashicons-editor-help\'title=\'" + tooltip +"\'></i>");
	                	}
	            	});
	        	});';

	$output .= '</script>';

	// Ignoring EscapeOutput to print JS.
	echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}
