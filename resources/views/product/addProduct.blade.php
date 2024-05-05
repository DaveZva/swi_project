@extends('layout.master')

@section("home-content")
    <div class="form">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"> <!-- Úprava akce formuláře na Laravel route -->
        @csrf <!-- Přidání CSRF tokenu pro bezpečnost formulářů -->
        <label for="name">Název produktu:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Popis:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="price">Cena:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="image">Obrázek:</label>
        <input type="file" id="image" name="image" required><br><br>

        <label for="stock">Skladem:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="category">Kategorie:</label>
        <select id="category_id" name="category_id" required>
            <option value="0">Nemá nadřazenou</option>
            @foreach($kategorie as $kat) <!-- Použití Blade syntaxe pro iteraci přes kategorie -->
                <option value="{{ $kat->id }}">{{ $kat->name }}</option>
            @endforeach
        </select>

        <p id="novakategorie">Pokud chcete přidat novou kategorii, <a href="{{ route('category.create') }}">klikněte sem</a>.</p>
        <br><br>
        <button type="submit">Přidat produkt</button>
        @if(!empty($success_message)) <!-- Použití Blade syntaxe pro podmíněné zobrazení zprávy -->
            <div id="success">{{ $success_message }}</div>
        @endif
    </form>
    </div>
@endsection