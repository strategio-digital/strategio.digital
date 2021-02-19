/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */

$(function () {
    // Conversion API
    var methods = [];
    $.conversionAdd = function (name, callback) {
        methods[name] = callback;
    };

    // Callback for Conversion API
    /**$.nette.ext({
        success: function (payload) {
            var conversion = payload.conversion;

            if(typeof conversion !== 'undefined') {
                methods[conversion.name](conversion);
            }
        }
    });**/
});