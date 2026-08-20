import '../sass/main.scss'

const $ = window.jQuery;

window.sajo = {
    menu: (el) => {
        $(el).toggleClass('open');
    }
}