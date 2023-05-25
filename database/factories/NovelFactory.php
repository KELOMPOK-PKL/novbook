<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Novel>
 */
class NovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'writer' => \fake()->name(),
            'title' => \fake()->title(),
            'description' => \fake()->text(),
            'image' => UploadedFile::fake()->image('image.jpg'),
            'publish_date' => \fake()->date(),
            'slug' => \fake()->slug(),
        ];
    }
}
