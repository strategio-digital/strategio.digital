/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */

$(function () {
    $.conversionAdd('contactForm', function (conversion) {

        /*
        // Send goal to Analytics
        gtag('event', 'conversion', {
            'event_category' : 'form',
            'event_label' : conversion.name,
            'value': conversion.value,
        });

        // Send to Ads
        gtag('event', 'conversion', {
            'send_to': 'AW-684815193/d3UaCIGnwbkBENnmxcYC',
            'value': conversion.value,
            'currency': conversion.currency
        });

        // Send to Sklik
        $('body').append('<iframe width="0" height="0" frameborder="0" scrolling="no" src="//c.imedia.cz/checkConversion?c=100059016&amp;color=ffffff&amp;v=' + conversion.value +'" style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe>');

        // Send lead to Facebook
        fbq('track', 'Lead', {
            value: conversion.value,
            currency: 'CZK',
        });

        $('#' + conversion.name).toggle('hide').parent().find('.alert.alert-success').toggle('show')
        */
    });

    $.conversionAdd('registerForm', function (conversion) {

        /*
        gtag('event', 'conversion', {
            'event_category' : 'form',
            'event_label' : conversion.name,
            'value': conversion.value,
        });

        $('#' + conversion.name).toggle('hide').parent().find('.alert.alert-success').toggle('show')
        */
    });
});