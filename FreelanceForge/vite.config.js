import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/scss/RegisterForm.scss',
                'resources/scss/Loginform.scss',
                'resources/scss/Navigation.scss',
                'resources/scss/Base.scss',
                'resources/scss/Password.scss',
                'resources/scss/Roletype.scss'
            ],
            refresh: true,
        }),
    ],
});
