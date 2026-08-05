// JS for partial: intelligence-vertical-solutions\n
$('.tabs-content').on('click', '.item-controller', function(){
    var item = '#'+ $(this).attr('data-target');
    $('.item-controller').removeClass('active');
    $(this).addClass('active');
    $('.tabs-body .item').removeClass('active');
    $(item).addClass('active');
});