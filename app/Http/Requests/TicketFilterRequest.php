<?php
/*
 *
 *
 *
 * ***/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'nullable|in:new,in_progress,completed',
            'email'  => 'nullable|email',
            'phone'  => [
                'nullable',
                'string',
                'regex:/^\+[1-9]\d{1,14}$/', // E.164
            ],
            'from'   => 'nullable|date',
            'to'     => 'nullable|date|after_or_equal:from',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in'           => 'Недопустимый статус',
            'email.email'         => 'Некорректный email',
            'phone.regex'         => 'Телефон должен быть в формате E.164',
            'to.after_or_equal'   => 'Дата "до" не может быть меньше даты "от"',
        ];
    }
}
