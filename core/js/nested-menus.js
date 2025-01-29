(function ($) {
  "use strict";
  $(document).ready(function () {
    // Get all navigation toggle elements
    var navTOGGLE = document.querySelectorAll('.menu-item:not(.sub-menu .menu-item)');

    // Exit if no navigation toggles are found
    if (!navTOGGLE.length) {
      return;
    }

    // Initialize submenu handling for each navigation toggle
    for (let i = 0; i < navTOGGLE.length; i++) {
      initEachNavToggleSubmenuInside(navTOGGLE[i]);
    }

    /**
     * Get the offset position of an element
     */
    function getOffset(el) {
      if (el instanceof HTMLElement) {
        var rect = el.getBoundingClientRect();

        return {
          top: rect.top + window.pageYOffset,
          left: rect.left + window.pageXOffset,
        };
      }

      return {
        top: null,
        left: null,
      };
    }

    /**
     * Initialize submenu edge detection for a navigation element
     */
    function initEachNavToggleSubmenuInside(nav) {
      var SUBMENUPARENTS = nav.querySelectorAll(".menu-item-has-children");

      if (!SUBMENUPARENTS.length) {
        return;
      }

      for (let i = 0; i < SUBMENUPARENTS.length; i++) {
        const parentMenuItem = SUBMENUPARENTS[i];

        // Handle verifying if navigation will go offscreen on mouseenter
        parentMenuItem.addEventListener("mouseenter", function () {
          var submenu = parentMenuItem.querySelector("ul.sub-menu");
          if (submenu) {
            var off = getOffset(submenu);
            var l = off.left;
            var w = submenu.offsetWidth;
            var docW = window.innerWidth;

            var isEntirelyVisible = l + w <= docW;

            if (!isEntirelyVisible) {
              submenu.classList.add("sub-menu-edge");
            }
          }
        });
      }
    }
  });
})(jQuery);