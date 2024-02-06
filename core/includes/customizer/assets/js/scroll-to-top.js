document.addEventListener('DOMContentLoaded', function() {
	var masthead = document.querySelector('.site-header');
	var responsiveScrollTop = document.getElementById('scroll');
  
	if (responsiveScrollTop) {
	  var getNumericContent = function(element) {
		return parseInt(getComputedStyle(element).getPropertyValue('content').replace(/[^0-9]/g, ''), 10);
	  };
  
	  var handleScroll = function() {
		var content = getNumericContent(responsiveScrollTop);
		var device = responsiveScrollTop.getAttribute('data-on-devices');
		var screenWidth = window.innerWidth;
		var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
  
		if (device === 'both' ||
			(device === 'desktop' && screenWidth >= 769 && content === 769) ||
			(device === 'mobile' && (screenWidth < 769 || content === ''))) {
  
		  if (masthead) {
			if (scrollTop > masthead.offsetHeight + 100) {
			  responsiveScrollTop.style.display = 'block';
			} else {
			  responsiveScrollTop.style.display = 'none';
			}
		  } else {
			if (scrollTop > 300) {
			  responsiveScrollTop.style.display = 'block';
			} else {
			  responsiveScrollTop.style.display = 'none';
			}
		  }
		} else {
		  responsiveScrollTop.style.display = 'none';
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
	}
  });
  
  