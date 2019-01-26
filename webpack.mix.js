const mix = require('laravel-mix')
const webpack = require('webpack')

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
   devtool: 'source-map',
   plugins: [
    //  new webpack.DefinePlugin({
    //  })
   ]
}).sourceMaps()


mix.browserSync('http://customer-chat-for-facebook-site.test/')

mix.js('assets/js/admin.js', 'dist/js')
	.js('assets/js/public.js', 'dist/js')
	.js('assets/js/settings.js', 'dist/js')
	.sass('assets/sass/admin.scss', 'dist/css')
	.sass('assets/sass/public.scss', 'dist/css')
	.sass('assets/sass/settings.scss', 'dist/css')
	.sourceMaps()
