<?php
/**
 * Post Entry Breadcrumb
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="responsive-breadcrumbs-wrapper">
	<div class="breadcrumbs-inner">
		<nav class="breadcrumbs" <?php responsive_check_yoast_enabled_breadcrumbs() ? '' : responsive_schema_markup( 'breadcrumb' ); ?>>
			<?php responsive_get_breadcrumb_lists(); ?>
		</nav>
	</div>
</div>
