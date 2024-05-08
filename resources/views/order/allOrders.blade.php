@extends('layout.master')

@section('home-content')
    <div class="produkty">
        @if($user->role == 'admin') 
            {{-- Obsah pro admina --}}
            <div class="row">
                <h1>Administrace objednávek</h1>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Číslo objednávky</th>
                            <th scope="col">Datum objednání</th>
                            <th scope="col">Stav</th>
                            <th scope="col">Detaily</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a href="{{ route('order.statement.view', ['id' => $order->id]) }}">Detaily</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- Obsah pro neadmina --}}
            <div class="row">
                <h2>Pouze pro admina</h2>
            </div>
        @endif
    </div>
@endsection