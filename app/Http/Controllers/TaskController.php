<?php

namespace App\Http\Controllers;

use App\Models\Task; // Import the Task model if you need to interact with the database
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show the tasks list view
    public function index()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        return view('tasks', compact('tasks')); // Pass the tasks to the view
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
        ]);

        $task = Task::create([
        'task_name' => $request->task_name,
        'is_done' => false,
    ]);

        return response()->json([
        'message' => 'Task created successfully.',
        'task' => $task
    ]);
    }

    // Update whether a task is done or not
    public function update(Request $request, $id)
    {
        $request->validate([
            'is_done' => 'required|boolean',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->only('is_done'));

        return response()->json(['message' => 'Task updated successfully.']);
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::find($id);

        if(!$task){
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
