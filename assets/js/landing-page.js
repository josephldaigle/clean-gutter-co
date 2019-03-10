/**
 * Created by Joe Daigle on 3/5/19.
 */

import AjaxForm from './plugins/ajax-form';
import Vue from 'vue';

require('./app.js');
require('../css/landing-page.scss');

// Add Form Handler
$('#free-quote').off('submit').on('submit', function(event)
{

    let successCallback = function(data){
        console.warn('implement success handler callback for free-quote form');
    };

    let errorCallback = function(data){
        // show form alert
        let alertBox = $(event.currentTarget).find('.alert');
        alertBox.removeClass('d-none').addClass('d-block');
        alertBox.html('<span>' + data.message + '</span>');
        alertBox.removeClass(function (index, className) {
            return (className.match(/(^|\s)alert-\S+/g) || []).join(' ');
        }).addClass(data.level);
    };

    // submit form
    AjaxForm.submit(event, successCallback, errorCallback);
});