(function ($) {
  "use strict";

  $(document).ready(function () {
    let menuContainer = document.querySelector('.main-navigation-wrapper');
    // Initialize submenu edge detection
    initNavSubmenuDetection();

    if (menuContainer) {
      let observer = new MutationObserver(() => {
        initNavSubmenuDetection();
      });
      observer.observe(menuContainer, {
        childList: true,
        subtree: true,
        attributes: true, // To detect class changes
      });
    }

    /**
     * Get the offset position of an element
     */
    function getOffset(el) {
      if (el instanceof HTMLElement) {
        let rect = el.getBoundingClientRect();
        return {
          top: rect.top + window.pageYOffset,
          left: rect.left + window.pageXOffset,
        };
      }
      return { top: null, left: null };
    }

    /**
     * Initialize submenu edge detection for all menu items
     */
    function initNavSubmenuDetection() {
      let navTOGGLE = document.querySelectorAll('.menu-item:not(.sub-menu .menu-item)');

      if (!navTOGGLE.length) {
        return;
      }

      for (let i = 0; i < navTOGGLE.length; i++) {
        initEachNavToggleSubmenuInside(navTOGGLE[i]);
      }
    }

    /**
     * Initialize submenu edge detection for a navigation element
     */
    function initEachNavToggleSubmenuInside(nav) {
      let SUBMENUPARENTS = nav.querySelectorAll(".menu-item-has-children");

      if (!SUBMENUPARENTS.length) {
        return;
      }

      for (let i = 0; i < SUBMENUPARENTS.length; i++) {
        let parentMenuItem = SUBMENUPARENTS[i];

        // Prevent duplicate event listeners
        if (!parentMenuItem.dataset.hasSubmenuEvent) {
          parentMenuItem.dataset.hasSubmenuEvent = true;

          parentMenuItem.addEventListener("mouseenter", function () {
            let submenu = parentMenuItem.querySelector("ul.sub-menu");
            if (submenu) {
              let off  = getOffset(submenu);
              let l    = off.left;
              let w    = submenu.offsetWidth;
              let docW = window.innerWidth;

              let isEntirelyVisible = l + w <= docW;
              if (!isEntirelyVisible) {
                submenu.classList.add("sub-menu-edge");
              }
            }
          });
        }
      }
    }
  });
})(jQuery);
