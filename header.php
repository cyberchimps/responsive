<?php
/**
 * Header Template
 *
 * @file           header.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'check_is_responsive_addons_greater' ) ) {
	/**
	 * Check if Responsive Addons is installed.
	 */
	function check_is_responsive_addons_greater() {
		if ( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
			$raddons_version    = get_plugin_data( WP_PLUGIN_DIR . '/responsive-add-ons/responsive-add-ons.php' )['Version'];
			$is_raddons_greater = false;
			if ( version_compare( $raddons_version, '3.0.0', '>=' ) ) {
				$is_raddons_greater = true;
			}
			return $is_raddons_greater;
		}
		return false;
	}
}

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?> <?php responsive_schema_markup( 'body' ); ?> >
	<?php wp_body_open(); ?>
	<div class="skip-container cf">
		<a class="skip-link screen-reader-text focusable" href="#primary"><?php esc_html_e( '&darr; Skip to Main Content', 'responsive' ); ?></a>
	</div><!-- .skip-container -->
	<div class="site hfeed">
		<?php
		Responsive\responsive_header_top();
		$responsive_show_header = true;
		if ( class_exists( 'Responsive_Addons_Pro' ) || check_is_responsive_addons_greater() ) {
			if ( ( 1 === get_theme_mod( 'responsive_distraction_free_woocommerce', 0 ) ) && (
				( is_shop() && 1 === get_theme_mod( 'responsive_disable_shop_header_footer', 0 ) )
				|| ( is_product() && 1 === get_theme_mod( 'responsive_disable_single_product_header_footer', 0 ) )
				|| ( is_cart() && 1 === get_theme_mod( 'responsive_disable_cart_header_footer', 0 ) )
				|| ( is_checkout() && 1 === get_theme_mod( 'responsive_disable_checkout_header_footer', 0 ) )
				|| ( is_account_page() && 1 === get_theme_mod( 'responsive_disable_account_header_footer', 0 ) )
				|| ( is_product_category() && 1 === get_theme_mod( 'responsive_disable_product_category_header_footer', 0 ) )
				|| ( is_product_tag() && 1 === get_theme_mod( 'responsive_disable_product_tag_header_footer', 0 ) )
				) && 'on' === get_option( 'rpro_woocommerce_enable' )
			) {
				$responsive_show_header = false;
			}
		}

		// Elementor `header` location.
		if ( ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) && ! ( function_exists( 'rea_theme_template_render_at_location' ) && rea_theme_template_render_at_location( 'header' ) ) && $responsive_show_header ) {

			// Replaces default header with custom header.
			Responsive\responsive_custom_header();

			if ( ! has_action( 'responsive_custom_header' ) ) {

				/**
					 * Responsive before header hook.
					 */
					do_action( 'responsive_before_header' );

					/**
					 * Responsive header hook.
					 */
					Responsive\responsive_header();

					/**
					 * Responsive after header hook.
					 */
					do_action( 'responsive_after_header' );

				?>
				<?php
			}
		}
		Responsive\responsive_header_bottom();
		
		?>
