var gulp		= require('gulp');
var sass		= require('gulp-sass');

gulp.task('css', function(){
	gulp.src('./styles/sass/wp-pesticide.scss')
		.pipe(sass())
		.pipe(gulp.dest('./styles/css'));
});

gulp.task('default', ['css']);