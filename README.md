# Mini-CRM с виджетом обратной связи (Laravel 12)

Небольшой, но полноценный проект мини-CRM для сбора и обработки заявок с сайта через универсальный iframe-виджет.

Проект сделан как тестовое задание, но с нормальной архитектурой, без я списал или подобное, но если чесно больше времени потрачено на коментарии чем на код :).

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
- **spatie/laravel-permission 6.24** — роли (admin / manager)
- **spatie/laravel-medialibrary 11.17** — файлы для заявок

Никаких лишних библиотек - только то, что требуется ТЗ.

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
    │ └── form/
    └── admin/
    └── components/

storage/app/
    └── test_smart.pdf   (файла нет так как при комите ругаеться я не стал настаивать :))

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
```


















