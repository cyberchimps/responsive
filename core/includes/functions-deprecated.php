<?php

// File core/includes/functions.php.

/**
 * Function to load controls
 *
 * @deprecated use Responsive\Core\responsive_load_customize_controls() instead
 */
function responsive_load_customize_controls() {
	Responsive\Core\responsive_load_customize_controls();
}

/**
 * Retrieve Theme option settings
 *
 * @deprecated use Responsive\Core\responsive_get_options() instead
 */
function responsive_get_options() {
	return Responsive\Core\responsive_get_options();
}


/**
 * Responsive Theme option defaults
 *
 * @deprecated use Responsive\Core\responsive_get_option_defaults() instead
 */
function responsive_get_option_defaults() {
	return Responsive\Core\responsive_get_option_defaults();
}

/**
 * Function to setup
 *
 * @deprecated use Responsive\Core\responsive_setup() instead
 */
function responsive_setup() {
	Responsive\Core\responsive_setup();
}


/**
 * Adjust content width in certain contexts.
 *
 * @deprecated use Responsive\Core\responsive_content_width() instead
 */
function responsive_content_width() {
	Responsive\Core\responsive_content_width();
}

/**
 * A safe way of adding stylesheets to a WordPress generated page.
 */
if ( ! function_exists( 'responsive_css' ) ) {

	/**
	 * @deprecated use Responsive\Core\responsive_css() instead
	 * @return void [description]
	 */
	function responsive_css() {
		Responsive\Core\responsive_css();
	}
}

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
if ( ! function_exists( 'responsive_js' ) ) {
	/**
	 * Function to load Js
	 *
	 * @deprecated use Responsive\Core\responsive_css() instead
	 */
	function responsive_js() {
		Responsive\Core\responsive_js();
	}
}

/**
 * Function for team section options
 *
 * @deprecated use Responsive\Core\responsive_team_add_meta_box() instead
 */
function responsive_team_add_meta_box() {
	Responsive\Core\responsive_team_add_meta_box();
}

/**
 * Function for team meta box
 *
 * @deprecated use Responsive\Core\responsive_team_meta_box_cb() instead
 */
function responsive_team_meta_box_cb() {
	Responsive\Core\responsive_team_meta_box_cb();
}

/**
 * Save team member meta data
 *
 * @deprecated use Responsive\Core\responsive_team_meta_box_save() instead
 * @param int $post_id Post id.
 */
function responsive_team_meta_box_save( $post_id ) {
	Responsive\Core\responsive_team_meta_box_save( $post_id );
}

/**
 * A comment reply.
 *
 * @deprecated use Responsive\Core\responsive_enqueue_comment_reply() instead
 */
function responsive_enqueue_comment_reply() {
	Responsive\Core\responsive_enqueue_comment_reply();
}

/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 *
 * @deprecated use Responsive\Core\responsive_front_page_override() instead
 */
function responsive_front_page_override( $new, $orig ) {
	return Responsive\Core\responsive_front_page_override( $new, $orig );
}

/**
 * Funtion to add CSS class to body
 *
 * @deprecated use Responsive\Core\responsive_add_class() instead
 * @param array $classes html classes.
 */
function responsive_add_class( $classes ) {
	return Responsive\Core\responsive_add_class( $classes );
}


/**
 * [responsive_add_custom_body_classes Funtion to add CSS class to body].
 *
 * @deprecated use Responsive\Core\responsive_add_custom_body_classes() instead
 */
function responsive_add_custom_body_classes( $classes ) {
	return Responsive\Core\responsive_add_custom_body_classes( $classes );
}

/**
 * This function prints post meta data.
 *
 * CyberChimps
 */
if ( ! function_exists( 'responsive_post_meta_data' ) ) {

	/**
	 * Prints meta data
	 *
	 * @deprecated use Responsive\Core\responsive_post_meta_data() instead
	 */
	function responsive_post_meta_data() {
		Responsive\Core\responsive_post_meta_data();
	}
}

/**
 * Add Upgrade to pro button
 *
 * @deprecated use Responsive\Core\responsive_add_pro_button() instead
 */
function responsive_add_pro_button() {
	Responsive\Core\responsive_add_pro_button();
}

if ( ! function_exists( 'responsive_is_transparent_header' ) ) {
	/**
	 * Returns true if transparent header is enabled
	 * use Responsive\Core\responsive_is_transparent_header() instead
	 */
	function responsive_is_transparent_header() {
		return Responsive\Core\responsive_is_transparent_header();
	}
}

// File core/includes/functions-extras.php.

