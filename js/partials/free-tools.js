$('.ft-slide').owlCarousel({
    autoplay: false,
    loop: false,
    nav: false,
    dots: true,
    touchDrag: true,
    mouseDrag: true,
    responsive: {
        0: {
            items: 1,
            center: true,
            margin: 12,
        },
        768: {
            items: 3,
            margin: 24,
        }
    }
}).css({'opacity': 1});
