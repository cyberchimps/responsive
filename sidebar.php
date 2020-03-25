<?php
/**
 * Main Widget Template
 *
 * @file           sidebar.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ( is_page() && 'no' === get_theme_mod( 'responsive_page_sidebar_position', 'right' ) ) || ( is_single() && 'no' === get_theme_mod( 'responsive_single_blog_sidebar_position', 'right' ) ) || ( ( is_home() || is_search() || is_archive() ) && 'no' === get_theme_mod( 'responsive_blog_sidebar_position', 'right' ) ) || ( class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() ) ) ) {
	return;
}

Responsive\responsive_widgets_before(); // above widgets container hook.

if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {

	$responsive_options = Responsive\Core\responsive_get_options();
	if ( ( 'no' === get_theme_mod( 'responsive_shop_sidebar_position', 'no' ) && ! is_product() ) || ( 'no' === get_theme_mod( 'responsive_single_product_sidebar_position', 'no' ) && is_product() ) ) {
		return;
	}
	?>
	<aside id="secondary" class="widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>
		<?php dynamic_sidebar( 'responsive-woo-shop-sidebar' ); ?>
	</aside>
		<?php

} else {

	?>
	<aside id="secondary" class="main-sidebar widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>

	<?php
	Responsive\responsive_widgets(); // above widgets hook.
	if ( ! dynamic_sidebar( 'main-sidebar' ) ) :
	endif; // End of main-sidebar.
		Responsive\responsive_widgets_end(); // after widgets hook.
	?>

	</aside><!-- end of #secondary -->
	<?php
	Responsive\responsive_widgets_after(); // after widgets container hook.
}
