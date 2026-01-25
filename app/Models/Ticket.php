<?php
/*
 * Модель - для заявки
 * ***/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //
// Пакет - spatie/laravel-medialibrary
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ticket extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        /*
         * Подключаем класс для обработки файлов,
         * в нем уже есть своя модель: Spatie\MediaLibrary\MediaCollections\Models\Media
         * по этому можно спокойно работать с моделями Eloquent
         * ***/
        InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'customer_id',
        'status',
        'identifier',
        'note'
    ];
}
