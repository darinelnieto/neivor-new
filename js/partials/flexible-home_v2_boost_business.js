// JS for partial: flexible-home_v2_boost_business\n
$('.boost-slide').each(function() {
    var $carousel = $(this);
    var totalItems = $carousel.children().length;
    var enableLoop = totalItems > 3;

    if ($carousel.hasClass('owl-loaded')) {
        return;
    }

    $carousel.owlCarousel({
        autoplay: false,
        loop: enableLoop,
        rewind: !enableLoop,
        nav: false,
        dots: totalItems > 1,
        touchDrag: true,
        mouseDrag: true,
        responsive: {
            0: {
                items: 1,
                center: true,
                autoplay: totalItems > 1,
                margin: 10,
            },
            640: {
                items: 2,
                autoplay: totalItems > 2,
                margin: 24,
            },
            991: {
                items: 3,
                margin: 24
            }
        }
    }).css({'opacity': 1});
});