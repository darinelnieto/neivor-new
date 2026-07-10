$(document).ready(function() {
    function initCounter() {
        $('.result-card .number-result').each(function () {
            var resultCard = $(this);
            var currentValue = parseInt(resultCard.children('h3').children('.result-item').text(), 10);
            var increment = parseInt(resultCard.children('.the-result').val(), 10);

            if (isNaN(currentValue) || isNaN(increment)) {
                return;
            }

            var counter = setInterval(function () {
                if (currentValue < increment) {
                    currentValue++;
                    resultCard.children('h3').children('.result-item').text(currentValue);
                } else {
                    clearInterval(counter);
                }
            }, 1);
        });
    }

    $(window).on('scroll', function(){
        var windowScrol = $(window).scrollTop();
        var resultsSection = $('.featured-results-partial-83b742');

        if (!resultsSection.length) {
            return;
        }

        var results = resultsSection.offset().top - 200;
        if(windowScrol >= results){
            initCounter();
        }
    });
    var root = $('.featured-results-partial-83b742:not(.flexible-filter-blog-5d8e91)');

    if (!root.length) {
        return;
    }

    root.on('click', '.open-filter', function() {
        var item = $(this).closest('.filter-item');
        root.find('.filter-item').not(item).removeClass('show');
        item.toggleClass('show');
    });

    root.on('click', '.this-option', function(event) {
        if ($(this).hasClass('this-option--noop')) {
            event.preventDefault();
        }

        var item = $(this).closest('.filter-item');
        item.removeClass('show');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.filter-item').length) {
            root.find('.filter-item').removeClass('show');
        }
    });
});
