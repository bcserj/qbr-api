## About Project

1. git clone repo
2. composer install
3. change folder permissions if necessary
4. cp .env.local to .env
5. add DB connection data in .env
6. php artisan key:generate
7. php artisan migrate
8. php artisan passport:install
9. php artisan db:seed
10. php artisan l5-swagger:generate

will be created test user. You need to use his data or create new user (check User model).

