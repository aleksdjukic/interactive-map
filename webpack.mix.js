const mix = require('laravel-mix');
var LiveReloadPlugin = require('webpack-livereload-plugin');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.webpackConfig({
    resolve: {
        fallback: {
            fs: false
        }
    }
});

// mix.webpackConfig({
//     plugins: [
//         new LiveReloadPlugin()
//     ]
// });

mix.js([
    'resources/js/app.js'
], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .version()
    .extract();

// copy language files
mix.copy('resources/i18n', 'public/i18n');
mix.copy('resources/js/canvasjs.min.js', 'public/js/canvasjs.min.js');
