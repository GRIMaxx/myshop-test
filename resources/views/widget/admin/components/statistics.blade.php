{{--
    28.01.2026

    Страница выводит значения - статистика заявок за сутки неделю и месяц,
    все минимально для ТЗ

    Данной страницы нет в ТЗ но я решил сто логичнее выводить статистику не только API json
    но и визуально так нагляднее.

    Но так как в ТЗ нет задания кроме ролей на регистрацию и авторизацию чтобы посмотреть
    нужно закоментировать в маршруте проверку роли и ауттификацию...

    Вы просили писать зачем применяю технику вот ниже ответ.

    Далее я в иджете уже писал что использую всегда bootstrap и добавил его сюда
    но мог бы использовать npm i bootstrap@5 @popperjs/core так как в нем можно импортировать отдельно
    и снизить до минимума всес но вам бы пришлось при переносе всегда пересобирать Vite
    или переносить js уже готовый но это жесть так как редактировать будееет очень сложно.
    Плюс ко всему сказанному так как виджет должен переноситьс по сайтам лучше так он супер легкий.

--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Статистика заявок</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Статистика заявок</h1>

    <div class="row g-4" id="stats">


        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Последние 24 часа</h5>
                    <p class="display-6 fw-bold" id="stat-day">—</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Последние 7 дней</h5>
                    <p class="display-6 fw-bold" id="stat-week">—</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Последние 30 дней</h5>
                    <p class="display-6 fw-bold" id="stat-month">—</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (async () => {

        /*
        * Делаем запрос на получения даных от сервера
        * напоминаю сервер вернет строго в таком ввиде:
        * {"message":"OK","data":{"day":1,"week":43,"month":43}}
        * **/
        const response = await fetch('/api/tickets/statistics', {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        /*
        * Ребят здесь нет сложной логики все по минимуму.
        *
        * Я работаю всегда в React, но это юыло бы ложно для чтения по этому как есть :)

        * Передаем в блоки и выводим
        * **/

        if (result.data) {
            document.getElementById('stat-day').innerText   = result.data.day;
            document.getElementById('stat-week').innerText  = result.data.week;
            document.getElementById('stat-month').innerText = result.data.month;
        }
    })();
</script>

</body>
</html>

