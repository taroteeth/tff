'use strict';

//VARS

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

//SCSS

//look for every scss file in whatever directory we tell the function to look
gulp.task('sass', function () {
  return gulp.src('./../sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./../'));
});

gulp.task('scripts', function() {
  return gulp.src([
    './bower_components/jquery/dist/jquery.min.js',
    './../js/src/*.js'
    ])
    .pipe(concat('all.js'))
    .pipe(minify())
    .pipe(gulp.dest('./../js/dist/'));
});

//auto watch
gulp.task('default', function() {
  gulp.watch('./../sass/**/*.scss', ['sass']);
  gulp.watch('./../js/src/*.js', ['scripts']);
});
