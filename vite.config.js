import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes/mygserv-evarioo/css/app.css",
                "themes/mygserv-evarioo/js/app.js",
                "themes/mygserv-evarioo/css/admin.css",
                "themes/mygserv-evarioo/js/admin.js"
            ],
            buildDirectory: "mygserv-evarioo/",
        }),
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    css: {
        postcss: {
            plugins: [
                require("tailwindcss")({
                    config: path.resolve(__dirname, "tailwind.config.js"),
                }),
            ],
        },
    },
});
