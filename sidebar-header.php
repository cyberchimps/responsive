<?php
/**
 * Top Widget Template
 *
 * @file           sidebar-top.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-top.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php
if ( ! is_active_sidebar( 'header-widgets' )
) {
	return;
}
?>
<?php responsive_widgets_before(); // above widgets container hook. ?>
	<div id="header-widgets" class="header-widgets">
		<?php responsive_widgets(); // above widgets hook. ?>

		<?php if ( is_active_sidebar( 'header-widgets' ) ) : ?>

			<?php dynamic_sidebar( 'header-widgets' ); ?>

		<?php endif; // end of header-widgets. ?>

		<?php responsive_widgets_end(); // after widgets hook. ?>
	</div><!-- end of #header-widgets -->
<?php responsive_widgets_after(); // after widgets container hook. ?>
