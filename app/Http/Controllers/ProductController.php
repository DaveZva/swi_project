<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        $kategorie = Category::all(); // Načtení všech kategorií z databáze
        return view('product/addProduct', ['kategorie' => $kategorie]); // Předání kategorií do šablony
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'required|image|max:2048', // Omezení na 2 MB
        'stock' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ]);

    $imageName = time() . '.' . $request->image->extension();

    $request->image->move(public_path('images'), $imageName);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->image = $imageName;
    $product->stock = $request->stock;
    $product->category_id = $request->category_id;
    $product->save();

    return redirect()->route('product.create')->with('success_message', 'Produkt byl úspěšně přidán.');
}


public function allProducts()
{
    $products = Product::all();
    return view('product.products', ['products' => $products]);
}

}
