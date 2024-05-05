@extends('layout.master')

@section('home-content')
    <div class="form">
    <form action="{{ route('category.store') }}" method="post"> <!-- Úprava akce formuláře na Laravel route -->
        @csrf <!-- Přidání CSRF tokenu pro bezpečnost formulářů -->
        <label for="name">Název kategorie:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Popis:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="parent_id">Nadřazená kategorie:</label>
        <select id="parent_id" name="parent_id">
            <option value="">Nemá nadřazenou</option>
            @foreach($categories as $category) <!-- Použití Blade syntaxe pro iteraci přes kategorie -->
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>
        <p id="novakategorie">Pokud chcete přidat nový produkt, <a href="{{ route('product.create') }}">klikněte sem</a>.</p>

        <button type="submit">Přidat kategorii</button>
        @if(!empty($success_message)) <!-- Použití Blade syntaxe pro podmíněné zobrazení zprávy -->
            <div id="success">{{ $success_message }}</div>
        @endif
    </form>
    </div>
@endsection