
/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


var gulp = require('gulp');


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


var concat = require('gulp-concat');

var uglify = require('gulp-uglify');

// var rename = require('gulp-rename');

var sass = require('gulp-sass');

var autoprefixer = require('gulp-autoprefixer');

var imagemin = require('gulp-imagemin');

var cache = require('gulp-cache');

var notify = require('gulp-notify');

var livereload = require('gulp-livereload');


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('js', function() {

	return gulp.src([

		'dev/js/modernizr.js',
		'dev/js/picturefill.js',
		'dev/js/flexslider.js',
		'dev/js/isotope.js',
		'dev/js/images-loaded.js',
		'dev/js/select.js',
		'dev/js/autosize.js',
		// 'dev/js/fittext.js',
		'dev/js/scroll.js',
		'dev/js/functions.js'

	])

	.pipe(concat('scripts.js'))

	// .pipe(rename({suffix: '.min'}))

	.pipe(uglify())

	.pipe(gulp.dest('dist/public/wp-content/themes/reakt/a/js'));

});


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('sass', function() {

	return gulp.src('dev/scss/**/*.scss')

	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))

	.pipe(autoprefixer({

		browsers: ['last 2 versions'],
		cascade: false

	}))

	.pipe(gulp.dest('dist/public/wp-content/themes/reakt/a/css'))

	.pipe(livereload());

});


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('img', function() {

	return gulp.src('dev/img/**/*')

	.pipe(imagemin({

		optimizationLevel: 5,
		progressive: true,
		interlaced: true

	}))

	.pipe(gulp.dest('dist/public/wp-content/themes/reakt/a/img'));

});


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('fonts', function() {

	return gulp.src('dev/fonts/**/*')

	.pipe(gulp.dest('dist/public/wp-content/themes/reakt/a/fonts'));

});


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('watch', function() {

	livereload.listen();

	// Notes...

	gulp.watch('dist/public/wp-content/themes/reakt/**/*.php').on('change', function(file) {

		livereload.changed(file.path);

	});

	// Notes...

	gulp.watch('dev/js/*.js', ['js']);

	// Notes...

	gulp.watch('dev/scss/**/*.scss', ['sass']);

	// Notes...

	gulp.watch('dev/img/**/*', ['img']);

	// Notes...

	gulp.watch('dev/fonts/**/*', ['fonts']);

});


/*-------------------------------------------
	Title
-------------------------------------------*/

// Notes...


gulp.task('default', ['js', 'sass', 'img', 'fonts', 'watch']);
