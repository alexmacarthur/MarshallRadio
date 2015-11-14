"use strict";

// load our plugins
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var autoprefix = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var rename = require("gulp-rename");
var pngquant = require('imagemin-pngquant');

// check our JavaScript
gulp.task('jshint',function(){
  gulp.src('js/main.js')
      .pipe(jshint())
      .pipe(jshint.reporter('default'));
});

// concat and minify our JavaScript
gulp.task('scripts', function() {
gulp.src(['js/main.js', 'js/dropit.js'])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});

// check, compile, and autoprefix our SASS
gulp.task('sass', function () {
  gulp.src('styles/style.scss')
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefix('last 3 versions'))
    .pipe(gulp.dest('styles'));
});

gulp.task('images', function() {
  return gulp.src('img/*')
    .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
    }))
    .pipe(gulp.dest('img'));
});

// run our default gulp tasks and watch for changes
gulp.task('default', ['jshint','scripts','sass'], function() {

  // watch for JavaScript changes
  gulp.watch('js/main.js', ['jshint', 'scripts']);

  // watch for SASS changes
  gulp.watch('styles/**/*.scss', ['sass']);

});