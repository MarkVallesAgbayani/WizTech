<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;


class CartController extends Controller
{
    public function orders() {
        $user = Auth::user();
        return view('orders', compact('user'));
    }

    public function index()
    {
        $cart = Session::get('cart', []); // Get cart from session, default empty
        return view('orders', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::find($id);

        if(!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = Session::get('cart', []);

        // If product already in cart, increase quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', $product->name.' added to cart!');
    }
}
