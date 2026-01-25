<?php
/* 25.01.2026
 * Админ/Менеджер
 * Взадании не сказанно что нужна регистрация или авторизация по этой рпичине
 * удалено все лишнее чтобы было видно что я понимаю что и для чего!
 * ***/
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles; // Пакет - spatie/laravel-permission

class User extends Authenticatable
{
    /*
     * Пакет содержит свои модели по этому не нужно дополнительно создавать
     * если что, вот они:
     * - Spatie\Permission\Models\Role
     * - Spatie\Permission\Models\Permission
     * Я не просто так написал вдруг нужно через связи моделей получать даные
     * там модно за одно посмотреть методы связей.
     * Этим трейтом все активируем
     * ***/
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password'          => 'hashed',
        ];
    }
}
