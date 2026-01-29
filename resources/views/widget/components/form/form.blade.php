{{--
   Страница с формой обратной связи для клиентов.

   -- немного поснений чтобы легче проверять что куда и откуда!

   Маршрут вывода формы (routes\web.php): "/widget"
   Маршрут отправки формы (routes\api.php): "/tickets"
   Правила валидации здесь: .\app\Http\Requests\StoreTicketRequest.php
   Контроллер здесь: .\app\Http\Controllers\Api\TicketController.php

   Здесь нет сложной логики все по вашему заданию и не больше,
   самый легкий ну не считая нагрузку bootstrap :)
--}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Виджет обратной связи</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{--
        Bootstrap CSS

        Смотрите команда Smart я могу добавить Bootstrap вот так: npm i bootstrap@5 @popperjs/core
        но вам придеться если что-то меняете делать пересборку при помощи Vite / npm и даже простой перенос
        затруднится я не думаю что вам это нужно хотя я всегда делаю только с Vite возможностей много :)

        И так я вам устанавливаю как я думаю лучший вариант для виджета - Bootstrap через CDN
        Почему так:
        iframe = изолированная страница
        вам нужна легкость переноса на другой сайт вот она и есть с Vite не все так просто!

        я не делаю сложную логику например один для всех: .\resources\views\layouts\app.blade.php
        здесь не тот проект а просто тестовый для задания хватит с головой.

        Я работаю всегда с React, мне так легче там совсем другие технологии и возможности
        По этому я намеренно не усложняю вам проверку, чтобы вам было легче проверять задания но имейте просто ввиду.

    --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f3f4f6;
            padding: 12px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .widget-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .06);
            padding: 20px;
            max-width: 420px;
            margin: 0 auto;
        }

        .widget-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 16px;
            text-align: center;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            font-weight: 500;
        }

        #result {
            margin-top: 12px;
        }
    </style>
</head>
<body>

<div class="widget-card">
    <div class="widget-title">Обратная связь</div>

    <form id="ticketForm" novalidate>
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
        </div>

        <div class="mb-2">
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>

        <div class="mb-2">
            <input type="tel" name="phone" class="form-control" placeholder="+77...">
        </div>

        <div class="mb-2">
            <input type="text" name="subject" class="form-control" placeholder="Тема">
        </div>

        <div class="mb-3">
            <textarea name="message" class="form-control" placeholder="Сообщение"></textarea>
        </div>

        <button class="btn btn-primary w-100 btn-submit" type="submit">
            Отправить
        </button>
    </form>

    <div id="result"></div>
</div>

<script>
    /** При нажатии на кнопку отправить запрос post -> /api/tickets -> routes\api.php **/
    document.getElementById('ticketForm').addEventListener('submit', async (e) => {
        e.preventDefault();// блокируем выполнения по умолчанию чтобы ничего лишнего js не выкинул

        const form = e.target;
        const data = Object.fromEntries(new FormData(form));

        const resultBox = document.getElementById('result');
        resultBox.innerHTML = '';

        try {
            const response = await fetch('/api/tickets', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data)
            });

            /*
            * Здесь я не буду делать сложные проверки в задании их нет,
            *
            * B и так сервер шлет одинаковый ответ на все случаи жизни
            * ну и наш фронт всегда ожидает один формат ответа:
            *
            * Я обычно делаю отдельно файл для централизированого упраления ответами чтобы потом не
            * искать бока и все ответы строго одного формата, но задания маленькое не вижу смысла добавлять.
            * И по этому просто в .bootstrap\app.php >withExceptions( .. просто код всавил и все.
            *
            * result.message
            * result.data
            * result.errors
            *
            * Приблизительно что будет: успех, валидация, бизнес-ошибка (лимит 24 часа), любая другая ошибка
            * я немного переделал и теперь более универсально
            *
            * Вот json если так понятнее:
            * {
            *      "success": true|false,
            *      "message": "Текст для пользователя",
            *      "data": { ... } или null,     <-- В этой форме всегда null показывать поля созданой зайвки в ТЗ нет.
            *      "errors": { ... } или null
            * }
            *
            * **/

            const result = await response.json();

            const alertClass = result.success ? 'alert-success' : 'alert-danger';

            resultBox.innerHTML = `
                <div class="alert ${alertClass} py-2">
                    ${result.message ?? 'Ошибка'}
                </div>
            `;

            if (result.success) {
                form.reset();
            }

        } catch (e) {
            resultBox.innerHTML = `
                <div class="alert alert-danger py-2">
                    Ошибка соединения с сервером
                </div>
            `;
        }
    });
</script>

</body>
</html>
