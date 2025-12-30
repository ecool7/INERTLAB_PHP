# Inertlab Site (Laravel)

Версия сайта Inertlab на Laravel PHP.

## Установка

1. Установите зависимости:
```bash
composer install
```

2. Скопируйте `.env.example` в `.env`:
```bash
cp .env.example .env
```

3. Сгенерируйте ключ приложения:
```bash
php artisan key:generate
```

4. Настройте `.env` файл:
   - Укажите настройки базы данных (если используется)
   - Настройте MAIL_* переменные для отправки писем через Gmail

5. Запустите сервер разработки:
```bash
php artisan serve
```

## Структура

- `app/Http/Controllers/` - Контроллеры
- `app/Mail/` - Классы для отправки email
- `resources/views/` - Blade шаблоны
- `routes/web.php` - Маршруты
- `public/` - Публичные файлы (CSS, JS, изображения)

## Особенности

- Полная поддержка 3D моделей через model-viewer
- Отправка email через Laravel Mail
- Валидация форм
- Поддержка кириллических URL
