/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
],
  theme: {
    extend: {
      boxShadow: {
        "custom": '0px 4px 20px 0px rgba(0, 0, 0, 0.25)'
      },
      colors : {
        "dark" : "#141414",
        "grays" : "#565656"
      },
      borderColor: {
        "grays" : "#B6B6B6"
  }
    },
  },
  plugins: [],
}

