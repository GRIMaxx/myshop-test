<?php
/*
 *
 *
 * ***/
namespace App\Services;

use App\Repositories\TicketRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;
use DomainException;
class TicketService
{
    protected TicketRepository $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Создание новой заявки с проверкой лимита 24 часа
     * --
     * Пример массива с данными:
     * [
     *      "name"    => "Алан"
     *      "email"   => "alan001@gmail.com"
     *      "phone"   => "+77543235555"
     *      "subject" => "Тема заявки"
     *      "message" => "Сообщения заявки"
     * ]
     * --
     * При успехе вернет модель с новой заявкой и заддыми
     *
     */
    public function createTicket(array $data)
    {
        /*
        * Для начала нужно проверить возможно клиент в течении 24 часов совершал отправку заявки
        * return true  -> такая заявка уже была отправлена и сутки не прошли -> нужно блокировать нового клиента + новую заявку
        * return false -> заявок за сутки нет -> можно создавать новую заявку
        * **/
        if ($this->ticketRepository->existsLast24Hours(
            /*
             * Как я ранее уже писал проверяем почту и номер телефона, так как в задании не сказано
             * что должно быть обезательно для заполнения и если вдруг почта будет на втором плане
             * можно просто в валидации как минимум закоментировать и здесь тоже.
             * ***/
            $data['email'], $data['phone']
        )) {
            /*
             * Автоматически перехватывает ошибку здесь если что: .\bootstrap\app.php --> ->withExceptions(function ююю
             * ***/
            throw new DomainException(
                'Вы уже отправили заявку в последние 24 часа'
            );
        }

        /*
         * Найти или создать клиента если его нет,
         * и создать заявку с привязкой к клиенту
         *
         * Возвращает модель заявки с данными
         * ***/
        return $this->ticketRepository->createFromWidget($data);
    }

    /*
     * Получить всю статистику заявок за: (сутки, неделя, месяц)
     * тоесть вернет:
     * [
     *      'day'   => Кол-во заявок за сутки,
     *      'week'  => Кол-во заявок за неделю,
     *      'month' => Кол-во заявок за месяц,
     * ];
     * **/
    public function getStatistics(): array
    {
        return $this->ticketRepository->statistics();
    }
}
