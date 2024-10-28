import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/Roletype.js',
                'resources/scss/CreateAccount/RegisterForm.scss',
                'resources/scss/Loginform.scss',
                'resources/scss/Navigation.scss',
                'resources/scss/Base.scss',
                'resources/scss/CreateAccount/Password.scss',
                'resources/scss/CreateAccount/Roletype.scss',
                'resources/scss/GetInTouch.scss',
                'resources/scss/Footer.scss'
            ],
            refresh: true,
        }),
    ],
});
