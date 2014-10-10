// Gulp
var gulp = require('gulp');

	// Plugins
	var sass = require('gulp-sass'),
	    autoprefixer = require('gulp-autoprefixer'),
	    minifycss = require('gulp-minify-css'),
	    concat = require('gulp-concat'),
	    notify = require('gulp-notify'),
	    clean = require('gulp-clean'),
	    rename = require('gulp-rename');
	    livereload = require('gulp-livereload');
	    uglify = require('gulp-uglify');
	    imagemin = require('gulp-imagemin');
	    spritesmith = require('gulp.spritesmith');
    
	// Paths
	var paths = {
		scss: 'assets/sass/**/*.scss',
		scripts: 'assets/scripts/partials/**/*.js',
		images: 'assets/img/**'
	};    
    
	// CSS
	gulp.task('styles', function() {
		return gulp.src(paths.scss)
			.pipe(sass({ style: 'expanded' }))
			.pipe(autoprefixer('last 1 version'))
			.pipe(minifycss())
			.pipe(gulp.dest('assets/css'))
			.pipe(notify({ message: 'Barebones styles compiled!' }));
	});
	
	// JS
	gulp.task('scripts', function() {
		return gulp.src(paths.scripts)
		.pipe(concat('scripts.js'))
	    .pipe(uglify())
	    .pipe(rename({suffix: '.min'}))
	    .pipe(gulp.dest('assets/scripts'))
		.pipe(notify({ message: 'Barebones scripts uglified!' }));
	});
	
	// Images
	gulp.task('images', function() {
		return gulp.src(paths.images)
		.pipe(imagemin())
		.pipe(gulp.dest('assets/img'));
	});
	
	// Image Sprite
	gulp.task('sprite', function () {
	  var spriteData = gulp.src(paths.images+'/sprite-images/*.png').pipe(spritesmith({
	    imgName: 'icon-sprite.png',
	    cssName: 'partials/_sprite.scss',
	    cssFormat: 'css',
	    imgPath: '../img/icon-sprite.png',
	    cssOpts: {
	      cssClass: function (item) {
	        return '.' + item.name;
	      }
	    }
	  }));
	  spriteData.img.pipe(gulp.dest('assets/img/'));
	  spriteData.css.pipe(gulp.dest('assets/sass/'));
	});
	
	//Clean
	gulp.task('clean', function() {
	  return gulp.src(['assets/css'], {read: false})
	    .pipe(clean());
	});	
	
	// Default task
	gulp.task('default', ['clean'], function() {
		gulp.start('styles');
	});
	
	// Watch
	gulp.task('watch', function() {
		
		// Watch .scss files
		gulp.watch(paths.scss, ['styles']);
		
		//Watch .js files
		gulp.watch (paths.scripts, ['scripts']);
		
	});
	
	