<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();

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

        Todo::create($validated);

        return redirect()->route('todos.index')->with('success', 'Todo created!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index')->with('success', 'Todo updated!');
    }

    public function toggle(Todo $todo)
    {
        $todo->update(['completed' => ! $todo->completed]);

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted!');
    }
}