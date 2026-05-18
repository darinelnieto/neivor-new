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
/*========== Header ==========*/
var status_menu = false;
if($(window).width() < 991){
    $('.bar-menu').on('click', function(){
        $('.close-submenu-movil').html('');
        if(status_menu === false){
            $(this).addClass('active');
            $('.nav-menu-partial-00596a').addClass('active');
            status_menu = true;
        }else{
            $(this).removeClass('active');
            $('.nav-menu-partial-00596a').removeClass('active');
            status_menu = false;
        }
    });
    $('.nav-menu-partial-00596a').on('click', 'li', function(){
        $(this).children('.sub-menu-pop-up').addClass('active');
        var text_cta = $(this).children('.main-menu-name').text();
        $('.close-submenu-movil').html(` 
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                    <path d="M19.25 11L13.75 16.5L19.25 22" stroke="#0A2540" stroke-width="2.0625" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ${text_cta}
            </span>
        `);
    });
    $('.close-submenu-movil').on('click', function(){
        $('.close-submenu-movil').html('');
        $('.sub-menu-pop-up').removeClass('active');
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