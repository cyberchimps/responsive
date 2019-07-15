<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sidebar Right Half Template
 *
 * @file           sidebar-right-half.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-right-half.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-460 fit" role="complementary">
		<?php responsive_widgets(); // above widgets hook ?>
		<?php if ( !dynamic_sidebar( 'right-sidebar-half' ) ) : ?>
			<div class="widget-wrapper" style="display:none;">

				<div class="widget-title"></div>
			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of sidebar-right-half ?>
		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
