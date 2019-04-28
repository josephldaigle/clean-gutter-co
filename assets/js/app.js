/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

require('jquery');
require('tether');
require('bootstrap');

// configure Vue
// Vue.use(BootstrapVue);
Vue.config.delimiters = ['${', '}'];
Vue.use(VueAxios, axios);

// configure image assets
const imagesContext = require.context('../img', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// initialize app
// window.app = new Vue({
//     el: '#app',
//     data: {
//         name: 'app'
//     }
// });

$(document).ready(function () {
    // set active nav link
    let pageParts = window.location.pathname.split('/');

    $('ul.navbar-nav > li > a').each(function() {

        let linkParts = $(this).attr('href').split('/');

        if (pageParts.length === linkParts.length && pageParts.sort().every(function(value, index) { return value === linkParts.sort()[index]}) ) {

            // set active link
            $(this).addClass('active');
            $(this).append( $('ul.navbar-nav li a span.sr-only') );



        } else {
            $(this).removeClass('active');
        }
    });
});