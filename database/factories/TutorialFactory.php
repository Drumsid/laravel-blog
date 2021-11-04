<?php

namespace Database\Factories;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TutorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tutorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'tutorial ' . $this->faker->word(),
            'link' => 'link ' . $this->faker->word(),
            'iframe' => 'iframe ' . $this->faker->word(),
            'thumbnail' => 'thumbnail ' . $this->faker->word(),
            'description' => 'description ' . $this->faker->word(),
        ];
    }
}
