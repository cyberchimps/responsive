<?php
/**
 * WooCommerce cart tags used by the native cart popup.
 *
 * Renders the [responsive_woo_cart_items], [responsive_woo_total_cart] and
 * [responsive_woo_free_shipping_left] tags inside the popup text, plus the
 * AJAX endpoint that refreshes the free shipping message when the cart changes.
 *
 * These tags are not registered as shortcodes; they are parsed only where the
 * popup outputs its customizer text.
 *
 * @package Responsive
 * @since 6.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

if ( ! function_exists( 'responsive_woo_cart_items_count' ) ) {
	/**
	 * Returns the cart item count markup.
	 *
	 * @return string|void
	 */
	function responsive_woo_cart_items_count() {
		if ( ! class_exists( 'WooCommerce' ) || is_admin() ) {
			return;
		}
		// Return if in elementor, avoid errors.
		if ( class_exists( 'Elementor\Plugin' )
			&& \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return esc_html__( 'This tag only works in front end', 'responsive' );
		}
		$output  = '<span class="responsive-woo-cart-count">';
		$output .= WC()->cart->get_cart_contents_count();
		$output .= '</span>';

		return $output;
	}
}

if ( ! function_exists( 'responsive_woo_cart_total' ) ) {
	/**
	 * Returns the cart total markup.
	 *
	 * @return string|void
	 */
	function responsive_woo_cart_total() {
		if ( ! class_exists( 'WooCommerce' ) || is_admin() ) {
			return;
		}
		// Return if in elementor, avoid errors.
		if ( class_exists( 'Elementor\Plugin' )
			&& \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return esc_html__( 'This tag only works in front end', 'responsive' );
		}

		$output  = '<span class="responsive-woo-total">';
		$output .= WC()->cart->get_total();
		$output .= '</span>';

		return $output;
	}
}

if ( ! function_exists( 'responsive_woo_get_free_shipping_left' ) ) {
	/**
	 * Returns a message indicating how much is left to spend for free shipping,
	 * or a message indicating free shipping has been reached.
	 *
	 * @param string $content         Message shown when free shipping is not reached. May contain '%left_to_free%'.
	 * @param string $content_reached Message shown when the free shipping threshold is reached.
	 * @param float  $multiply_by     Multiplier for prices (default 1).
	 *
	 * @return string|void
	 */
	function responsive_woo_get_free_shipping_left( $content, $content_reached, $multiply_by = 1 ) {

		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		if ( class_exists( 'Elementor\Plugin' )
			&& \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return;
		}

		if ( empty( $content ) ) {
			$content = esc_html__( 'Buy for %left_to_free% more and get free shipping', 'responsive' );
		}

		if ( empty( $content_reached ) ) {
			$content_reached = esc_html__( 'You have Free delivery!', 'responsive' );
		}

		$min_free_shipping_amount = 0;

		$free_shipping = new WC_Shipping_Legacy_Free_Shipping();
		if ( 'yes' === $free_shipping->enabled ) {
			if ( in_array( $free_shipping->requires, array( 'min_amount', 'either', 'both' ), true ) ) {
				$min_free_shipping_amount = $free_shipping->min_amount;
			}
		}
		if ( 0 === $min_free_shipping_amount ) {
			if ( function_exists( 'WC' ) ) {
				$wc_shipping = WC()->shipping;
				$wc_cart     = WC()->cart;
				if ( $wc_shipping && $wc_cart ) {
					if ( $wc_shipping->enabled ) {
						$packages = $wc_cart->get_shipping_packages();
						if ( $packages ) {
							$methods = $wc_shipping->load_shipping_methods( $packages[0] );
							foreach ( $methods as $method ) {
								if ( 'yes' === $method->enabled && 0 !== $method->instance_id ) {
									if ( 'WC_Shipping_Free_Shipping' === get_class( $method ) ) {
										if ( in_array( $method->requires, array( 'min_amount', 'either', 'both' ), true ) ) {
											$min_free_shipping_amount = $method->min_amount;
											break;
										}
									}
								}
							}
						}
					}
				}
			}
		}

		if ( 0 !== $min_free_shipping_amount ) {
			if ( isset( WC()->cart->cart_contents_total ) ) {
				$total = ( WC()->cart->prices_include_tax ) ? ( WC()->cart->cart_contents_total + WC()->cart->get_cart_contents_tax() ) : WC()->cart->cart_contents_total;
				if ( $total >= $min_free_shipping_amount ) {
					return do_shortcode( $content_reached );
				} else {
					$multiply_by = floatval( $multiply_by );
					$content     = str_replace( '%left_to_free%', '<span class="responsive-woo-left-to-free">' . wc_price( ( $min_free_shipping_amount - $total ) * $multiply_by ) . '</span>', $content );
					$content     = str_replace( '%free_shipping_min_amount%', '<span class="responsive-woo-left-to-free">' . wc_price( $min_free_shipping_amount * $multiply_by ) . '</span>', $content );
					return $content;
				}
			}
		}
	}
}