/**
 * Helps file locations in child themes. If the file is not being overwritten by the child theme then
 * return the parent theme location of the file. Great for images.
 *
 * @deprecated use Responsive\Extra\responsive_child_uri() instead
 * @return string complete uri
 */
function responsive_child_uri( $dir ) {
	return Responsive\Extra\responsive_child_uri( $dir );
}

/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 *
 * @deprecated use Responsive\Extra\responsive_category_rel_removal() instead
 * @param string $output Output.
 */
function responsive_category_rel_removal( $output ) {
	return Responsive\Extra\responsive_category_rel_removal( $output );
}

/**
 * Filter 'get_comments_number'
 *
 * @deprecated use Responsive\Extra\responsive_comment_count() instead
 * @param int $count Number of comments.
 */
function responsive_comment_count( $count ) {
	return Responsive\Extra\responsive_comment_count( $count );
}


/**
 * Pings Callback wp_list_comments()
 *
 * @deprecated use Responsive\Extra\responsive_comment_list_pings() instead
 * @param string $comment Comment.
 */
function responsive_comment_list_pings( $comment ) {
	Responsive\Extra\responsive_comment_list_pings( $comment );
}

/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 *
 * @deprecated use Responsive\Extra\responsive_excerpt_length() instead
 * @param  integer $length Length of excerpt.
 */
function responsive_excerpt_length( $length ) {
	return Responsive\Extra\responsive_excerpt_length( $length );
}

/**
 * Returns a "Read more" link for excerpts
 *
 * @deprecated use Responsive\Extra\responsive_read_more() instead
 */
