@php
    $cart = session()->get('cart', []);
    $loggedInUser = Auth::user();
@endphp

<div class="header">
<script src="{{ asset('js/script.js') }}"></script>

    <h1>E-shop</h1>
    <!-- Symbol profilu -->
    <a href="#" id="login-btn" class="profil-ikonka"><i class="{{ $loggedInUser ? 'fa fa-check' : 'fas fa-user' }}"></i></a>
    @if (!empty(session('cart')))
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fa-solid fa-cart-plus"></i></a>
    @else
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fas fa-shopping-cart"></i></a>
    @endif
</div>

@section('modal-content')
    <!-- Modal pro košík -->
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

    <!-- Modal pro přihlášení -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-login">&times;</span>
            <form action="{{ url('/login') }}" method="post">
                @csrf <!-- Přidání CSRF token pro ochranu formuláře -->
                <input type="text" placeholder="Uživatelské jméno" name="username">
                <input type="password" placeholder="Heslo" name="password">
                <button type="submit">Přihlásit se</button>
            </form>
            <p>Nemáte účet? <a href="{{ route('registration') }}">Zaregistrujte se</a></p>
        </div>
    </div>
@endsection



