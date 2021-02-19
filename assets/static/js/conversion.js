/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */

$(function () {
    $.conversionAdd('sendContactForm', function (conversion) {
        // Send goal to Analytics
        gtag('event', 'generate_lead', {
            'event_name' : 'generate_lead',
            'value': 1,
        });
    });
});