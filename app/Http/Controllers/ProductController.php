<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        if($request->has('search')){
            $products = Product::where('name', 'like', '%'.$request->search.'%')->get();
        } else{
        $products = Product::with('reviews')->paginate(15); 
        return view('all-product', [
            'products' => $products 
        ]);
    }
        
    }
    public function index1() {
    $products = Product::oldest()->with('reviews')->take(6)->get();
    $reviews = Review::latest()->with('user','product')->take(3)->get();

    return view('homepage', [
        'products' => $products,
        'reviews' => $reviews
    ]);
}
    
}
