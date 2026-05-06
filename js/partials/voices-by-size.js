$(()=>{
    $('.slide-voices').owlCarousel({
        autoplay:true,
        loop:true,
        nav:false,
        dots:true,
        margin:10,
        items:1,
    }).css({'opacity':1});
    $('#slide-desktop').owlCarousel({
        autoplay:true,
        loop:true,
        nav:false,
        dots:true,
        margin:10,
        items:1,
    }).on('translated.owl.carousel', function(event) {
        var position = $('#slide-desktop .owl-item.active .position-item').val();
        $('#tabs-voices-by-size ul li').removeClass('active');
        $('#tabs-voices-by-size ul .item-tab-'+position).addClass('active');
    }).css({'opacity':1});

    // Manejo del click en los tabs
    $('#tabs-voices-by-size ul li a').on('click', function(e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del enlace
        var tabIndex = $(this).data('tab');
        $('#slide-desktop').trigger('to.owl.carousel', tabIndex);
    });
})