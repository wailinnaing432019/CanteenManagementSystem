import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'xsm': '300px',
                'phonesm': '360px',
                'phone': '414px',
                'tabletssm': '490px',
                'tabletsm': '560px',
                'tablet': '601px',
                'laptopssm': '930px',
                'laptopxsm': '1000px',
                'lglaptop':'1200px',
                'laptopsm': '1280px',
                'largest':'1340px',
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
