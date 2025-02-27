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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                oswald: ['Oswald', 'serif'],
            },
            colors: {
                'cag_green': "#58b947",
                'cag_yellow': "#f7ec16",
                'cag_light_orange': '#ffcb05',
                'cag_dark_orange': "#f58220",
                'cag_light_gray': "#efefef",
                'cag_gray': "#919191",
                'cag_dark_gray': "#595959",
                'cag_white': "#ffffff",
                'cag_dark': '#000000'
            }
        },
    },

    plugins: [forms],
};
