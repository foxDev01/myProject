# myProject

Веб-приложение на Laravel 13 (PHP 8.5): проекты, категории, теги, комментарии и лайки, с публичной частью и админ-панелью.

## Требования

- PHP 8.5
- Composer
- Node.js и npm (для сборки фронтенда через Vite)

## Установка

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
```

## Запуск

```bash
php artisan serve
```

## License

Проект распространяется под лицензией [MIT](LICENSE).
