/**
 * Handle Woo Cart Slide In
 * 
 * @package responsvie
 * @since 6.1.1
 */
(function(){
    let slide_in_cart = document.getElementById('rspv-slide-cart-drawer'),
        rspv_cart_click_action = responsive_woo_cart.cart_click_action
    /**
	 * Opens the Cart Flyout.
	 */
	cartFlyoutOpen = function (event) {
        // Check if click action is "redirect".
		if ( rspv_cart_click_action === 'redirect' ) {
			return;
		}
        event.preventDefault();
        slide_in_cart.classList.remove('active');
        if (undefined !== slide_in_cart && '' !== slide_in_cart && null !== slide_in_cart) {
			slide_in_cart.classList.add('active');
			document.documentElement.classList.add('rspv-slide-in-cart-active');
        }
    }
	/**
	 * Closes the Cart Flyout.
	 */
	cartFlyoutClose = function (event) {
		event.preventDefault();
		if (undefined !== slide_in_cart && '' !== slide_in_cart && null !== slide_in_cart) {
			slide_in_cart.classList.remove('active');
			document.documentElement.classList.remove('rspv-slide-in-cart-active');
		}
	}
    /**
	 * Main Init Function.
	 */
	function cartInit() {
		// Close Popup if esc is pressed.
		document.addEventListener('keyup', function (event) {
			// 27 is keymap for esc key.
			if (event.keyCode === 27) {
				event.preventDefault();
				slide_in_cart.classList.remove('active');
				document.documentElement.classList.remove('rspv-slide-in-cart-active');
			}
		});
        // Close Popup on outside click.
		document.addEventListener('click', function (event) {
			var target = event.target;
			var cart_modal = document.querySelector('.rspv-slide-in-cart-active .rspv-slide-cart-overlay');
			if (target === cart_modal) {
				slide_in_cart.classList.remove('active');
				document.documentElement.classList.remove('rspv-slide-in-cart-active');
			}
		});
        if( 'slide-in' == rspv_cart_click_action || 'dropdown' == rspv_cart_click_action && responsive_woo_cart.isMobile ) {
            var header_woo_cart = document.querySelectorAll( '.responsive-site-header-wrap .rspv-header-cart-slide-in, .responsive-header-cart.rspv-header-cart-dropdown' ); // Remove .responsive-header-cart.rspv-header-cart-dropdown in future if we have mobile header builder and also the second if condition above.
            if( 0 < header_woo_cart.length ) {
                header_woo_cart.forEach(function(element) {
					element.addEventListener('click', cartFlyoutOpen, false);
				});
            }
        }
		let slide_in_cart_close = document.querySelector('.rspv-header-cart-drawer-close');
		if (undefined !== slide_in_cart_close && '' !== slide_in_cart_close && null !== slide_in_cart_close) {
			slide_in_cart_close.addEventListener("click", cartFlyoutClose, false);
		}
    }
    window.addEventListener('load', function () {
        cartInit();
    });
})();