/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import AjaxForm from './plugins/ajax-form';
import GtmAjaxForm from './plugins/gtm-ajax-form-submit';


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

    // attach quote form handler
    $('#free-quote').off('submit').on('submit', function(event)
    {
        let form = $(event.currentTarget);

        // disable submit button
        form.find('button').attr('disabled', true);
        form.find('button').find('span.spinner').toggleClass('d-none');

        // define callback for successful form submit
        let successCallback = function(data){

            // remove the form from the page and replace with some other content
            let parentEl = form.closest('.card');
            parentEl.find('.card-body:first-of-type').remove(); // remove form card
            parentEl.find('.card-header').text('What now?');    // change card header

            parentEl.find('.card-body').toggleClass('d-none');  // show success card

            // style card for success
            parentEl.find('.card-header').removeClass('text-primary');
            parentEl.find('.card-header').addClass('bg-success');
            parentEl.find('.card-header').addClass('text-white');
            parentEl.find('.card-body').addClass('bg-success');
            parentEl.find('.card-body').addClass('text-white');
        };

        // define callback for form submit error
        let errorCallback = function(data){

            // show form alert
            let alertBox = $(event.currentTarget).find('.alert');
            alertBox.removeClass('d-none').addClass('d-block');
            alertBox.html('<span>' + data.message + '</span>');
            alertBox.removeClass(function (index, className) {
                return (className.match(/(^|\s)alert-\S+/g) || []).join(' ');
            }).addClass(data.level);

            // enable form button
            form.find('button').attr('disabled', false);
            form.find('button').find('span.spinner').toggleClass('d-none');
        };

        // submit form
        AjaxForm.submit(event, successCallback, errorCallback);
    });

    // register ajax listener for firing GTM events
    // this allows Tag Manager to see ajax form and record them for Google Analytics

    // if ($('#app-env').data('appEnv') === 'prod') {
        $(document).ajaxComplete(function (event, jqXHR, opts) {
            GtmAjaxForm.pushFormToGtm(event, jqXHR, opts);
        });
    // }
});