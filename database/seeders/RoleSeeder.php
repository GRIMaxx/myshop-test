<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * 'name'       => 'Админ/Менеджер', <--- здесь 2 роли как в тестовом задании
         * 'guard_name' => 'web' охранник
         *
         * Рекоментатьен оставить английские роли - Laravel & Spatie обычно ожидают латиницу
         * ***/

        Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
    }
}
