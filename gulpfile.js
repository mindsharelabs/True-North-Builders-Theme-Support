const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const del = require('del');

gulp.task('styles', () => {
    return gulp.src('scss/front.scss')
        .pipe(sass({
          outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(gulp.dest('inc/css/'))
});

gulp.task('block-styles', () => {
    return gulp.src('scss/block-styles.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'compressed'
      }).on('error', sass.logError))
      .pipe(gulp.dest('inc/css/'))
});



gulp.task('timeline-styles', () => {
    return gulp.src('scss/jtimeline.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'compressed'
      }).on('error', sass.logError))
      .pipe(gulp.dest('inc/css/'))
});


gulp.task('clean', () => {
    return del([
        'inc/css/front.css',
        'inc/css/block-styles.css',
        'inc/css/jtimeline.css',
    ]);
});

gulp.task('watch', () => {
    gulp.watch('scss/*.scss', (done) => {
        gulp.series(['clean', 'styles', 'block-styles', 'timeline-styles'])(done);
    });
});

gulp.task('default', gulp.series(['clean', 'styles', 'block-styles', 'timeline-styles', 'watch']));
