<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        static $number = 1;

        return [
            'path'    => 'https://loremflickr.com/800/600?random=' . $number++,
            'title'   => $this->faker->word(),
            'alt'     => $this->faker->word,
        ];
    }
}
