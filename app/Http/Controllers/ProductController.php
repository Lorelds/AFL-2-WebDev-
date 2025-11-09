<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
    public function index1()
    {
        $products = Product::latest()->take(6)->get(); 
        return view('homepage',[
            'products' => $products 
        ]);
    }
    
}
