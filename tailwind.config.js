/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", "./**/*.{html,js}"],
  theme: {
    extend: {},
    colors: {
      primary: "#144D5F",
      secondary: "#E29441",
      white: "#ffffff",
    },
    fontFamily: {
      Century: ["Century Gothic"],
    },
    fontSize: {
      sm: "0.8rem",
      base: "1rem",
      xl: "1.25rem",
      two_xl: "1.563rem",
      three_xl: "1.953rem",

    },
  },
  plugins: [],
};
