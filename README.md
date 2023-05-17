# Belajar Laravel Passport Gess

    Cara jalanin nya gini ges bagi yang belum tau:

- docker build -t app .
- docker-compose up
- seting env nya ges
- docker exec -it app bash
- php artisan migrate
- php artisan passport:install --uuids
- php artisan db:seed --class=DatabaseSeeder
