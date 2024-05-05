const defaultTheme = require("tailwindcss/defaultTheme");
const tailwindForms = require("@tailwindcss/forms");
const daisyUi = require("daisyui");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            backgroundImage: {
                auth: "url('src/image/blur.png')",
            },
            colors: {
                primary: {
                    first: "#368B8B",
                    second: "#1E1E1E",
                },
            },
            fontFamily: {
                body: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                sans: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                tienne: ["Tienne", "serif"],
                alata: ["Alata", "sans-serif"],
                inter: ["Inter", "sans-serif"],
            }
        },
    },
    plugins: [tailwindForms, daisyUi],
    darkMode: "class",
    daisyui: {
        themes: ["light", "dark", "cupcake"],
    },
};
