"# base_laravel_roles" 


composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve