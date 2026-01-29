<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminTicketController;

Route::get('/', function () {
    return view('welcome');
});

/*
 * Страница с формой обратной связи для клиентов.
 * А также это точка входа виджета в нашем проекте.
 * View: .\resources\views\widget\components\form\form.blade.php
 * ***/
Route::view('/widget', 'widget.components.form.form')->name('widget');

// Группировка по middleware + префикс
Route::prefix('admin')
    /*
     * В ТЗ сказанно: "Админ-панель (Blade UI, только для менеджера)..."
     * ну и по этой причине установлена роль только менеджер и для авторизовваных
     *
     * но чтобы вам можно было без проблем проверить и так нет аунтификации чтобы реально получить авторизованного и с ролью я закоментировал
     * вам просто вбиваем в Url и смотрим :)
     * **/
    //->middleware(['auth', 'role:Manager']) // только менеджеры
    ->group(function () {
        /*
        * Маршрут - выводит страницу - статистика заявок (сутки, неделя, месяц)
        *
        * Дело втом что по в API не рекомендуеться выводить страницы а толькл json
        * по этой причине так как всетаки админка я решил добавить маршрут его нет в ТЗ
        * но как бонус и так логичнее для просмотра статистики. :)
        **/
        Route::get('/tickets/statistics', [AdminTicketController::class, 'statistics'])->name('admin.tickets.statistics');

        /*
         * Маршрут - выводит страницу с таблицей - просмотр списка заявок, фильтрация по дате, статусу, email, телефону
         * ***/
        Route::get('/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');

        /*
         * Маршрут - выводит страницу с просмотром деталей заявки (со всеми файлами, ссылками на скачивания)
         * **/
        Route::get('/tickets/{ticket}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');

        /*
         * Маршрут - Возможность смены статуса заявки на странице просмотром деталей заявки (со всеми файлами, ссылками на скачивания)
         * Обновляется только переданное поле {"status": "completed"} по этому метод patch тоесть частично не всю форму или все поля формы.
         * */
        Route::patch('/tickets/{ticket}/status', [AdminTicketController::class, 'updateStatus'])->name('admin.tickets.updateStatus');
    });

// Все протестировал на своем локальном боевом "Ubuntu server" работает 100%
