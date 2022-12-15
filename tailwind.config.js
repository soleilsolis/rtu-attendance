/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  important: true,
  theme: {
    extend: {
      screens: {
          'print': { 'raw': 'print' },
      }
  }
  },
  plugins: [],
}