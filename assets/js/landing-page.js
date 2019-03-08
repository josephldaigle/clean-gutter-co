/**
 * Created by Joe Daigle on 3/5/19.
 */

// let {AjaxForm} = require('./plugins/ajax-form.js');

import AjaxForm from './plugins/ajax-form';

require('jquery-validation');
require('../css/landing-page.scss');

// Configure Form Handler
$('#free-quote').off('submit').on('submit', function(event) {
    AjaxForm.submit(event);
});


$('#free-quote').validate(
    {
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element
                .text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });