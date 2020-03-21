'use strict';

const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const scsslint = require('gulp-scss-lint');

/**
 * Source
 */
const srcScss = 'scss/**/*.scss';

/**
 * Outputted CSS
 */
const cssDest = './css/';

/**
 * Scss lint
 */
gulp.task('scss-lint', function() {
    return gulp.src(srcScss)
        .pipe(scsslint());
});

/**
 * Task for styles
 */
gulp.task('css', ['scss-lint'], function () {
    gulp.src(srcScss)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({ cascade: false }))
        .pipe(gulp.dest(cssDest))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleancss())
        .pipe(gulp.dest(cssDest));
});

/**
 * Watch task
 */
gulp.task('watch', function () {
    gulp.watch(srcScss, ['css']);
});

/**
 * Default task
 */
gulp.task('default', ['css'] );
