/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {},
  },
  plugins: [],
}

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
      colors: {
        first:'#36436F',  
        second: '#24282B',
        third: '#F7E1BC',
        fourth: '#A7D0D6', 
        fifth: '#B6000F'
      }
  },
  plugins: [
      require('flowbite/plugin')

  ],
}