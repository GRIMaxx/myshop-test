<?php
/* 25.01.2026
 * Заполняем поля данными таблицы "customers"
 * Кол-во клиентов указанно в CustomerTicketSeeder.php
 * **/
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Казахстан: +7 7XX XXXXXXX   <<<--- :) надеюсь немного подмазался!
        $phone = '+77'
            // Генерирует случайное целое число в заданном диапазоне от 10 до 99
            . $this->faker->numberBetween(10, 99)
            // Генерирует случайное целое число в заданном диапазоне от 1000000 до 9999999
            . $this->faker->numberBetween(1000000, 9999999);
            // Тоесть в месте получаем 7XX и XXXXXXX
            // Ну и все в месте +77 + 7XX + XXXXXX = E.164 как указзано в тестовом задании.

        return [
            'name'       => $this->faker->name(),                               // Генерируем каждому кдиенту Имя
            'phone'      => $phone,                                             // Номер телефона - как указанно -> E.164
            'email'      => $this->faker->unique()->safeEmail(),                // Генерируем каждому клиенту уникальную почту
            'created_at' => $this->faker->dateTimeBetween('-6 months'), // Генерируем каждому клиенту случайную дату от текущего момента минус 6 месяцев до сейчас
            'updated_at' => now(),                                              // не имеет згначения
        ];
    }
}
