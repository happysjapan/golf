var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var webserver = require('gulp-webserver'); // ローカルサーバ起動


var sassPaths = [
  'bower_components/foundation-sites/scss',
  'bower_components/motion-ui/src'
];

//ローカルサーバー
gulp.task('webserver', function(){
  gulp.src('./') // ルート・ディレクトリ
    .pipe(webserver({
      livereload: true,
      directoryListing: false,
      open: true,
      port: 8000
    }));
});

gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('css'));
});


gulp.task('default', ['webserver','sass'], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
