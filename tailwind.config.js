const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            green: colors.emerald,
            violet: colors.violet,
            gray: colors.trueGray,
            indigo: colors.indigo,
            pink: colors.pink,
            red: colors.rose,
            yellow: colors.amber,
        },
        extend: {},
    },
    variants: {
        extend: {
            filter: ['hover', 'focus'],
        },
    },
    plugins: [],
}
