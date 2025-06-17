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
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.8s ease-out both',
                'fade-in-left': 'fadeInLeft 0.8s ease-out both',
                'fade-in-right': 'fadeInRight 0.8s ease-out both',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                fadeInLeft: {
                    '0%': { opacity: 0, transform: 'translateX(-20px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
                fadeInRight: {
                    '0%': { opacity: 0, transform: 'translateX(20px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
