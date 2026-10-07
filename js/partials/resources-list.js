// JS for partial: resources-list\n
var tax_name = '';
var currentPage = 1;
var perPage = 9;
var url = _sajoURL_ + '/wp-json/resources/list';

var $root = $('.resources-list-partial-c4f913');
var $results = $root.find('.resources-results');
var $pagination = $root.find('.resources-pagination');
$('.resources-list-partial-c4f913 .taxonomy-list').on('click', 'button', function () {
    if($(this).attr('value') === 'get-all') {
        tax_name = '';
    }else{
        tax_name = $(this).attr('value');
    }
    currentPage = 1;
    $('.resources-list-partial-c4f913 .taxonomy-btn').removeClass('active');
    $(this).addClass('active');
    get_resurces();
});

$pagination.on('click', '.page-btn, .page-nav', function () {
    var page = $(this).data('page');
    if (!page) {
        return;
    }

    currentPage = Number(page);
    get_resurces();
});

function render_resources(items) {
    if (!Array.isArray(items) || !items.length) {
        $results.html('<p class="no-results">No hay recursos disponibles.</p>');
        $pagination.html('');
        return;
    }

    var html = items.map(function (item) {
        var thumb = item.feature_image || '<div class="resource-placeholder">Sin imagen</div>';
        return '<article class="col-12 col-md-6 col-lg-4">' +
                    '<a href="' + item.permalink + '" class="resource-link">' +
                        '<div class="resource-thumb">' + thumb + '</div>' +
                        '<div class="resorce-texts">'+
                            '<span class="t-size-11 fw-700 purple-light">' + item.label + '</span>' +
                            '<h3 class="p-size-16 fw-700 dark-color">' + item.title + '</h3>' +
                            '<div class="row align-items-center bt-1-solid">' +
                                '<span class="col-6 purple-light fw-700 t-size-11">' + item.download_label + '</span>' +
                                '<span class="col-6 ml-auto violeta-color p-size-16 fw-700">Descargar <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#5A3ED9"/></svg></span>' +
                            '</div>' +
                        '</div>' +
                    '</a>' +
                '</article>';
    }).join('');

    $results.html(html);
}

function render_pagination(meta) {
    if (!meta || !meta.total_pages || meta.total_pages <= 1) {
        $pagination.html('').addClass('d-none');
        return;
    }
    $pagination.removeClass('d-none');
    var totalPages = meta.total_pages;
    var current = meta.current_page;
    var pages = [];
    var isPrevDisabled = current <= 1;
    var isNextDisabled = current >= totalPages;

    pages.push('<button type="button" class="page-nav' + (isPrevDisabled ? ' disabled' : '') + '" data-page="' + (current - 1) + '" ' + (isPrevDisabled ? 'disabled' : '') + '><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.23125 5.25L5.49792 8.51667L4.66667 9.33333L0 4.66667L4.66667 0L5.49792 0.816667L2.23125 4.08333H9.33333V5.25H2.23125Z" fill="#B8B2CC"/> </svg> Anterior</button>');

    if (totalPages <= 5) {
        for (var i = 1; i <= totalPages; i++) {
            pages.push('<button type="button" class="page-btn' + (i === current ? ' active' : '') + '" data-page="' + i + '">' + i + '</button>');
        }
    } else {
        var visiblePages = [];

        if (current === 1 || current === 2) {
            visiblePages = [1, 2, 3, 4];
        } else if (current === 3) {
            visiblePages = [2, 3, 4, 5];
        } else if (current >= totalPages - 2) {
            visiblePages = [totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
        } else {
            visiblePages = [current - 2, current - 1, current, current + 1];
        }

        visiblePages.forEach(function (page) {
            pages.push('<button type="button" class="page-btn' + (page === current ? ' active' : '') + '" data-page="' + page + '">' + page + '</button>');
        });

        if (current <= 3) {
            pages.push('<span class="pagination-ellipsis">...</span>');
            pages.push('<button type="button" class="page-btn" data-page="' + totalPages + '">' + totalPages + '</button>');
        } else if (current >= totalPages - 2) {
            pages.splice(1, 0, '<span class="pagination-ellipsis">...</span>');
            pages.splice(1, 0, '<button type="button" class="page-btn" data-page="1">1</button>');
        } else {
            pages.splice(1, 0, '<span class="pagination-ellipsis">...</span>');
            pages.splice(1, 0, '<button type="button" class="page-btn" data-page="1">1</button>');
            pages.push('<span class="pagination-ellipsis">...</span>');
            pages.push('<button type="button" class="page-btn" data-page="' + totalPages + '">' + totalPages + '</button>');
        }
    }

    pages.push('<button type="button" class="page-nav' + (isNextDisabled ? ' disabled' : '') + '" data-page="' + (current + 1) + '" ' + (isNextDisabled ? 'disabled' : '') + '>Siguiente <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#5A3ED9"/></svg></button>');
    $pagination.html(pages.join(''));
}

function get_resurces() {
    $.ajax({
        type: 'GET',
        url: url,
        data: {
            category: tax_name,
            page: currentPage,
            per_page: perPage
        }
    }).done(function(resp){
        render_resources(resp.items || []);
        render_pagination({
            current_page: resp.current_page || 1,
            total_pages: resp.total_pages || 1
        });
    }).catch(function(err){
        console.error(err);
        alert('No se pudieron cargar los recursos.');
    });
}

$(() => {
    get_resurces();
});