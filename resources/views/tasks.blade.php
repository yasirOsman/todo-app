<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Todo List</h1>

        <form id="add-task-form" class="mb-6">
            <div class="flex">
                <input
                    type="text"
                    name="task_name"
                    placeholder="Add a new task"
                    required
                    class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Add Task
                </button>
            </div>
        </form>

        <ul id="task-list" class="space-y-4 max-h-80 overflow-auto">
            @foreach ($tasks as $task)
                <li data-id="{{ $task->id }}" class="flex items-center justify-between bg-gray-50 p-3 rounded-md shadow">
                    <div class="flex items-center space-x-3">
                        <input
                            type="checkbox"
                            class="mark-done"
                            {{ $task->is_done ? 'checked' : '' }}
                        >
                        <span class="task-name {{ $task->is_done ? 'line-through text-gray-500' : '' }}">
                            {{ $task->task_name }}
                        </span>
                    </div>
                    <button
                        class="delete-task bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 focus:outline-none"
                    >
                        Delete
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
