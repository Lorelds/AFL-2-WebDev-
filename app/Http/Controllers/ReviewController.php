<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{

    public function index(Request $request){
   
        if($request->has('search')){
            $products = Product::where('name', 'like', '%'.$request->search.'%')->get();
        } else{
        $reviews = Review::oldest()
                ->with(['user','product']) //buat ambil data user dan product juga
                ->take(3)
                ->get();
                
            $products = \App\Models\Product::with('reviews')->paginate(6);
        }


            return view('all-review', [
        'reviews' => $reviews,
        'products' => $products,
    ]);
            
    }

    public function show(String $id){
        $review = Review::with(['user','product'])->findOrFail($id);


        return view('all-review',['reviews' => $review]);
    }

    public function destroy(Review $review)
    {
        
        if (Auth::id() !== $review->user_id) {
            return abort(403, 'AKSI TIDAK DIIZINKAN');
        }
        $review->delete();

        return redirect()->route('dashboard')->with('success', 'Review berhasil dihapus.');
    }


    public function edit(Review $review)
    {
        
        if (Auth::id() !== $review->user_id) {
            return abort(403, 'AKSI TIDAK DIIZINKAN');
        }
        $review->load('product');

        return view('reviews.edit', [
            'review' => $review
        ]);
    }

    public function update(Request $request, Review $review)
    {
        
        if (Auth::id() !== $review->user_id) {
            return abort(403, 'AKSI TIDAK DIIZINKAN');
        }

        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'review' => 'required|string|max:1000',
        ]);

        $review->update($validatedData);

        return redirect()->route('dashboard')->with('status', 'Review berhasil diperbarui.');
    }
    

    public function create()
    {
        $products = Product::orderBy('name', 'asc')->get();

        return view('reviews.create', [
            'products' => $products
        ]);
    }



    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:10',
            'review' => 'nullable|string|max:1000', 
        ]);
        $validatedData['user_id'] = Auth::id();


        Review::create($validatedData);


        return redirect()->route('dashboard')->with('status', 'Review baru berhasil ditambahkan!');
    }


}