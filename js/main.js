import '../sass/main.scss'
import $ from 'jquery';

window.sajo = {
    menu: (el) => {
        $(el).toggleClass('open');
    }
}