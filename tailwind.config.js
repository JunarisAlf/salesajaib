/** @type {import('tailwindcss').Config} */
module.exports = {
    prefix: 'tw-',
    corePlugins: {
        preflight: false,
    },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
