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

if ( ! is_active_sidebar( 'header-widgets' ) ) {
	return;
}

?>
<div class="header-widgets">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'header-widgets' ); ?>
		</div>
	</div>
</div>
