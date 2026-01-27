<?php
/* 25.01.2026
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
            //
            'customer_id' => Customer::factory(),
            //
            'status'      => $this->faker->randomElement([
                'new',
                'in_progress',
                'completed',
                'rejected',
            ]),
            // ????
            'identifier' => Str::uuid()->toString(),

            'note' => $this->faker->boolean(70)
                ? $this->faker->sentence()
                : null,
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => now(),
        ];
    }
}
