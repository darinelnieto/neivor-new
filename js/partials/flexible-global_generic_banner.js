$(document).ready(function () {
    var cambio = false;
    $('.nav-contain  ul li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).addClass("active");
            cambio = true;
        }
    });
});
