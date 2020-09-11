<?php
/**
 * Menu Widget Template
 *
 * @file           sidebar-menu.php
 * @package        Responsive
 * @copyright      2003 - 2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-menu.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'menu-widgets' ) ) {
	return;
}

?>
	<div class="menu-widgets">
		<?php dynamic_sidebar( 'menu-widgets' ); ?>
	</div>
