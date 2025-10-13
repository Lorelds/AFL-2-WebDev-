<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => "awakening v2 Longsleeve",
            'price' => 150000,
            'image' => "assets/img/portfolio/1.png",
            'description' => "100% preshrunk cotton / 320gsm / embroidery on back / slight distress / fits oversized"
        ]);
        Product::create([
            'name' => "awakening Denim",
            'price' => 400000,
            'image' => "assets/img/portfolio/2.png",
            'description' => "14,5oz denim/ 100% cotton/ embroidery on back/ brown tint/ baggy fit"
        ]);
        Product::create([
            'name' => "awakening Crewneck",
            'price' => 250000,
            'image' => "assets/img/portfolio/3.png",
            'description' => "480gsm/ 100% preshrunk cotton/ embroidery on back/ fully hand embroidered pearl detail/ fits true to size"
        ]);
        Product::create([
            'name' => "awakening v2 beanie",
            'price' => 80000,
            'image' => "assets/img/portfolio/4.png",
            'description' => "100% cotton thread / woven design / fits true to size"
        ]);
        Product::create([
            'name' => "awakening Jorts",
            'price' => 350000,
            'image' => "assets/img/portfolio/5.png",
            'description' => "14,5oz denim/ 100% cotton/ embroidery on back/ brown tint/ baggy fit"
        ]);
        Product::create([
            'name' => "awakening v2 Jersey",
            'price' => 200000,
            'image' => "assets/img/portfolio/6.png",
            'description' => "100% polyester / print and embroidery on the front / fits true to size"
        ]);


        \App\Models\Product::factory()->count(100)->create();
    }
}
