<?php
/**
 * Theme's Action Hooks
 *
 * @file           hooks.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/includes/hooks.php
 * @link           http://codex.wordpress.org/Plugin_API/Hooks
 * @since          available since Release 1.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function responsive_container() {
	do_action( 'responsive_container' );
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function responsive_container_end() {
	do_action( 'responsive_container_end' );
}

/**
 * Just after opening <header>
 *
 * @see header.php
 */
function responsive_header_top() {
	do_action( 'responsive_header_top' );
}
/**
 * Just before logo
 *
 * @see header.php
 */
function responsive_header_with_logo() {
	do_action( 'responsive_header_with_logo' );
}

/**
 * Just after closing </header><!-- end of #header -->
 *
 * @see header.php
 */
function responsive_header_bottom() {
	do_action( 'responsive_header_bottom' );
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_wrapper() {
	do_action( 'responsive_wrapper' );
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_wrapper_top() {
	do_action( 'responsive_wrapper_top' );
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_in_wrapper() {
	do_action( 'responsive_in_wrapper' );
}

/**
 * Just before closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function responsive_wrapper_bottom() {
	do_action( 'responsive_wrapper_bottom' );
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function responsive_wrapper_end() {
	do_action( 'responsive_wrapper_end' );
}

/** Just before <div id="post">
 *
 * @see index.php
 */
function responsive_entry_before() {
	do_action( 'responsive_entry_before' );
}

/** Just after <div id="post">
 *
 * @see index.php
 */
function responsive_entry_top() {
	do_action( 'responsive_entry_top' );
}

/** Just before </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function responsive_entry_bottom() {
	do_action( 'responsive_entry_bottom' );
}

/** Just after </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function responsive_entry_after() {
	do_action( 'responsive_entry_after' );

}

/** Just before comments_template()
 *
 * @see index.php
 */
function responsive_comments_before() {
	do_action( 'responsive_comments_before' );
}

/** Just after comments_template()
 *
 * @see index.php
 */
function responsive_comments_after() {
	do_action( 'responsive_comments_after' );
}

/**
 * Just before opening <div id="secondary">
 *
 * @see sidebar.php
 */
function responsive_widgets_before() {
	do_action( 'responsive_widgets_before' );
}

/**
 * Just after opening <div id="secondary">
 *
 * @see sidebar.php
 */
function responsive_widgets() {
	do_action( 'responsive_widgets' );
}

/**
 * Just before closing </div><!-- end of #secondary -->
 *
 * @see sidebar.php
 */
function responsive_widgets_end() {
	do_action( 'responsive_widgets_end' );
}

/**
 * Just after closing </div><!-- end of #secondary -->
 *
 * @see sidebar.php
 */
function responsive_widgets_after() {
	do_action( 'responsive_widgets_after' );
}

/**
 * Just after opening <div id="footer">
 *
 * @see footer.php
 */
function responsive_footer_top() {
	do_action( 'responsive_footer_top' );
}

/**
 * Just before closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function responsive_footer_bottom() {
	do_action( 'responsive_footer_bottom' );
}

/**
 * Just after closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function responsive_footer_after() {
	do_action( 'responsive_footer_after' );
}

/**
 * Theme Options
 *
 * @see theme-options.php
 */
function responsive_theme_options() {
	do_action( 'responsive_theme_options' );
}

/**
 * WooCommerce
 *
 * Unhook/Hook the WooCommerce Wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'responsive_woocommerce_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'responsive_woocommerce_wrapper_end', 10 );

/**
 * Responsive_woocommerce_wrapper
 */
function responsive_woocommerce_wrapper() {
	?>
	<div id="wrapper" class="site-content clearfix">
			<div class="content-outer container">
				<div class="row">
					<main id="primary" class="content-area <?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">
						<?php
						if ( is_woocommerce() ) {
							echo '<div class="site-content-header">';
						}
}

/**
 * [responsive_woocommerce_wrapper_end description]
 */
function responsive_woocommerce_wrapper_end() {
	echo '</main><!-- end of #primary -->';
	if ( is_active_sidebar( 'main-sidebar' ) ) {
		get_sidebar();
	}
	echo '</div></div></div>';
}


/**
 * [responsive_woocommerce_before_shop_loop description]
 *
 * @return void [description].
 */
function responsive_woocommerce_archive_description() {
	?>
	</div>
	<div class="products-wrapper">
		<?php
}

function responsive_woocommerce_after_single_product_summary() {
	?>
	</div>
	<div class="related-product-wrapper">
		<?php
}

add_action( 'woocommerce_after_single_product_summary', 'responsive_woocommerce_after_single_product_summary', 10 );
add_action( 'woocommerce_after_shop_loop', 'responsive_close_container', 10 );
add_action( 'woocommerce_archive_description', 'responsive_woocommerce_archive_description', 10 );
add_action( 'woocommerce_before_single_product', 'responsive_close_container', 10 );

/**
 * [responsive_open_container description]
 *
 * @return void [description]
 */
function responsive_open_container() {
	echo '<div class="container">';
}

/**
 * [responsive_close_container description]
 *
 * @return void [description]
 */
function responsive_close_container() {
	echo '</div>';
}

/**
 * [responsive_header_sidebar description]
 *
 * @return void [description]
 */
function responsive_header_sidebar() {
	get_sidebar( 'header' );
}

/**
 * [responsive_header_widget_position description]
 *
 * @return void [description].
 */
function responsive_header_widget_position() {

	if ( ! get_theme_mod( 'responsive_enable_header_widget', 1 ) ) {
		return;
	}

	$responsive_header_widget_position = 'responsive_header_' . get_theme_mod( 'responsive_header_widget_position', 'top' );

	add_action( $responsive_header_widget_position, 'responsive_header_sidebar' );

}
add_action( 'wp_head', 'responsive_header_widget_position' );

/**
 * Classes
 */
/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 */
function responsive_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}

add_action( 'wp_head', 'responsive_no_js_class' );
