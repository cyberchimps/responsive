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
if ( ! is_active_sidebar( 'mobile-header-widgets' ) ) {
	return;
}
?>
<div class="mobile-header-widgets">
    <div class="mobile-header-widgets-wrapper">
		<?php dynamic_sidebar( 'mobile-header-widgets' ); ?>
    </div>
</div>