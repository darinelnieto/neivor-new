$(()=>{
    $('.boost-slide').owlCarousel({
        autoplay:false,
        loop:true,
        nav:false,touchDrag: true,
        mouseDrag: true,
        responsive:{
            0:{
                items:1.1,
                center:true,
                autoplay:true,
                margin:10,
            },
            640:{
                items:2,
                autoplay:true,
                margin:40,
            },
            991:{
                items:3,
                margin:80
            }
        }
    }).css({'opacity':1});
});