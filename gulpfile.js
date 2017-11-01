var gulp = require('gulp');
var path = require('path');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var watch = require('gulp-watch');

var srcFiles = "assets/sass/*.scss";
var dest = "assets/css"
 
gulp.task('sass', function(){
  return gulp.src(srcFiles)
    .pipe(sass()) // Using gulp-sass concatenating the .scss files.
    .on('error', onError)
    .pipe(concat('style.css'))
    .pipe(minify())
    .pipe(gulp.dest(dest))
});

gulp.task('watch', function(){
  gulp.watch('assets/sass/*.scss', ['sass']); 
});

function onError(err) {
  console.log(err);
  this.emit('end');
}


//TODO: Add the minification of the javascript files.
