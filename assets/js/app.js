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
require('../css/app.css');
require('../css/global.scss');

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
window.app = new Vue({
    el: '#app',
    data: {
        name: 'a'
    }
});