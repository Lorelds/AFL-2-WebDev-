<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $reviews = Review::where('user_id', Auth::id())
                        ->with('product') 
                        ->latest()
                        ->paginate(5); 

        return view('dashboard', [
            'reviews' => $reviews
        ]);
    }


}