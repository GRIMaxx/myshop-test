# Mini-CRM с виджетом обратной связи (Laravel 12)

Небольшой, но полноценный проект мини-CRM для сбора и обработки заявок с сайта через универсальный iframe-виджет.

Проект сделан как тестовое задание, но с нормальной архитектурой, без я списал или подобное, но если чесно больше времени потрачено на коментарии чем на код :).

Основные мысли и описания в комментариях в самих методах в коде (я больше писал поэмы чем, собирал код :))

---

## Краткое описание

Проект позволяет:
- принимать заявки с сайта через iframe-виджет
- сохранять клиентов и заявки
- ограничивать отправку заявок (не чаще 1 раза в 24 часа)
- прикреплять файлы к заявкам
- просматривать и обрабатывать заявки в админ-панели
- получать статистику по заявкам (сутки / неделя / месяц)

---

## Используемые технологии

- **Laravel 12**
- **PHP 8.4**
- **MySQL**
- **Bootstrap 5** (для UI, т.к. привычен и удобен)
- **spatie/laravel-permission 6.24** - роли (admin / manager)
- **spatie/laravel-medialibrary 11.17** - файлы для заявок

Никаких лишних библиотек - только то, что требуется ТЗ, не считая Bootstrap

---

## Сущности проекта

### User (менеджер / админ)
- name
- email
- password
- роли (через spatie/laravel-permission)

### Customer (клиент)
- name
- phone (формат E.164)
- email

### Ticket (заявка)
- customer_id (связь с Customer)
- subject
- message
- status (new / in_progress / completed)
- answered_at
- файлы (через MediaLibrary)

### File
- реализовано через **spatie/laravel-medialibrary**
- файлы привязываются к заявке

---

## Архитектура

Проект построен по классической схеме:

    - Controllers - **минимум логики**
    - Services - бизнес-логика
    - Repositories - работа с БД
    - FormRequest - **вся валидация**
    - Resources - единый формат API-ответов

Принципы:
    - SOLID
    - MVC
    - KISS
    - DRY
    - PSR-12

---

## Структура проекта (основное)

```bash
app/
    ├── Http/
    │   ├── Controllers/
    │   │   ├── Api/
    │   │   └── Admin/
    │   ├── Requests/
    │   ├── Resources/
    ├── Services/
    ├── Repositories/

resources/
    └── views/
        └── widget/
            ├── components/
            │   └── form/
            └── admin/
                └── components/

storage/app/
    └── test_smart.pdf   (файла нет так как при комите ругаеться я не стал настаивать :))
```

---

## Установка проекта

### 1. Клонировать репозиторий

```bash
git clone <repo_url>
cd myshop-test
```

### 2. Установить зависимости

```bash
composer install
```

### 3. Настроить .env

```bash
cp .env.example .env
php artisan key:generate

!Не забываем указать доступы к БД.
```

### Установка пакетов

**spatie/laravel-permission**

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

**spatie/laravel-medialibrary**

```bash
composer require spatie/laravel-medialibrary
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-migrations"
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-config"
php artisan migrate
```

## Миграции и тестовые данные

В проекте есть migrations, factories и seeders для всех сущностей.

## Заполнение БД тестовыми данными

```bash
php artisan migrate:fresh
php artisan db:seed
```

## Также приложен SQL-дамп (можно сразу в вушу БД импортировать):
```bash
database/myshop_test.sql
```

## Виджет обратной связи
Маршрут
```bash
GET /widget
```

## Встраивание на любой сайт
```bash
<iframe
    src="https://your-domain.com/widget"
    width="100%"
    height="520"
    frameborder="0">
</iframe>
```

**Виджет:**

    - стилизован (Bootstrap 5)
    - отправляет данные через AJAX
    - обрабатывает ошибки и успешные ответы
    - не требует авторизации
    - легкий, но я могу и усложнить добавив React... :)

## API

Создание заявки
```bash
POST /api/tickets
```

**Все ответы приходят в едином формате:**
```bash
{
  "success": true,
  "message": "Заявка успешно отправлена",
  "data": null,  - (создан механизм для отправки полей созданной заявки но не подключен)
  "errors": null
}
```

**Ограничени**я

- не более 1 заявки в 24 часа с одного email + телефона
- дополнительный rate-limit на маршрут

## Статистика заявок
```bash
GET /api/tickets/statistics
```

**Ответ:**
```bash
{
  "day": 3,
  "week": 17,
  "month": 42
}
```

**Для расчёта используются:**

    - Carbon
    - Eloquent scopes
  
## Админ-панель (Blade UI)
Доступна только менеджерам.

**Возможности:**

    - список заявок
    - фильтрация по:
        - дате
        - статусу
        - email
        - телефону
    - просмотр деталей заявки
    - просмотр и скачивание файлов
    - смена статуса заявки

## Централизованные ошибки
В bootstrap/app.php реализована централизованная обработка исключений:

    - валидация
    - бизнес-ошибки
    - серверные ошибки
    - Фронт всегда получает один формат JSON - удобно и предсказуемо но немного не понятно новичкам

## Почему я использовал Bootstrap 5
Bootstrap выбран осознанно:
    - быстро
    - стабильно
    - хорошо подходит для iframe-виджетов
    - не требует сборки фронта
    - Tailwind по умолчанию отключён в (AppServiceProvider) так как он идет в составе Laravel он реально мешает я просто переключил на Bootstrapю

## Дополнительно

- git с чистой историей коммитов
- без лишних зависимостей
- код легко расширяется
- проект готов к реальному использованию

---

### Команда Smart спасибо, что дали время и возможность.

29.01.2026
