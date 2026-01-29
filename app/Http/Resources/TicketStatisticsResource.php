<?php
/*
 * API Ответ - статистика
 *
 *
 * ***/
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketStatisticsResource extends JsonResource
{
    public function toArray($request): array
    {
        /*
         * Здесь простенький массив но можно
         * добавить например year и так далее...
         *
         * **/

        return [
            'message' => 'OK',
            'data' => [
                'day'   => $this['day'],
                'week'  => $this['week'],
                'month' => $this['month'],
            ],
        ];
    }
}
