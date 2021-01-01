const {
    src,
    dest,
    watch,
    series,
    parallel
} = require("gulp");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const concat = require("gulp-concat");
const postcss = require("gulp-postcss");
const sass = require("gulp-sass");
const sourcemaps = require("gulp-sourcemaps");
const uglify = require("gulp-uglify");



const files = {
    scssPath: "app/sass/**/*.scss",
    jsPath: "app/js/**/*.js"
};


//Sass task

function scssTask() {
    return src(files.scssPath)
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss([autoprefixer("last 2 version"), cssnano()]))
        .pipe(sourcemaps.write("."))
        .pipe(dest("dist/css"));
}
//JavaScript task

// function jsTask() {
//     return src([files.jsPath])
//         .pipe(concat("general.js"))
//         .pipe(uglify())
//         .pipe(dest("dist/js"));
// }
// Watching Task
function watchTask() {
    watch([files.scssPath, files.jsPath], series(parallel(scssTask)));
}

exports.default = series(parallel(scssTask), watchTask);

// npm install --save-dev gulp gulp-sass gulp-sourcemaps gulp-postcss autoprefixer cssnano gulp-concat gulp-uglify 