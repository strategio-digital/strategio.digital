/**
 * Copyright (c) 2019 Wakers.cz
 * @author Jiří Zapletal (http://www.wakers.cz, zapletal@wakers.cz)
 */

// Balíčky
const
    gulp            = require('gulp'),
    cleanCSS        = require('gulp-clean-css'),
    env             = require('gulp-environment'),
    filesExist      = require('files-exist'),
    concat          = require('gulp-concat'),
    hash            = require('gulp-hash'),
    sass            = require('gulp-sass'),
    uglify          = require('gulp-uglify'),
    packageImporter = require('node-sass-package-importer');

// Asset loadery
const loaders = {
    sysFrontend: './assets/static/sys-frontend',
};

// Názvy výsledných souborů (js / scss)
const output = {
    frontend: 'sys-frontend-build',

    manifest: '../manifest.json'
};

// Úložiště výsledných souborů
const storage = {
    JS: './www/temp/static/js',
    CSS: './www/temp/static/css',
    File: './www/temp/static'
};

// Načtené assets
var assets = {
    sysFrontend: null,
};

// Načte assets
gulp.task('load:assets', function (promise) {

    delete require.cache[require.resolve(loaders.sysFrontend)];

    assets.sysFrontend = require(loaders.sysFrontend);

    promise();
});

// Kompilace JS frontendu (custom & system)
gulp.task('compile:frontend:js', function (promise) {

    // Případně přidá production only JS
    assets.sysFrontend.js = (env.is.production() ? assets.sysFrontend.js.concat(assets.sysFrontend.jsOnlyProduction) : assets.sysFrontend.js);

    if (assets.sysFrontend.js.length === 0) {
        return promise();
    }

    // Minifikuje, sloučí a uloží název souboru do manifestu
    return gulp.src(filesExist(assets.sysFrontend.js))

        .pipe(concat(output.frontend + '.js'))
        .pipe(env.if.production(uglify()))

        .pipe(hash())
        .pipe(gulp.dest(storage.JS))
        .pipe(hash.manifest(output.manifest))
        .pipe(gulp.dest(storage.JS));

});

// Kompilace SCSS frontendu (custom & system)
gulp.task('compile:frontend:styles', function (promise) {

    if (assets.sysFrontend.scss.length === 0) {
        return promise();
    }

    return gulp.src(filesExist(assets.sysFrontend.scss))

        .pipe(env.if
        // compressed / compact
            .production(sass.sync( { importer: packageImporter(), outputStyle: 'compressed' }).on('error', sass.logError))
            .else(sass.sync( { importer: packageImporter(),  outputStyle: 'expanded' }).on('error', sass.logError)))

        .pipe(concat(output.frontend  + '.css'))
        .pipe(env.if.production(cleanCSS()))

        .pipe(hash())
        .pipe(gulp.dest(storage.CSS))
        .pipe(hash.manifest(output.manifest))

        .pipe(gulp.dest(storage.CSS));
});

gulp.task('copy:files', function (promise) {

    var files = assets.sysFrontend.file;

    files.forEach(function (file)
    {
        [].push(gulp.src(filesExist(file.from))
            .pipe(gulp.dest(storage.File + file.to)))
    });

    return promise();
});

// Paralélně zpracuje tasky
gulp.task('default:parallel', gulp.parallel(

    'compile:frontend:styles',
    'compile:frontend:js',
    'copy:files'

));

// Watcher
gulp.task('watch', function () {

    gulp.watch(
        'assets/**/*',
        gulp.series('default')
    );

});

// Výchozí task
gulp.task('default', gulp.series(
    'load:assets',
    'default:parallel'
));
