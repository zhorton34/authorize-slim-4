const mix = require('laravel-mix')
const path =require('path')

const tailwindcss = require('tailwindcss')

/**
 *  Mix Asset Manager
 * ------------------
 * Laravel Mix is a wrapper around webpack for easy hook int into
 * the webpack build steps/life cycle
 */

mix.js('resources/js/main.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	.options({
		processCssUrls: false,
		postCss: [ tailwindcss('./tailwind.config.js')]
	})
