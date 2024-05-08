@extends('layout.master')

@section('home-content')
    <div class="produkty">
    <div class=row>
        @foreach($products as $product)                
            <div class="produkt">
                <img src="images/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    @auth
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Save to Cart</button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection

