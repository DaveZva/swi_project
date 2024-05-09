<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;


class CartController extends Controller
{
    public function showCart()
    {
        // Získání obsahu košíku z Session
        $cart = Session::get('cart', []);

        // Předání obsahu košíku do pohledu
        return view('cart', ['cart' => $cart]);
    }

    public function addToCart(Request $request)
    {
        // Získání ID produktu z POST požadavku
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Přidání produktu do košíku (uložení do session, databáze atd.)
        $cart = session()->get('cart', []);
        for($i = 0; $i < $quantity; $i++)
        {
            if (isset($cart[$productId])) {
                $cart[$productId]++;
            } else {
                $cart[$productId] = 1;
            }
        }
        session()->put('cart', $cart);

        // Odpověď AJAX požadavku 
        return redirect()->back()->withSuccess('Product added');
    }
    
    public function removeFromCart(Request $request)
    {
        // Odstranění všech produktů z košíku
        session()->forget('cart');
        // Odpověď AJAX požadavku
        return redirect()->back()->withSuccess('All products removed');
    }

    public function deleteCart(Request $request)
    {
        // Odstranění všech produktů z košíku
        session()->forget('cart');
        // Odpověď AJAX požadavku
        return redirect()->route('product.all')->with('success_message', 'Produkt byl úspěšně přidán.');

    }
}
