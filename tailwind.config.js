/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./database/seeders/DatabaseSeeder.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        elsie : ['Elsie'],
      }
    },
  },
  plugins: [],
}

