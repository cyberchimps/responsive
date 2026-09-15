<?php
/**
 * Template part for displaying the Header Widget 2.
 *
 * @package responsive
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! is_active_sidebar( 'header-widgets2' ) ) {
	return;
}
?>
<div class="header-widgets2">
    <div class="header-widget2-wrapper">
        <?php dynamic_sidebar( 'header-widgets2' ); ?>
    </div>
</div>