
  //----------------//
 // GULP.JS CONFIG //
//----------------//

'use strict';

const
  // theme name
  theme = 'wp-my-website/', // change name here

  // source and build folders
  wp = {
    src         : 'site/**',
    build       : '../online/' + theme,
  },

  dir = {
    src         : 'src/',
    build       : wp.build + 'wp-content/themes/' + theme
  },

  // Gulp and plugins
  gulp          = require('gulp'),
  gutil         = require('gulp-util'),
  newer         = require('gulp-newer'),
  imagemin      = require('gulp-imagemin'),
  sass          = require('gulp-sass'),
  postcss       = require('gulp-postcss'),
  deporder      = require('gulp-deporder'),
  concat        = require('gulp-concat'),
  stripdebug    = require('gulp-strip-debug'),
  uglify        = require('gulp-uglify')
;

// Browser-sync
var browsersync = false;


  //--------------------//
 // WORDPRESS SETTINGS //
//--------------------//

// htaccess and plugins
const
  plugins = {
    src           : 'src/plugins/**',
    build         : wp.build + 'wp-content/plugins/'
  }
;

// build plugins
gulp.task('plugins', () => {

  return gulp.src(plugins.src)
    .pipe(newer(plugins.build))
    .pipe(gulp.dest(plugins.build));

});

// build wp folders
gulp.task('build-wordpress', () => {

  return gulp.src(wp.src)
    .pipe(newer(wp.build))
    .pipe(gulp.dest(wp.build));

});

gulp.task('wp', ['build-wordpress', 'plugins']);

  //--------------//
 // PHP SETTINGS //
//--------------//


const php = {
  src           : dir.src + 'template/**/*.php',
  build         : dir.build
};

// copy PHP files
gulp.task('php', () => {
  
  return gulp.src(php.src)
    .pipe(newer(php.build))
    .pipe(gulp.dest(php.build));

});


  //----------------//
 // IMAGE SETTINGS //
//----------------//


const images = {
  src         : dir.src + 'img/**/*',
  build       : dir.build + 'img/'
};

// image processing
gulp.task('images', () => {
  
  return gulp.src(images.src)
    .pipe(newer(images.build))
    .pipe(imagemin())
    .pipe(gulp.dest(images.build));

});


  //--------------//
 // CSS SETTINGS //
//--------------//


var css = {
  src         : dir.src + 'scss/**/*',
  build       : dir.build + 'css/',
  sassOpts: {
    outputStyle     : 'nested',
    imagePath       : images.build,
    precision       : 3,
    errLogToConsole : true
  },
  processors: [
    require('postcss-assets')({
      loadPaths: ['images/'],
      basePath: dir.build,
      baseUrl: '../themes/' + theme
    }),
    require('autoprefixer')({
      browsers: ['last 2 versions', '> 2%']
    }),
    require('css-mqpacker'),
    require('cssnano')({
      zindex: false
    })
  ]
};

// CSS processing
gulp.task('css', ['images'], () => {
  
  return gulp.src(css.src)
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(gulp.dest(css.build))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());

});


  //------------//
 // JAVASCRIPT //
//------------//


const js = {
  src         : dir.src + 'js/**/*',
  build       : dir.build + 'js/',
  filename    : 'scripts.js'
};

// JavaScript processing
gulp.task('js', () => {

  return gulp.src(js.src)
    .pipe(deporder())
    .pipe(concat(js.filename)) // compress js files
    // .pipe(stripdebug()) // strips debugging and console logs
    .pipe(uglify())
    .pipe(gulp.dest(js.build))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());

});


  //---------------//
 // MISC SETTINGS //
//---------------//


const
  style = {
    src         : dir.src + 'template/*.css',
    build       : dir.build  
  },

  fonts = {
    src           : dir.src + 'fonts/**/*',
    build         : dir.build + '/css/fonts/'
  },

  screenshot = {
    src         : dir.src + 'template/screenshot.png',
    build       : dir.build
  },

  vendor = {
    src         : dir.src + 'vendor/**/*',
    build       : dir.build + 'vendor/'
  };

// copy style file
gulp.task('style', () => {

  return gulp.src(style.src)
    .pipe(newer(style.build))
    .pipe(gulp.dest(style.build));

});

// copy screenshot file
gulp.task('screenshot', () => { 

  return gulp.src(screenshot.src)
    .pipe(newer(screenshot.build))
    .pipe(imagemin())
    .pipe(gulp.dest(screenshot.build));

});

// copy font files
gulp.task('fonts', () => {
  
  return gulp.src(fonts.src)
    .pipe(newer(fonts.build))
    .pipe(gulp.dest(fonts.build));

});

// copy vendor files
gulp.task('vendor', () => {
  
  return gulp.src(vendor.src)
    .pipe(newer(vendor.build))
    .pipe(gulp.dest(vendor.build));

});


  //--------------//
 // BROWSER SYNC //
//--------------//


const syncOpts = {
  proxy       : 'localhost',
  files       : dir.build + '**/*',
  open        : false,
  notify      : false,
  ghostMode   : false,
  ui: {
    port: 8001
  }
};

// browser-sync
gulp.task('browsersync', () => {

  if (browsersync === false) {
    browsersync = require('browser-sync').create();
    browsersync.init(syncOpts);
  }
  
});


  //------------------------//
 // WATCH FOR FILE CHANGES //
//------------------------//


gulp.task('watch', ['browsersync'], () => {

  // PHP changes
  gulp.watch(php.src, ['php'], browsersync ? browsersync.reload : {});
  // CSS changes
  gulp.watch(css.src, ['css']);
  // JavaScript main changes
  gulp.watch(js.src, ['js']);
  // vendor changes
  gulp.watch(vendor.src, ['vendor']);
  // image changes
  gulp.watch(images.src, ['images']);
  // fonts changes
  gulp.watch(fonts.src, ['fonts']);
  // style changes
  gulp.watch(style.src, ['style']);

});


  //------------//
 // BULK TASKS //
//------------//


// run all tasks
gulp.task('build',
  ['php', 'css', 'js', 'style', 'fonts', 'vendor', 'screenshot', 'wp']
);

// default task
gulp.task('default', ['build', 'watch']);