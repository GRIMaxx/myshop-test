# 1. Этап: Установка зависимостей, Создания Таблиц и Моделей
**!Все таблицы уже собраны с логикой тестового задания**

---

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

---

## Созданы основные таблицы, все таблицы полностью отвечают логике тестового задания: database\migrations\
   
    - 0000_01_00_000001_create_customers_table.php
    - 0000_01_00_000002_create_tickets_table.php
    - 0001_01_01_000000_create_users_table.php

---

## Созданы основные модели, (Пока без методов связей) app\Models\:

    - Customer.php
    - Ticket.php
    - User.php

 ---

 # Собрал для теста (Factory/Seeder) 

    - CustomerFactory.php
    - RoleSeeder.php
    - UserSeeder.php

    - CustomerFactory.php
    - MediaFactory.php
    - TicketFactory.php
    - UserFactory.php

    - DatabaseSeeder.php (здесь все добп=авил)

## Выполнить установку тестовых даных:
** 1 Рекомендую удалить все таблицы из БД**
** 2 Заливаем даными таблицы**

1. php artisan migrate:fresh
2. php artisan db:seed










 

