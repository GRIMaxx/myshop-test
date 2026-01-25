<?php
// 24.01.2026 - это админы и менеджеры, которые работают с заявками.
// Таблица
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
         * Таблица пользователя
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /*
             * Полное имя пользователя
             * Добавил индекс для вывода Имени Админа или Менеджера (от меня.. хотя и не обезательно),
             * индекс даст ускорения при выборке или поиске заявки
             */
            $table->string('name', 50)->index('idx_users_name');

            /*
             * Почта пользователя
             * Почта - (Админ|Менеджер) только уникальные эл. адресса
             * Кол-во символов нормальная длинна для почты можно меньше но длинее не рекомендую.
             * */
            $table->string('email', 50)->unique();

            /*
             * Хешированный пароль
             * По кол-ву символов, в Laravel по умолчанию хеш пароля создаётся через bcrypt,
             * и bcrypt всегда генерирует хеш фиксированной длины 60 символов - для экономии и оптимизации
             * вашей Бд....:)
             * но я устанавливаю максимум так как я не знаю ваши методы хешировани
             * 191 - некоторых БД это макс.
             */
            $table->string('password', 191);

            /**
             * created_at
             * updated_at
             */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
