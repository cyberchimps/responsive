document.addEventListener('DOMContentLoaded', function() {
	var masthead = document.querySelector('.site-header');
	var responsiveScrollTop = document.getElementById('scroll');
	var mobileResponsiveScrollTop = document.querySelector('.footer-mobile-items #scroll');
  
	if (responsiveScrollTop) {
	  var getNumericContent = function(element) {
		return parseInt(getComputedStyle(element).getPropertyValue('content').replace(/[^0-9]/g, ''), 10);
	  };
	
	var device = responsiveScrollTop.getAttribute('data-on-devices');

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

		// Hide both by default
		if (responsiveScrollTop) responsiveScrollTop.style.display = 'none';
		if (mobileResponsiveScrollTop) mobileResponsiveScrollTop.style.display = 'none';

		if (!passedThreshold) return; // nothing to show before scrolling enough

		// Device Visibility Logic
		if (device === 'desktop') {
			// Show only desktop button
			if (responsiveScrollTop && screenWidth >= 769) {
				responsiveScrollTop.style.display = 'block';
			}

		} else if (device === 'mobile') {
			// Show only mobile button
			if (mobileResponsiveScrollTop && screenWidth < 769) {
				mobileResponsiveScrollTop.style.display = 'block';
			}

		} else if (device === 'both') {
			// Desktop above breakpoint, mobile below
			if (responsiveScrollTop && screenWidth >= 769) {
				responsiveScrollTop.style.display = 'block';
			}
			if (mobileResponsiveScrollTop && screenWidth < 769) {
				mobileResponsiveScrollTop.style.display = 'block';
			}
		}
	};	

	handleScroll();
	  
	  window.addEventListener('scroll', handleScroll);
	  
	  responsiveScrollTop.addEventListener('click', function(event) {
		event.preventDefault();
		window.scrollTo({
		  top: 0,
		  behavior: 'smooth'
		});
	  });

	  // Adding separate click functionality for 
	  mobileResponsiveScrollTop.addEventListener('click', function(event) {
		event.preventDefault();
		window.scrollTo({
		  top: 0,
		  behavior: 'smooth'
		});
	  });
	}
  });
  
  