<?php

namespace Database\Factories;

use App\Models\FlowerArrangements;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlowerArrangementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FlowerArrangements::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'description' => $this->faker->text,
        'slug' => $this->faker->word,
        'price' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
