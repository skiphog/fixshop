<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rubric>
 */
class RubricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        static $number = 100;

        return [
            'title'     => $title = $this->faker->realText(40),
            'slug'      => str($title)->slug() . '-' . $number++,
            'content'   => $this->faker->realText(1000),
            'sort'      => $number
        ];
    }
}
