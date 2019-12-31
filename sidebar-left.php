<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Widget Template
 *
 * @file           sidebar-left.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-left.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<aside id="secondary" class="grid-right col-300 rtl-fit" role="complementary">
		<?php responsive_widgets(); // above widgets hook ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php responsive_widgets_end(); // after widgets hook ?>
	</aside><!-- end of #secondary -->
<?php responsive_widgets_after(); // after widgets container hook ?>
