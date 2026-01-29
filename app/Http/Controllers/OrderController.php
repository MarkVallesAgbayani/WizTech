<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show all orders for logged-in user
    public function index() {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders', compact('orders', 'user'));
    }

    // Add product to orders
    public function addToCart(Request $request) {
        $product = Product::findOrFail($request->product_id);

        Order::create([
            'user_id' => Auth::id(),
            'product_name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        return redirect()->route('orders.index')->with('success', 'Product added to orders!');
    }

    
}
