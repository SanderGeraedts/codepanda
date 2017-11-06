//Change to own URL
const proxy     = 'http://codepanda.app/';

var gulp        = require('gulp');
var sass        = require('gulp-sass');
var concat      = require('gulp-concat');
var uglify      = require('gulp-uglify');
var pump        = require('pump');
var cleanCSS    = require('gulp-clean-css');
var strip       = require('gulp-strip-css-comments');
var imagemin    = require('gulp-imagemin');
var browserSync = require('browser-sync').create();

gulp.task('sass', function () {
    gulp.src('./sass/*.scss')
        .pipe(sass())
        .pipe(strip())
        .pipe(cleanCSS({compatibility: 'ie11'}))
        .pipe(gulp.dest('./dist/css/'))
        .pipe(browserSync.stream())
});

gulp.task('js', function () {
    pump([
        gulp.src('./js/*.js'),
        concat('main.min.js'),
        uglify(),
        gulp.dest('./dist/js/')
    ]);
});

gulp.task('img', function () {
    gulp.src('img/*.{png,jpg,jpeg,gif}')
        .pipe(imagemin({
            optimizationLevel: 7,
            progressive: true
        }))
        .pipe(gulp.dest('./dist/img/'))
});

gulp.task('default', ['sass', 'js', 'img']);

gulp.task('watch', function () {
    browserSync.init({
        proxy: proxy
    });

    // gulp.watch('./sass/*.scss', ['sass']);
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('./js/*.js', ['js']).on('change', browserSync.reload);
    gulp.watch('img/*.{png,jpg,jpeg,gif}', ['img']);
    gulp.watch('../../**/*.php').on('change', browserSync.reload);
});