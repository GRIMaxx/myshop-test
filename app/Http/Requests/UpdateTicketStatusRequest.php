<?php
/*
 *
 *
 *
 * **/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        // здесь позже можно повесить Gate / Permission
        // пока так
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:new,in_progress,completed',
        ];
    }

    public function messages(): array
    {
        // хотя я ошибки добавил но на самой странице нет!

        return [
            'status.required' => 'Статус обязателен',
            'status.in'       => 'Недопустимый статус заявки',
        ];
    }
}
