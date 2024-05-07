@php
    $cart = session()->get('cart', []);
    $loggedInUser = Auth::user();
@endphp

<div class="header">
<script src="{{ asset('js/script.js') }}"></script>

    <h1><a href=" {{ route('product.all') }}">E-shop</a></h1>
    <!-- Symbol profilu -->
    <a href="#" id="login-btn" class="profil-ikonka"><i class="{{ $loggedInUser ? 'fa fa-check' : 'fas fa-user' }}"></i></a>
    @if (!empty(session('cart')))
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fa-solid fa-cart-plus"></i></a>
    @else
        <a href="#" id="cart-btn" class="profil-ikonka"><i class="fas fa-shopping-cart"></i></a>
    @endif
</div>

@section('modal-content')
    @include('modals.cartModal')
    @if (!$loggedInUser)
        @include('modals.loginModal')
    @else
        @include('modals.whenLoginModal')
    @endif
@endsection



