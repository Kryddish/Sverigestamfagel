const

	// Development URL (FILL THIS)
	proxy = 'http://localhost/sverigestamfagel',

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

	// Get main project paths
	root = '/',
	src = root + 'src/',
	dist = root + 'dist/',

	// Get source code paths
	scss = src + 'sass/',
	js = src + 'js/',
	img = src + 'img/';


// CSS via Sass and Autoprefixer
gulp.task('sass', () => {
	pump([
		gulp.src(scss + 'style.scss'),
		sourcemaps.init(),
		sass({
			outputStyle: 'expanded'
		}).on('error', sass.logError),
		postcss([
			autoprefixer({
				browsers: ['last 5 versions'],
				cascade: false
			}),
			cssnano()
		]),
		sourcemaps.write(scss + 'maps'),
		gulp.dest(root)
	]);
});


// Optimize images through gulp-image
gulp.task('img', cb => {
	pump([
			gulp.src(img + '**/*.{jpg,JPG,jpeg,JPEG,png,PNG}'),
			image(),
			gulp.dest(dist + 'img/')
		],
		cb
	);
});


// Javascript
gulp.task('js', () => {
	pump([
		gulp.src([(js + '*.js'), ('!' + js + 'customizer.js')]),
		jshint(),
		jshint.reporter(stylish),
		uglify(),
		concat('bundle.js'),
		gulp.dest(dist + 'js/')
	]);
});


// Watch everything
gulp.task('watch', () => {
	browserSync.init({
		open: 'external',
		proxy,
		port: 3000
	});
	gulp.watch(root + '**/*.scss', ['sass']);
	gulp.watch(js + '**/*.js', ['js']);
	gulp.watch(img + '**/*.{jpg,JPG,jpeg,JPEG,png,PNG}', ['img']);
	gulp.watch(root + '**/*.{js,scss,php}').on('change', browserSync.reload);
});


// Build
gulp.task('build', ['js', 'sass', 'img']);


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', ['watch']);
