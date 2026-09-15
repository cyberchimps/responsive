<?php
/**
 * Template part for displaying the Header Widgets 2.
 *
 * @package responsive
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! is_active_sidebar( 'mobile-header-widgets2' ) ) {
	return;
}
?>
<div class="mobile-header-widgets2">
    <div class="mobile-header-widgets-wrapper">
		<?php dynamic_sidebar( 'mobile-header-widgets2' ); ?>
    </div>
</div>