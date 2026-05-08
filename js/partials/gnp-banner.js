$(document).ready(function () {
    var cambio = false;
    $('.nav-card-contain ul li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).addClass("active");
            cambio = true;
        }
    });
});
