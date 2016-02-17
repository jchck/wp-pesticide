var gulp		= require('gulp');
var sass		= require('gulp-sass');

gulp.task('outline', function(){
	gulp.src('./styles/sass/wp-pesticide-outline.scss')
		.pipe(sass())
		.pipe(gulp.dest('./styles/css'));
});

gulp.task('depth', function(){
	gulp.src('./styles/sass/wp-pesticide-depth.scss')
		.pipe(sass())
		.pipe(gulp.dest('./styles/css'));
});

gulp.task('default', ['outline', 'depth']);