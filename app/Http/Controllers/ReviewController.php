<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(){
   

        $reviews = Review::oldest()
                ->with(['user','product']) //buat ambil data user dan product juga
                ->take(3)
                ->get();
                
            $products = \App\Models\Product::with('reviews')->paginate(6);


            return view('homepage', [
        'reviews' => $reviews,
        'products' => $products,
    ]);
            
    }

    public function show(String $id){
        $review = Review::with(['user','product'])->findOrFail($id);


        return view('homepage',['reviews' => $review]);
    }
    
}