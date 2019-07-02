/*! Responsive JS Library v1.2.2 */

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
/*! NOTE: If you're already including a window.matchMedia polyfill via Modernizr or otherwise, you don't need this part */
window.matchMedia = window.matchMedia || (function (doc, undefined) {

	var bool,
		docElem = doc.documentElement,
		refNode = docElem.firstElementChild || docElem.firstChild,
	// fakeBody required for <FF4 when executed in <head>
		fakeBody = doc.createElement('body'),
		div = doc.createElement('div');

	div.id = 'mq-test-1';
	div.style.cssText = "position:absolute;top:-100em";
	fakeBody.style.background = "none";
	fakeBody.appendChild(div);

	return function (q) {

		div.innerHTML = '&shy;<style media="' + q + '"> #mq-test-1 { width: 42px; }</style>';

		docElem.insertBefore(fakeBody, refNode);
		bool = div.offsetWidth == 42;
		docElem.removeChild(fakeBody);

		return { matches: bool, media: q };
	};

})(document);

/*! Respond.js v1.1.0: min/max-width media query polyfill. (c) Scott Jehl. MIT/GPLv2 Lic. j.mp/respondjs  */
(function (win) {
	//exposed namespace
	win.respond = {};

	//define update even in native-mq-supporting browsers, to avoid errors
	respond.update = function () {
	};

	//expose media query support flag for external use
	respond.mediaQueriesSupported = win.matchMedia && win.matchMedia("only all").matches;

	//if media queries are supported, exit here
	if (respond.mediaQueriesSupported) {
		return;
	}

	//define vars
	var doc = win.document,
		docElem = doc.documentElement,
		mediastyles = [],
		rules = [],
		appendedEls = [],
		parsedSheets = {},
		resizeThrottle = 30,
		head = doc.getElementsByTagName("head")[0] || docElem,
		base = doc.getElementsByTagName("base")[0],
		links = head.getElementsByTagName("link"),
		requestQueue = [],

	//loop stylesheets, send text content to translate
		ripCSS = function () {
			var sheets = links,
				sl = sheets.length,
				i = 0,
			//vars for loop:
				sheet, href, media, isCSS;

			for (; i < sl; i++) {
				sheet = sheets[ i ],
					href = sheet.href,
					media = sheet.media,
					isCSS = sheet.rel && sheet.rel.toLowerCase() === "stylesheet";

				//only links plz and prevent re-parsing
				if (!!href && isCSS && !parsedSheets[ href ]) {
					// selectivizr exposes css through the rawCssText expando
					if (sheet.styleSheet && sheet.styleSheet.rawCssText) {
						translate(sheet.styleSheet.rawCssText, href, media);
						parsedSheets[ href ] = true;
					} else {
						if ((!/^([a-zA-Z:]*\/\/)/.test(href) && !base)
							|| href.replace(RegExp.$1, "").split("/")[0] === win.location.host) {
							requestQueue.push({
								href: href,
								media: media
							});
						}
					}
				}
			}
			makeRequests();
		},

	//recurse through request queue, get css text
		makeRequests = function () {
			if (requestQueue.length) {
				var thisRequest = requestQueue.shift();

				ajax(thisRequest.href, function (styles) {
					translate(styles, thisRequest.href, thisRequest.media);
					parsedSheets[ thisRequest.href ] = true;
					makeRequests();
				});
			}
		},

	//find media blocks in css text, convert to style blocks
		translate = function (styles, href, media) {
			var qs = styles.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),
				ql = qs && qs.length || 0,
			//try to get CSS path
				href = href.substring(0, href.lastIndexOf("/")),
				repUrls = function (css) {
					return css.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g, "$1" + href + "$2$3");
				},
				useMedia = !ql && media,
			//vars used in loop
				i = 0,
				j, fullq, thisq, eachq, eql;

			//if path exists, tack on trailing slash
			if (href.length) {
				href += "/";
			}

			//if no internal queries exist, but media attr does, use that	
			//note: this currently lacks support for situations where a media attr is specified on a link AND
			//its associated stylesheet has internal CSS media queries.
			//In those cases, the media attribute will currently be ignored.
			if (useMedia) {
				ql = 1;
			}


			for (; i < ql; i++) {
				j = 0;

				//media attr
				if (useMedia) {
					fullq = media;
					rules.push(repUrls(styles));
				}
				//parse for styles
				else {
					fullq = qs[ i ].match(/@media *([^\{]+)\{([\S\s]+?)$/) && RegExp.$1;
					rules.push(RegExp.$2 && repUrls(RegExp.$2));
				}

				eachq = fullq.split(",");
				eql = eachq.length;

				for (; j < eql; j++) {
					thisq = eachq[ j ];
					mediastyles.push({
						media: thisq.split("(")[ 0 ].match(/(only\s+)?([a-zA-Z]+)\s?/) && RegExp.$2 || "all",
						rules: rules.length - 1,
						hasquery: thisq.indexOf("(") > -1,
						minw: thisq.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/) && parseFloat(RegExp.$1) + ( RegExp.$2 || "" ),
						maxw: thisq.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/) && parseFloat(RegExp.$1) + ( RegExp.$2 || "" )
					});
				}
			}

			applyMedia();
		},

		lastCall,

		resizeDefer,

	// returns the value of 1em in pixels
		getEmValue = function () {
			var ret,
				div = doc.createElement('div'),
				body = doc.body,
				fakeUsed = false;

			div.style.cssText = "position:absolute;font-size:1em;width:1em";

			if (!body) {
				body = fakeUsed = doc.createElement("body");
				body.style.background = "none";
			}

			body.appendChild(div);

			docElem.insertBefore(body, docElem.firstChild);

			ret = div.offsetWidth;

			if (fakeUsed) {
				docElem.removeChild(body);
			}
			else {
				body.removeChild(div);
			}

			//also update eminpx before returning
			ret = eminpx = parseFloat(ret);

			return ret;
		},

	//cached container for 1em value, populated the first time it's needed
		eminpx,

	//enable/disable styles
		applyMedia = function (fromResize) {
			var name = "clientWidth",
				docElemProp = docElem[ name ],
				currWidth = doc.compatMode === "CSS1Compat" && docElemProp || doc.body[ name ] || docElemProp,
				styleBlocks = {},
				lastLink = links[ links.length - 1 ],
				now = (new Date()).getTime();

			//throttle resize calls	
			if (fromResize && lastCall && now - lastCall < resizeThrottle) {
				clearTimeout(resizeDefer);
				resizeDefer = setTimeout(applyMedia, resizeThrottle);
				return;
			}
			else {
				lastCall = now;
			}

			for (var i in mediastyles) {
				var thisstyle = mediastyles[ i ],
					min = thisstyle.minw,
					max = thisstyle.maxw,
					minnull = min === null,
					maxnull = max === null,
					em = "em";

				if (!!min) {
					min = parseFloat(min) * ( min.indexOf(em) > -1 ? ( eminpx || getEmValue() ) : 1 );
				}
				if (!!max) {
					max = parseFloat(max) * ( max.indexOf(em) > -1 ? ( eminpx || getEmValue() ) : 1 );
				}

				// if there's no media query at all (the () part), or min or max is not null, and if either is present, they're true
				if (!thisstyle.hasquery || ( !minnull || !maxnull ) && ( minnull || currWidth >= min ) && ( maxnull || currWidth <= max )) {
					if (!styleBlocks[ thisstyle.media ]) {
						styleBlocks[ thisstyle.media ] = [];
					}
					styleBlocks[ thisstyle.media ].push(rules[ thisstyle.rules ]);
				}
			}

			//remove any existing respond style element(s)
			for (var i in appendedEls) {
				if (appendedEls[ i ] && appendedEls[ i ].parentNode === head) {
					head.removeChild(appendedEls[ i ]);
				}
			}

			//inject active styles, grouped by media type
			for (var i in styleBlocks) {
				var ss = doc.createElement("style"),
					css = styleBlocks[ i ].join("\n");

				ss.type = "text/css";
				ss.media = i;

				//originally, ss was appended to a documentFragment and sheets were appended in bulk.
				//this caused crashes in IE in a number of circumstances, such as when the HTML element had a bg image set, so appending beforehand seems best. Thanks to @dvelyk for the initial research on this one!
				head.insertBefore(ss, lastLink.nextSibling);

				if (ss.styleSheet) {
					ss.styleSheet.cssText = css;
				}
				else {
					ss.appendChild(doc.createTextNode(css));
				}

				//push to appendedEls to track for later removal
				appendedEls.push(ss);
			}
		},
	//tweaked Ajax functions from Quirksmode
		ajax = function (url, callback) {
			var req = xmlHttp();
			if (!req) {
				return;
			}
			req.open("GET", url, true);
			req.onreadystatechange = function () {
				if (req.readyState != 4 || req.status != 200 && req.status != 304) {
					return;
				}
				callback(req.responseText);
			}
			if (req.readyState == 4) {
				return;
			}
			req.send(null);
		},
	//define ajax obj
		xmlHttp = (function () {
			var xmlhttpmethod = false;
			try {
				xmlhttpmethod = new XMLHttpRequest();
			}
			catch (e) {
				xmlhttpmethod = new ActiveXObject("Microsoft.XMLHTTP");
			}
			return function () {
				return xmlhttpmethod;
			};
		})();

	//translate CSS
	ripCSS();

	//expose update for re-running respond later on
	respond.update = ripCSS;

	//adjust on resize
	function callMedia() {
		applyMedia(true);
	}

	if (win.addEventListener) {
		win.addEventListener("resize", callMedia, false);
	}
	else if (win.attachEvent) {
		win.attachEvent("onresize", callMedia);
	}
})(this);

