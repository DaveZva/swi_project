<div class="header">
<script src="{{ asset('js/script.js') }}"></script>

    <h1>E-shop</h1>
    <!-- Symbol profilu -->
    @php
    $loggedIn = session('logged_in', false);
    @endphp
    <a href="#" id="login-btn" class="profil-ikonka"><i class="{{ $loggedIn ? 'fa fa-check' : 'fas fa-user' }}"></i></a>
    @if (!empty(session('cart')))
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fa-solid fa-cart-plus"></i></a>
    @else
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fas fa-shopping-cart"></i></a>
    @endif
</div>
