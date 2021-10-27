<?php
/**
 * Template part for displaying the Mobile Header
 *
 * @package responsive
 */

namespace Responsive\Core;

?>

<div id="mobile-header" class="site-mobile-header-wrap">
	<div class="site-header-inner-wrap<?php /* echo esc_attr( 'top_main_bottom' === responsive()->option( 'mobile_header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
	<?php
	/*
	If ( 'top_main_bottom' === responsive()->option( 'mobile_header_sticky' ) ) {
		echo ' data-shrink="' . ( responsive()->option( 'mobile_header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
		echo ' data-reveal-scroll-up="' . ( responsive()->option( 'mobile_header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
		if ( responsive()->option( 'mobile_header_sticky_shrink' ) ) {
			echo ' data-shrink-height="' . esc_attr( responsive()->sub_option( 'mobile_header_sticky_main_shrink', 'size' ) ) . '"';
		}
	}
	*/
	?>
	>
		<div class="site-header-upper-wrap">
			<div class="site-header-upper-inner-wrap<?php /* echo esc_attr( 'top_main' === responsive()->option( 'mobile_header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
			<?php
			/*
			If ( 'top_main' === responsive()->option( 'mobile_header_sticky' ) ) {
				echo ' data-shrink="' . ( responsive()->option( 'mobile_header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
				echo ' data-reveal-scroll-up="' . ( responsive()->option( 'mobile_header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
				if ( responsive()->option( 'mobile_header_sticky_shrink' ) ) {
					echo ' data-shrink-height="' . esc_attr( responsive()->sub_option( 'mobile_header_sticky_main_shrink', 'size' ) ) . '"';
				}
			}
			*/
			?>
			>
			<?php
			/**
			 * Responsive Top Header
			 *
			 * Hooked Responsive_mobile_top_header 10
			 */
			do_action( 'responsive_mobile_top_header' );
			/**
			 * Responsive Main Header
			 *
			 * Hooked Responsive_mobile_main_header 10
			 */
			do_action( 'responsive_mobile_main_header' );
			?>
			</div>
		</div>
		<?php
		/**
		 * Responsive Mobile Bottom Header
		 *
		 * Hooked Responsive_mobile_bottom_header 10
		 */
		do_action( 'responsive_mobile_bottom_header' );
		?>
	</div>
</div>
