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

        // Listen to changes on the main breadcrumb toggle
        if ( wp.customize('responsive_theme_options[breadcrumb]') ) {
            wp.customize('responsive_theme_options[breadcrumb]').bind(function(newval) {
                if ( newval ) {
                    let subSettings = [
                        'responsive_breadcrumb_enable_home_page',
                        'responsive_breadcrumb_enable_blog_posts_page',
                        'responsive_breadcrumb_enable_search',
                        'responsive_breadcrumb_enable_archive',
                        'responsive_breadcrumb_enable_single_page',
                        'responsive_breadcrumb_enable_single_post',
                        'responsive_breadcrumb_enable_404_page'
                    ];
                    
                    // Check if all sub-settings are false (which is the default state).
                    // If all are false, we assume it's the "first time" enabling them, 
                    // or the user explicitly turned them all off and we do a master reset.
                    let allFalse = subSettings.every(function(s) {
                        return wp.customize(s) && ( wp.customize(s).get() == false || wp.customize(s).get() == 0 );
                    });
                    
                    if ( allFalse ) {
                        subSettings.forEach(function(s) {
                            if ( wp.customize(s) ) {
                                wp.customize(s).set(1);
                            }
                        });
                    }
                }
            });
        }

        // Synchronize individual breadcrumb toggles with their respective sortable element arrays
        function syncBreadcrumbSortable(toggleSettings, targetSortableSetting) {
            function updateSortable() {
                if (!wp.customize(targetSortableSetting)) return;

                let isGlobalEnabled = wp.customize('responsive_theme_options[breadcrumb]') && (wp.customize('responsive_theme_options[breadcrumb]').get() == true || wp.customize('responsive_theme_options[breadcrumb]').get() == '1');

                let isEnabled = toggleSettings.some(function(setting) {
                    return wp.customize(setting) && (wp.customize(setting).get() == true || wp.customize(setting).get() == '1');
                });

                isEnabled = isEnabled && isGlobalEnabled;

                let breadcrumbPos = wp.customize('responsive_breadcrumb_position') ? wp.customize('responsive_breadcrumb_position').get() : 'before';

                let $li = $('#customize-control-' + targetSortableSetting + ' li[data-value="breadcrumb"]');

                if ($li.length) {
                    // The control is rendered, so the DOM is the source of truth here -
                    // reposition breadcrumb's <li> and then save via the control's own
                    // updateValue(), the exact mechanism a manual drag-and-drop uses.
                    // This way a global position change and a manual reorder both write
                    // through the same path, so whichever happened last is what sticks -
                    // there's no separate JS-computed array that can drift from the DOM.
                    let $ul = $li.parent();
                    let $eyeIcons = $li.find('.responsive-sortable-eye-icon');

                    if (isEnabled) {
                        $li.removeClass('invisible');
                        $li.find('span.visibility').removeClass('dashicons-visibility-faint');
                        $eyeIcons.removeClass('active').first().addClass('active');

                        $li.detach();
                        if (breadcrumbPos === 'after') {
                            let $titleLi = $ul.find('li[data-value="title"]');
                            if ($titleLi.length) {
                                $li.insertAfter($titleLi);
                            } else {
                                $ul.append($li);
                            }
                        } else {
                            $ul.prepend($li);
                        }
                    } else {
                        $li.addClass('invisible');
                        $li.find('span.visibility').addClass('dashicons-visibility-faint');
                        $eyeIcons.removeClass('active').last().addClass('active');

                        $li.detach();
                        $ul.append($li);
                    }

                    if (wp.customize.control(targetSortableSetting)) {
                        wp.customize.control(targetSortableSetting).updateValue();
                    }
                } else {
                    // Control isn't rendered yet (its section was never expanded), so
                    // there's no DOM to derive the order from - compute the array directly.
                    let currentElements = wp.customize(targetSortableSetting).get();
                    if (typeof currentElements === 'string' && currentElements.length > 0) {
                        currentElements = currentElements.split(',');
                    }
                    let elementsArray = Array.isArray(currentElements) ? currentElements.slice() : [];

                    let breadcrumbIndex = elementsArray.indexOf('breadcrumb');
                    if (breadcrumbIndex !== -1) {
                        elementsArray.splice(breadcrumbIndex, 1);
                    }

                    if (isEnabled) {
                        if (breadcrumbPos === 'after') {
                            let titleIndex = elementsArray.indexOf('title');
                            if (titleIndex !== -1) {
                                elementsArray.splice(titleIndex + 1, 0, 'breadcrumb');
                            } else {
                                elementsArray.push('breadcrumb');
                            }
                        } else {
                            elementsArray.unshift('breadcrumb');
                        }
                    }

                    wp.customize(targetSortableSetting).set(elementsArray);
                }
            }

            toggleSettings.forEach(function(setting) {
                if (wp.customize(setting)) {
                    wp.customize(setting).bind(updateSortable);
                }
            });

            if (wp.customize('responsive_theme_options[breadcrumb]')) {
                wp.customize('responsive_theme_options[breadcrumb]').bind(updateSortable);
            }

            if (wp.customize('responsive_breadcrumb_position')) {
                wp.customize('responsive_breadcrumb_position').bind(updateSortable);
            }
        }

        syncBreadcrumbSortable(['responsive_breadcrumb_enable_single_post'], 'responsive_blog_single_elements_positioning');
        syncBreadcrumbSortable(['responsive_breadcrumb_enable_single_page'], 'responsive_page_single_elements_positioning');
        syncBreadcrumbSortable(['responsive_breadcrumb_enable_blog_posts_page', 'responsive_breadcrumb_enable_archive'], 'responsive_blog_entry_elements_positioning');

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
        if ( typeof wp !== 'undefined' && wp.customize && wp.customize('responsive_theme_options[breadcrumb]') ) {
            let val = wp.customize('responsive_theme_options[breadcrumb]').get();
            return (val === true || val === 1 || val === '1');
        }

        let toggleControl = $('#customize-control-res_breadcrumb input[type="checkbox"]');
        if (toggleControl.length) {
            return toggleControl.is(':checked');
        }

        return false;
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
            tab_ids_prefix + 'responsive_breadcrumb_display_settings_separator',
            tab_ids_prefix + 'responsive_breadcrumb_source'
        ];
        return general_tab_ids;
    }
})(jQuery);
