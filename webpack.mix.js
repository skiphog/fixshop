const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', '/css').options({ processCssUrls: false });

mix
  .js('resources/js/app.js', '/js/app.js')
  .js('resources/js/catalog.js', '/js/catalog.js')
  .js('resources/js/cart.js', '/js/cart.js');

