(function($) {

  var Utils = (function() {

    var $body = $('body'),
        $slider = $('.slider'),
        $faqQuestion = $('.faq-question'),
        $mobileIcon = $('.mobile-icon');

    var stickyNav = function stickyNav() {
      var header = new Headhesive('.header', {
        offset: 300,
        offsetSide: 'top',
        classes: {
          // Cloned elem class
          clone: 'header-clone',

          // Stick class
          stick: 'is-stuck',

          // Unstick class
          unstick: 'isnot-stuck'
        },
        // Throttle scroll event to fire every 250ms to improve performace
        throttle: 250,
        onUnstick: function () {

        },
        onInit: function () {
          // toggleMobileMenu();
        }
      });
    };

    var slider = function() {
      $slider.slick({
        lazyLoad: 'ondemand',
        adaptiveHeight: true
      });
    };

    var toggleAccordian = function() {
      $faqQuestion.click(function() {

        var $icon = $(this).find('.fa');

        if($icon.hasClass('fa-plus')) {
          $icon.removeClass('fa-plus').addClass('fa-minus');
        } else {
          $icon.removeClass('fa-minus').addClass('fa-plus');
        }

        $(this).next().slideToggle('fast');

      });
    }

    var toggleMobileMenu = function() {

      $('.header.is-stuck, .header').click(function() {

        $(this).find('.mobile-icon').toggleClass('fa-bars fa-times');
        $(this).find('.mobile-icon').next().slideToggle('fast');

      });
    }

    return {
      stickyNav: stickyNav,
      slider: slider,
      toggleAccordian: toggleAccordian,
      toggleMobileMenu: toggleMobileMenu
    }

  })();

  /* Exposing our functions to the rest of the application */
  module.exports = Utils;

})(jQuery);