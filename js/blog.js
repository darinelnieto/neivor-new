var sz = false;
var size = '';
$('.size').on('click', '.open-filter', function(){
    if(sz === false){
        $(this).parent().addClass('show');
        sz = true;
    }else{
        $(this).parent().removeClass('show');
        sz = false;
    }
});
$('.size .options').on('click', 'a', function(e){
    $('.size').removeClass('show');
    sz = false;
    size = $(this).attr('href');
    text = $(this).text();
    $('.size .text').text(text);
    e.preventDefault();
});
/*============== Segment =============*/
var sg = false;
var segment = '';
$('.segment').on('click', '.open-filter', function(){
    if(sg === false){
        $(this).parent().addClass('show');
        sg = true;
    }else{
        $(this).parent().removeClass('show');
        sg = false;
    }
});
$('.segment .options').on('click', 'a', function(e){
    $('.segment').removeClass('show');
    sg = false;
    segment = $(this).attr('href');
    text = $(this).text();
    $('.segment .text').text(text);
    e.preventDefault();
});
/*============== Zone =============*/
var zn = false;
var zone = '';
$('.zone').on('click', '.open-filter', function(){
    if(zn === false){
        $(this).parent().addClass('show');
        zn = true;
    }else{
        $(this).parent().removeClass('show');
        zn = false;
    }
});
$('.zone .options').on('click', 'a', function(e){
    $('.zone').removeClass('show');
    zn = false;
    zone = $(this).attr('href');
    text = $(this).text();
    $('.zone .text').text(text);
    console.log(zone);
    e.preventDefault();
});
/*============ Results ===========*/
function apply_filter(){
    $.ajax({
        url: rout,
        type: 'GET',
        data: {
            action: 'filter_success_stories',
            size:size,
            segment:segment,
            zone:zone
        },
        beforeSend: function () {
            $('#post-contain').html('<p>Cargando...</p>');
        },
        success: function (response) {
            console.log(response); // Debug en consola para ver los datos recibidos
            let html = '';

            if (response.length > 0) {
                // Agrupar en bloques de 3
                let items = [];
                for (let i = 0; i < response.length; i += 3) {
                    items.push(response.slice(i, i + 3));
                }

                items.forEach((item) => {
                    html += '<div class="row">';

                    // Post grande
                    if (item[0]) {
                        let logoUrl = item[0].logo && item[0].logo.url ? item[0].logo.url : '';
                        let logoTitle = item[0].logo && item[0].logo.title ? item[0].logo.title : '';

                        html += `
                            <div class="col-12 col-md-7 col-lg-8 mb-5 mb-md-4">
                                <a href="${item[0].permalink}" class="post-item item-lg">
                                    <div class="card-post">
                                        <img src="${item[0].feature_image}" alt="${item[0].title}" class="feature-img">
                                        <span class="color" style="background:linear-gradient(0deg, ${item[0].color} 0%, rgba(64,64,127,0) 100%)"></span>
                                        <div class="content">
                                            ${logoUrl ? `<img src="${logoUrl}" alt="${logoTitle}" class="logo">` : ''}
                                            <div class="text-content">
                                                <h3>${item[0].title}</h3>
                                                <p>${item[0].short_description}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                    }

                    // Posts pequeños
                    if (item.length > 1) {
                        html += `<div class="col-12 col-md-5 col-lg-4"><div class="row">`;
                        for (let i = 1; i < item.length; i++) {
                            let logoUrl = item[i].logo && item[i].logo.url ? item[i].logo.url : '';
                            let logoTitle = item[i].logo && item[i].logo.title ? item[i].logo.title : '';

                            html += `
                                <div class="col-12 mb-5 mb-md-4">
                                    <a href="${item[i].permalink}" class="post-item">
                                        <div class="card-post">
                                            <img src="${item[i].feature_image}" alt="${item[i].title}" class="feature-img">
                                            <span class="color" style="background:linear-gradient(0deg, ${item[i].color} 0%, rgba(64,64,127,0) 100%)"></span>
                                            <div class="content">
                                                ${logoUrl ? `<img src="${logoUrl}" alt="${logoTitle}" class="logo">` : ''}
                                                <div class="text-content">
                                                    <h3>${item[i].title}</h3>
                                                    <p>${item[i].short_description}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            `;
                        }
                        html += `</div></div>`;
                    }

                    html += '</div>';
                });
            } else {
                html = '<p>No hay resultados.</p>';
            }

            $('#post-contain').html(html);
        }
    });
}
/*============ Result counter single post ============*/
function initCounter(){
    $(".result-card .number-result").each(function () {
        let $this = $(this);
        let currentValue = parseInt($this.children('h3').children('.result-item').text()); 
        let increment = parseInt($this.children('.the-result').val());
        let counter = setInterval(function(){
            if(currentValue < increment){
                currentValue++;
                $this.children('h3').children('.result-item').text(currentValue);
            }else{
                clearInterval(counter);
            }
        }, 1);
    });
}