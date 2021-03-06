<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Song title ' . $this->faker->sentence(3),
            'text' => $this->faker->paragraph(3),
            'tonica' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
        ];
    }
}
