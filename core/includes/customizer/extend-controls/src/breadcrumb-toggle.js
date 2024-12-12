/**
 * By default, breadcrumb is turned off, still the breadcrumb options are visible.
 * This file resolves the issue.
 */
(function($) {
    // Wait until the Customizer is fully loaded.
    wp.customize.bind('ready', function() {
        // Add click event listener to the breadcrumb section.
        $('#accordion-section-responsive_breadcrumb').on('click', function() {
            if(!isBreadcrumbEnable()){
                WhenBreadcrumbUnchecked();
            }
        });
    });

    function WhenBreadcrumbUnchecked() {
        // Get all IDs from elementIDs and set their display to block.
        let ids = elementIDs();
        ids.forEach(function(id) {
            $('#' + id).css('display', 'none');
        });

        if ($('#customize-control-responsive_breadcrumb_tabs #responsive_breadcrumb_general_tab').length) {
            $('#customize-control-responsive_breadcrumb_tabs #responsive_breadcrumb_general_tab').on('click', function() {
                setTimeout(function() {
                    if (!isBreadcrumbEnable()) {
                        ids.forEach(function(id) {
                            $('#' + id).css('display', 'none');
                        });
                    }
                }, 100);
            });
        }
    }

    function isBreadcrumbEnable() {
        let toggleControl = $('#inspector-toggle-control-0');
        if (toggleControl.length) {
            let isChecked = toggleControl.is(':checked');
            return isChecked ? true : false;
        } else {
            return false;
        }
    }

    function elementIDs() {
        let tab_ids_prefix  = 'customize-control-';
        let general_tab_ids = [
            tab_ids_prefix + 'responsive_breadcrumb_enable_separator',				
            tab_ids_prefix + 'responsive_breadcrumb_position',
            tab_ids_prefix + 'responsive_breadcrumb_position_separator',
            tab_ids_prefix + 'responsive_breadcrumb_enable_home_page',
            tab_ids_prefix + 'responsive_breadcrumb_enable_blog_posts_page',
            tab_ids_prefix + 'responsive_breadcrumb_enable_search',
            tab_ids_prefix + 'responsive_breadcrumb_enable_archive',
            tab_ids_prefix + 'responsive_breadcrumb_enable_single_page',
            tab_ids_prefix + 'responsive_breadcrumb_enable_single_post',
            tab_ids_prefix + 'responsive_breadcrumb_enable_404_page',
            tab_ids_prefix + 'responsive_breadcrumb_separator',
            tab_ids_prefix + 'responsive_breadcrumb_separator_separator',
            tab_ids_prefix + 'responsive_content_header_alignment',
            tab_ids_prefix + 'responsive_content_header_alignment_separator',
            tab_ids_prefix + 'responsive_content_header_padding',
            tab_ids_prefix + 'responsive_breadcrumb_display_settings_separator',
        ];
        return general_tab_ids;
    }
})(jQuery);
