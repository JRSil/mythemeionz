'use strict';

var gulp          = require('gulp');
var sass          = require('gulp-sass');
var browserSync   = require('browser-sync').create();
var uglify        = require('gulp-uglify');
var concat        = require('gulp-concat');
var gulpUtil      = require('gulp-util');
var plumber       = require('gulp-plumber');
var htmlmin       = require('gulp-htmlmin');
var fileinclude   = require('gulp-file-include');
var imagemin      = require('gulp-imagemin');
var smushit       = require('gulp-smushit');
var pngquant      = require('imagemin-pngquant');
var styleInject   = require("gulp-style-inject");
var gzip          = require('gulp-gzip');
var strip         = require('gulp-strip-comments');
var sourcemaps    = require('gulp-sourcemaps');
var wait          = require('gulp-wait');
var replace       = require('gulp-replace');

// process JS files and return the stream.
gulp.task('js', function () {
    return gulp.src([
            'dev/files/js/jquery-3.2.0.min.js',
            'dev/files/js/jquery.mask.js',
            'dev/files/js/jquery.textillate.js',
            'dev/files/js/jquery.lettering.js',
            'dev/files/js/main.js',
            'dev/files/js/projeto.js'
        ])
        .pipe(plumber(function(error) {
            gulp.emit('finish');
        }))
        .pipe(concat('all.min.js'))
        .pipe(uglify().on('error', gulpUtil.log))
        .pipe(strip())
        .pipe(gulp.dest('files/js/'));
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("dev/files/scss/style.scss")
        .pipe(wait(500))
        .pipe(sass({errLogToConsole: true, outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("./"));
});

gulp.task('header-template', function() {
    gulp.src('dev/header.php')
        .pipe(plumber(function(error) {
            gulp.emit('finish');
        }))
        .pipe(styleInject({
            path: './',
            match_pattern: '<\\link\\s*rel=\"stylesheet\"\\s*(.*?)\\s*>',
        }))
        .pipe(gulp.dest('./'));
});

gulp.task('imagemin', () =>
    gulp.src('dev/files/images/**.{jpg,png,gif,svg}')
        .pipe(plumber(function(error) {
            gulp.emit('finish');
        }))
        .pipe(imagemin([
                imagemin.gifsicle({interlaced: true}),
                imagemin.jpegtran({progressive: true}),
                imagemin.optipng({optimizationLevel: 8}),
                imagemin.svgo({
                    plugins: [
                        {removeViewBox: true},
                        {cleanupIDs: false}
                    ]
                })
            ],{
                use: [pngquant()]
            })
        )
        .pipe(smushit())
        .pipe(gulp.dest('files/images/'))
);

// Static Server + watching scss/html files
gulp.task('serve', ['sass','js', 'header-template', 'imagemin'], function() {
    
    gulp.watch("dev/files/scss/*.scss", ['sass', 'header-template']);
   
    gulp.watch("dev/header.php", ['header-template']);
    
    gulp.watch("dev/files/js/*.js", ['js-watch']);

    gulp.watch("dev/files/images/*", ['imagemin']);

});

gulp.task('dev', ['sass','js'], function() {
    
    gulp.watch("dev/files/scss/*.scss", ['sass']);
    
    gulp.watch("dev/files/js/*.js", ['js-watch']);

});

// all browsers reload after tasks are complete.
gulp.task('js-watch', ['js'], function (done) {
    done();
});

//função padroa de dev
//gulp.task('default', ['serve']);
gulp.task('default', ['dev']);