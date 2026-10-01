<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = $request->user()->todos()->latest()->get();

        return view('todos.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $request->user()->todos()->create($validated);

        return redirect()->route('todos.index')->with('success', 'Todo created!');
    }

    public function edit(Request $request, Todo $todo)
    {
        $this->ensureOwner($request, $todo);

        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $this->ensureOwner($request, $todo);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index')->with('success', 'Todo updated!');
    }

    public function toggle(Request $request, Todo $todo)
    {
        $this->ensureOwner($request, $todo);

        $todo->update(['completed' => ! $todo->completed]);

        return redirect()->route('todos.index');
    }

    public function destroy(Request $request, Todo $todo)
    {
        $this->ensureOwner($request, $todo);

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted!');
    }

    private function ensureOwner(Request $request, Todo $todo): void
    {
        abort_unless($todo->user_id === $request->user()->id, 403);
    }
}