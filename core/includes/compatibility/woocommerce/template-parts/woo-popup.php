<?php
/**
 * Popup template
 *
 * @link       https://www.cyberchimps.com
 * @since      1.0.0
 *
 * @package    Responsive_Addons
 * @subpackage Responsive_Addons/public/partials
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get elements.
$elements = responsive_popup_elements_positioning();

// Vars.
$popup_title         = get_theme_mod( 'responsive_popup_title_text', 'Item added to your cart' );
$default_content     = esc_html__( '[responsive_woo_cart_items] items in the cart ([responsive_woo_total_cart])', 'responsive-add-ons' );
$content             = get_theme_mod( 'responsive_popup_content', $default_content );
$continue_btn        = get_theme_mod( 'responsive_popup_continue_btn_text', 'Continue Shopping' );
$cart_btn            = get_theme_mod( 'responsive_popup_cart_btn_text', 'Go To The Cart' );
$default_bottom_text = esc_html__( '[responsive_woo_free_shipping_left]', 'responsive-add-ons' );
$text                = get_theme_mod( 'responsive_popup_bottom_text', $default_bottom_text );
$overlay             = get_theme_mod( 'responsive_popup_overlay_color', '#000000' );
$opacity             = get_theme_mod( 'responsive_popup_overlay_color_opacity', '0.7' ); ?>

<div id="woo-popup-wrap" class="mfp-hide">

	<div id="woo-popup-inner">

		<div class="woo-popup-content">

				<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
					<circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
					<path xmlns="http://www.w3.org/2000/svg" class="checkmark-check" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2" d="M 14.1 27.2 l 7.1 7.2 l 16.7 -16.8" />
				</svg>

				<?php
				// Loop through elements.
				foreach ( $elements as $element ) {

					// Title.
					if ( 'title' === $element ) {
						?>
						<h3 class="popup-title"><?php echo do_shortcode( $popup_title ); ?></h3>
						<?php
					}

					// Content.
					if ( 'content' === $element ) {
						?>
						<p class="popup-content"><?php echo do_shortcode( $content ); ?></p>
						<?php
					}

					// Buttons.
					if ( 'buttons' === $element ) {
						?>
						<div class="buttons-wrap">
							<a href="#" class="continue-btn"><?php echo do_shortcode( $continue_btn ); ?></a>
							<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ); ?>" class="cart-btn"><?php echo do_shortcode( $cart_btn ); ?></a>
						</div>
						<?php
					}

					// Bottom Text.
					if ( 'bottom_text' == $element ) {
						?>
						<span class="popup-text"><?php echo do_shortcode( $text ); ?></span>
						<?php
					}
				}
				?>



		</div><!-- .woo-popup-inner -->

	</div><!-- #woo-popup-inner -->

</div><!-- #woo-popup-wrap -->
