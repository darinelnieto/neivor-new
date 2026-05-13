var iframe = $('.popup-video');
$('.is-popup').on('click', function(e){
    e.preventDefault();
    var url = $(this).attr('href') + '&enablejsapi=1';
    iframe.html(`
        <div class="overly-close"></div>
        <div class="popup-body">
            <iframe width="560" height="315" src="${url}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
            </iframe>
        </div>
    `);
    iframe.addClass('show');

    iframe.find('iframe').on('load', function(){
        this.contentWindow.postMessage(
            '{"event":"command","func":"playVideo","args":""}', '*'
        );
    });
});
$('.popup-video').on('click', '.overly-close', function(){
    iframe.removeClass('show');
    $('.popup-video').html('');
});