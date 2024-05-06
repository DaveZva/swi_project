<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function showCart()
    {
        // Získání obsahu košíku z Session
        $cart = Session::get('cart', []);

        // Předání obsahu košíku do pohledu
        return view('cart', ['cart' => $cart]);
    }

    public function addToCart(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        // Přidání položky do košíku
        $cart[$productId] = $request->quantity;

        // Uložení košíku zpět do Session
        session()->put('cart', $cart);
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
