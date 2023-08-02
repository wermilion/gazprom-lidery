import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans,],
                'HeliosCond': ['HeliosCond', 'HeliosCondBlack']
            },
            colors: {
                'gazprom': {
                    300: '#29aeff',
                    400: '#0079fa',
                    500: '#0079c2',
                    600: '#064677'
                },
                'main_gray': {
                    500: '#f3f4f6'
                }
            },
        },
    },

    plugins: [forms],
};
