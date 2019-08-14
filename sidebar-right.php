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
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="grid col-300 fit" role="complementary">
		<?php responsive_widgets(); // above widgets hook ?>
		<?php if ( !dynamic_sidebar( 'right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php endif; //end of right-sidebar ?>
		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
