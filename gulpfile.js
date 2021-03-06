/* path to file: ./storefront-child-theme-master
*
*  description: super simple gulp file. Only handle scss compiler and minify.
*  ------------------------------------------------------------------------------------
*/


var gulp 			= require('gulp')
		sass 			= require('gulp-sass')
		cssnano 	= require('gulp-cssnano')
		plumber 	= require('gulp-plumber');

/* task, sass
*/
gulp.task('sass', function(){
	return gulp.src('assets/sass/**/*.scss')
		.pipe(plumber())
    .pipe(sass())
    .pipe(gulp.dest(''))
});

/* task, watch changes to sass file
*/
gulp.task('default', function(){
  gulp.watch('assets/sass/**/*.scss', ['sass']); 
})

/* task, minify scss
*/
gulp.task('build', function() {
	return gulp.src('style.css')
		.pipe(cssnano())
		.pipe(gulp.dest(''));
});
