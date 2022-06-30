const mix = require('laravel-mix');

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
    .js('resources/js/backend.js', 'public/js')
    .js('resources/js/frontend.js', 'public/js')
    .vue()
    .postCss('resources/css/backend.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .postCss('resources/css/frontend.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .alias({
        '@': 'resources/js',
    });

// mix.options({
//    hmrOptions: {
//        host: 'laravel.test',
//        port: 8585
//    }
// });
//
// mix.webpackConfig({
//     devServer: {
//         host: '0.0.0.0',
//         port: 8080
//     }
// })

if (mix.inProduction()) {
    mix.version();
}
