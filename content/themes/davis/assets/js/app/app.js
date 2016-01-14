(function($) {

  $(function() {

    var Utils = require('./utils');

    // Utils.stickyNav();
    // Utils.slider();
    // Utils.toggleAccordian();
    // Utils.toggleMobileMenu();

    // Utils.responsifyVideos();
    // Utils.responsifyTables();

    function setHeight() {
      windowHeight = $(window).innerHeight();
      $('.video-wrapper').css({
        'min-height': windowHeight,
        'height': windowHeight
      });
    };
    setHeight();

    $(window).resize(function() {
      setHeight();
    });


    var slideout = new Slideout({
      'panel': document.getElementById('content'),
      'menu': document.getElementById('menu'),
      'padding': 256,
      'tolerance': 70,
      'side': 'right',
      'touch': false
    });

    document.querySelector('.menu-mobile-toggle').addEventListener('click', function() {
      slideout.toggle();
    });

    var toggles = document.querySelectorAll(".menu-mobile-toggle");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();

        $menu = $('.nav-mobile');

        if($menu.is(':visible')) {
          $('.nav-mobile').hide();
        } else {
          $('.nav-mobile').fadeIn();
        }

        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

  });

})(jQuery);
