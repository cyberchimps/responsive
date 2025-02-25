<?php
/**
 * Template part for displaying the Header Builder Woo Cart Component.
 *
 * @package responsive
 */
if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}
$cart_icon           = get_theme_mod( 'responsive_cart_icon', 'icon-opencart' );
$cart_label          = get_theme_mod( 'responsive_woo_cart_label');
$cart_label_position = get_theme_mod( 'responsive_cart_label_position', 'left' );
$cart_click_action   = get_theme_mod( 'responsive_header_woo_cart_click_action', 'dropdown' );

// Check if Responsive Addons is installed and greater than or equal to 3.0.0.
if ( ! function_exists( 'check_is_responsive_addons_greater' ) ) {
	/**
	 * Check if Responsive Addons is installed.
	 */
	function check_is_responsive_addons_greater() {
		if ( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
			$raddons_version    = get_plugin_data( WP_PLUGIN_DIR . '/responsive-add-ons/responsive-add-ons.php' )['Version'];
			$is_raddons_greater = false;
			if ( version_compare( $raddons_version, '3.0.0', '>=' ) ) {
				$is_raddons_greater = true;
			}
			return $is_raddons_greater;
		}
		return false;
	}
}
if ( class_exists( 'woocommerce' ) ) {
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_header_woocommerce_cart">
	<?php
        $output = '';
        $cart_icon_svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="687" height="448" viewBox="0 0 687 448"><path fill="#000"     d="M381 390.25c0 22.75-18.25 41-41 41s-41.25-18.25-41.25-41 18.5-41.25 41.25-41.25 41 18.5 41 41.25zM193.75 390.25c0 22.75-18.5 41-41.25 41s-41-18.25-41-41 18.25-41.25 41-41.25 41.25 18.5 41.25 41.25zM0 16.75c73.75 77.75 143 89.25 415 89.25s152.5 60.5-15.5 210.5c53.25-92.5 236.25-174.5-63.75-170-287.75 4.25-304.75-83.25-335.75-129.75z"></path></svg>';
        if ( null !== WC()->cart ) {
            $cart_contents_count = WC()->cart->get_cart_contents_count();
            $cart_total_markup   = '<span class="res-header-cart-total">' . WC()->cart->get_cart_total() . '</span>';
        }
        if ( class_exists( 'Responsive_Addons_Pro' ) || check_is_responsive_addons_greater() ) {
            $cart_title_markup = '<span class="res-woo-header-cart-title">' . __( 'Cart', 'responsive' ) . '</span>';
            $cart_title        = get_theme_mod( 'responsive_cart_title' );
            $cart_icon         = get_theme_mod( 'responsive_cart_icon', 'icon-opencart' );
            $cart_total        = get_theme_mod( 'responsive_cart_count' );
            if ( 'icon-shopping-cart' === $cart_icon ) {
                $cart_icon_svg ='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M192 464c0 26.51-21.49 48-48 48s-48-21.49-48-48c0-26.51 21.49-48 48-48s48 21.49 48 48z"></path><path d="M512 464c0 26.51-21.49 48-48 48s-48-21.49-48-48c0-26.51 21.49-48 48-48s48 21.49 48 48z"></path><path d="M512 256v-192h-384c0-17.673-14.327-32-32-32h-96v32h64l24.037 206.027c-14.647 11.729-24.037 29.75-24.037 49.973 0 35.348 28.654 64 64 64h384v-32h-384c-17.673 0-32-14.327-32-32 0-0.109 0.007-0.218 0.008-0.328l415.992-63.672z"></path></svg>';
            } else if ( 'icon-shopping-bag' === $cart_icon ) {
                $cart_icon_svg ='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="448" height="448" viewBox="0 0 448 448"><path fill="#000" d="M439.25 352l8.75 78.25c0.5 4.5-1 9-4 12.5-3 3.25-7.5 5.25-12 5.25h-416c-4.5 0-9-2-12-5.25-3-3.5-4.5-8-4-12.5l8.75-78.25h430.5zM416 142.25l21.5 193.75h-427l21.5-193.75c1-8 7.75-14.25 16-14.25h64v32c0 17.75 14.25 32 32 32s32-14.25 32-32v-32h96v32c0 17.75 14.25 32 32 32s32-14.25 32-32v-32h64c8.25 0 15 6.25 16 14.25zM320 96v64c0 8.75-7.25 16-16 16s-16-7.25-16-16v-64c0-35.25-28.75-64-64-64s-64 28.75-64 64v64c0 8.75-7.25 16-16 16s-16-7.25-16-16v-64c0-53 43-96 96-96s96 43 96 96z"></path></svg>';
            } else if ( 'icon-shopping-basket' === $cart_icon ) {
                $cart_icon_svg ='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="448" viewBox="0 0 512 448"><path fill="#000" d="M480 192c17.75 0 32 14.25 32 32s-14.25 32-32 32h-3.75l-28.75 165.5c-2.75 15.25-16 26.5-31.5 26.5h-320c-15.5 0-28.75-11.25-31.5-26.5l-28.75-165.5h-3.75c-17.75 0-32-14.25-32-32s14.25-32 32-32h448zM121.25 392c8.75-0.75 15.5-8.5 14.75-17.25l-8-104c-0.75-8.75-8.5-15.5-17.25-14.75s-15.5 8.5-14.75 17.25l8 104c0.75 8.25 7.75 14.75 16 14.75h1.25zM224 376v-104c0-8.75-7.25-16-16-16s-16 7.25-16 16v104c0 8.75 7.25 16 16 16s16-7.25 16-16zM320 376v-104c0-8.75-7.25-16-16-16s-16 7.25-16 16v104c0 8.75 7.25 16 16 16s16-7.25 16-16zM408 377.25l8-104c0.75-8.75-6-16.5-14.75-17.25s-16.5 6-17.25 14.75l-8 104c-0.75 8.75 6 16.5 14.75 17.25h1.25c8.25 0 15.25-6.5 16-14.75zM119 73l-23.25 103h-33l25.25-110.25c6.5-29.25 32.25-49.75 62.25-49.75h41.75c0-8.75 7.25-16 16-16h96c8.75 0 16 7.25 16 16h41.75c30 0 55.75 20.5 62.25 49.75l25.25 110.25h-33l-23.25-103c-3.5-14.75-16.25-25-31.25-25h-41.75c0 8.75-7.25 16-16 16h-96c-8.75 0-16-7.25-16-16h-41.75c-15 0-27.75 10.25-31.25 25z"></path></svg>';
            }
            $output .= '<div class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '" class="cart-container"><div class="res-addon-cart-wrap res-cart-label-position-'. esc_attr( $cart_label_position ) .'">';
                ob_start();
                do_action( 'responsive_header_woo_cart_label_markup' );
                // Get the content from the output buffer.
                $captured_output = ob_get_clean();
                // Append the captured content to $output.
                $output .= $captured_output;
            $output .= '<span class="responsive-header-cart-icon-count-wrap"><span class="res-cart-icon responsive-shopping-cart-svg" data-cart-total="' . $cart_contents_count . '">' . $cart_icon_svg . '</span>';
            if ( get_theme_mod( 'responsive_display_cart_count' ) ) {
                $output .= '<span class="responsive-header-cart-total">'. wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';        
            }
            $output .= '</span></div></a></div>';
        } else {
            $output .= '<div class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '" class="cart-container"><div class="res-addon-cart-wrap res-cart-label-position-'. esc_attr( $cart_label_position ) .'">';
            
            ob_start();
            do_action( 'responsive_header_woo_cart_label_markup' );
            // Get the content from the output buffer.
            $captured_output = ob_get_clean();
            // Append the captured content to $output.
            $output .= $captured_output;
                
            $output.= '<span class="responsive-header-cart-icon-count-wrap"><span class="res-cart-icon responsive-shopping-cart-svg" data-cart-total="' . $cart_contents_count . '">'. $cart_icon_svg .'</span>';
            if ( get_theme_mod( 'responsive_display_cart_count' ) ) {
                $output .= '<span class="responsive-header-cart-total">'. wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';        
            }
            $output .= '</span></div></a></div>';
        }
        if ( 'dropdown' === $cart_click_action && ! wp_is_mobile() ) {
        $output .= '
            <div class="responsive-header-cart-data">';
                ob_start();
                the_widget( 'WC_Widget_Cart', 'title=' );
                $output .= ob_get_clean();
            $output .= '</div>';
        }
	?>
    <div class="responsive-header-cart rspv-header-cart-<?php echo esc_attr( $cart_click_action ) ?>"><?php echo $output; ?></div>
</div><!-- data-section="header_woo_cart" -->
<?php
}