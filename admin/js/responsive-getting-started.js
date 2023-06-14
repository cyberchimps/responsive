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

});
