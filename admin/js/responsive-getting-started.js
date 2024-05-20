jQuery(document).ready(function ($) {
    let hash = window.location.hash;
        if ( hash === '' ) {
            window.location.hash = '#home'
            hash = '#home'
        }
        if ( hash === '#templates' ) {
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/rst-template-preview.jpg')");
        }
        if ( hash === '#blocks' || hash === '#rae' ) {
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/" +  hash.substring(1) + "-template-preview.jpg')");
        }
        navigateTo(hash);
        $('.responsive-theme-tab-content').hide()
        $('.responsive-theme-tab').removeClass('responsive-theme-active-tab')
        $('.responsive-theme-' + hash.substring(1) + '-tab').addClass('responsive-theme-active-tab')
        $('#responsive_' + hash.substring(1)).show()
    

    $('.responsive-theme-tab').click(function () {
        $('.responsive-theme-tab-content').hide()
        $('.responsive-theme-tab').removeClass('responsive-theme-active-tab')
        let tab = $(this).data('tab');
        $('#responsive_' + tab).show();
        window.location.hash = tab;
        $(this).addClass('responsive-theme-active-tab');
    });

    $(window).on('hashchange', function() {
        let currentHash = window.location.hash;
        navigateTo(currentHash);
        if ( currentHash === '#templates' ) {
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/rst-template-preview.jpg')");
        } else if ( currentHash === '#rae' || currentHash === '#blocks' ) {
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/" + currentHash.substring(1) + "-template-preview.jpg')");
        } else {
            $(".responsive-theme-tabs-inner-content").css("background-image", "none");
        }
    });

    function navigateTo( hash ) {

        if ( hash === '#templates' && localize.isRSTActivated ) {
            window.location.href = localize.siteurl + '/wp-admin/admin.php?page=responsive_add_ons'
            return
        }

        if ( hash === '#blocks' && localize.isRBAActivated ) {
            window.location.href = localize.siteurl + '/wp-admin/admin.php?page=responsive_block_editor_addons'
            return
        }

        if ( hash === '#rae' && localize.isRAEActivated ) {
            window.location.href = localize.siteurl + '/wp-admin/admin.php?page=rael_getting_started'
            return
        }
    }

    $( 'body' ).on(
        'click',
        '.responsive-theme-install-plugin',
        function ( e ) {
            e.preventDefault();
            let button   = $( this );
            let buttonID = button.attr( 'id' );
            let slug     = button.attr( 'data-slug' );
            let url      = button.attr( 'href' );
            let redirect = $( button ).data( 'redirect' );
            button.text( localize.installing );
            button.addClass( 'updating-message' );

            wp.updates.installPlugin(
                {
                    slug: slug,
                    success: function () {
                        $( '#' + buttonID ).text( localize.activating + '...' )
                        $( '#' + buttonID ).addClass( 'updating-message' );
                        activatePlugin( url, redirect );
                    }
                }
            );
        }
    );

    function activatePlugin(  url, redirect ) {
        if ( typeof url === 'undefined' || ! url ) {
            return;
        }
        jQuery.ajax(
            {
                async: true,
                type: 'GET',
                url: url,
                success: function () {
                    // Reload the page.
                    if ( typeof(redirect) !== 'undefined' && redirect !== '' ) {
                        window.location.replace( redirect );
                        window.location.href( redirect );
                    } else {
                        location.reload();
                    }
                },
                error: function ( jqXHR, exception ) {
                    var msg = '';
                    if ( jqXHR.status === 0 ) {
                        msg = localize.verify_network;
                    } else if ( jqXHR.status === 404 ) {
                        msg = localize.page_not_found;
                    } else if ( jqXHR.status === 500 ) {
                        msg = localize.internal_server_error;
                    } else if ( exception === 'parsererror' ) {
                        msg = localize.json_parse_failed;
                    } else if ( exception === 'timeout' ) {
                        msg = localize.timeout_error;
                    } else if ( exception === 'abort' ) {
                        msg = localize.ajax_req_aborted;
                    } else {
                        msg = localize.uncaught_error;
                    }
                    console.log( msg );
                },
            }
        );
    }

    $( 'body' ).on(
        'click',
        '.activate-now',
        function ( e ) {
            e.preventDefault();
            let button   = $( this );
            button.text( localize.activating + '...' )
        }
    );

    // Display Toast Message.
    function displayToast( msg, status ) {
        let background = status === 'error' ? '#FF5151' : '#00CF21';
        Toastify({
            text: msg,
            duration: 3000,
            gravity: "top", 
            position: "center",
            stopOnFocus: true,
            offset: {
                x: 0,
                y: 30
              },
            style: {
                background,
            },
        }).showToast();
    }

    // Toggle for MegaMenu.
    $('.resp-megamenu-input-checkbox').on('change', function(event){
        event.preventDefault();
        $(this).parents('.responsive-theme-pro-features').toggleClass('disable-customize');
        let value = $(this).prop("checked") ? 'on' : 'off'

        let nonce = $(this).data('nonce')
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-enable-megamenu',
                    _nonce: nonce,
                    value
                },
                success: function success( data )
                {
                    if (data.success) {
                        displayToast( 'Settings Saved', 'success' );
                    } else {
                        displayToast( 'Error', 'error' );
                    }
                }
            }
        );
    })

    // Toggle for Woocommerce.
    $('.resp-woocommerce-input-checkbox').on('change', function(event){
        event.preventDefault();
        $(this).parents('.responsive-theme-pro-features').toggleClass('disable-customize');
        let value = $(this).prop("checked") ? 'on' : 'off'

        let nonce = $(this).data('nonce')
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-enable-woocommerce',
                    _nonce: nonce,
                    value
                },
                success: function success( data )
                {
                    if (data.success) {
                        displayToast( 'Settings Saved', 'success' );
                    } else {
                        displayToast( 'Error', 'error' );
                    }
                }
            }
        );
    })
    // Toggle for Typography.
    $('.resp-typography-input-checkbox').on('change', function(event){
        event.preventDefault();
        $(this).parents('.responsive-theme-pro-features').toggleClass('disable-customize');
        let value = $(this).prop("checked") ? 'on' : 'off'

        let nonce = $(this).data('nonce')
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-enable-typography',
                    _nonce: nonce,
                    value
                },
                success: function success( data )
                {
                    if (data.success) {
                        displayToast( 'Settings Saved', 'success' );
                    } else {
                        displayToast( 'Error', 'error' );
                    }
                }
            }
        );
    })
    // Toggle for Colors & Backgrounds scripts.
    $('.resp-colors-backgrounds-input-checkbox').on('change', function(event){
        event.preventDefault()
        $(this).parents('.responsive-theme-pro-features').toggleClass('disable-customize');
        let value = $(this).prop("checked") ? 'on' : 'off'

        let nonce = $(this).data('nonce')
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-enable-colors-backgrounds',
                    _nonce: nonce,
                    value
                },
                success: function success( data )
                {
                    if (data.success) {
                        displayToast( 'Settings Saved', 'success' );
                    } else {
                        displayToast( 'Error', 'error' );
                    }
                }
            }
        );
    })
    
    // White Label Settings.
    $('#resp-theme-wl-settings-submit').click( function( event ) {
        event.preventDefault()
        let nonce = $(this).data('nonce')
        let authorName = $('#resp_wl_author_name').val()
        let websiteURL = $('#resp_wl_website_url').val()
        let pluginName = $('#resp_wl_plugin_name').val()
        let pluginURL = $('#resp_wl_plugin_url').val()
        let pluginDesc = $('#resp_wl_plugin_desc').val()
        let themeName = $('#resp_wl_theme_name').val()
        let themeDesc = $('#resp_wl_theme_desc').val()
        let themeScreenshotURL= $('#resp_wl_theme_screenshot_url').val()
        let themeIconURL= $('#resp_wl_theme_icon_url').val()
        let hideSettings = 'off'
        if( $('#resp_wl_hide_settings').prop('checked') ) {
            hideSettings = 'on'
        }

        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-white-label-settings',
                    _nonce: nonce,
                    authorName, websiteURL, pluginName, pluginURL, pluginDesc, hideSettings, themeName, themeDesc, themeScreenshotURL, themeIconURL
                },
                success: function success( data )
                {
                    if (data.success) {
                        displayToast( data.data.msg, 'success' );
                        location.reload()
                    } else {
                        displayToast( data.data.msg, 'error' );
                    }
                }
            }
        );

    })
    if ( ! localize.isRSTActivated ) {
        $('#responsive-theme-setting-activation-key-section').show();
    }

    // Switching of Setting Tabs.
    $('#responsive-theme-setting-wl-tab').click(function(){
        if ($("#responsive-theme-setting-wl-section").length === 0) {
            return
        } 
        $('#responsive-theme-setting-wl-section').show()
        $('#responsive-theme-setting-activation-key-tab span, #responsive-theme-setting-activation-key-tab p').removeClass('responsive-theme-setting-active-tab');
        $('#responsive-theme-setting-wl-tab span, #responsive-theme-setting-wl-tab p').addClass('responsive-theme-setting-active-tab')
        $('#responsive-setting-item-app-connection-tab span, #responsive-setting-item-app-connection-tab p').removeClass('responsive-theme-setting-active-tab')
        $('#responsive-theme-setting-activation-key-section').hide()
        $('#responsive-theme-setting-app-connection-section').hide()
    })

    $('#responsive-theme-setting-activation-key-tab').click(function(){
        $('#responsive-theme-setting-activation-key-section').show()
        $('.responsive-theme-setting-pro-not-activated-section').show()
        $('#responsive-theme-setting-app-connection-section').hide()
        $('#responsive-theme-setting-activation-key-tab span, #responsive-theme-setting-activation-key-tab p').addClass('responsive-theme-setting-active-tab')
        $('#responsive-theme-setting-wl-tab span, #responsive-theme-setting-wl-tab p').removeClass('responsive-theme-setting-active-tab')
        $('#responsive-setting-item-app-connection-tab span, #responsive-setting-item-app-connection-tab p').removeClass('responsive-theme-setting-active-tab')
        $('#responsive-theme-setting-wl-section').hide()
    })
    
    $('#responsive-setting-item-app-connection-tab').click(function(){
        $('#responsive-theme-setting-app-connection-section').show()
        $('#responsive-theme-setting-activation-key-section').hide()
        $('.responsive-theme-setting-pro-not-activated-section').hide()
        $('#responsive-setting-item-app-connection-tab span, #responsive-setting-item-app-connection-tab p').addClass('responsive-theme-setting-active-tab')
        $('#responsive-theme-setting-activation-key-tab span, #responsive-theme-setting-activation-key-tab p').removeClass('responsive-theme-setting-active-tab');
        $('#responsive-theme-setting-wl-tab span, #responsive-theme-setting-wl-tab p').removeClass('responsive-theme-setting-active-tab')
        $('#responsive-theme-setting-wl-section').hide()
    })    

    // Function to show error styling and message while activating license.
    function show_activation_error( inputTarget, msgTarget, msg ) {
        $(`#${inputTarget}`).addClass('responsive-theme-setting-activation-form-border-error');
        $(`#${msgTarget}`).addClass('responsive-theme-setting-activation-form-text-error');
        $(`#${msgTarget}`).text(msg);
    }

    // Resets the applied activation errors.
    function reset_activation_errors() {
        $('#resp_pro_activation_key_api_key, #resp_pro_activation_key_product_id').removeClass('responsive-theme-setting-activation-form-border-error');

        $('#resp_pro_activation_key_api_key_msg, #resp_pro_activation_key_product_id_msg')
            .removeClass('responsive-theme-setting-activation-form-text-error')
            .text('');

    }

    // Creates the alert element before activation form submit and after destroying the previous alert element.
    function createAlertElement() {
        let alertElement = '<div id="responsive-theme-setting-activation-alert" class="alert alert-dismissible responsive-theme-single-setting-section fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
        $('#responsive-theme-setting-activation-key-section').prepend(alertElement);
    }

    // Removes the previous Alert element.
    function destroyAlertElement() {
        $('#responsive-theme-setting-activation-alert').remove()
    }

    // Alert type - success, warning, error.
    function displayAlert(type, text) {
        var $activationAlert = $('#responsive-theme-setting-activation-alert');
        $activationAlert.addClass('alert-' + type).prepend(text).show();

    }

    $('#resp_pro_activation_key_api_key').keyup(function(){
        if ('' !== $(this).val()) {
            $('#resp_pro_activation_key_api_key').removeClass('responsive-theme-setting-activation-form-border-error');
            $('#resp_pro_activation_key_api_key_msg').removeClass('responsive-theme-setting-activation-form-text-error').text('');
        }
    });

    $('#resp_pro_activation_key_product_id').keyup(function(){
        if ('' !==  $(this).val()) {
            $('#resp_pro_activation_key_product_id').removeClass('responsive-theme-setting-activation-form-border-error');
            $('#resp_pro_activation_key_product_id_msg').removeClass('responsive-theme-setting-activation-form-text-error').text('');
        }
    });

    // Request to deactivate Responsive Pro License.
    $('#resp_pro_activation_key_deactivate_api_key_submit').click( function(event) {
        event.preventDefault()
        reset_activation_errors()
        destroyAlertElement()
        createAlertElement()
        $('#resp_pro_activation_key_deactivate_api_key_submit').text('Deactivating...')
        let nonce = $(this).data('nonce')
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-api-key-deactivate',
                    _nonce: nonce,
                },
                success: function success( data )
                {
                    if ( false === data.data.error ) {
                        displayAlert( 'success', 'API Key Deactivated. ' + data.data.message )
                        $('#resp_pro_activation_key_deactivate_api_key_submit').text('Deactivated!')
                        setTimeout(function(){
                            location.reload();
                        }, 5000);
                    } else {
                        displayAlert( 'warning', data.data.message )
                        $('#resp_pro_activation_key_deactivate_api_key_submit').text('Deactivate')
                        return
                    }
                }
            }
        );
    })

    // Request to activate Responsive Pro License.
    $('#resp_pro_activation_key_activate_api_key_submit').click( function(event) {
        event.preventDefault()
        reset_activation_errors()
        destroyAlertElement()
        createAlertElement()

        let productId = $('#resp_pro_activation_key_product_id').val()
        let apiKey = $('#resp_pro_activation_key_api_key').val()
        let nonce = $(this).data('nonce')

        if ( '' === apiKey ) {
            show_activation_error( 'resp_pro_activation_key_api_key', 'resp_pro_activation_key_api_key_msg', 'Please Enter the API Key' );
            return
        }

        if ( '' === productId ) {
            show_activation_error( 'resp_pro_activation_key_product_id', 'resp_pro_activation_key_product_id_msg', 'Please Enter the Product ID' );
            return
        }

        $('#resp_pro_activation_key_activate_api_key_submit').text( 'Activating...' )
        
        $.ajax(
            {
                type: 'POST',
                url: localize.ajaxurl,
                data:
                {
                    action: 'responsive-pro-api-key-activate',
                    _nonce: nonce,
                    productId, apiKey 
                },
                success: function success( data )
                {
                    if ( 'undefined' === data.data.error && false === data.data.activate_results.success ) {
                        displayAlert( 'warning', data.data.activate_results.data.error )
                        $('#resp_pro_activation_key_activate_api_key_submit').text( 'Activate' )
                        return
                    }
                    if ( false === data.data.error ) {
                        displayAlert( 'success', 'API Key Activated. ' + data.data.message )
                        $('#resp_pro_activation_key_activate_api_key_submit').text( 'Activated!' )
                        setTimeout(function() {
                            location.reload();
                        }, 5000);
                    } else {
                        displayAlert( 'warning', data.data.message )
                        $('#resp_pro_activation_key_activate_api_key_submit').text( 'Activate' )
                        return
                    }
                }
            }
        );
    })

    $('#responsive-theme-help-theme-tab .responsive-theme-help-setting-icon-wrapper, #responsive-theme-help-theme-tab .responsive-theme-help-margin-zero').on('click', function() {
        $('.responsive-theme-help-sections').hide();
        $('.responsive-theme-help-tab-button .responsive-theme-help-setting-icon-wrapper svg path').removeClass('responsive-theme-help-setting-icon-active');
        $('.responsive-theme-help-tab-button').removeClass('responsive-theme-help-settings-active-tab');
        $('#responsive-theme-help-theme-tab .responsive-theme-help-setting-icon-wrapper svg path').addClass('responsive-theme-help-setting-icon-active');
        $('#responsive-theme-help-theme-tab').addClass('responsive-theme-help-settings-active-tab');
        $('#responsive-theme-help-theme-settings').show();
    })

    $('#responsive-theme-help-ticket-tab .responsive-theme-help-setting-icon-wrapper, #responsive-theme-help-ticket-tab .responsive-theme-help-margin-zero').on('click', function() {
        $('.responsive-theme-help-sections').hide();
        $('.responsive-theme-help-tab-button .responsive-theme-help-setting-icon-wrapper svg path').removeClass('responsive-theme-help-setting-icon-active');
        $('.responsive-theme-help-tab-button').removeClass('responsive-theme-help-settings-active-tab');
        $('#responsive-theme-help-ticket-tab .responsive-theme-help-setting-icon-wrapper svg path').addClass('responsive-theme-help-setting-icon-active');
        $('#responsive-theme-help-ticket-tab').addClass('responsive-theme-help-settings-active-tab');
        $('#responsive-theme-help-ticket-settings').show();
    })

});
