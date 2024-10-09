1. Склонировать проект

2. cp .env.example .env
3. Зайти в папку выполнить docker-compose up -d

4. docker exec -it laravel_php composer install
5. docker exec -it laravel_php php artisan key:generate --ansi
6. docker exec -it laravel_php php artisan config:cache
7. docker exec -it laravel_php php artisan migrate

