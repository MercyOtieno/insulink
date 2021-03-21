const mix = require('laravel-mix');
let glob = require("glob");
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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.options({
    processCssUrls: false,
    clearConsole: true,
    terser: {
        extractComments: true,
    },
});

// Run all webpack.mix.js in app
glob.sync('./platform/**/**/webpack.mix.js').forEach(item => require(item));

// Run only for a package
// require('./platform/packages/[package]/webpack.mix.js');

// Run only for a plugin
// require('./platform/plugins/[plugin]/webpack.mix.js');

// Run only for a theme
// require('./platform/themes/[theme]/webpack.mix.js');