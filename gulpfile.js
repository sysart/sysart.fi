const gulp = require('gulp');

const babel = require('gulp-babel');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');
const flatten = require('gulp-flatten');
const del = require('del');
const webpack = require('webpack-stream');

const paths = {
    scripts: 'src/scripts/**/*.js',
    scriptsExclude: '!src/scripts/lib/*.js',
    scriptsDest: 'wp/wp-content/themes/sysart/scripts',
    scriptsLib: 'src/scripts/lib/**/*.js',

    styles: 'src/styles/index.scss',
    stylesDest: 'wp/wp-content/themes/sysart/styles',
    stylesName: 'style.min.css',
    stylesWatch: 'src/styles/**/*.scss',

    fonts: 'src/fonts/**/*',
    fontsDest: 'wp/wp-content/themes/sysart/fonts'
}

gulp.task('scripts', () => {
    return gulp.src('src/scripts/test.js')
        .pipe(webpack(require('./webpack.config.js')))
        .pipe(gulp.dest(paths.scriptsDest));
});

gulp.task('sass', () => {
    return gulp.src(paths.styles)
        .pipe(sass().on('error', sass.logError))
        .pipe(rename(paths.stylesName))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(paths.stylesDest))
});

gulp.task('copy:libjs', () => {
    return gulp.src(paths.scriptsLib)
        .pipe(flatten())
        .pipe(gulp.dest(paths.scriptsDest))
});

gulp.task('copy:fonts', () => {
    return gulp.src(paths.fonts)
        .pipe(gulp.dest(paths.fontsDest))
});

gulp.task('sass:production', () => {
    return gulp.src(paths.styles)
        .pipe(sass({
          outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(rename(paths.stylesName))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(paths.stylesDest))
});

gulp.task('clean:dist', () => {
    return del([
        'themes/sysart/scripts/**/*',
        'themes/sysart/styles/**/*'
    ])
});

gulp.task('sass:watch', () => {
    gulp.watch(paths.stylesWatch, ['sass']);
});

gulp.task('scripts:watch', () => {
    gulp.watch(paths.scripts, ['scripts']);
});

gulp.task('dev', ['clean:dist'], () => {
    gulp.run('copy:libjs', 'copy:fonts', 'sass', 'scripts', 'sass:watch', 'scripts:watch');
});

gulp.task('build', ['clean:dist'], () => {
    gulp.run('copy:libjs', 'copy:fonts', 'sass:production', 'scripts');
});
