<?php
/* 27.01.2026
 * Логика валидации
 *
 * Валидация формы обратной связи для клиентов
 * Тоесть здесь проверяем все поля формы (заявка)
 * ****/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Разрешаем всем обращаться к API
     */
    public function authorize(): bool
    {
        return true; // виджет публичный
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /*
         * Так вот наши правила проверки
         * ***/
        return [
            // Имя клиента обезательно, строго строка, состоит имя макс. 50 символов
            // здесь можно добавить и другие проверки например строго алфовит и так далее..
            'name'    => 'required|string|max:50',

            // Здесь почта обезательна + Laravel проверяет правильность
            // (режим - email:rfc но можно изменить) -> https://laravel.com/docs/12.x/validation#rule-email
            'email'   => 'required|email:rfc|max:50',

            // Номер телефона
            'phone'   => [
                'required',
                'string',
                'max:20',
                // E.164: + и до 15 цифр
                'regex:/^\+[1-9]\d{1,14}$/',
            ],

            // Тема заявки
            'subject' => 'required|string|max:150',

            // Сообщения
            'message' => 'required|string',
        ];
    }

    public function messages(): array
    {
        // Все возможные ошибки, да они должны быть в \lang\*\validation.php но для быстой проверки так пойдет.

        return [
            'name.required'    => 'Введите ваше имя',
            'name.string'      => 'Имя должно быть строкой',
            'name.max'         => 'Имя не должно превышать 50 символов',

            'email.required'   => 'Введите email',
            'email.email'      => 'Некорректный формат email',
            'email.max'        => 'Email не должен превышать 50 символов',

            'phone.required'   => 'Введите номер телефона',
            'phone.string'     => 'Телефон должен быть строкой',
            'phone.max'        => 'Телефон слишком длинный',
            'phone.regex'      => 'Телефон должен быть в формате E.164 (например +77001234567)',

            'subject.required' => 'Введите тему обращения',
            'subject.string'   => 'Тема должна быть строкой',
            'subject.max'      => 'Тема не должна превышать 150 символов',

            'message.required' => 'Введите сообщение',
            'message.string'   => 'Сообщение должно быть текстом',
        ];
    }
}
