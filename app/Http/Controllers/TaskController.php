<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $avav_tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('avav_tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $avav_request)
    {
        $avav_validated = $avav_request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'is_done' => 'nullable|boolean'
        ]);

        $avav_validated['is_done'] = $avav_request->has('is_done') ? true : false;

        Task::create($avav_validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada exitosamente');
    }

    public function show(string $avav_id)
    {
        //
    }

    public function edit(string $avav_id)
    {
        $avav_task = Task::findOrFail($avav_id);
        return view('tasks.edit', compact('avav_task'));
    }

    public function update(Request $avav_request, string $avav_id)
    {
        $avav_validated = $avav_request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'is_done' => 'nullable|boolean'
        ]);

        $avav_validated['is_done'] = $avav_request->has('is_done') ? true : false;

        $avav_task = Task::findOrFail($avav_id);
        $avav_task->update($avav_validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada exitosamente');
    }

    public function destroy(string $avav_id)
    {
        $avav_task = Task::findOrFail($avav_id);
        $avav_task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada exitosamente');
    }
}