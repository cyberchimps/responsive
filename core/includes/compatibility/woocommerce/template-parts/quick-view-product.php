<?php
/**
 * WooCommerce - Quick View Product
 *
 * @package Responsive Addon
 */

if( ! defined( 'ABSPATH' ) ) {
	exit;
}

while ( have_posts() ) :
	the_post(); ?>
<div class="responsive-woo-product">
	<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
		<?php do_action( 'responsive_woo_qv_product_image' ); ?>
		<div class="summary entry-summary">
			<div class="summary-content">
				<?php do_action( 'responsive_woo_quick_view_product_summary', 'quick-view' ); ?>
			</div>
		</div>
	</div>
</div>
	<?php
endwhile; // end of the loop.
