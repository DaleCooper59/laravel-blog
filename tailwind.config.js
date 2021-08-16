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
        boxShadow: {
            customShadow: '10px 10px #92b4a7',
            shadowCard:' 0px 10px 13px -7px #000000, 5px 5px 7px 2px rgba(0,0,0,0.25)',
            shadowArticle: '0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)',
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
            tea_green: {
                light: '#',
                DEFAULT: '#d1f0b1',
                dark: '#',
            },
            Laurel_green: {
                light: '#',
                DEFAULT: '#b6cb9e',
                dark: '#',
            },
            Cambridge_blue: {
                darkest: '#',
                dark: '#',
                DEFAULT: '#92b4a7',
                light: '#',
                lightest: '#',
            },
            Taupe_grey: {
                darkest: '#',
                dark: '#',
                DEFAULT: '#8c8a93',
                light: '#',
                lightest: '#',
            },
            Old_lavender: {
                darkest: '#',
                dark: '#',
                DEFAULT: '#81667a',
                light: '#',
                lightest: '#',
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
}
