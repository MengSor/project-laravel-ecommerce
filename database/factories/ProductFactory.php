<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "pname" =>$this->faker->words(1,true),
            "pdesc"=>$this->faker->sentence(1,true),
            "enable"=>'1',
            "pprice"=>$this->faker->numberBetween(100,1000),
            "pimg"=>$this->faker->randomElement(['p1.jpg','p2.jpg','p3.jpg','p4.jpg','p5.jpg','p6.jpg','p7.jpg','p8.jpg']),
            "cid"=> Category::all()->random()->cid,
            "category" =>$this->faker->words(1,true),
            "quantity"=>$this->faker->numberBetween(1, 100),
        ];
    }
}
