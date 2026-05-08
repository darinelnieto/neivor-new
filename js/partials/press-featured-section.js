$(document).ready(function () {
    $('.highlights-slide').owlCarousel({
        autoplay:false,
        loop:true,
        margin:0,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1,
                margin:10
            },
            768:{
                items:1.3,
                center:true
            }
        }

    }).css({'opacity':1});
});
