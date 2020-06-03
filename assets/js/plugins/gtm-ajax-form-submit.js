/**
 * Created by Joe Daigle on 5/22/20.
 */

/*
* v0.1.0
* Created by the Google Analytics consultants at http://www.lunametrics.com
* Written by @notdanwilkerson
* Documentation: http://www.lunametrics.com/blog/2015/08/27/ajax-event-listener-google-tag-manager/
* Licensed under the Creative Commons 4.0 Attribution Public License
*/

let GtmAjaxForm = {
    pushFormToGtm: function(evt, jqXhr, opts) {
        // Create a fake a element for magically simple URL parsing
        var fullUrl = document.createElement('a');
        fullUrl.href = opts.url;

        // IE9+ strips the leading slash from a.pathname because who wants to get home on time Friday anyways
        var pathname = fullUrl.pathname[0] === '/' ? fullUrl.pathname : '/' + fullUrl.pathname;
        // Manually remove the leading question mark, if there is one
        var queryString = fullUrl.search[0] === '?' ? fullUrl.search.slice(1) : fullUrl.search;
        // Turn our params and headers into objects for easier reference
        var queryParameters = this.objMap(queryString, '&', '=', true);
        var headers = this.objMap(jqXhr.getAllResponseHeaders(), '\n', ':');

        dataLayer.push({
            'event': 'ajaxComplete',
            'attributes': {
                // Return empty strings to prevent accidental inheritance of old data
                'type': opts.type || '',
                'url': fullUrl.href || '',
                'action': evt.currentTarget.id,
                'queryParameters': queryParameters,
                'pathname': pathname || '',
                'hostname': fullUrl.hostname || '',
                'protocol': fullUrl.protocol || '',
                'fragment': fullUrl.hash || '',
                'statusCode': jqXhr.status || '',
                'statusText': jqXhr.statusText || '',
                'headers': headers,
                'timestamp': evt.timeStamp || '',
                'contentType': opts.contentType || '',
                // Defer to jQuery's handling of the response
                'response': (jqXhr.responseJSON || jqXhr.responseXML || jqXhr.responseText || '')
            }
        });
    },
    objMap: function (data, delim, spl, decode) {

        var obj = {};

        // If one of our parameters is missing, return an empty object
        if (!data || !delim || !spl) {

            return {};

        }

        var arr = data.split(delim);
        var i;

        if (arr) {

            for (i = 0; i < arr.length; i++) {

                // If the decode flag is present, URL decode the set
                var item = decode ? decodeURIComponent(arr[i]) : arr[i];
                var pair = item.split(spl);

                var key = this.trim_(pair[0]);
                var value = this.trim_(pair[1]);

                if (key && value) {

                    obj[key] = value;

                }

            }

        }

        return obj;
    },
    // Basic .trim() polyfill
    trim_: function (str) {

        if (str) {

            return str.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');

        }

    }
};

export default GtmAjaxForm;