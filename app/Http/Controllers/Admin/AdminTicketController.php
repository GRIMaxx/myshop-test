<?php
/*
 *
 *
 * ***/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TicketService;
use App\Models\Ticket;
use App\Http\Resources\TicketStatisticsResource;
use App\Http\Requests\UpdateTicketStatusRequest;
use App\Http\Requests\TicketFilterRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /*
     * Выводим на странице - статистику заявок (сутки, неделя, месяц)
     * Для визуального просмотра
     * ***/
    public function statistics(): View
    {
        return view('widget.admin.components.statistics', [
            /*
             * Формирует в единый ответ или для централизованного ответа
             * я где-то уже писал про это не помню где :)
             * Так - это пример формирования:
             * return [
             *   'message' => 'OK',
             *   'data' => [
             *       'day'   => Кол-во заявок за сутки,
             *       'week'  => Кол-во заявок за неделю,
             *       'month' => Кол-во заявок за месяц,
             *   ],
             * ]
             * ***/
            'statistics' => new TicketStatisticsResource(
                /*
                 * Получаем данные из БД в виде массива:
                 * [
                 *      'day'   => Кол-во заявок за сутки,
                 *      'week'  => Кол-во заявок за неделю,
                 *      'month' => Кол-во заявок за месяц,
                 * ]
                 * ***/
                $this->ticketService->getStatistics()
            )
        ]);
    }

    /*
     * Выводим страницу с таблицей
     * Метод работает 2 режимах
     * 1 Выводит страницу со списком заявок в таблице без выбранных фильтров
     * 2 Выводит страницу со списком заявок в таблице если все или один фильтр был выбран
     *
     * Здесь добавлены простые фильтры, здесь нет сложной логики поиска или фильтрации и так далее..
     * Валидация обезательно даже не смотря что это админка.
     *
     * ***/
    public function index(TicketFilterRequest $request) : View
    {
        // Получаем уже проверенные поля с данными
        $filters = $request->validated();

        /*
        * Фильтры поиска все что в ТЗ - (фильтрация по дате, статусу, email, телефону)
        * Фильтры работают при условии если они выбраны на странице.
        * ***/

        $tickets = Ticket::query()
            // Статус заявки
            ->when($filters['status'] ?? null,
                fn ($q, $status) => $q->where('status', $status)
            )
            // Эл. адрес клиента подвязан к заявке
            ->when($filters['email'] ?? null,
                fn ($q, $email) => $q->where('customer_email', 'like', "%{$email}%")
            )
            // Номер телефона тоже подвязан к заявке
            ->when($filters['phone'] ?? null,
                fn ($q, $phone) => $q->where('customer_phone', 'like', "%{$phone}%")
            )
            // Устанавливаем дату от
            ->when($filters['from'] ?? null,
                fn ($q, $from) => $q->whereDate('created_at', '>=', $from)
            )
            // Устанавливаем дату до
            ->when($filters['to'] ?? null,
                fn ($q, $to) => $q->whereDate('created_at', '<=', $to)
            )
            /*
             * Пагинация таблицы
             * Выводим в таблице по 20 строк
             *
             * И еще важная деталь!
             * При установке Laravel 12 устанавливает Tailwind и если его не вырубить или полностью удалить
             * будут битый HTML а особенно в конце страниц я нащол быстрое рещения в не мое:
             * -> app/Providers/AppServiceProvider.php -> boot(): -> Paginator::useBootstrapFive(); use Illuminate\Pagination\Paginator;
             * все можно проверить dd($tickets->links()) :
             *
             * Должно измениться на Bootstrap
             * #view: "pagination::bootstrap-5"
             * #path: "/var/www/myshop-test/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/bootstrap-5.blade.php"
             * но это если бутстрап используем.
             *
             * ***/

            ->latest()
            ->paginate(20)
            ->withQueryString(); // <-> важно для пагинации с фильтрами

        return view('widget.admin.components.index', compact('tickets'));
    }

    /*
     * Просмотр деталей заявки (со всеми файлами, ссылками на скачивания)
     * **/
    public function show(Ticket $ticket) : View
    {
        // Получаем файлы через spatie/medialibrary
        $attachments = $ticket->getMedia('attachments');

        return view('widget.admin.components.show', compact('ticket', 'attachments'));
    }

    /*
     * Возможность смены статуса заявки на странице просмотром деталей заявки (со всеми файлами, ссылками на скачивания)
     * ***/
    public function updateStatus(
        UpdateTicketStatusRequest $request,
        Ticket $ticket
    ) {
        // Валидация поля с данными
        $ticket->update([
            'status' => $request->validated()['status'],
        ]);

        // Вернуться откуда пришол запрос
        return redirect()
            ->back()
            ->with('success', 'Статус обновлён');
    }
}
