# Belajar Laravel Passport Gess

    Cara jalanin nya gini ges bagi yang belum tau:

- docker build -t app .
- docker-compose up
- seting env nya ges
- docker exec -it app bash
- php artisan migrate
- php artisan passport:install --uuids
- php artisan db:seed --class=DatabaseSeeder

# Catatan rizki

- Macros berguna untuk mengatur semua respon json yang di atur app provider service
- Many to many
- one to many
- Service Container
