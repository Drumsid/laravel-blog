<?php

namespace Database\Factories;

use App\Models\Vocal;
use Illuminate\Database\Eloquent\Factories\Factory;

class VocalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vocal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'title ' . $this->faker->sentence(3),
            'vocal' => 'Vocal ' . $this->faker->sentence(3),
        ];
    }
}
