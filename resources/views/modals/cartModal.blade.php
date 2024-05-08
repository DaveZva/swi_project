<!-- Modal pro košík -->
<div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-cart">&times;</span>
            <h2>Obsah košíku</h2>
            <form method="post" action="{{ url('order/order') }}">
            @csrf
                <ul id="cart-items">
                    @php
                    $totalPrice = 0;
                    @endphp
                    @forelse($cart as $productId => $quantity)
                        @php
                            // Zde získáš detaily produktu podle jeho ID
                            $product = App\Models\Product::find($productId);
                            $totalPrice += $product->price * $quantity;
                        @endphp
                        <li>{{ $product->name }} - {{ $product->price }} Kč
                            <input type="hidden" name="product_id[]" value="{{ $productId }}">
                            <input type="number" name="quantity[]" value="{{ $quantity }}" min="0" data-price="{{ $product->price }}" onchange="updateTotalPrice()">
                        </li>
                    @empty
                        <li>Košík je prázdný</li>
                    @endforelse
                </ul>
                <p id="total-price">Celková cena: <span id="total-price-value">{{ $totalPrice }}</span> Kč</p>
                @if(!empty($cart))
                    <button type="submit" name="send_cart">Pokračovat k objednávce</button>
                @endif
            </form>
            <form method="post" action="{{ route('cart.remove') }}">
                @csrf
                <button type="submit" name="del_cart">Smazat košík</button>
            </form>
        </div>
    </div>