/**
 * Created by Joe Daigle on 3/5/19.
 */

import Vue from 'vue';

require('jquery');
require('./app.js');
require('../css/landing-page.scss');

// The site-wide #free-quote submit handler now lives in app.js so every
// page that renders the form gets it. Landing-page.js still requires app.js
// above, so the handler is bound on the city marketing page too.

$(document).ready(function () {
    $('#request-quote-btn').on('click', function () {
        console.log($('#form-card'));
        $('#form-card').removeClass('hidden');
        $('#request-quote-btn').addClass('hidden');
    });
});
