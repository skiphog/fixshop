const mix = require('laravel-mix');

mix
  .js('resources/js/app.js', '/js/app.js')
  .sass('resources/sass/app.scss', '/css')
  .options({ processCssUrls: false });