const gulp = require('gulp')
const sass = require('gulp-sass')
const minify = require('gulp-clean-css')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')

const bs = require('browser-sync').create()

gulp.task('sass', function () {
  gulp.src('./assets/src/css/editor-styles.scss')
    .pipe(sass())
    .pipe(gulp.dest('.'))

  return gulp.src('./assets/src/css/style.scss')
    .pipe(sass())
    .pipe(gulp.dest('.'))
  // .pipe(bs.reload({stream: true}));
})

gulp.task('scripts', function () {
  return gulp.src(['./assets/src/js/**/*.js', './assets/src/js/*.js'])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/dist/js'))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/dist/js'))
})

gulp.task('minify-css', ['sass'], function () {
  return gulp.src('style.css')
    .pipe(minify())
    .pipe(gulp.dest('.'))
})

// /** OPT 1 - Enable browser sync - works locally **/
// gulp.task('watch', ['browser-sync'], function () {
//     gulp.watch('./assets/src/css/*.scss', ['sass']);
//     gulp.watch('./assets/src/js/**/*.js', ['scripts']);
//     gulp.watch("./**/*.php").on('change', bs.reload);
// });

/** OPT 2 - Regular sass, compiles doesn't refresh **/
gulp.task('watch', ['sass'], function () {
  gulp.watch('./assets/src/css/**/*.scss', ['sass'])
  gulp.watch('./assets/src/js/**/*.js', ['scripts'])
})

gulp.task('browser-sync', function () {
  bs.init({
    proxy: '53stitches.local/'
  })
})

gulp.task('default', ['sass', 'scripts']) // Development
gulp.task('production', ['minify-css', 'scripts']) // Production - minify result