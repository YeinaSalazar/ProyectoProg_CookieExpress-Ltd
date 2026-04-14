(function (window, $) {
    if (!$) {
        return;
    }

    var config = window.CookieExpressConfig || {};

    function buildUrl(endpoint) {
        if (!endpoint) {
            return config.apiBaseUrl || '';
        }

        if (/^https?:\/\//i.test(endpoint)) {
            return endpoint;
        }

        return (config.apiBaseUrl || '').replace(/\/$/, '') + '/' + endpoint.replace(/^\//, '');
    }

    function request(method, endpoint, data, options) {
        var settings = $.extend(true, {
            url: buildUrl(endpoint),
            method: method,
            timeout: config.requestTimeout || 12000,
            dataType: 'json'
        }, options || {});

        if (data) {
            if ((settings.contentType || '').indexOf('application/json') !== -1) {
                settings.data = JSON.stringify(data);
            } else {
                settings.data = data;
            }
        }

        return $.ajax(settings);
    }

    window.CookieExpressAPI = {
        get: function (endpoint, params, options) {
            return request('GET', endpoint, params, options);
        },
        post: function (endpoint, payload, options) {
            return request('POST', endpoint, payload, $.extend({ contentType: 'application/json' }, options));
        },
        put: function (endpoint, payload, options) {
            return request('PUT', endpoint, payload, $.extend({ contentType: 'application/json' }, options));
        },
        delete: function (endpoint, payload, options) {
            return request('DELETE', endpoint, payload, $.extend({ contentType: 'application/json' }, options));
        }
    };
})(window, window.jQuery);
