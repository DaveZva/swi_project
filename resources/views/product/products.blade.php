@extends('layout.master')

@section('home-content')
    <div class=row>
        @foreach($products as $product)                
            <div class="produkt">
                <img src="images/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    @auth
                        <!-- Toto tlačítko se zobrazí pouze pro přihlášeného uživatele -->
                        <button type="button" class="btn btn-primary" onclick="addToCart({{ $product->id }})">Přidat do košíku</button>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection

