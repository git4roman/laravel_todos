@extends('layout')

@section('content')
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Email</label><br>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Confirm password</label><br>
            <input type="password" name="password_confirmation">
        </p>

        <button type="submit">Register</button>
    </form>
@endsection