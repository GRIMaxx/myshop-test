<?php
/* 27.01.2026
 * Заполняем поля данными таблицы "tickets"
 *
 * **/
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'    => Customer::factory(),                  // связь с клиентом

            // новая логика по этому добавил поля
            'customer_email' => $this->faker->unique()->safeEmail(),  // snapshot email
            'customer_phone' => '+77' . $this->faker->numberBetween(1000000000, 9999999999), // snapshot phone
            'subject'        => $this->faker->sentence(5),    // тема заявки
            'message'        => $this->faker->paragraph(2),// текст заявки
            'status'         => $this->faker->randomElement([
                'new',
                'in_progress',
                'completed'
            ]),
            'answered_at'    => null,                                 // пока пусто

            // created_at / updated_at, их ставит Laravel автоматически
        ];
    }
}
