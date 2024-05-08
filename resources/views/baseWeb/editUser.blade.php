@extends('layout.master')

@section('home-content')

<div class="form">
    <h1>Upravit uživatele</h1>
    <form method="post" action="{{ route('user.update') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div>
            <label for="old_password">Old password:</label>
            <input type="password" name="old_password" id="old_password">
        </div>
        <div>
            <label for="new_password">New password:</label>
            <input type="password" name="new_password" id="new_password">
        </div>
        <div>
            <label for="new_password_confirmation">New password confirmation:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation">
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="submit">
    </form>
</div>
@endsection