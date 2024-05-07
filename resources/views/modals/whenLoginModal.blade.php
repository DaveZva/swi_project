<!-- Modal pro přihlášené -->
<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-login">&times;</span>
        <a href="{{ route('product.create') }}">Přidání produktu</a>
        <a href="{{ route('category.create') }}">Přidání kategorie</a>
        <a href="#">Mé objednávky</a>
        <a href="#">Administrace (zaměstnanec)</a>
        <a href="{{ route('logout') }}">Odhlásit se</a>
    </div>
</div>