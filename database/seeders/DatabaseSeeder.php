<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /*
             * Первым следует создать роли - потому что роли должны существовать ДО пользователей,
             * иначе нельзя назначить роль
             * Создаёт 2 записи в таблице roles
             * **/
            RoleSeeder::class,

            /*
             * Создаем одного Админа и три менеджера и присваиваем всем свои роли
             **/
            UserSeeder::class,

            /*
             *
             *
             * ***/
            CustomerTicketSeeder::class,
        ]);
    }
}
