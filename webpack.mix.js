const mix = require('laravel-mix');

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
    .sass('resources/sass/app.scss', 'public/css')
	.combine([
		'public/css/app.css',
		'resources/sass/bootstrapValidator4/bootstrapValidator.css',
		'resources/sass/jquery-ui-bootstrap/jquery-ui-1.10.0.custom.css',
		'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
		'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css',
		'node_modules/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.css',
		'node_modules/@claviska/jquery-minicolors/jquery.minicolors.css',
		'node_modules/fullcalendar/dist/fullcalendar.css',
		'node_modules/chart.js/dist/chart.css',
		'node_modules/animate.css/animate.css',
		'node_modules/jarallax/dist/jarallax.css',
		'resources/js/jquery-ui/css/jquery-ui.css',
		// 'node_modules/jquery-ui/themes/base/all.css',
		// 'resources/js/jquery-ui/css/jquery-ui.structure.css',
		// 'resources/js/jquery-ui/css/jquery-ui.themes.css',
		'resources/sass/animate/animate.css',

		// for mobirise
		// from npm
		// none npm
		'resources/sass/web/gdpr-plugin/gdpr-styles.css',

		], 'public/css/app.css')
	// .setPublicPath('public/)
	.sourceMaps()
	// .autoload({
	// 	jquery: ['$', 'window.jQuery', 'jQuery'],
	// })
	// .webpackConfig({
	// 	resolve: {
	// 		alias: {
	// 			jquery: "jquery/dist/jquery"
	// 		}
	// 	}
	// })
;
