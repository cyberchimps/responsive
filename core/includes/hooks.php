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

namespace Responsive;

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

	add_action( 'wp_head', $n( 'responsive_no_js_class' ) );

	add_action( 'woocommerce_before_main_content', $n( 'responsive_woocommerce_wrapper' ), 10 );
	add_action( 'woocommerce_after_main_content', $n( 'responsive_woocommerce_wrapper_end' ), 10 );
	add_action( 'responsive_wrapper', $n( 'responsive_wrapper_classes' ), 10 );
	add_action( 'responsive_wrapper_close', $n( 'responsive_wrapper_classes_close' ), 10 );

	add_action( 'woocommerce_after_single_product_summary', $n( 'responsive_woocommerce_after_single_product_summary' ), 10 );
	add_action( 'woocommerce_after_shop_loop', $n( 'responsive_close_container' ), 10 );
	add_action( 'woocommerce_archive_description', $n( 'responsive_woocommerce_archive_description' ), 10 );
	add_action( 'woocommerce_before_single_product', $n( 'responsive_close_container' ), 10 );

	add_filter( 'get_custom_logo', $n( 'responsive_custom_logo_link' ) );

	/**
	 * Sensei
	 *
	* Unhook/Hook the Sensei Wrappers
	*/
	if ( class_exists( 'Sensei_Main' ) ) {
		global $woothemes_sensei;
		remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
		remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

		add_action( 'sensei_before_main_content', $n( 'responsive_theme_wrapper_start' ), 10 );
		add_action( 'sensei_after_main_content', $n( 'responsive_theme_wrapper_end' ), 10 );
		add_filter( 'responsive_post_read_more', $n( 'responsive_sensei_read_more_text' ), 30 );
		add_filter( 'excerpt_length', $n( 'responsive_sensei_custom_excerpt_length' ), 30 );

	}
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
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function responsive_header() {
	do_action( 'responsive_header' );
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
 * Just before closing <div id="wrapper">
 *
 * @see header.php
 */
function responsive_wrapper_close() {
	do_action( 'responsive_wrapper_close' );
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

/**
 * Responsive_wrapper_class
 */
function responsive_wrapper_classes() {
	?>
	<div id="wrapper" class="site-content clearfix">
		<div class="content-outer container">
			<div class="row">
				<?php responsive_in_wrapper(); // wrapper hook. ?>

				<main id="primary" class="content-area <?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>" role="main">
					<?php
					if ( is_home() || is_archive() ) {
						echo '<div class="content-area-wrapper">';
						get_template_part( 'loop-header', get_post_type() );
					} else {
						get_template_part( 'loop-header', get_post_type() );
					}
}

/**
 * Responsive_wrapper_class
 */
function responsive_wrapper_classes_close() {
	?>
		</div>
	</div>
	<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
	<?php
}

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
		get_sidebar();
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

/**
 * [responsive_woocommerce_after_single_product_summary description]
 *
 * @return void [description].
 */
function responsive_woocommerce_after_single_product_summary() {
	?>
	</div>
	<div class="related-product-wrapper">
		<?php
}

/**
 * Read more text.
 *
 * @param string $text default read more text.
 * @return string read more text
 */
function responsive_sensei_read_more_text( $text ) {
	global $post;
	if ( 'course' === $post->post_type ) {
		$read_more = get_theme_mod( 'responsive_sensei_read_more_text', __( 'Enroll &raquo;', 'responsive' ) );
		if ( '' !== $read_more ) {
			$text = $read_more;
		}
	}
	return $text;
}

/**
 * Returns excerpt length
 *
 * @param  integer $length Length of excerpt.
 * @return integer         Length of excerpt.
 */
function responsive_sensei_custom_excerpt_length( $length ) {
	global $post;
	if ( 'course' === $post->post_type ) {
		$excerpt_length = get_theme_mod( 'responsive_sensei_excerpt_length', 40 );
		if ( ! empty( $excerpt_length ) ) {
			$length = $excerpt_length;
		}
	}
	return $length;
}

/**
 * [responsive_theme_wrapper_start description]
 *
 * @return void [description].
 */
function responsive_theme_wrapper_start() {
	?>
	<div id="wrapper" class="site-content clearfix">
		<div class="content-outer container">
			<div class="row">
				<main id="primary" class="content-area <?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">
					<?php
}

/**
 * [responsive_theme_wrapper_end description]
 *
 * @return void [description].
 */
function responsive_theme_wrapper_end() {
	echo '</main><!-- end of #primary -->';
	if ( is_single() ) {
		get_sidebar();
	}
	echo '</div></div></div>';
}

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

/**
 * Change the custom logo URL
 */
function responsive_custom_logo_link() {

	// The logo.
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	$html = '';

	// If has logo.
	if ( $custom_logo_id ) {

		// Attr.
		$custom_logo_attr = array(
			'class'    => 'custom-logo',
			'itemprop' => 'logo',
		);

		// Image alt.
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		$custom_logo_url = get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) );

		// Get the image.
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( $custom_logo_url ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
		);

	}

	// Return.
	return $html;
}

/**
 * Responsive child theme custom header
 *
 * @see header.php
 */
function responsive_custom_header() {
	do_action( 'responsive_custom_header' );
}

/**
 * Responsive child theme custom footer
 *
 * @see footer.php
 */
function responsive_custom_footer() {
	do_action( 'responsive_custom_footer' );
}
