<?php
/*
 * Создаем тестовые клиентсткие записи
 * здесь просто запись так как конкретными ролями занимаеться пакет: spatie/laravel-permission
 * тоесть здесь на вид просто записи пользователей
 * **/
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Фейковое имя
            'name'              => fake()->name(),
            // Уникальный фейковый email
            'email'             => fake()->unique()->safeEmail(),
            // Пароли генерируем - все пароли: password
            // но тут можно передать свой!
            'password'          => static::$password ??= Hash::make('password'),
        ];
    }
}
