$('#tabs-voices-by-size').on('click', '.tab-item', function(e){
    var this_active = $(this).attr('href');
    $('#tabs-voices-by-size ul li').removeClass('active');
    $(this).parent().addClass('active');
    $('#slide-desktop').trigger('to.owl.carousel', this_active);
    e.preventDefault();
});
/*============= Header Stiky ==============*/
var lastScroll = 0;
$(window).on('scroll', function(){
    var scrollTop = $(this).scrollTop();
    if(lastScroll < scrollTop){
        // Scroll down
        $('#header-wrapper').removeClass('sticky');
    }else if(lastScroll > scrollTop){
        // Scroll up
        $('#header-wrapper').addClass('sticky');
    }
    lastScroll = scrollTop;
});
/*============= FAQs =============*/
var acc = $('.this-faq > .question');
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function(e) {
        this.parentElement.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            $('.this-faq').removeClass('active');
            $('.this-faq .answer').css({'display':'none'});
            this.parentElement.classList.toggle("active");
            panel.style.display = "block";
        }
        e.preventDefault();
    });
}
// Slide boost your business
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
// Slide voices by size
$('.logos-slide-partial-f8ca70 .logos-slide').owlCarousel({
    loop:true,
    autoplay:true,
    nav:false,
    dots:false,
    margin:10,
    responsive:{
        0:{
            center:true,
            items:2.4
        },
        768:{
            items:4
        }
    }
}).css({'opacity':1});