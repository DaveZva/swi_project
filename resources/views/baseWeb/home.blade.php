@extends('layout.master')

@section('home-content')
    @if(request()->has('badLogin') && request()->badLogin == 'true')
        <script>alert("Špatně zadané jméno, nebo heslo!")</script>
    @endif

    @include('product.products')

    <h3>Přihlášení</h3>

@endsection