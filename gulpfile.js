const { src, dest, parallel, watch } = require('gulp')

const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano')
const autoprefixer = require('autoprefixer')
const postcss = require('gulp-postcss')

const concat = require('gulp-concat')
const terser = require('gulp-terser-js')

const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')

const webp = require('gulp-webp')
const imagemin = require('gulp-imagemin')

const paths = {
    src_sass : 'src/sass/**/*.scss',
    src_js : 'src/js/**/*.js',
    src_img : 'src/img/**/*',
    dest_css : 'public/build/css',
    dest_js : 'public/build/js',
    dest_img : 'public/build/img'
}

function images() {
    /* no webp min */
    return src(paths.src_img)
    .pipe( imagemin() )
    .pipe( dest(paths.dest_img) )

    /* & webp min */
    .pipe( src(paths.src_img) )
    .pipe( imagemin() )
    .pipe( webp() )
    .pipe( dest(paths.dest_img) )
}

function css() {
    return src(paths.src_sass)
    .pipe( sourcemaps.init() )
    .pipe( sass() )
    .pipe( postcss([ autoprefixer(), cssnano() ]) )
    .pipe( rename('style.css') )
    .pipe( sourcemaps.write('.') )
    .pipe( dest(paths.dest_css) )
}

function js() {
    return src(paths.src_js)
    .pipe( sourcemaps.init() )
    .pipe( concat('scripts.js') )
    .pipe( terser() )
    .pipe( sourcemaps.write('.') )
    .pipe( dest(paths.dest_js) )
}

function watchFiles() {
    watch( paths.src_sass, css )
    watch( paths.src_js, js )
}

exports.images = images
exports.cssjs = parallel( css, js )
exports.default = parallel( css, js, watchFiles )