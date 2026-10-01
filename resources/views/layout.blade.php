<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 16px; color: #222; }
        h1 { margin-bottom: 24px; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        input[type="text"], textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { padding: 6px 12px; border: 1px solid #ccc; border-radius: 4px; background: #f5f5f5; cursor: pointer; }
        button:hover { background: #e5e5e5; }
        .success { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .error { color: #b91c1c; font-size: 14px; margin: 4px 0 0; }
        .todo { padding: 12px 0; border-bottom: 1px solid #eee; }
        .todo p { margin: 6px 0 10px; color: #555; }
        .done { text-decoration: line-through; color: #888; }
        .actions { display: flex; gap: 10px; align-items: center; }
    </style>
</head>
<body>
    <h1>Todo App</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>