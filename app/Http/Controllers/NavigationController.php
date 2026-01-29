<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class NavigationController extends Controller
{
    public function index() 
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function orders() {
        $user = Auth::user();
        return view('orders', compact('user'));

    }

    public function dashboard() {
        $user = Auth::user();
        $products = Product::all();
        return view('dashboard', compact('user', 'products'));
    }
}
