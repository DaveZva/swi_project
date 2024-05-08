<!-- Modal pro přihlášené -->
<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-login">&times;</span>
        @if(Auth::user()->role=='admin') 
        <a href="{{ route('product.create') }}">Přidání produktu</a>
        <a href="{{ route('category.create') }}">Přidání kategorie</a>
        @endif
        <a href="{{ route('order.myOrders') }}">Mé objednávky</a>
        <a href="{{ route('user.edit') }}">Můj účet</a>
        <a href="{{ route('admin') }}">Administrace (zaměstnanec)</a>
        <a href="{{ route('logout') }}">Odhlásit se</a>
    </div>
</div>