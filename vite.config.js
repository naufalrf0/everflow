import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    build: {
        manifest: true,
        outDir: "public/build/",
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: "css/[name].min.css",
                entryFileNames: "js/main.js",
            },
            inlineDynamicImports: true,
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss",
                "resources/scss/bootstrap.scss",
                "resources/scss/icons.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: "resources/fonts",
                    dest: "",
                },
                {
                    src: "resources/images",
                    dest: "",
                },
                {
                    src: "resources/libs",
                    dest: "",
                },
            ],
        }),
    ],
});
