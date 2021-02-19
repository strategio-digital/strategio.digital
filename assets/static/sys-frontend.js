/**
 * Copyright (c) 2019 Wakers.cz
 * @author Jiří Zapletal (http://www.wakers.cz, zapletal@wakers.cz)
 *
 * DŮLEŽITÉ:
 *
 *      Na začátku zdrojových souborů nepoužívat podtržítko, GULP tyto soubory ignoruje.
 *      V názech souborů nepoužávat tečky, GULP tyto soubory ignoruje.
 *
 *      Špatně:     './assets/static/scss/_test.test.ext'
 *      Správně:    './assets/static/scss/test_test.ext'
 *
 */

module.exports = function ()
{
    return {

        jsOnlyProduction: [
            './assets/static/js/measurement.js',
        ],

        js:
        [
            // jQuery
            './node_modules/jquery/dist/jquery.js',

            // Popper
            './node_modules/popper.js/dist/umd/popper.js',

            // Bootstrap
            './node_modules/bootstrap/js/dist/index.js',
            './node_modules/bootstrap/js/dist/util.js',
            './node_modules/bootstrap/js/dist/tooltip.js',
            './assets/static/js/bootstrap.js',

            // Conversion
            './assets/static/js/conversion-handler.js',
            './assets/static/js/conversion.js',
        ],

        file:
        [
            { from: './assets/static/img/**/*', to: '/img' },
            //{ from: './node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.*', to: '/font' },
            //{ from: './node_modules/@fortawesome/fontawesome-free/webfonts/fa-regular-400.*', to: '/font' },
            //{ from: './node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.*', to: '/font' }
        ],

        scss:
        [
            // Zde načítat pouze tento zaváděcí soubor!
            './assets/static/scss/sys-frontend.scss',
        ]

    };
}();
