var config = (require('./gulpconfig')).config;

var gulp = require('gulp'),
    gulpSourcemaps = require('gulp-sourcemaps'),
    gulpConcat = require('gulp-concat'),
    gulpAutoprefixer = require('gulp-autoprefixer'),
    gulpCleanCss = require('gulp-clean-css'),
    gulpIf = require('gulp-if'),
    gulpUglify = require('gulp-uglify'),
    gulpSvgo = require('gulp-svgo'),
    del = require('del');

/**************/
/** CSS ******/
/**************/
gulp.task('clean-css', function () {
    return del([config.compiledFilePath.css]);
});

gulp.task('combine-css', function () {
    return gulp.src([
        config.sourcesFilePath.css + 'fontawesome-free-5.12.0-web.css',
        config.sourcesFilePath.css + 'style.css',
        config.sourcesFilePath.css + 'toasts.css',
        config.sourcesFilePath.css + 'aboutus.css',
        config.sourcesFilePath.css + 'conditions.css',
        config.sourcesFilePath.css + 'contacts.css',
        config.sourcesFilePath.css + 'profile.css'
    ])
        .pipe(gulpIf(config.isDev, gulpSourcemaps.init()))
        .pipe(gulpConcat(config.outputNames.css))
        .pipe(gulpAutoprefixer())
        .pipe(gulpIf(!config.isDev, gulpCleanCss({
            level: {
                1: {
                    specialComments: 0
                }
            }
        })))
        .pipe(gulpIf(config.isDev, gulpSourcemaps.write()))
        .pipe(gulp.dest(config.compiledFilePath.css));
});

gulp.task('css', gulp.series('clean-css', 'combine-css'));

gulp.task('watch-css', function () {
    gulp.watch(config.sourcesFilePath.css + '**/*.css', gulp.series('css'));
});

/**************/
/** JS ********/
/**************/
gulp.task('clean-js', function () {
    return del([config.compiledFilePath.js]);
});

gulp.task('combine-js', function () {
    return gulp.src([
        config.sourcesFilePath.js + 'functions.js',
        config.sourcesFilePath.js + 'common.js'
    ])
        .pipe(gulpIf(config.isDev, gulpSourcemaps.init()))
        .pipe(gulpIf(!config.isDev, gulpUglify({
            toplevel: true
        })))
        .pipe(gulpConcat(config.outputNames.js))
        .pipe(gulpIf(config.isDev, gulpSourcemaps.write()))
        .pipe(gulp.dest(config.compiledFilePath.js));
});

gulp.task('js', gulp.series('clean-js', 'combine-js'));

gulp.task('watch-js', function () {
    gulp.watch(config.sourcesFilePath.js + '**/*.js', gulp.series('js'));
});

/**************/
/** IMAGES ****/
/**************/
gulp.task('clean-images', function () {
    return del([config.compiledFilePath.images]);
});

gulp.task('combine-images', function () {
    return gulp.src(config.sourcesFilePath.images).pipe(gulpSvgo()).pipe(gulp.dest(config.compiledFilePath.images));
});

gulp.task('images', gulp.series('clean-images', 'combine-images'));

gulp.task('watch-images', function () {
    gulp.watch(config.sourcesFilePath.images, gulp.series('images'));
});

/**************/
/** FONTS ****/
/**************/
gulp.task('clean-fonts', function () {
    return del([config.compiledFilePath.fonts]);
});

gulp.task('combine-fonts', function () {
    return gulp.src(config.sourcesFilePath.fonts).pipe(gulp.dest(config.compiledFilePath.fonts));
});

gulp.task('fonts', gulp.series('clean-fonts', 'combine-fonts'));

gulp.task('watch-fonts', function () {
    gulp.watch(config.sourcesFilePath.fonts, gulp.series('fonts'));
});

/**************/
/** VIDEO ****/
/**************/
gulp.task('clean-video', function () {
    return del([config.compiledFilePath.video]);
});

gulp.task('combine-video', function () {
    return gulp.src(config.sourcesFilePath.video).pipe(gulp.dest(config.compiledFilePath.video));
});

gulp.task('video', gulp.series('clean-video', 'combine-video'));

gulp.task('watch-video', function () {
    gulp.watch(config.sourcesFilePath.video, gulp.series('video'));
});


/**************/
/** WATCH *****/
/**************/
gulp.task('watch', gulp.parallel('watch-css', 'watch-js', 'watch-images', 'watch-fonts', 'watch-video'));

/**************/
/** DEFAULT *****/
/**************/
gulp.task('default', gulp.series('css', 'js', 'images', 'fonts', 'video'));
