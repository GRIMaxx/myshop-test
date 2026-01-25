Для сбора и обработки заявок (24.01.2026)

---

# Сборка виджета


## Установка зависимости: composer require spatie/laravel-permission

Этот пакет, чтобы легко добавлять разрешения или роли пользователям в приложении Laravel.

**Опубликовать файл миграции и config/permission.php и файл конфигурации следующим образом:** php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider

**Пакет устанавливает дополнительно конфиг и таблицы - после установки пакета обезательно выполнить команду миграции (php artisan migrate)**

**После всех манипуляций появяться:**

   - config/permission.php
   - database/migrations/2026_01_25_081536_create_permission_tables.php

## Установка зависимости: composer require spatie/laravel-medialibrary

Пакет, который связывает файлы с моделями Eloquent

**Для создания таблицы необходимо опубликовать миграцию media:** php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-migrations"

**Публикация файла конфигурации:** php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-config"

**После всех манипуляций появяться:**

    - database/migrations/2026_01_25_093223_create_media_table.php
    - config/media-library.php



