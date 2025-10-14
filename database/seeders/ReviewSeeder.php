<?php

namespace Database\Seeders;

use App\Models\Review;
use Database\Factories\ReviewFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Review;

class ReviewSeeder extends Seeder
{
    
    public function run(): void
    {
        Review::create([
            'product_id' => "1",
            'user_id' => "1",
            'rating' => 9.8,
            'review' => "Absolutely love this! It's unbelievably comfortable and soft. My new go-to piece for every day. Perfect fit and amazing quality that lasts."
        ]);
        Review::create([
            'product_id' => "2",
            'user_id' => "2",
            'rating' => 9.0,
            'review' => "Worth every penny. The fabric feels luxurious, and the stitching is top-notch. It looks and feels expensive. A definite wardrobe staple that will last."
        ]);
        Review::create([
            'product_id' => "3",
            'user_id' => "3",
            'rating' => 9.5,
            'review' => "Impeccable fit and so flattering! This piece instantly elevates my look. The color is rich and exactly as pictured. Stylish and highly recommended!"
        ]);
        Review::create([
            'product_id' => "4",
            'user_id' => "4",
            'rating' => 9.8,
            'review' => "My favorite purchase this year! So comfortable and stylish."
        ]);
        Review::create([
            'product_id' => "5",
            'user_id' => "5",
            'rating' => 9.0,
            'review' => "The quality is exceptional. I bought three colors!"
        ]);
        Review::create([
            'product_id' => "6",
            'user_id' => "6",
            'rating' => 8.0,
            'review' => "Perfect fit, fast shipping. Zero complaints!"
        ]);
        
        Review::factory()->count(100)->create();
    }
}