function responsive_read_more() {
	return Responsive\Extra\responsive_read_more();
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and responsive_read_more_link().
 *
 * @deprecated use Responsive\Extra\responsive_auto_excerpt_more() instead
 * @param int $more More.
 */
function responsive_auto_excerpt_more( $more = 0 ) {
	return Responsive\Extra\responsive_auto_excerpt_more( $more = 0 );
}

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 *
 * @deprecated use Responsive\Extra\responsive_custom_excerpt_more() instead
 * @param string $output Append read more text.
 */
function responsive_custom_excerpt_more( $output ) {
	return Responsive\Extra\responsive_custom_excerpt_more( $output );
}

/**
 * This function removes inline styles set by WordPress gallery.
 *
 * @deprecated use Responsive\Extra\responsive_custom_excerpt_more() instead
 * @param string $css Replace media gallary css.
 */
function responsive_remove_gallery_css( $css ) {
	return Responsive\Extra\responsive_remove_gallery_css( $css );
}

/**
 * This function removes default styles set by WordPress recent comments widget.
 *
 * @deprecated use Responsive\Extra\responsive_remove_recent_comments_style() instead
 */
function responsive_remove_recent_comments_style() {
	Responsive\Extra\responsive_remove_recent_comments_style();
}

/**
 * Filter for better SEO wp_title().
 * Adopted from Twenty Twelve
 *
 * @deprecated use Responsive\Extra\responsive_title() instead
 * @param  [type] $title [description].
 * @param  [type] $sep   [description].
 * @return [type]        [description].
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */
function responsive_title( $title, $sep ) {
	return Responsive\Extra\responsive_title( $title, $sep );
}

/**
 * Removes div from wp_page_menu() and replace with ul.
 *
 * @deprecated use Responsive\Extra\responsive_wp_page_menu() instead
 * @param string $page_markup Page Markup.
 */
function responsive_wp_page_menu( $page_markup ) {

	return Responsive\Extra\responsive_wp_page_menu( $page_markup );
}

// File core/includes/functions-admin.php.

/**
 * Add Ask For Review Admin Notice.
 *
 * @deprecated use Responsive\Admin\responsive_ask_for_review_notice() instead
 */
function responsive_ask_for_review_notice() {
	Responsive\Admin\responsive_ask_for_review_notice();
}

/**
 * Removed Ask For Review Admin Notice when dismissed.
 *
 * @deprecated use Responsive\Admin\responsive_theme_notice_dismissed() instead
 */
function responsive_theme_notice_dismissed() {
	Responsive\Admin\responsive_theme_notice_dismissed();
}

/**
 * Removed Ask For Review Admin Notice when dismissed.
 *
 * @deprecated use Responsive\Admin\responsive_theme_notice_change_timeout() instead
 */
function responsive_theme_notice_change_timeout() {
	Responsive\Admin\responsive_theme_notice_change_timeout();
}

/**
 * Add styling for responsive_ask_for_review_notice function.
 *
 * @deprecated use Responsive\Admin\responsive_add_review_styling() instead
 */
function responsive_add_review_styling() {
	Responsive\Admin\responsive_add_review_styling();
}

// File core/includes/hooks.php.

/**
 * Just after opening <body> tag
 *
 * @deprecated use Responsive\responsive_container() instead
 * @see header.php
 */
function responsive_container() {
	Responsive\responsive_container();
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @deprecated use Responsive\responsive_container_end() instead
 * @see footer.php
 */
function responsive_container_end() {
	Responsive\responsive_container_end();
}

/**
 * Just after opening <header>
 *
 * @deprecated
 * @see header.php
 */
function responsive_header() {
	Responsive\responsive_header();
}

/**
 * Just after opening <header>
 *
 * @deprecated use Responsive\responsive_header_top() instead
 * @see header.php
 */
function responsive_header_top() {
	Responsive\responsive_header_top();
}
/**
 * Just before logo
 *
 * @deprecated use Responsive\responsive_header_with_logo() instead
 * @see header.php
 */
function responsive_header_with_logo() {
	Responsive\responsive_header_with_logo();
}

/**
 * Just after closing </header><!-- end of #header -->
 *
 * @deprecated use Responsive\responsive_header_bottom() instead
 * @see header.php
 */
function responsive_header_bottom() {
	Responsive\responsive_header_bottom();
}

/**
 * Just before opening <div id="wrapper">
 *
 * @deprecated use Responsive\responsive_wrapper() instead
 * @see header.php
 */
function responsive_wrapper() {
	Responsive\responsive_wrapper();
}

/**
 * Just before closing <div id="wrapper">
 *
 * @deprecated use Responsive\responsive_wrapper_close() instead
 * @see header.php
 */
function responsive_wrapper_close() {
	Responsive\responsive_wrapper_close();
}

/**
 * Just after opening <div id="wrapper">
 *
 * @deprecated use Responsive\responsive_wrapper_top() instead
 * @see header.php
 */
function responsive_wrapper_top() {
	Responsive\responsive_wrapper_top();
}

/**
 * Just after opening <div id="wrapper">
 *
 * @deprecated use Responsive\responsive_in_wrapper() instead
 * @see header.php
 */
function responsive_in_wrapper() {
	Responsive\responsive_in_wrapper();
}

/**
 * Just before closing </div><!-- end of #wrapper -->
 *
 * @deprecated use Responsive\responsive_wrapper_bottom() instead
 * @see header.php
 */
function responsive_wrapper_bottom() {
	Responsive\responsive_wrapper_bottom();
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @deprecated use Responsive\responsive_wrapper_end() instead
 * @see header.php
 */
function responsive_wrapper_end() {
	Responsive\responsive_wrapper_end();
}

/** Just before <div id="post">
 *
 * @deprecated use Responsive\responsive_entry_before() instead
 * @see index.php
 */
function responsive_entry_before() {
	Responsive\responsive_entry_before();
}

/** Just after <div id="post">
 *
 * @deprecated use Responsive\responsive_entry_top() instead
 * @see index.php
 */
function responsive_entry_top() {
	Responsive\responsive_entry_top();
}

/** Just before </div> <!-- end of div#post -->
 *
 * @deprecated use Responsive\responsive_entry_bottom() instead
 * @see index.php
 */
function responsive_entry_bottom() {
	Responsive\responsive_entry_bottom();
}

/** Just after </div> <!-- end of div#post -->
 *
 * @deprecated use Responsive\responsive_entry_after() instead
 * @see index.php
 */
function responsive_entry_after() {
	Responsive\responsive_entry_after();

}

/** Just before comments_template()
 *
 * @deprecated use Responsive\responsive_comments_before() instead
 * @see index.php
 */
function responsive_comments_before() {
	Responsive\responsive_comments_before();
}

/** Just after comments_template()
 *
 * @deprecated use Responsive\responsive_comments_after() instead
 * @see index.php
 */
function responsive_comments_after() {
	Responsive\responsive_comments_after();
}

/**
 * Just before opening <div id="secondary">
 *
 * @deprecated use Responsive\responsive_widgets_before() instead
 * @see sidebar.php
 */
function responsive_widgets_before() {
	Responsive\responsive_widgets_before();
}

/**
 * Just after opening <div id="secondary">
 *
 * @deprecated use Responsive\responsive_widgets() instead
 * @see sidebar.php
 */
function responsive_widgets() {
	Responsive\responsive_widgets();
}

/**
 * Just before closing </div><!-- end of #secondary -->
 *
 * @deprecated use Responsive\responsive_widgets_end() instead
 * @see sidebar.php
 */
function responsive_widgets_end() {
	Responsive\responsive_widgets_end();
}

/**
 * Just after closing </div><!-- end of #secondary -->
 *
 * @deprecated use Responsive\responsive_widgets_after() instead
 * @see sidebar.php
 */
function responsive_widgets_after() {
	Responsive\responsive_widgets_after();
}

/**
 * Just after opening <div id="footer">
 *
 * @deprecated use Responsive\responsive_footer_top() instead
 * @see footer.php
 */
function responsive_footer_top() {
	Responsive\responsive_footer_top();
}

/**
 * Just before closing </div><!-- end of #footer -->
 *
 * @deprecated use Responsive\responsive_footer_bottom() instead
 * @see footer.php
 */
function responsive_footer_bottom() {
	Responsive\responsive_footer_bottom();
}

/**
 * Just after closing </div><!-- end of #footer -->
 *
 * @deprecated use Responsive\responsive_footer_after() instead
 * @see footer.php
 */
function responsive_footer_after() {
	Responsive\responsive_footer_after();
}

/**
 * Theme Options
 *
 * @deprecated use Responsive\responsive_theme_options() instead
 * @see theme-options.php
 */
function responsive_theme_options() {
	Responsive\responsive_theme_options();
}

/**
 * Responsive_wrapper_class
 *
 * @deprecated use Responsive\responsive_wrapper_classes() instead
 */
function responsive_wrapper_classes() {
	Responsive\responsive_wrapper_classes();
}

/**
 * Responsive_wrapper_class
 *
 * @deprecated use Responsive\responsive_wrapper_classes_close() instead
 */
function responsive_wrapper_classes_close() {
	Responsive\responsive_wrapper_classes_close();
}

/**
 * Responsive_woocommerce_wrapper
 *
 * @deprecated use Responsive\responsive_woocommerce_wrapper() instead
 */
function responsive_woocommerce_wrapper() {
	Responsive\responsive_woocommerce_wrapper();
}

/**
 * [responsive_woocommerce_wrapper_end description]
 *
 * @deprecated use Responsive\responsive_woocommerce_wrapper_end() instead
 */
function responsive_woocommerce_wrapper_end() {
	Responsive\responsive_woocommerce_wrapper_end();
}


/**
 * [responsive_woocommerce_before_shop_loop description]
 *
 * @deprecated use Responsive\responsive_woocommerce_archive_description() instead
 * @return void [description].
 */
function responsive_woocommerce_archive_description() {
	Responsive\responsive_woocommerce_archive_description();
}

/**
 * WooCommerce After single product summary
 *
 * @deprecated use Responsive\responsive_woocommerce_after_single_product_summary() instead
 */
function responsive_woocommerce_after_single_product_summary() {
	Responsive\responsive_woocommerce_after_single_product_summary();
}

/**
 * [responsive_open_container description]
 *
 * @deprecated use Responsive\responsive_open_container() instead
 * @return void [description]
 */
function responsive_open_container() {
	Responsive\responsive_open_container();
}

/**
 * [responsive_close_container description]
 *
 * @deprecated use Responsive\responsive_close_container() instead
 * @return void [description]
 */
function responsive_close_container() {
	Responsive\responsive_close_container();
}

/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 *
 * @deprecated use Responsive\responsive_no_js_class() instead
 */
function responsive_no_js_class() {

	Responsive\responsive_no_js_class();

}

// File core/includes/customizer/customizer.php.
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @deprecated use Responsive\Customizer\responsive_customize_register() instead
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	Responsive\Customizer\responsive_customize_register( $wp_customize );
}

/**
 * Validates the Call to Action Button styles
 *
 * @param  object $input    arguments.
 * @deprecated use Responsive\Customizer\responsive_pro_button_style_validate() instead
 * @return string
 */
function responsive_pro_button_style_validate( $input ) {
	return Responsive\Customizer\responsive_pro_button_style_validate( $input );
}

/**
 * Function for sanitizing
 *
 * @deprecated use Responsive\Customizer\responsive_sanitize_checkbox() instead
 * @param object $input arguments.
 */
function responsive_sanitize_checkbox( $input ) {
	return Responsive\Customizer\responsive_sanitize_checkbox( $input );
}

/**
 * Function for sanitizing
 *
 * @deprecated use Responsive\Customizer\responsive_sanitize_posts() instead
 * @param object $input arguments.
 */
function responsive_sanitize_posts( $input ) {
	return Responsive\Customizer\responsive_sanitize_posts( $input );
}

/**
 * Function for sanitizing checkboxes
 *
 * @deprecated use Responsive\Customizer\responsive_sanitize_multiple_checkboxes() instead
 * @param object $values arguments.
 */
function responsive_sanitize_multiple_checkboxes( $values ) {
	return Responsive\Customizer\responsive_sanitize_multiple_checkboxes( $values );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @deprecated use Responsive\Customizer\responsive_customize_preview_js() instead
 */
function responsive_customize_preview_js() {
	Responsive\Customizer\responsive_customize_preview_js();
}

/**
 * Adds customizer options
 *
 * @deprecated use Responsive\Customizer\responsive_register_options() instead
 */
function responsive_register_options() {
	Responsive\Customizer\responsive_register_options();
}

/**
 * Adds custom controls.
 *
 * @param object $wp_customize WordPress customizer.
 * @deprecated use Responsive\Customizer\responsive_custom_controls() instead
 * @since 1.0.0
 */
function responsive_custom_controls( $wp_customize ) {
	Responsive\Customizer\responsive_custom_controls( $wp_customize );
}

/**
 * Adds customizer helpers
 *
 * @deprecated use Responsive\Customizer\responsive_controls_helpers() instead
 */
function responsive_controls_helpers() {
	Responsive\Customizer\responsive_controls_helpers();
}


/**
 * Custom styles and js for customizer
 *
 * @deprecated use Responsive\Customizer\responsive_custom_customize_enqueue() instead
 */
function responsive_custom_customize_enqueue() {
	Responsive\Customizer\responsive_custom_customize_enqueue();
}

/**
 * Tooltip script
 *
 * @deprecated use Responsive\Customizer\responsive_tooltip_script() instead
 * @since 3.23
 * @return void
 */
function responsive_tooltip_script() {
	Responsive\Customizer\responsive_tooltip_script();
}

// File core/includes/compatibility/woocommerce/woocommerce-helper.php.
if ( ! function_exists( 'responsive_woo_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_woo_woocommerce_template_loop_product_title() instead
	 */
	function responsive_woo_woocommerce_template_loop_product_title() {
		Responsive\WooCommerce\responsive_woo_woocommerce_template_loop_product_title();
	}
}

if ( ! function_exists( 'responsive_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_template_loop_product_title() instead
	 */
	function responsive_template_loop_product_title() {
		Responsive\WooCommerce\responsive_template_loop_product_title();
	}
}

if ( ! function_exists( 'responsive_woocommerce_shop_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_woocommerce_shop_elements_positioning() instead
	 * @since 1.1.0
	 */
	function responsive_woocommerce_shop_elements_positioning() {
		return Responsive\WooCommerce\responsive_woocommerce_shop_elements_positioning();
	}
}

if ( ! function_exists( 'responsive_woocommerce_product_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_woocommerce_product_elements_positioning() instead
	 * @since 1.1.0
	 */
	function responsive_woocommerce_product_elements_positioning() {
		return Responsive\WooCommerce\responsive_woocommerce_product_elements_positioning();
	}
}

/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'responsive_woo_shop_product_short_description' ) ) {
	/**
	 * Product short description
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_woo_shop_product_short_description() instead
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_product_short_description() {
		Responsive\WooCommerce\responsive_woo_shop_product_short_description();
	}
}

/**
 * Shop page - Category
 */
if ( ! function_exists( 'responsive_woo_shop_parent_category' ) ) {
	/**
	 * Product Category
	 *
	 * @deprecated use Responsive\WooCommerce\responsive_woo_shop_parent_category() instead
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_parent_category() {
		Responsive\WooCommerce\responsive_woo_shop_parent_category();
	}
}

/**
 * Adds cart icon to menu
 *
 * @deprecated use Responsive\WooCommerce\responsive_menu_cart_icon() instead
 * @param string $menu default menu.
 * @param array  $args check menu.
 */
function responsive_menu_cart_icon( $menu, $args ) {
	return Responsive\WooCommerce\responsive_menu_cart_icon( $menu, $args );
}


//Child themes compatibility - Responsive blog and Responsive Business

/**
 * @deprecated use responsive_get_breadcrumb_lists instead
 */
function get_responsive_breadcrumb_lists() {
    responsive_get_breadcrumb_lists();
}

/**
 * @deprecated
 */
function responsive_in_header() {
    do_action( 'responsive_in_header' );
}

/**
 * @deprecated
 */
function responsive_header_end() {
    do_action( 'responsive_header_end' );
}
