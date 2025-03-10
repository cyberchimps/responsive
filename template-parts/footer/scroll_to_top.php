<?php
/**
 * Template part for displaying the footer scroll to top.
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}

$scroll_top_devices = get_theme_mod( 'responsive_scroll_to_top_on_devices', 'both' );
?>
<div class="footer-widget-area responsive-scroll-wrap" data-section="responsive-customizer-footer-scroll-top">
    <div id="scroll" class="responsive-scroll" aria-label="<?php esc_attr_e( 'Scroll to Top', 'responsive' ); ?>" title="<?php esc_attr_e( 'Scroll to Top', 'responsive' ); ?>" data-on-devices="<?php echo esc_attr( $scroll_top_devices ); ?>"><span><?php esc_html_e( 'Top', 'responsive' ); ?></span></div>
</div>