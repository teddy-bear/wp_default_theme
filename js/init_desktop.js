/* These scripts are executed on desktop only */
(function ($) {

  $(document).ready(function () {

    // Animate page elements on window scroll.
    // check demo here http://tympanus.net/Blueprints/OnScrollEffectLayout/
    //new cbpScroller(document.getElementById('cbp-so-scroller'));

    /* Fixed elements on page scroll. */
    // Sidebar menu widget.
    // todo: make this work in all browsers properly
    //$('.menu-widget').fixTo('.main-column');

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

    // Parallax row on the home page.
    //$('.row-parallax').parallax();

  });


})(jQuery);
