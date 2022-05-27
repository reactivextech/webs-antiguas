(function($) {
    "use strict";

    /* MagnificPopup Lightbox */
    // $('#lightbox').magnificPopup({
    //     delegate: 'a',
    //     type: 'image',
    //     gallery: {
    //         enabled: true,
    //         removalDelay: 500,
    //         mainClass: 'mfp-with-zoom', // this class is for CSS animation below
    //     }
    // });

    $(window).load(function() {
        var $container = $('#lightbox');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            }); return false;
        });
    });
})(jQuery);