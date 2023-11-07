/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      aspectRatio: {
        '3/5': '3 / 5',
      }
    },
  },
  plugins: [],
}

