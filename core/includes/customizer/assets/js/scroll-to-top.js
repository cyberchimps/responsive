document.addEventListener('DOMContentLoaded', function() {
	var masthead = document.querySelector('.site-header');
	var scrollButtons = document.querySelectorAll('.responsive-scroll');
  
	if (scrollButtons.length > 0) {
		var firstBtn = scrollButtons[0];
		var device = firstBtn.getAttribute('data-on-devices');

		var handleScroll = function() {
			var screenWidth = window.innerWidth;
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

			// Determine if scrolling is far enough to show the button
			var passedThreshold = false;
			if (masthead) {
				passedThreshold = scrollTop > masthead.offsetHeight + 100;
			} else {
				passedThreshold = scrollTop > 300;
			}

			// Iterate through all scroll buttons
			scrollButtons.forEach(function(btn) {
				// Hide by default
				btn.style.display = 'none';

				if (!passedThreshold) return;

				var isMobileBtn = btn.closest('.footer-mobile-items');
				
				// Device Visibility Logic
				if (device === 'desktop') {
					// Show only desktop button (not in mobile items)
					if (!isMobileBtn && screenWidth >= 769) {
						btn.style.display = 'block';
					}

				} else if (device === 'mobile') {
					// Show only mobile button
					if (isMobileBtn && screenWidth < 769) {
						btn.style.display = 'block';
					}

				} else if (device === 'both') {
					// Desktop above breakpoint, mobile below
					if (!isMobileBtn && screenWidth >= 769) {
						btn.style.display = 'block';
					}
					if (isMobileBtn && screenWidth < 769) {
						btn.style.display = 'block';
					}
				}
			});
		};	

		handleScroll();
		  
		window.addEventListener('scroll', handleScroll);
		  
		scrollButtons.forEach(function(btn) {
			btn.addEventListener('click', function(event) {
				event.preventDefault();
				window.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			});
		});
	}
});