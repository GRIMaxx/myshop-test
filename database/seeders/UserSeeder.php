<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 1 учетку Админа
        $admin = User::factory()->create([
            'email' => 'admin@test.local',
        ]);

        // Добавление разрешений через роль - Единственному администратору
        $admin->assignRole('Admin');

        // Создаем три тестовых менеджера
        // и через роль добавим разрешения
        // тоесть все три менеджера получают разрешения
        // теперь в таблице users будет созданно три записи
        User::factory(3)->create()->each(function ($user) {
            $user->assignRole('Manager');
        });

        // Но в целом появиться 4 записи в users таблице
    }
}
