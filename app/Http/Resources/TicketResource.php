<?php
/*
 * Ответ API - ПОКА НЕ ИСПОЛЬЗУЕТЬСЯ!!! :)
 *
 * если вдруг нужно будет дать данные виджету в ответе в форму
 * подключаем и передаем я просто немного натупил собрал и теперь жалко удалять он работает.
 *
 * Пример:
 *   {
 *      "id": 5,
 *
 *      "customer" {
 *          "customer_email": "test@example.com",
 *          "customer_phone": "+77001234567",
 *      }
 *     "subject": "Test ticket",
 *     "message": "Hello, this is a test",
 *     "status": "new",
 *     "answered_at": null,
 *    "created_at": "2026-01-27 10:12:33",
 *    "updated_at": "2026-01-27 10:12:33",
 *    "attachments": [
 *        {
 *           "name": "Test file 1",
 *           "url": "http://your-domain.com/storage/attachments/test.pdf"
 *       }
 *   ]
 * }
 *
 * ****/
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'customer'       => [
                'email' => $this->customer_email,
                'phone' => $this->customer_phone,
            ],

            'subject'        => $this->subject,
            'message'        => $this->message,
            'status'         => $this->status,

            'answered_at'    => optional($this->answered_at)?->toDateTimeString(),
            'created_at'     => $this->created_at->toDateTimeString(),
            //'updated_at'   => $this->updated_at->toDateTimeString(),

            // Файлы (через Spatie MediaLibrary)
            // Вернем json массив
            'attachments' => $this->getMedia('attachments')->map(fn ($file) => [
                'name'    => $file->name,      // Названия файла
                'url'     => $file->getUrl(),  // Ссылка на файл
            ])->values(),
        ];
    }
}
