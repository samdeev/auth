/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme.js');

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        fontFamily: {
            'sans': "Figtree"
        }
    },
  },
  plugins: [
      require('@tailwindcss/typography')
  ],
}

