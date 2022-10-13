<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'img'          => 'https://loremflickr.com/320/240?random=' . $number,
            'title'        => $title = $this->faker->realText(40),
            'slug'         => str($title)->slug() . '-' . $number++,
            'intro'        => str($text = $this->faker->realText(1000))->limit(),
            'content'      => $text,
            'time_to_read' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
        ];
    }
}
