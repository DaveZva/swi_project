@extends('layout.master')

@section('home-content')
    <div class="produkty">
        @if($user->role == 'admin') 
            {{-- Obsah pro admina --}}
            <div class="row">
                <h1>Administrace</h1>
            </div>
            <div class="row">
                <a href="{{ route('product.create') }}">Přidání produktu</a>
            </div>
            <div class="row">
                <a href="{{ route('category.create') }}">Přidání kategorie</a>
            </div>
            <div class="row">
                <a href="{{ route('admin.allOrders') }}">Všechny objednávky</a>
            </div>
    </div>
        @else
            {{-- Obsah pro neadmina --}}
            <div class="row">
                <form action="{{ route('admin.add') }}" method="POST">
                    @csrf
                    <label for="admin_password">Zadejte heslo pro spárování účtu na admina:</label>
                    <input type="password" name="password">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit">Add</button> 
                </form>
            </div>
        @endif
    </div>
@endsection
