<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $members = User::oldest()->take(3)->get();


        return view('homepage', [
            'members' => $members,

        ]);
    }
}