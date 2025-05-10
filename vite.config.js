import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/welcome.css', 'resources/css/user.css', 'resources/css/serie.css', 'resources/css/form.css', 'resources/css/responsive-table.css', 'resources/css/show.css', 'resources/css/video.css', 'resources/css/page.css', 'resources/css/global.css', 'resources/css/header_footer.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
