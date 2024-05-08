@extends('layout.master')

@section('home-content')

<div class="form">
<h1>Osobní údaje k objednávce</h1>

    <form method="post" action="{{ route('order.submit') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="phone" name="phone" id="phone">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <label for="zip">Zip:</label>
            <input type="text" name="zip" id="zip">
        </div>
        <div>
            <label for="country">Country:</label>
            <input type="text" name="country" id="country">
        </div>
        <div>
            <label for="payment_method">Platební metoda:</label>
            <input type="text" name="payment_method" id="payment_method">
        </div>
        <input type="submit">
    </form>
</div>
@endsection