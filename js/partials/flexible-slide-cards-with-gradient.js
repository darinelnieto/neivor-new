$(()=>{
    var items = $('.slide-cards-with-gradient-partial-da9845 .card-item');
    $('.slide-cards-with-gradient-partial-da9845 .cards-slide').owlCarousel({
        items: 3,
        loop: false,
        margin: 64,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
                loop:true,
                dots: true,
            },
            768: {
                items: 2,
                loop:true
            },
            992: {
                items: 3
            }
        }
    });
});