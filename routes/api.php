<?php
/*
 * API - Маршруты
 *
 * Напоминаю правила API
 *
 * 1. нет сессий
 * 2. нет CSRF
 * 3. всегда префикс /api
 * 4. отправляяем всегда JSON-ответ
 *
 * ***/
use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

/*
 * Принимаем форму из страницы с формой обратной связи для клиентов.
 * https://домен/api/tickets
 *
 *
 * **/
Route::post('/tickets', [TicketController::class, 'store'])
    // Если пользователь превысит лимит,
    // Laravel автоматически вернёт 429 Too Many Requests с JSON.
    ->middleware('throttle:5,1'); // 5 запросов в 1 минуту

/*
 * Статистика заявок (сутки, неделя, месяц)
 * https://домен/api/tickets/statistics
 *
 * Я напоминаю что API это только JSON а у нас ответ пример: ({"message":"OK","data":{"day":1,"week":43,"month":43}})
 * По этой причине я на всявий пожарный добавил и в routes\web.php
 * маршрут чтобы увидеть как на странице выглядит статистика :)
 * **/
Route::get('/tickets/statistics', [TicketController::class, 'statistics']);

// Все тесты пройдены на моем локальном боевом "Ubuntu server" пройдены все работает 100%
// https://test.myshop.local/tickets/statistics
