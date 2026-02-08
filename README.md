# Free Market App

## 環境構築手順

```bash
git clone https://github.com/hayakawa391/free-market-app.git
cd free-market-app
cp src/.env.example src/.env
docker-compose up -d --build
docker-compose exec php bash
composer install
php artisan key:generate
php artisan migrate --seed
