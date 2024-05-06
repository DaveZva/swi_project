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
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('modal-content')
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-cart">&times;</span>
            <h2>Obsah košíku</h2>
            <form method="post" action="{{ url('/cart/order') }}">
                <ul id="cart-items">
                    @forelse($cart as $productId => $quantity)
                        @php
                            // Zde získáš detaily produktu podle jeho ID
                            $product = App\Product::find($productId);
                        @endphp
                        <li>{{ $product->nazev }} - {{ $product->cena }} Kč
                            <input type="hidden" name="product_id[]" value="{{ $productId }}">
                            <input type="number" name="quantity[]" value="{{ $quantity }}" min="0" data-price="{{ $product->cena }}" onchange="updateTotalPrice()">
                        </li>
                    @empty
                        <li>Košík je prázdný</li>
                    @endforelse
                </ul>
                <p id="total-price">Celková cena: <span id="total-price-value"></span></p>
                @if(!empty($cart))
                    <button type="submit" name="send_cart">Pokračovat k objednávce</button>
                @endif
            </form>
            <form method="post" action="{{ url('/cart/remove') }}">
                <button type="submit" name="del_cart">Smazat košík</button>
            </form>
        </div>
    </div>
@endsection
