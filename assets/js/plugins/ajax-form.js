/**
 * Created by Joe Daigle on 3/5/19.
 */

let AjaxForm = {
    /**
     * Handle form submission.
     *
     * Extracts all information required to submit the form from data-* attributes on the <form>.
     * Possible Options:
     *      data-url    the endpoint to send the request to
     *      data-method PUT, POST, GET
     *
     * @param event
     * @param successCallback function
     * @param errorCallback function
     */
    submit: function(event, successCallback, errorCallback) {
        event.preventDefault();
        event.stopPropagation();

        // select the <form> with jquery
        let form = $(event.currentTarget);

        // validate the form
        if (! $(form).hasClass('needs-validation')) {
            // show warning without validation
            console.warn("A form is being submitted without the `needs-validation` class. <form id=\"" + $(form).attr('id') + "\">");
        }

        // gather form data
        let formData = new FormData(form[0]);

        if (event.currentTarget.checkValidity() === false) {
            form.addClass('was-validated');

        } else {

            let url = form.data('url');
            let method = form.data('method');

            $.ajax({
                url: url,
                method: method,
                data: formData,
                processData: false,
                contentType: false
            })
            .done(function(data, textStatus, jqXHR) {
                successCallback(data);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 400) {
                    errorCallback({'level': 'alert-danger', 'message': 'Unable to process form.'});
                } else {
                    errorCallback({'level': 'alert-danger', 'message': 'This service is not available at the moment. Please call us to schedule a quote (478) 841-9797.'});
                }
            });
        }

        // data mutation call-backs
        // loops over an array of callback functions, calling each function on the data in order
        // the request is submitted with the final resulting object

        // submit the form to server

        // fire success callback
        if (typeof successCallback !== 'undefined')
        {
            // successCallback();

        }
    },
};

export default AjaxForm;