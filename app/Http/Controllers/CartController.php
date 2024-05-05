<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function showCart()
    {
        $cartContent = session('cart', []);

        $products = Product::whereIn('id', array_keys($cartContent))->get();

        return view('cart', compact('products', 'cartContent'));
    }


    public function checkout(Request $request)
    {
        // Zde provedete logiku pro pokračování k objednávce
    }

    public function remove(Request $request)
    {
        // Zde provedete logiku pro odebrání položky z košíku
    }
}
