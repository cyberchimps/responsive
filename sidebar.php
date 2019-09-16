<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */

$responsive_options = responsive_get_options();
if ( ( isset( $responsive_options['override_woo'] ) && ( $responsive_options['override_woo'] ) ) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_product() ) {
	return;
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

	case 'content-sidebar-half-page':
		get_sidebar( 'right-half' );
		return;
		break;

	case 'sidebar-content-half-page':
		get_sidebar( 'left-half' );
		return;
		break;

	case 'full-width-page':
		return;
		break;
}
?>

<?php responsive_widgets_before(); // above widgets container hook. ?>
	<div id="widgets" class="<?php echo implode( ' ', responsive_get_sidebar_classes() ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>
		<?php responsive_widgets(); // above widgets hook. ?>
		<?php if ( !dynamic_sidebar( 'main-sidebar' ) ) : ?>
			<div class="widget-wrapper" style="display:none;">
				<div class="widget-title"></div>
			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of main-sidebar ?>
		<?php responsive_widgets_end(); // after widgets hook. ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook. ?>
