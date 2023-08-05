- tạo app.scss trong thư mục scss trong thư mục resource
- trong file vite.config.js

    plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/scss/app.scss' , 'resources/js/app.js'],
                refresh: true,
            }),
        ],

-terminal
 
    npm install 
    npm add -D sass
    npm run dev
