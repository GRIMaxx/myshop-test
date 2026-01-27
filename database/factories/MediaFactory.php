<?php
// 27.01.2026
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MediaFactory extends Factory
{
    // Напоминая модель в пакете - spatie/laravel-medialibrary
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model_type'          => \App\Models\Ticket::class,           // связываем с заявкой
            'model_id'            => null,                                 // будем задавать при создании create()
            'uuid'                => $this->faker->uuid(),
            'collection_name'     => 'attachments',
            'name'                => $this->faker->word(),
            'file_name'           => $this->faker->word() . '.pdf',
            'mime_type'           => 'application/pdf',
            'disk'                => 'public',
            'conversions_disk'    => null,
            'size'                => $this->faker->numberBetween(1000, 1000000),
            'manipulations'       => json_encode([]),
            'custom_properties'   => json_encode([]),
            'generated_conversions'=> json_encode([]),
            'responsive_images'   => json_encode([]),
            'order_column'        => null,
            'created_at'          => now(),
            'updated_at'          => now(),
        ];
    }
}
