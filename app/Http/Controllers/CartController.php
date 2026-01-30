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
        $cart = Session::get('cart', []);
        return view('orders', compact( 'cart', 'user'));
    }

    // public function index()
    // {
    //     $user = Auth::user();
    //     $cart = Session::get('cart', []); 
    //     return view('orders', compact('cart', 'user'));
    // }

public function add($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found');
    }

    if ($product->quantity < 1) {
        return redirect()->back()->with('error', 'Product out of stock');
    }

    $product->decrement('quantity');

    $cart = Session::get('cart', []);

    if (isset($cart[$id])) {
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

    public function increase($id){
        $cart = Session::get('cart', []);

        if(isset($cart[$id])) { 
            if ($cart[$id]['quantity']<=10) {
                $cart[$id]['quantity']++;
            }
        }
        Session::put('cart', $cart);   
        return redirect()->back();
    }
    public function reduce_item($id){
        $cart = Session::get('cart', []);

        if(isset($cart[$id])) { 
            $cart[$id]['quantity']--;

            if($cart[$id]['quantity']<= 0) {
                unset($cart[$id]);
            }
        }
        Session::put('cart', $cart);   
        return redirect()->back();
    }

    public function remove($id)
    {
            $cart = Session::get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
            }

            Session::put('cart', $cart);
            return redirect()->back();
    }
}
