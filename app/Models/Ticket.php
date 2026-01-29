<?php
/*
 * Модель - для заявки
 * ***/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Ticket extends Model implements HasMedia
{
    use HasFactory,
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
        'customer_email',
        'customer_phone',
        'subject',
        'message',
        'status',
    ];

    /*
     * Методы для cтатистика заявок (сутки, неделя, месяц)
     *
     * Маршрут: GET - /api/tickets/statistics
	 * В ТЗ - Для расчета использовать Carbon и Eloquent scopes
     *
     * Чесно не буду врать это "Eloquent scopes" для меня новое (Пришлось спросить :) ), мне зашло.
     * Как я понял это поведения модели и эти методы установил здесь а не в репозитории
     *
     * ***/

    /*
     * Выбрать заявки за последний день (сутки)
     * ***/
    public function scopeLastDay(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subDay());
    }

    /*
     * Выбрать заявки за последнюю неделю
     * **/
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subWeek());
    }

    /*
     * Выбрать заявки за последний месяц
     * **/
    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->where('created_at', '>=', Carbon::now()->subMonth());
    }
}
