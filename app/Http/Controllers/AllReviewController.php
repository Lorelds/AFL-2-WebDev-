<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrapFive();
use App\Models\Product;
use Illuminate\Http\Request;

class AllReviewController extends Controller
{

    public function index(Request $request){


        $query = Review::query();

        $query->with(['user','product']); 

        if ($request->filled('search')){
            $searchTerm = $request->search;

            $query->where(function($q) use ($searchTerm ) {
                $q->where('review', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                $userQuery->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('product', function($productQuery) use ($searchTerm) {
                $productQuery->where('name', 'like', '%' . $searchTerm . '%');
            });
        });

        $reviews = $query->latest()->paginate(15)->appends(['search' => $searchTerm]);
        } else {
            $reviews = $query->latest()->paginate(15);
        }

        return view('all-review', [
            'reviews' => $reviews,
        ]);
        

    }
}