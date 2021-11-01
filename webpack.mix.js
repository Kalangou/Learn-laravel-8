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
 | node -v
 | npm -v 
 | npm install
 | npm run dev
 | Recompile les modifications: npm run watch
 | npm install -D tailwindcss
 | npx tailwindcss init
 | Copie des lignes vers res/css/app/css
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
 | Recompilation
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);