@extends('layout')

@section('content')
    <p><a href="{{ route('todos.create') }}">+ New Todo</a></p>

    @forelse ($todos as $todo)
        <div class="todo">
            <strong class="{{ $todo->completed ? 'done' : '' }}">{{ $todo->title }}</strong>

            @if ($todo->description)
                <p>{{ $todo->description }}</p>
            @endif

            <div class="actions">
                <form method="POST" action="{{ route('todos.toggle', $todo) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $todo->completed ? 'Mark as not done' : 'Mark as done' }}
                    </button>
                </form>

                <a href="{{ route('todos.edit', $todo) }}">Edit</a>

                <form method="POST" action="{{ route('todos.destroy', $todo) }}"
                      onsubmit="return confirm('Delete this todo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No todos yet.</p>
    @endforelse
@endsection