/**
 * jQuery Scroll Top Plugin 1.0.0
 */
jQuery(document).ready(function ($) {
	$('a[href="#scroll-top"]').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 'slow');
		return false;
	});
});

/*global jQuery */
/*jshint browser:true */
/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
(function( $ ){

	"use strict";

	$.fn.fitVids = function( options ) {
		var settings = {
			customSelector: null,
			ignore: null,
		};

		if(!document.getElementById('fit-vids-style')) {
			// appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
			var head = document.head || document.getElementsByTagName('head')[0];
			var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
			var div = document.createElement('div');
			div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
			head.appendChild(div.childNodes[1]);
		}

		if ( options ) {
			$.extend( settings, options );
		}

		return this.each(function(){
			var selectors = [
				"iframe[src*='player.vimeo.com']",
				"iframe[src*='youtube.com']",
				"iframe[src*='youtube-nocookie.com']",
				"iframe[src*='kickstarter.com'][src*='video.html']",
				"object",
				"embed"
			];

				if (settings.customSelector) {
				selectors.push(settings.customSelector);
			}

			var ignoreList = '.fitvidsignore';

			if(settings.ignore) {
				ignoreList = ignoreList + ', ' + settings.ignore;
			}

			var $allVideos = $(this).find(selectors.join(','));
			$allVideos = $allVideos.not("object object"); // SwfObj conflict patch
			$allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

			$allVideos.each(function(){
				var $this = $(this);
				if($this.parents(ignoreList).length > 0) {
					return; // Disable FitVids on this video.
				}
				if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
				if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
				{
					$this.attr('height', 9);
					$this.attr('width', 16);
				}
				var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
					width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
					aspectRatio = height / width;
				if(!$this.attr('id')){
					var videoID = 'fitvid' + Math.floor(Math.random()*999999);
					$this.attr('id', videoID);
				}
				$this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
				$this.removeAttr('height').removeAttr('width');
			});
		});
	};
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );

/*!
 * Mobile Menu
 */
(function ($) {
	var current = $('.main-nav li.current-menu-item a').html();
	current = $('.main-nav li.current_page_item a').html();
	if ($('span').hasClass('custom-mobile-menu-title')) {
		current = $('span.custom-mobile-menu-title').html();
	}
	else if (typeof current == 'undefined' || current === null) {
		if ($('body').hasClass('home')) {
			if ($('#logo span').hasClass('site-name')) {
				current = $('#logo .site-name a').html();
			}
			else {
				current = $('#logo img').attr('alt');
			}
		}
		else {
			if ($('body').hasClass('woocommerce') && $('h1').hasClass('page-title')) {
				current = $('h1.page-title').html();
			}
			else if ($('body').hasClass('woocommerce') && $('h1').hasClass('entry-title')) {
				current = $('h1.entry-title').html();
			}
			else if ($('body').hasClass('archive') && $('h6').hasClass('title-archive')) {
				current = $('h6.title-archive').html();
			}
			else if ($('body').hasClass('search-results') && $('h6').hasClass('title-search-results')) {
				current = $('h6.title-search-results').html();
			}
			else if ($('body').hasClass('page-template-blog-excerpt-php') && $('li').hasClass('current_page_item')) {
				current = $('li.current_page_item').text();
			}
			else if ($('body').hasClass('page-template-blog-php') && $('li').hasClass('current_page_item')) {
				current = $('li.current_page_item').text();
			}
			else if ($('h1').hasClass('post-title')) {
				current = $('h1.post-title').html();
			}
			else {
				current = '&nbsp;';
			}
		}
	}
	;
	$('.main-nav').append('<a id="responsive_menu_button"></a>');
	$('.main-nav').prepend('<div id="responsive_current_menu_item">' + current + '</div>');
	$('a#responsive_menu_button, #responsive_current_menu_item').click(function () {
		$('.js .main-nav .menu').slideToggle(function () {
			if ($(this).is(':visible')) {
				$('a#responsive_menu_button').addClass('responsive-toggle-open');
			}
			else {
				$('a#responsive_menu_button').removeClass('responsive-toggle-open');
				$('.js .main-nav .menu').removeAttr('style');
			}
		});
	});
})(jQuery);

// Close the mobile menu when clicked outside of it.
(function ($) {
	$('html').click(function () {

		// Check if the menu is open, close in that case.
		if ($('a#responsive_menu_button').hasClass('responsive-toggle-open')) {
			$('.js .main-nav .menu').slideToggle(function () {
				$('a#responsive_menu_button').removeClass('responsive-toggle-open');
				$('.js .main-nav .menu').removeAttr('style');
			});
		}
	})
})(jQuery);

// Stop propagation on click on menu.
jQuery('.main-nav').click(function (event) {
	var pathname = window.location.pathname;
	if (pathname != '/wp-admin/customize.php') {
		event.stopPropagation();
	}
});

// Placeholder
jQuery(function () {
	jQuery('input[placeholder], textarea[placeholder]').placeholder();
});

// FitVids
jQuery(function($) {
// Target your #container, #wrapper etc.
	$("#wrapper").fitVids({ ignore: '.ls-container'});
});

// skip-link-focus-fix.js https://github.com/Automattic/_s/blob/master/js/skip-link-focus-fix.js
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