if ( ! function_exists( 'responsive_woo_free_shipping_tag' ) ) {
	/**
	 * Returns the free shipping progress message for the popup tag.
	 *
	 * @param array  $atts    Tag attributes.
	 * @param string $content Enclosed tag content (not used).
	 *
	 * @return string|void
	 */
	function responsive_woo_free_shipping_tag( $atts, $content = '' ) {

		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		wp_enqueue_script( 'responsive-woo-popup' );

		$content_data    = '';
		$content_reached = '';

		if ( ! empty( $atts ) ) {
			if ( isset( $atts['content'] ) ) {
				$content_data = $atts['content'];
			}
			if ( isset( $atts['content_reached'] ) ) {
				$content_reached = $atts['content_reached'];
			}
		}

		$x = str_replace( '%', '+', $content_data );

		$atts = shortcode_atts(
			array(
				'content'         => esc_html__( 'Buy for %left_to_free% more and get free shipping', 'responsive' ),
				'content_reached' => esc_html__( 'You have Free delivery!', 'responsive' ),
				'multiply_by'     => 1,
			),
			$atts
		);

		$content         = $atts['content'];
		$content_reached = $atts['content_reached'];
		$multiply_by     = floatval( $atts['multiply_by'] );

		return responsive_woo_get_free_shipping_left( "<span class='responsive-woo-free-shipping' data-content='" . esc_attr( $x ) . "' data-reach='" . esc_attr( $content_reached ) . "'>" . esc_html( $content ) . '</span>', '<span class="responsive-woo-free-shipping">' . esc_html( $content_reached ) . '</span>', $multiply_by );
	}
}

if ( ! function_exists( 'responsive_woo_ajax_update_free_shipping_left' ) ) {
	/**
	 * AJAX handler to refresh the free shipping message fragment.
	 *
	 * @return void
	 */
	function responsive_woo_ajax_update_free_shipping_left() {
		$atts = array();

		// Don't accept POST data from users; recalculate from stored settings.
		$default_bottom_text = esc_html__( '[responsive_woo_free_shipping_left]', 'responsive' );
		$custom_text         = get_theme_mod( 'responsive_popup_bottom_text', $default_bottom_text );

		// Parse tag attributes from the stored value.
		if ( ! empty( $custom_text ) && preg_match( '/\[responsive_woo_free_shipping_left(.*?)\]/', $custom_text, $matches ) ) {
			if ( ! empty( $matches[1] ) ) {
				$shortcode_attrs = shortcode_parse_atts( $matches[1] );
				if ( ! empty( $shortcode_attrs ) && is_array( $shortcode_attrs ) ) {
					$atts = $shortcode_attrs;
				}
			}
		}

		// Recalculate from cart state using trusted database values.
		$free_shipping_message = responsive_woo_free_shipping_tag( $atts, '' );
		wp_send_json( $free_shipping_message );
	}
}

if ( ! has_action( 'wp_ajax_update_responsive_woo_free_shipping_left_shortcode' ) ) {
	add_action( 'wp_ajax_update_responsive_woo_free_shipping_left_shortcode', 'responsive_woo_ajax_update_free_shipping_left' );
	add_action( 'wp_ajax_nopriv_update_responsive_woo_free_shipping_left_shortcode', 'responsive_woo_ajax_update_free_shipping_left' );
}

if ( ! function_exists( 'responsive_woo_parse_cart_tags' ) ) {
	/**
	 * Replace the cart popup tags in a string with their rendered values.
	 *
	 * The theme does not register these tags as shortcodes (that is plugin
	 * territory), so they are parsed here only where the cart popup outputs
	 * its customizer text. The shortcode-style syntax is kept so existing
	 * saved values continue to work, and any other shortcodes are still
	 * handled by do_shortcode().
	 *
	 * @param string $text Text that may contain cart popup tags.
	 *
	 * @return string
	 */
	function responsive_woo_parse_cart_tags( $text ) {
		$tags = array(
			'responsive_woo_cart_items'         => 'responsive_woo_cart_items_count',
			'responsive_woo_total_cart'         => 'responsive_woo_cart_total',
			'responsive_woo_free_shipping_left' => 'responsive_woo_free_shipping_tag',
		);

		if ( empty( $text ) || false === strpos( $text, '[' ) ) {
			return $text;
		}

		$text = preg_replace_callback(
			'/' . get_shortcode_regex( array_keys( $tags ) ) . '/',
			function ( $m ) use ( $tags ) {
				// Allow [[tag]] to escape a tag, matching shortcode behaviour.
				if ( '[' === $m[1] && ']' === $m[6] ) {
					return substr( $m[0], 1, -1 );
				}

				$atts = shortcode_parse_atts( $m[3] );
				if ( ! is_array( $atts ) ) {
					$atts = array();
				}

				return $m[1] . call_user_func( $tags[ $m[2] ], $atts, $m[5] ) . $m[6];
			},
			$text
		);

		return do_shortcode( $text );
	}
}

if ( ! function_exists( 'responsive_woo_popup_allowed_html' ) ) {
	/**
	 * Allowed HTML for the cart popup text.
	 *
	 * Post HTML plus <bdi>, which wc_price() wraps prices in.
	 *
	 * @return array
	 */
	function responsive_woo_popup_allowed_html() {
		$allowed        = wp_kses_allowed_html( 'post' );
		$allowed['bdi'] = array();

		return $allowed;
	}
}
