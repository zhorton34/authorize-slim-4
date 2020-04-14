const mix = require('laravel-mix')
const path = require('path')

/*
 * Mix asset manager
 * ~~~~~~~~~~~~~~~~~
 * Provides fluent api for hooking into webpack build steps
 */

mix.js('resources/js/main.js', 'public/js')
	.webpackConfig({
		resolve: {
			alias: {
				'@Component': path.resolve(__dirname, 'resources/js/components')
			}
		}
	})
