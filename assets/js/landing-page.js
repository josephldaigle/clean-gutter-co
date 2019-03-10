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