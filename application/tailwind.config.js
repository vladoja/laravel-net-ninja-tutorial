/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./app/View/Components/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                brand: "#1e40af",
            },
        },
    },
    plugins: [
        // Note: official plugins require Node packages; without Node, leave this empty.
        // require('@tailwindcss/forms'),
        // require('@tailwindcss/typography'),
    ],
};
