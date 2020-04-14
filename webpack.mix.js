const mix = require('laravel-mix')
const path =require('path')

/**
 *  Mix Asset Manager
 * ------------------
 * Laravel Mix is a wrapper around webpack for easy hook int into
 * the webpack build steps/life cycle
 */

mix.js('resources/js/main.js', 'public/js')
