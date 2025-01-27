<?php
/**
 * Template part for displaying the Header Widgets.
 *
 * @package responsive
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
    <div class="header-widgets-wrapper">
        <?php dynamic_sidebar( 'header-widgets' ); ?>
    </div>
</div>