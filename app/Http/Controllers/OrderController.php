<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        $lastOrderItemTimestamp = OrderItem::orderBy('created_at', 'desc')->first()->created_at;
        // Validace dat z formuláře (je vhodné provést validaci)
        //dd($lastOrderItemTimestamp);
        // Vytvoření nového záznamu v tabulce orders
        $order = new Order();
        $order->user_id = auth()->id();
        $order->name = $request->name;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->country = $request->country;
        $order->payment_method = $request->payment_method;
        $order->status = 'created';
        $order->products_create = $lastOrderItemTimestamp;
        $order->total_price = 0; 
        $order->save();

        // Můžeme provést další akce, např. přidání produktů z košíku do tabulky order_items

        // Přesměrování na jinou stránku nebo zobrazení potvrzovací zprávy
        return redirect()->route('order.statement.view', ['id' => $order->id])->with('success_message', 'Produkt byl úspěšně přidán.');
    }

    public function submitProducts(Request $request) {
        // Získání CSRF tokenu z požadavku
        $token = $request->input('_token');
    
        // Procházení pole produktů a jejich množství
        foreach ($request->input('product_id') as $key => $productId) {
            $quantity = $request->input('quantity')[$key];
    
            // Uložení produktu do objednávky
            $orderItem = new OrderItem();
            $orderItem->user_id = auth()->id();
            $orderItem->product_id = $productId;
            $orderItem->quantity = $quantity;
            $orderItem->save();
        }
        return redirect()->route('order.create');
    }
    public function show()
{
    $order = Order::latest()->first(); // Získání poslední objednávky
    $lastOrderItemTimestamp = OrderItem::orderBy('created_at', 'desc')->first()->created_at;
    $orderItem = OrderItem::where('user_id', $order->user_id)->where('created_at', $lastOrderItemTimestamp)->get(); // Získání položek objednávky
    return view('order.statement', ['order' => $order], ['orderItems' => $orderItem]);
}

public function showWithId($id)
{
    $order = Order::find($id); // Získání objednávky podle ID
    $orderTime = $order->products_create; // Čas vytvoření objednávky
    //dd($orderTime, $order->products_create);
    $orderItems = OrderItem::where('user_id', $order->user_id)
                            ->where('created_at', $orderTime)
                            ->get(); // Získání položek objednávky
    return view('order.statement', ['order' => $order, 'orderItems' => $orderItems]);
}


public function showAllOrders()
{
    $order = Order::latest()->first(); // Získání poslední objednávky
    $orderItem = OrderItem::where('user_id', $order->user_id)->get(); // Získání položek objednávky
    //Doplnit return..
}

public function orderItems()
{
    // Vrátí všechny položky objednávky spojené s touto objednávkou
    return $this->hasMany(OrderItem::class);
}

public function showMyOrders()
{
    $orders = Order::where('user_id', auth()->id())->get();
    return view('order.myOrders', ['orders' => $orders]);
}
}
