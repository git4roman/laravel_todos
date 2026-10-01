@extends('layout')

@section('content')
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

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
            <label><input type="checkbox" name="remember"> Remember me</label>
        </p>

        <button type="submit">Login</button>
        <a href="{{ route('register') }}">Create an account</a>
    </form>
@endsection