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



  });

})(jQuery);