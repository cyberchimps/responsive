(function ($) {
  $(document).ready(function ($) {

    $('.input-text.qty.text:not(.grouped_form .input-text.qty.text)').change(function () {
      $('.input-text.qty.text').val($(this).val());
    });

    $('.responsive-floating-bar').hide();

    if ($('form').hasClass('cart')) {
      var topOfDiv = $('.cart').offset().top + $('.cart').outerHeight(true);
      $(window).scroll(function () {
        if ($(window).scrollTop() > topOfDiv) {
          $('.responsive-floating-bar').fadeIn(200);
        }
        else {
          $('.responsive-floating-bar').fadeOut(200);
        }
      });
    }

    var targetNode = document.getElementById('masthead');
    var observer = new MutationObserver(mutations => {
      mutations.forEach(record => {
        if (record.type === 'attributes' && record.attributeName === 'class') {
          if ($('#masthead').hasClass('sticky-header') && $(window).width() > 768) {
            var heightOfHeader = $('#masthead').outerHeight();
            $('.responsive-floating-bar').css({ top: heightOfHeader + 'px', bottom: 'auto' });
          } else if ($('#masthead').hasClass('sticky-header') && $(window).width() <= 768) {
            $('.responsive-floating-bar').css({ top: 'auto', bottom: 0 });
          }
        }
      });
    });
    observer.observe(targetNode, {
      attributes: true
    });

  });
})(jQuery);