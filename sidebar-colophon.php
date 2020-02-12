<?php
/**
 * Colophon Widget Template
 *
 * @file           sidebar-colophon.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-colophon.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
if ( ! is_active_sidebar( 'colophon-widget' )
) {
	return;
}
responsive_widgets_before(); // above widgets container hook.
?>
	<div id="colophon-widget" class="colophon-widgets grid col-940">
		<?php
		responsive_widgets(); // above widgets hook.
		if ( is_active_sidebar( 'colophon-widget' ) ) :
			dynamic_sidebar( 'colophon-widget' );
		endif; // end of colophon-widget.
		responsive_widgets_end(); // after widgets hook.
		?>
	</div><!-- end of #colophon-widget -->
<?php responsive_widgets_after(); // after widgets container hook. ?>
