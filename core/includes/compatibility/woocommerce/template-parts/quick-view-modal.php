<?php
/**
 * WooCommerce - Quick View Modal
 *
 * @package Responsive Addon
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="responsive-quick-view-bg"><div class="responsive-quick-view-loader blockUI blockOverlay"></div></div>
<div id="responsive-quick-view-modal">
	<div class="responsive-content-main-wrapper"><?php /*Don't remove this html comment*/ ?><!--
	--><div class="responsive-content-main">
			<div class="responsive-lightbox-content">
				<div class="responsive-content-main-head">
					<a href="#" id="responsive-quick-view-close" class="responsive-quick-view-close-btn"></a>
				</div>
				<div id="responsive-quick-view-content" class="woocommerce single-product"></div>
			</div>
		</div>
	</div>
</div>
