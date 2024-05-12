jQuery(document).ready(function ($) {
    let owl = $('#halim_related_movies-2');
    owl.owlCarousel({
        loop: true,
        margin: 4,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: true,
        navText: ['<i class="hl-down-open rotate-left"></i>',
            '<i class="hl-down-open rotate-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 3
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    })
});
