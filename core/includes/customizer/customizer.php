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
	if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
		add_action( 'customize_controls_print_scripts', $n( 'responsive_pro_promotion_scripts' ) );
	}
	add_action( 'customize_register', $n( 'responsive_controls_helpers' ) );
	add_action( 'customize_controls_enqueue_scripts', $n( 'responsive_custom_customize_enqueue' ) );
	add_action( 'customize_controls_print_scripts', $n( 'responsive_customizer_promo_print_template' ) );

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
function responsive_pro_button_style_validate( $input ) {
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
function responsive_sanitize_checkbox( $input ) {
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
function responsive_sanitize_posts( $input ) {
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
function responsive_sanitize_multiple_checkboxes( $values ) {

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
	wp_enqueue_script( 'responsive_theme_lifter_customize', get_template_directory_uri() . '/core/includes/customizer/assets/js/lifter-customize-preview.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	if ( is_responsive_version_greater() ) {
		wp_enqueue_script( 'responsive_theme_customizer_image', get_template_directory_uri() . '/core/includes/customizer/assets/js/customize-preview-image-control.js', array( 'customize-preview' ), RESPONSIVE_THEME_VERSION, true );
	}
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
		'class-responsive-site-color-palettes-scheme-customizer',
		'class-responsive-site-colors-customizer',
		'class-responsive-site-typography-customizer',
		'class-responsive-header-layout-customizer',
		'class-responsive-header-title-tagline-customizer',
		'class-responsive-header-colors-customizer',
		'class-responsive-header-transparent-customizer',
		'class-responsive-header-scripts-customizer',
		'class-responsive-header-menu-layouts-customizer',
		'class-responsive-content-header-colors-customizer',
		'class-responsive-content-header-layout-customizer',
		'class-responsive-content-header-typography-customizer',
		'class-responsive-blog-layout-customizer',
		'class-responsive-single-blog-layout-customizer',
		'class-responsive-page-content-customizer',
		'class-responsive-footer-layout-customizer',
		'class-responsive-footer-colors-customizer',
		'class-responsive-footer-scripts-customizer',
		'class-responsive-typography-customizer',
		'class-responsive-theme-options-customizer',
		'class-responsive-home-page-customizer',
		'class-responsive-customizer-notices',
		'class-responsive-sidebar-colors-customizer',
		'class-responsive-scroll-to-top-customizer',
		'class-responsive-buttons-customizer',
		'class-responsive-form-fields-customizer',
		'class-responsive-header-widgets-customizer',
		'class-responsive-sidebar-layout-customizer',
	);

	if ( is_responsive_version_greater() ) {
		$files[] = 'class-responsive-background-image-customizer';
	}

	foreach ( $files as $key ) {

		$setting = str_replace( '-', '_', $key );
		require_once $dir . $key . '.php';

	}
}

/**
 * Verify if the version of specified products is greater or not.
 *
 * @since 4.9.7
 */
function is_responsive_version_greater() {
	$theme                    = wp_get_theme( 'responsive' );
	$is_theme_version_greater = false;
	if ( version_compare( $theme['Version'], '4.9.6', '>' ) ) {
		$is_theme_version_greater = true;
	}
	return $is_theme_version_greater;
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
	require_once $dir . 'palette/class-responsive-customizer-palette-control.php';
	require_once $dir . 'color/class-responsive-customizer-color-control.php';
	require_once $dir . 'range/class-responsive-customizer-range-control.php';
	require_once $dir . 'slider/class-responsive-customizer-slider-control.php';
	require_once $dir . 'sortable/class-responsive-customizer-sortable-control.php';
	require_once $dir . 'text/class-responsive-customizer-text-control.php';
	require_once $dir . 'typography/class-responsive-customizer-typography-control.php';
	require_once $dir . 'dimensions/class-responsive-customizer-dimensions-control.php';
	require_once $dir . 'heading/class-responsive-customizer-heading-control.php';
	require_once $dir . 'select/class-responsive-customizer-responsive-select-control.php';
	require_once $dir . 'checkbox/class-responsive-customizer-responsive-checkbox-control.php';
	require_once $dir . 'redirect/class-responsive-customizer-redirect-control.php';
	require_once $dir . 'selectbtn/class-responsive-customizer-responsive-selectbtn-control.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-control-upsell.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-generic-notice-section.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-main-notice-section.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-section-docs.php';
	require_once RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/upsell/class-responsive-section-upsell.php';
	// Register JS control types.
	$wp_customize->register_control_type( 'Responsive_Customizer_Palette_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Range_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Slider_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Sortable_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Text_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Typography_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Dimensions_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Heading_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Select_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Checkbox_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Redirect_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Select_Button_Control' );

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

		// Enqueue Customizer React.JS script.

		$custom_controls_react_deps = array(
			'wp-i18n',
			'wp-components',
			'wp-element',
			'wp-media-utils',
			'wp-block-editor',
		);
		if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
			wp_enqueue_script( 'responsive-custom-control-react-script', get_template_directory_uri() . '/core/includes/customizer/extend-controls/build/index.js', $custom_controls_react_deps, RESPONSIVE_THEME_VERSION, true );
		} else {
			$plugin_path            = WP_PLUGIN_DIR . '/responsive-addons-pro/responsive-addons-pro.php';
			$plugin_info            = get_plugin_data( $plugin_path );
			$responsive_pro_version = $plugin_info['Version'];
			$compare                = version_compare( $responsive_pro_version, RESPONSIVE_PRO_OLDER_VERSION_CHECK );
			if ( 0 === $compare || 1 === $compare ) {
				wp_enqueue_script( 'responsive-custom-control-react-script', get_template_directory_uri() . '/core/includes/customizer/extend-controls/build/index.js', $custom_controls_react_deps, RESPONSIVE_THEME_VERSION, true );
			}
		}
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

/**
 * Responsive Pro Promotion Scripts.
 *
 * @since 4.8.5
 */
function responsive_pro_promotion_scripts() {
	$output  = '<script type="text/javascript">';
	$output .= '
	        	wp.customize.bind(\'ready\', function() {
	            	wp.customize.section( \'responsive_typography\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-global-settings-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_header_transparent\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-header-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_single_blog_layout\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-blog-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_scrolltotop_section\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-footer-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'woocommerce_checkout\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-woocommerce-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_woocommerce_shop_colors\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-product-catalog-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_woocommerce_single_product_layout\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-product-options-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	            	wp.customize.section( \'responsive_woocommerce_cart_colors\', function( section ) {
						section.deferred.embedded.done( function() {
							let customMessage = jQuery( wp.template( \'resp-customizer-promo-cart-options-section\' )() );
							section.headContainer.append( customMessage );
						} );
					});
	        	});';

	$output .= '</script>';

	// Ignoring EscapeOutput to print JS.
	echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Responsive Pro Promotion Templates.
 *
 * @since 4.8.5
 */
function responsive_customizer_promo_print_template() {
	?>
	<script type="text/html" id="tmpl-resp-customizer-promo-global-settings-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Get access to global features that save your time & designing efforts.', 'responsive' ); ?></p>
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Background Images', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Spacing', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Button Images', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=global_settings' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-header-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Impress your website visitors with stunning site headers.', 'responsive' ); ?></p>
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Sticky Header', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Shrink Logo On Scroll', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Separate Logo for Mobile', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Header Widget Background Image', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Transparent Header Background Image', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=header_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-page-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Match the typography of your pages as per your designs.', 'responsive' ); ?></p>
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Page Title Typography Options', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=page_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-blog-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Control layouts, and make detailed changes to your blog pages with more features.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Desktop Blog Layouts', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Date Box Styling', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Post Pagination Options', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Enable/Disable Author Profile Box', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=blog_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-footer-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Add amazing footers to your website to finish it off in your way.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Multiple Footer Elements', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Hide Powered By Responsive Theme', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Footer Background Image', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=footer_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-woocommerce-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Add enhanced features to your WooCommerce store to maximize profits.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Checkout Form Width', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=wooCommerce_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-product-catalog-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Add essential product page features to improve the experience and get more sales.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Product Page Breadcrumbs', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Product Image Styling Options', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Shop Page Typography Options', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Product Page Typography Options', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=product_catalog_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-product-options-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Match the typography of your products to match your designs.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Product Title Typography Options', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=product_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<script type="text/html" id="tmpl-resp-customizer-promo-cart-options-section">
		<div id="resp-pro-promo-section">
			<div class="resp-pro-promo-header">
				<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'images/cc_logo_customizer.svg'; ?>" alt="cc_logo_customizer">
				<div class="resp-pro-promo-header-text">
					<p><?php esc_html_e( 'Maximize your sales by adding appealing cart button that gets more clicks.', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-features">
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Different Icon Options', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Icon Color', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Display Cart Title', 'responsive' ); ?></p>	
				</div>
				<div class="resp-pro-promo-feature">
					<span class="dashicons dashicons-saved"></span>&emsp;
					<p class="resp-pro-promo-feature-text"><?php esc_html_e( 'Display Cart Total', 'responsive' ); ?></p>	
				</div>
			</div>
			<div class="resp-pro-promo-upgrade-btn">
				<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=responsive_theme&utm_medium=customizer&utm_campaign=free-to-pro&utm_term=cart_options' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade To Pro', 'responsive' ); ?></a>
			</div>
		</div>
	</script>
	<?php
}
