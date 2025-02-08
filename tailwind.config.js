import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
    daisyui: {
        themes: [
            {
                mytheme: {
                    // Custom theme name
                    primary: "#4CAF50", // Your custom primary color
                    secondary: "#FF9800", // Your custom secondary color
                    accent: "#FFC107", // Custom accent color
                    neutral: "#FAFAFA", // Custom neutral color
                    "base-100": "#FFFFFF", // Background color
                    info: "#2196F3", // Info color
                    success: "#4CAF50", // Success color
                    warning: "#FFEB3B", // Warning color
                    error: "#F44336", // Error color
                },
            },
        ],
    },
};
