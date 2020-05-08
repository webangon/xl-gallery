(function ($) {
"use strict"; 

    $(document).ready(function() {

      $('.demo-gallery').slick({

        slidesToShow: 4,
        autoplay: true,
        dots: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              slidesToShow: 1,
            }
          }
        ]

      });

    });

})(jQuery);