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


