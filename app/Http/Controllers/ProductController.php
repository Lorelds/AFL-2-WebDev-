<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('reviews')->paginate(15); 
        return view('all-product', [
            'products' => $products 
        ]);
        
    }
    public function index1()
    {
        $products = Product::latest()->take(6)->get(); 
        return view('homepage',[
            'products' => $products 
        ]);
    }
    
}
