/* These scripts are executed on desktop only */
(function ($) {

  $(document).ready(function () {

    $('body').addClass('desktop-mode');

    // Back to top button handler.
    function back_to_top() {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
          $('#back_to_top').fadeIn();
        }
        else {
          $('#back_to_top').fadeOut();
        }
      });

      $('#back_to_top').on('click', function () {
        $('body,html').animate({
          scrollTop: 0
        }, 800);
        return false;
      });
    }

    back_to_top();

  });


})(jQuery);
