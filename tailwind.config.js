const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Sarabun', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'web': {
                    500: '#f43f5e',
                    600: '#e11d48',
                    700: '#be123c',
                    800: '#9f1239',
                    900: '#881337',
                },
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
        require('@tailwindcss/typography'),
    ],
};
