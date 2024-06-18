<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Banner;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(1),
            "subtitle" => $this->faker->sentence(1),
            "text" => $this->faker->sentence(3),
            "enable" => '1',
            "link" => $this->faker->sentence(1),
            "img" => $this->faker->randomElement(['banner-img.png','b1.png','b2.png','b3.png']),
            "ssorder" =>$this->faker->numberBetween(1,100),
        ];
    }
}
