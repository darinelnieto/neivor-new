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
    var root = $('.filter-blog-partial-0a1dca');

    if (!root.length) {
        return;
    }

    var isEnglishPath = /^\/en(\/|$)/.test(window.location.pathname);
    var route = _dittoURL_ + (isEnglishPath ? '/en' : '') + '/wp-json/success-histories/list';

    function escapeHtml(value) {
        if (value === null || value === undefined) {
            return '';
        }

        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function getLogoData(post) {
        if (!post || !post.logo) {
            return { url: '', title: '' };
        }

        if (typeof post.logo === 'string') {
            return { url: post.logo, title: '' };
        }

        return {
            url: post.logo.url || '',
            title: post.logo.title || ''
        };
    }

    function buildCard(post, isLarge) {
        var logo = getLogoData(post);
        var image = post && post.feature_image ? post.feature_image : '';
        var permalink = post && post.permalink ? post.permalink : '#';
        var title = post && post.title ? post.title : '';
        var description = post && post.short_description ? post.short_description : '';
        var color = post && post.color ? post.color : '#40407f';

        return '' +
            '<a href="' + escapeHtml(permalink) + '" class="post-item' + (isLarge ? ' item-lg' : ' mb-5 mb-md-4') + '">' +
                '<div class="card-post">' +
                    '<img src="' + escapeHtml(image) + '" alt="' + escapeHtml(title) + '" class="feature-img" loading="lazy" decoding="async">' +
                    '<span class="color" style="background:linear-gradient(0deg, ' + escapeHtml(color) + ' 0%, rgba(64,64,127,0) 100%)"></span>' +
                    '<div class="content">' +
                        '<img src="' + escapeHtml(logo.url) + '" alt="' + escapeHtml(logo.title) + '" class="logo" loading="lazy" decoding="async">' +
                        '<div class="text-content">' +
                            '<h3>' + escapeHtml(title) + '</h3>' +
                            '<p>' + escapeHtml(description) + '</p>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</a>';
    }

    function buildRows(posts) {
        if (!Array.isArray(posts) || posts.length === 0) {
            return '<div class="row"><div class="col-12"><p>No results found.</p></div></div>';
        }

        var html = '';

        for (var i = 0; i < posts.length; i += 3) {
            var chunk = posts.slice(i, i + 3);
            var first = chunk[0];
            var rest = chunk.slice(1);

            html += '<div class="row">';
            html += '<div class="col-12 col-md-7 col-lg-8 mb-5 mb-md-4">';
            html += buildCard(first, true);
            html += '</div>';

            if (rest.length > 0) {
                html += '<div class="col-12 col-md-5 col-lg-4">';
                html += '<div class="posts">';
                for (var r = 0; r < rest.length; r++) {
                    html += buildCard(rest[r], false);
                }
                html += '</div>';
                html += '</div>';
            }

            html += '</div>';
        }

        return html;
    }

    function collectFilters() {
        var size = root.find('.size.filter-item').data('selected') || '';
        var segment = root.find('.segment.filter-item').data('selected') || '';
        var zone = root.find('.zone.filter-item').data('selected') || '';

        var payload = {};

        if (size) {
            payload.size = size;
        }
        if (segment) {
            payload.segment = segment;
        }
        if (zone) {
            payload.zone = zone;
        }

        return payload;
    }

    window.apply_filter = function() {
        var button = root.find('.filter-init');
        button.prop('disabled', true);

        $.ajax({
            url: route,
            method: 'GET',
            data: collectFilters()
        }).done(function(response) {
            var postsContain = $('#post-contain');
            postsContain.html(buildRows(response));
        }).always(function() {
            button.prop('disabled', false);
        });
    };

    root.on('click', '.open-filter', function() {
        var item = $(this).closest('.filter-item');
        root.find('.filter-item').not(item).removeClass('show');
        item.toggleClass('show');
    });

    root.on('click', '.this-option', function(e) {
        e.preventDefault();

        var option = $(this);
        var item = option.closest('.filter-item');
        var slug = option.attr('href') || '';
        var label = option.find('.name').text().trim();

        item.find('.open-filter .text').text(label);
        item.data('selected', slug);
        item.removeClass('show');
    });

    root.on('click', '.filter-init', function() {
        window.apply_filter();
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.filter-item').length) {
            root.find('.filter-item').removeClass('show');
        }
    });
});
