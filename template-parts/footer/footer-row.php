<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package responsive
 */

$row                   = get_query_var( 'row' );
$columns               = absint( get_theme_mod( 'responsive_footer_' . $row . '_columns', ( 'above' === $row ) ? 3 : ( 'primary' === $row ? 2 : 1 ) ) );
$width                 = get_theme_mod( 'responsive_footer_' . $row . '_width', 'contained' );
$inline_layout         = get_theme_mod( 'responsive_footer_' . $row . '_inner_elements_layout', 'inline' );
$columns_layout        = get_theme_mod( 'responsive_footer_' . $row . '_layout',  ( 'primary' === $row ) ? 'left-heavy' : 'equal' );
$columns_tablet_layout = get_theme_mod( 'responsive_footer_' . $row . '_layout_tablet',  ( 'primary' === $row ) ? 'left-heavy' : 'equal' );
$columns_mobile_layout = get_theme_mod( 'responsive_footer_' . $row . '_layout_mobile',  'row' );
$has_mobile_items      = Responsive_Builder_Footer::get_instance()->has_mobile_items( $row );
$has_desktop_items     = Responsive_Builder_Footer::get_instance()->has_desktop_items( $row );
$footer_classes        = array();
$footer_classes[]      = $has_mobile_items ? 'rspv-hfb-footer-has-mobile-items' : 'rspv-hfb-footer-no-mobile-items';
$footer_classes[]      = $has_desktop_items ? 'rspv-hfb-footer-has-desktop-items' : 'rspv-hfb-footer-no-desktop-items';
$i = 0;
?>
<div class="rspv-site-<?php echo esc_attr( $row ); ?>-footer-wrap rspv-site-footer-focus-item rspv-hfb-footer-width-<?php echo esc_attr( $width ); ?> rspv-hfb-footer-row-<?php echo esc_attr( $inline_layout ); ?> <?php echo esc_attr( implode( ' ', $footer_classes ) ); ?>" data-section="responsive-<?php echo esc_attr( $row ); ?>-footer-builder">
	<div class="container">
		<div class="rspv-site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap site-footer-row site-footer-row-columns-<?php echo esc_attr( $columns ); ?> rspv-hfb-footer-row-layout-<?php echo esc_attr( $columns_layout ) ?> rspv-hfb-footer-row-tablet-layout-<?php echo esc_attr( $columns_tablet_layout ) ?> rspv-hfb-footer-row-mobile-layout-<?php echo esc_attr( $columns_mobile_layout ) ?>">
			<?php
                while ( $i++ < $columns ) {
                    ?>
                    <div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $i ); ?> site-footer-section footer-section-inner-items-<?php echo esc_attr( Responsive_Builder_Footer::get_instance()->footer_column_item_count( $row, $i ) ); ?>">
                        <?php
                        /**
                         * Responsive Render Footer Column
                         *
                         * Hooked responsive\footer_column
                         */
                        do_action( 'responsive_render_footer_column', $row, $i );
                        ?>
                    </div>
                    <?php
                }
			?>
		</div>
	</div>
</div>
