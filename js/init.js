(function ($) {

  /* ================= Configure functions  =================  */
  // Open external links in a new tab.
  function external_links() {
    $(".site-all a[href$='.pdf']").attr('target', '_blank');
  }

  external_links();

  $(document).ready(function () {


    /* ================= Custom theme scripts  =================  */
    // Move advertisement script because it can`t be inserted into the textarea.
    $('.smartobject').prependTo('.entry-content h2:first-child + p');

    /* ================= Initialize external plugins  ================= */


    // Scripts for mobile devices.
    if ($(window).width() < 768) {
      // Mobile menu.
      $('nav#menu_mobile').mmenu();

      // Move company data to the top row on mobile.
      $('.widget.phone').appendTo('.row-menu .container');

    }
    // Scripts for non mobile
    else {
      // Default menu dropdown.
      $('ul.main-menu').superfish();
    }

  });


  $(window).load(function () {
    $('body').addClass('loaded');
  });

  // Window resize
  $(window).resize(function () {
  });

  // Orientation change
  window.addEventListener("orientationchange", function () {
  });

})(jQuery);
