<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{


    public function add_to_cart(Product $product, Request $request){


        $user_id = Auth::id();
        $product_id = $product->id;

        $excisting_cart = Cart::where('product_id', $product_id)
        ->where('user_id', $user_id)
        ->first();

        if($excisting_cart == null){
            $request->validate([
                'amount' => 'required|gte:1|lte:'. $product->stock
            ]);



            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } else {
            $request->validate([
                'amount' => 'required|gte:1|lte:'. ($product->stock-$excisting_cart->amount)
            ]);

            $excisting_cart->update([
                'amount' => $excisting_cart->amount + $request->amount
            ]);
        }



        return Redirect::route('show_cart');

    }

    public function show_cart(){
        $user_id = Auth::id();
        $carts = Cart::with('product')->where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    public function update_cart(Cart $cart, Request $request){
        $request->validate([
            'amount' => 'required|gte:1|lte:'. $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');
    }

    public function delete_cart(Cart $cart){
        $cart->delete();
        return Redirect::back();
    }
}
