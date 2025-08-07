<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SongCategory>
 */
class SongCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thumbnail' => 'song-category/thumbnails/'.$this->faker->file('storage/app/seeder/song-categories-thumbnail-dummy', 'public/storage/song-category/thumbnails', false),
        ];
    }
}
