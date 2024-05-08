@extends('layout.master')

@section('home-content')
<div class="container_completed">
    <h1 class="container_completed">Objednávka byla úspěšně vytvořena!</h1>
    <p class="container_completed">Děkujeme za vaši objednávku. Objednávka byla úspěšně zpracována.</p>
    <p class="container_completed">Níže najdete detaily objednávky:</p>
    <div class="container">
        <div class="column">
            <h2>Informace o objednávce</h2>
            <p><strong>Číslo objednávky:</strong> {{ $order->id }}</p>
            <p><strong>Datum objednání:</strong> {{ $order->created_at }}</p>
            <p><strong>Jméno:</strong> {{ $order->name }}</p>
            <p><strong>Příjmení:</strong> {{ $order->lastname }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Telefon:</strong> {{ $order->phone }}</p>
            <p><strong>Adresa:</strong> {{ $order->address }}</p>
            <p><strong>Město:</strong> {{ $order->city }}</p>
            <p><strong>PSČ:</strong> {{ $order->zip }}</p>
            <p><strong>Země:</strong> {{ $order->country }}</p>
            <p><strong>Způsob platby:</strong> {{ $order->payment_method }}</p>
        </div>
        <div class="column">
        <h2>Objednané produkty</h2>
        <ul>
            @foreach($orderItems as $orderItem)
                <li>Produkt: {{ $orderItem->product->name }}, Množství: {{ $orderItem->quantity }}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="container_completed">
        <form action="{{ route('cart.deleteCart') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Zpět na hlavní stránku</button>
    </div>
</div>
@endsection