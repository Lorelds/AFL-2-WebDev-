<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {

        $imagePaths = [
            'assets/img/portfolio/1.png',
            'assets/img/portfolio/2.png',
            'assets/img/portfolio/3.png',
            'assets/img/portfolio/4.png',
            'assets/img/portfolio/5.png',
            'assets/img/portfolio/6.png',
        ];

        return [
            'name' => $this->faker->words(2, true) . ' Project',
            'price' => $this->faker->numberBetween(1000000, 5000000),
            'image' => $this->faker->randomElement($imagePaths),
            'description' => $this->faker->paragraph(), 
        ];
    }
}
