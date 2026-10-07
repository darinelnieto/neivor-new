// JS for partial: globals-footer\n
var blog_utm = '?utm_source=google&utm_medium=organic&utm_campaign=blog';
$(()=>{
    $('#flexible-builder-template').find('a').each(function(){
        var href = $(this).attr('href');

        if (href.endsWith('/')) {
            $(this).attr('href', href + blog_utm);
        } else {
            $(this).attr('href', href + '/' + blog_utm);
        }
    });
});