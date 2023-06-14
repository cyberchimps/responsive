var $ = jQuery.noConflict();
$(document).ready(function () {
    let hash = window.location.hash;
        if ( hash === '' ) {
            window.location.hash = '#home'
            hash = '#home'
        }
        if ( hash === '#templates' ) {
            goToRST()
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/rst-template-preview.jpg')");
        }
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
        if ( currentHash === '#templates') {
            goToRST()
            $(".responsive-theme-tabs-inner-content").css("background-image", "url('" + localize.responsiveurl + "admin/images/rst-template-preview.jpg')");
        } else {
            $(".responsive-theme-tabs-inner-content").css("background-image", "none");
        }
    });

    function goToRST() {
        if ( localize.isRSTActivated ) {
            window.location.href = localize.siteurl + '/wp-admin/admin.php?page=responsive-add-ons'
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

});
