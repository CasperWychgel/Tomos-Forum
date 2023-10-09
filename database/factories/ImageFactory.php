<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $project_id = 1;

    public function definition(): array
    {
        return [
            'url' => fake()->imageUrl(),
            'project_id' => self::$project_id++
        ];
    }
}
