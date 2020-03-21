'use strict';

const gulp = require('gulp');
const babel = require('gulp-babel');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const scsslint = require('gulp-scss-lint');

/**
 * Scss source
 */
const scssSrc = 'scss/**/*.scss';

/**
 * Outputted CSS
 */
const cssDest = './css/';

/**
 * Scss lint
 */
gulp.task('scss-lint', function() {
    return gulp.src(scssSrc)
        .pipe(scsslint());
});

/**
 * Styles
 */
gulp.task('css', ['scss-lint'], function () {
    gulp.src(scssSrc)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({ cascade: false }))
        .pipe(gulp.dest(cssDest))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleancss())
        .pipe(gulp.dest(cssDest));
});

/**
 * Scripts
 *
 * @type {string}
 */
const jsSrc = 'js/functions/*.js';
const jsDest = 'js/';

gulp.task('js', function() {
    return gulp.src(jsSrc)
        .pipe(babel({
            presets : ['es2015']
        }))
        .pipe(concat('social-icons-obvs-admin.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('social-icons-obvs-admin.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

/**
 * Watch task
 */
gulp.task('watch', function () {
    gulp.watch(scssSrc, ['css']);
    gulp.watch('js/**/*.js', ['js']);
});

/**
 * Default task
 */
gulp.task('default', ['css', 'js'] );
