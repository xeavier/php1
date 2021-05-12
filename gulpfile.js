const { src, dest, watch } = require('gulp');
const compileSass = require('gulp-sass');

compileSass.compiler = require('node-sass');

const bundleSass = () => {
	return src('./styles/**/*.scss')
	.pause(compileSass().on('error', compileSass.logError))
	.pipe(dest('./dist/static/css'))
	//console.log("Hello from Gulp")
}

const devWatch = () => {
	watch('./static/sass/**/*.scss', bundleSass)
}
exports.bundleSass = bundleSass;
exports.devWatch = devWatch;