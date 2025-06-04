# SillyBooks

SillyBooks - это веб-приложение для чтения и управления книгами, разработанное на Laravel.

## Установка

1. Клонируйте репозиторий:
\`\`\`bash
git clone https://github.com/yourusername/sillybooks.git
cd sillybooks
\`\`\`

2. Установите зависимости:
\`\`\`bash
composer install
npm install
\`\`\`

3. Скопируйте файл .env.example в .env и настройте подключение к базе данных:
\`\`\`bash
cp .env.example .env
\`\`\`

4. Сгенерируйте ключ приложения:
\`\`\`bash
php artisan key:generate
\`\`\`

5. Запустите миграции и заполните базу данных:
\`\`\`bash
php artisan migrate --seed
\`\`\`

6. Создайте символическую ссылку для хранения изображений:
\`\`\`bash
php artisan storage:link
\`\`\`

7. Скомпилируйте ресурсы:
\`\`\`bash
npm run dev
\`\`\`

8. Запустите сервер:
\`\`\`bash
php artisan serve
\`\`\`

## Структура проекта

- `app/Models` - Модели приложения (Book, Author, User, Review, Genre, UserBook)
- `app/Http/Controllers` - Контроллеры
- `database/migrations` - Миграции базы данных
- `database/seeders` - Сидеры для заполнения базы данных
- `resources/views` - Blade шаблоны
- `public/images` - Изображения (книги, авторы, аватары)

## Функциональность

- Просмотр списка книг
- Просмотр информации о книге
- Просмотр информации об авторе
- Управление личной библиотекой
- Отслеживание прогресса чтения
- Написание отзывов и оценок
- Рекомендации книг

## Учетные данные для входа

- Email: admin@sillybooks.com
- Пароль: password

## Лицензия

MIT
