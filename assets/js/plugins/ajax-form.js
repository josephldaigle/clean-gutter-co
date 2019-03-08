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
     * @param form jQuery object
     */
    submit: function(event, successCallback, errorCallback) {
        let form = event.currentTarget;
        let formData = new FormData(form);

        // validate the form
        if (! $(form).hasClass('needs-validation')) {
            console.warn('A form is being submitted without validation. <form id="' + $(form).attr('id') + '"');
        } else {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();

            } else {
                form.classList.add('was-validated');

                // $.ajax( "/" )
                //     .done(function() {
                //         console.log( "success" );
                //     })
                //     .fail(function() {
                //         console.log( "error" );
                //     })
                //     .always(function() {
                //         console.log( "complete" );
                //     });
            }
        }

        // data mutation call-backs
        // loops over an array of callback functions, calling each function on the data in order
        // the request is submitted with the final resulting object

        // submit the form to server

        // fire success callback
        if (typeof successCallback !== 'undefined')
        {
            successCallback(event.currentTarget);
        }

        // fire error callback
        if (typeof errorCallback !== 'undefined')
        {
            errorCallback(event.currentTarget);
        }
    },
};

export default AjaxForm;