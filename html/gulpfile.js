//note for themeboxr dev: each time you change this file copy the new file in project folder

// All Variable Call Here
var templatedir = './',
    node_mod_dir = './node_modules/',
    gulp = require('gulp'),
    injectPartials = require('gulp-inject-partials'),
    less = require('gulp-less'),
    minify = require('gulp-minify'),
    rename = require('gulp-rename'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create();



// Inject Html Pertials
gulp.task('compile-html', function() {
    var variation = [
        "index.html",
        "typography.html"
    ];
    var html_tasks = [];
    variation.forEach(function(filename) {
        var temp = gulp.src('./generator/' + filename)
            .pipe(injectPartials({
                removeTags: true
            }))
            .pipe(gulp.dest('./src'));
        html_tasks.push(temp);
    });
    return html_tasks;
});



// Compile Less to Css and Minify Css
gulp.task('compile-less', function() {
    var less_tasks = [];
    var default_less = gulp.src(templatedir + 'src/assets/less/style-default.less')
        .pipe(less())
        .pipe(gulp.dest(templatedir + 'src/assets/css/')).on('end', function() {
            var default_less2 = gulp.src(templatedir + 'src/assets/css/style-default.css')
                .pipe(minify().on('error', function(err) {
                    console.log(err);
                }))
                .pipe(rename({
                    suffix: '.min'
                }))
                .pipe(gulp.dest(templatedir + 'src/assets/css/'));
            less_tasks.push(default_less2);
        });
    return less_tasks;
});



// Minify Js
gulp.task('compress-js', function() {
    gulp.src(templatedir + 'src/assets/js/theme-main.js')
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest(templatedir + 'src/assets/js'));
});



// Task to Watch Changes
gulp.task('watch-less', ['compile-less', 'compress-js', 'compile-html'], function () {
    //watch less file
    gulp.watch(templatedir + 'src/assets/less/*.less', ['compile-less']);
    gulp.watch(templatedir + 'src/assets/less/mixins/*.less', ['compile-less']);
    gulp.watch(templatedir + 'src/assets/less/variation/*.less', ['compile-less']);
    gulp.watch(templatedir + 'src/assets/less/responsive/*.less', ['compile-less']);
    gulp.watch(templatedir + 'src/assets/less/sections/*.less', ['compile-less']);

    //watch js file
    gulp.watch(templatedir + 'src/assets/js/theme-main.js', ['compress-js']);

    //compile html and output to src folder
    gulp.watch(templatedir + 'generator/*.html', ['compile-html']);
    gulp.watch(templatedir + 'generator/partial/*.html', ['compile-html']);

    //brower sync
    gulp.watch(templatedir + 'src/assets/css/*.css').on('change', browserSync.reload);
    gulp.watch(templatedir + 'src/assets/js/theme-main.min.js').on('change', browserSync.reload);
    gulp.watch(templatedir + 'src/*.html').on('change', browserSync.reload);
});



// Browser Sync
gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: "http://localhost/htmlthemes/themeboxr_html/src/"
    });
});



// Task When Running on Terminal
gulp.task('default', ['watch-less', 'browser-sync']);