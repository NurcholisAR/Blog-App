const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");
module.exports = {
    content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
    },
    variants: {
        backgroundColor: ({ after }) => after(["invalid"]),
    },
    plugins: [
        require("flowbite/plugin"),
        plugin(function ({ addVariant, e }) {
            addVariant("invalid", ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`invalid${separator}${className}`)}:invalid`;
                });
            });
        }),
    ],
};
