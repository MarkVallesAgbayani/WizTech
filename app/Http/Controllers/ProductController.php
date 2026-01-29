<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function buy($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->with('error', 'Product not found!');
        }

        if($product->quantity <= 0){
            return redirect()->back()->with('error', 'Product out of stock!'); 
        }

        $product->quantity -=1;
        $product->save();

        return redirect()->back()->with('success', "You add to cart 1 {$product->name}!");
    }
}
