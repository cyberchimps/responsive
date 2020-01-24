<?php
/**
 * Main Widget Template
 *
 * @file           sidebar.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
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

if ( ( is_page() && 'no' === get_theme_mod( 'responsive_page_sidebar_position', 'right' ) ) || ( is_single() && 'no' === get_theme_mod( 'responsive_single_blog_sidebar_position', 'right' ) ) || ( ( is_home() || is_search() || is_archive() ) && 'no' === get_theme_mod( 'responsive_blog_sidebar_position', 'right' ) ) ) {
	return;
}

if ( class_exists( 'WooCommerce' ) ) {
	$layout = responsive_get_layout();
	if ( 'full-width-page' === $layout ) {
			return;
	}

	if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() || is_product() ) { ?>
		<aside id="secondary" class="widget-area <?php echo implode( ' ', responsive_get_sidebar_classes() ); ?>" role="complementary">
			<?php dynamic_sidebar( 'responsive-woo-shop-sidebar' ); ?>
		</aside>
		<?php
	}


	$responsive_options = responsive_get_options();
	if ( ( isset( $responsive_options['override_woo'] ) && ( $responsive_options['override_woo'] ) ) && class_exists( 'WooCommerce' ) && is_product() || is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() || is_product() ) {
		return;
	}
}

/*
 * Load the correct sidebar according to the page layout
 */
$layout = responsive_get_layout();
switch ( $layout ) {
	case 'sidebar-content-page':
		get_sidebar( 'left' );
		return;
		break;

	case 'content-sidebar-page':
		get_sidebar( 'right' );
		return;
		break;

	case 'full-width-page':
		return;
		break;
}
?>

<?php responsive_widgets_before(); // above widgets container hook. ?>
	<aside id="secondary" class="widget-area <?php echo implode( ' ', responsive_get_sidebar_classes() ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>

		<?php responsive_widgets(); // above widgets hook. ?>
		<?php if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>

		<?php endif; // End of main-sidebar. ?>
		<?php responsive_widgets_end(); // after widgets hook. ?>

	</aside><!-- end of #secondary -->
<?php responsive_widgets_after(); // after widgets container hook. ?>
