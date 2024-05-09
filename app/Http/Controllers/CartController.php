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

        // Zde můžete provést ověření a validaci dat, například zda existuje produkt s daným ID
        // Přidání produktu do košíku (uložení do session, databáze atd.)
        // V tomto příkladu předpokládáme, že používáte session pro uchování košíku
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

        // Odpověď AJAX požadavku - můžete poslat zpět libovolná data, která chcete zpracovat ve vašem JavaScriptu
        return redirect()->back()->withSuccess('Product added');
    }


    public function checkout(Request $request)
    {
        // Zde provedete logiku pro pokračování k objednávce
    }
    
    public function removeFromCart(Request $request)
    {
        // Odstranění všech produktů z košíku
        session()->forget('cart');
        // Odpověď AJAX požadavku - můžete poslat zpět libovolná data, která chcete zpracovat ve vašem JavaScriptu
        return redirect()->back()->withSuccess('All products removed');
    }

    public function deleteCart(Request $request)
    {
        // Odstranění všech produktů z košíku
        session()->forget('cart');
        // Odpověď AJAX požadavku - můžete poslat zpět libovolná data, která chcete zpracovat ve vašem JavaScriptu
        return redirect()->route('product.all')->with('success_message', 'Produkt byl úspěšně přidán.');

    }
}
