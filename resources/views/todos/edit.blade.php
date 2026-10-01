@extends('layout')

@section('content')
    <h2>Edit Todo</h2>

    <form method="POST" action="{{ route('todos.update', $todo) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $todo->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Description (optional)</label><br>
            <textarea name="description">{{ old('description', $todo->description) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('todos.index') }}">Cancel</a>
    </form>
@endsection