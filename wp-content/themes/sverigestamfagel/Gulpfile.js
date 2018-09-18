const

	// Development URL (FILL THIS)
	proxy = 'sverigestamfagel.local',

	gulp = require('gulp'),

	// Prepare and optimize code etc
	autoprefixer = require('autoprefixer'),
	browserSync = require('browser-sync').create(),
	image = require('gulp-image'),
	jshint = require('gulp-jshint'),
	stylish = require('jshint-stylish'),
	postcss = require('gulp-postcss'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	concat = require('gulp-concat'),
	pump = require('pump'),
	uglify = require('gulp-uglify'),
	cssnano = require('cssnano'),
	notify = require("gulp-notify"),
	clean = require('gulp-clean'),

	// Get main project paths
	root = './',
	src = root + 'src/',
	dist = root + 'dist/',

	// Get source code paths
	scss = src + 'sass/',
	js = src + 'js/',
	img = src + 'img/';

// Clean dist folder
gulp.task('clean', cb => {
	pump([
		gulp.src('dist', {
			read: false,
			allowEmpty: true
		}),
		clean().on("error", notify.onError(error => {
			return "Message to the notifier: " + error.message;
		}))
	], cb);
});

// CSS via Sass and Autoprefixer
gulp.task('sass', cb => {
	pump([
		gulp.src(scss + 'style.scss'),
		sourcemaps.init(),
		sass({
			outputStyle: 'expanded'
		}).on('error', notify.onError(error => {
			return "Message to the notifier: " + error.message;
		})),
		postcss([
			autoprefixer({
				browsers: ['last 5 versions'],
				cascade: false
			}),
			cssnano()
		]),
		sourcemaps.write(scss + 'maps'),
		gulp.dest(root)
	], cb);
});


// Optimize images through gulp-image
gulp.task('img', cb => {
	pump([
		gulp.src(img + '**/*.{jpg,JPG,jpeg,JPEG,png,PNG}'),
		image().on('error', notify.onError(error => {
			return "Message to the notifier: " + error.message;
		})),
		gulp.dest(dist + 'img/')
	], cb);
});


// Javascript
gulp.task('js', cb => {
	pump([
		gulp.src([(js + '*.js'), ('!' + js + 'customizer.js')]),
		jshint(),
		jshint.reporter(stylish),
		notify(function (file) {
			if (file.jshint.success) {
				return false;
			}

			var errors = file.jshint.results.map(function (data) {
				if (data.error) {
					return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
				}
			}).join("\n");
			return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
		}),
		uglify(),
		concat('bundle.js'),
		gulp.dest(dist + 'js/')
	], cb);
});


// Watch everything
gulp.task('watch', () => {
	browserSync.init({
		proxy,
		port: 3000
	});
	gulp.watch(root + '**/*.scss', gulp.parallel('sass'));
	gulp.watch(js + '**/*.js', gulp.parallel('js'));
	gulp.watch(img + '**/*.{jpg,JPG,jpeg,JPEG,png,PNG}', gulp.parallel('img'));
	gulp.watch(root + '**/*.{js,scss,php}').on('change', browserSync.reload);
});


// Build
gulp.task('build', gulp.series('clean', gulp.parallel('js', 'sass', 'img')));


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', gulp.series('clean', 'build', 'watch'));