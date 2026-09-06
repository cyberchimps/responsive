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
                
                let currentElements = wp.customize(targetSortableSetting).get();
                if (typeof currentElements === 'string' && currentElements.length > 0) {
                    currentElements = currentElements.split(',');
                }
                let elementsArray = Array.isArray(currentElements) ? currentElements.slice() : [];
                let hasBreadcrumb = elementsArray.includes('breadcrumb');
                
                let $li = $('#customize-control-' + targetSortableSetting + ' li[data-value="breadcrumb"]');
                let isCurrentlyInvisible = $li.length ? $li.hasClass('invisible') : true;
                
                if (isEnabled && !hasBreadcrumb) {
                    let breadcrumbPos = wp.customize('responsive_breadcrumb_position') ? wp.customize('responsive_breadcrumb_position').get() : 'before';
                    
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
                    
                    wp.customize(targetSortableSetting).set(elementsArray);
                    if (wp.customize.control(targetSortableSetting)) {
                        wp.customize.control(targetSortableSetting).params.value = elementsArray;
                    }
                    
                    if (!$li.length) return; // Skip DOM manipulation if not rendered
                    
                    if (isCurrentlyInvisible) {
                        $li.removeClass('invisible');
                        $li.find('span.visibility').removeClass('dashicons-visibility-faint');
                        $li.find('.responsive-sortable-eye-icon').toggleClass('active');
                    }
                    
                    // Move DOM element to correct position visually
                    let $ul = $li.parent();
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
                    
                } else if (!isEnabled && hasBreadcrumb) {
                    elementsArray = elementsArray.filter(function(e) { return e !== 'breadcrumb'; });
                    
                    wp.customize(targetSortableSetting).set(elementsArray);
                    if (wp.customize.control(targetSortableSetting)) {
                        wp.customize.control(targetSortableSetting).params.value = elementsArray;
                    }
                    
                    if (!$li.length) return; // Skip DOM manipulation if not rendered
                    
                    if (!isCurrentlyInvisible) {
                        $li.addClass('invisible');
                        $li.find('span.visibility').addClass('dashicons-visibility-faint');
                        $li.find('.responsive-sortable-eye-icon').toggleClass('active');
                    }
                    // Move DOM element to end of invisible list (optional, but standard behavior)
                    let $ul = $li.parent();
                    $ul.append($li);
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
        console.log( '[isBreadcrumbEnable] wp.customize available?', typeof wp !== 'undefined' && !!wp.customize );

        if ( typeof wp !== 'undefined' && wp.customize && wp.customize('responsive_theme_options[breadcrumb]') ) {
            let val = wp.customize('responsive_theme_options[breadcrumb]').get();
            let result = (val === true || val === 1 || val === '1');
            console.log( '[isBreadcrumbEnable] wp.customize raw value:', val, '(type:', typeof val, ') -> resolved:', result );
            return result;
        }

        console.log( '[isBreadcrumbEnable] wp.customize setting not available, falling back to DOM checkbox' );

        let toggleControl = $('#customize-control-res_breadcrumb input[type="checkbox"]');
        console.log( '[isBreadcrumbEnable] toggleControl matched elements:', toggleControl.length );

        if (toggleControl.length) {
            let result = toggleControl.is(':checked');
            console.log( '[isBreadcrumbEnable] checkbox checked state -> resolved:', result );
            return result;
        }

        console.log( '[isBreadcrumbEnable] no source available -> defaulting to false' );
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
