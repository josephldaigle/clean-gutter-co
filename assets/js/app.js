import '../css/app.scss';

import $ from 'jquery';
window.$ = $;
window.jQuery = $;

import 'popper.js';
import 'bootstrap';

import AjaxForm from './plugins/ajax-form';

// #free-quote is the site-wide quote form (components/forms/quote-request.html.twig
// on home/about/contact/faq/our-work/customer-review/privacy/terms + the city
// marketing page's own get-quote partial). The submit handler therefore belongs
// in the site-wide app bundle, not in landing-page.js.
$('#free-quote').off('submit').on('submit', function (event) {
    let form = $(event.currentTarget);

    form.find('button').attr('disabled', true);
    form.find('button').find('span.spinner').toggleClass('d-none');

    let successCallback = function (data) {
        let parentEl = form.closest('.card');
        parentEl.find('.card-body:first-of-type').remove();
        parentEl.find('.card-header').text('Great choice!');

        parentEl.find('.card-body').toggleClass('d-none');

        parentEl.find('.card-header').removeClass('text-primary');
        parentEl.find('.card-header').addClass('bg-success');
        parentEl.find('.card-header').addClass('text-white');
        parentEl.find('.card-body').addClass('bg-success');
        parentEl.find('.card-body').addClass('text-white');
    };

    let errorCallback = function (data) {
        let alertBox = $(event.currentTarget).find('.alert');
        alertBox.removeClass('d-none').addClass('d-block');
        alertBox.html('<span>' + data.message + '</span>');
        alertBox.removeClass(function (index, className) {
            return (className.match(/(^|\s)alert-\S+/g) || []).join(' ');
        }).addClass(data.level);

        form.find('button').attr('disabled', false);
        form.find('button').find('span.spinner').toggleClass('d-none');
    };

    AjaxForm.submit(event, successCallback, errorCallback);
});
