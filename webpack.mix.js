const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/js/default.js", "public/js")
  .js("resources/js/app.js", "public/js")
  .js("resources/js/create-client.js", "public/js")
  .sass("resources/css/default.scss", "public/css")
  .sass("resources/css/app.scss", "public/css")
  .sass("resources/css/auth.scss", "public/css")
  .sass("resources/css/create-client.scss", "public/css");
