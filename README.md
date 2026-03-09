## 環境構築手順

```bash
git clone https://github.com/hayakawa391/free-market-app.git
cd free-market-app

# 環境ファイル作成
cp src/.env.example src/.env

# コンテナ起動
docker compose up -d --build

# ライブラリインストール
docker compose exec php composer install

# APP_KEY生成
docker compose exec php php artisan key:generate

# マイグレーション実行
docker compose exec php php artisan migrate
compose exec php bash
composer install
php artisan key:generate
php artisan migrate --seed
