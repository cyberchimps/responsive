<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Left Sidebar Half Template
 *
 *
 * @file           left-sidebar-half.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/left-sidebar-half.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid-right col-460 rtl-fit" role="complementary">
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if ( !dynamic_sidebar( 'left-sidebar-half' ) ) : ?>
			<div class="widget-wrapper">

				<div class="widget-title"><h3><?php _e( 'In Archive', 'responsive' ); ?></h3></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of left-sidebar-half ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
