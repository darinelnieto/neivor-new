// JS for partial: comparatives_slide_three_columns\n
$(()=>{
    var items = $('.comparative-slide .item');
    var autoplay = false;
    if(items.length > 3){
        autoplay = true;
    }
    $('.comparative-slide').owlCarousel({
        autoplay:autoplay,
        loop: autoplay,
        nav:false,
        dots:false,
        margin:32,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:3
            }
        }
    }).css({'opacity':1});
});