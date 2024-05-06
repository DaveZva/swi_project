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
        $quantity = $request->input('quantity');

        // Zkontroluj, zda v Session již existuje košík
        if (!Session::has('cart')) {
            // Pokud neexistuje, vytvoř nový prázdný košík
            Session::put('cart', []);
        }

        // Přidání nové položky do košíku
        $cart = Session::get('cart');
        $cart[$productId] = $quantity;
        Session::put('cart', $cart);

        // Přesměrování zpět na stránku, kde bylo tlačítko "Přidat do košíku" stisknuto
        return redirect()->back()->with('success', 'Položka byla úspěšně přidána do košíku.');
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
