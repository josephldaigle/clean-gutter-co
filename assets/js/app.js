/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('bootstrap');
// require('argon-design-system-free');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

Vue.use(BootstrapVue);

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

window.app = new Vue({
    el: '#app',
    data: {
        name: ''
    },
    computed: {
        showAlert() {
            console.log('runs all the time');
            return true;
        }
    }
});