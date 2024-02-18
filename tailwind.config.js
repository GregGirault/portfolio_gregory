/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./Accueil_portfolio/**/*.php",
    "./BackOffice/**/*.php",
    "./Connexion/**/*.php",
    // Ajoutez tous les autres dossiers où vous avez des fichiers HTML ou PHP
    // qui utilisent les classes Tailwind CSS
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
  ],
}


