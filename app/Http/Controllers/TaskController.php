<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('status', 'creator', 'creator')->get();

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Gate::authorize('create', Task::class);

        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        \Gate::authorize('create', Task::class);
        $data = $request->validated();
        $creator = Auth::user();
        $status = TaskStatus::query()->find($data['status_id']);
        $task = Task::query()->make();
        $task->name = $data['name'];
        $task->description = trim($data['description']);
        $task->status()->associate($status);
        $task->creator()->associate($creator);

        if (isset($data['assigned_to_id'])) {
            $task->assignedUser()->associate(User::find($data['assigned_to_id']));
        }

        $task->save();

        flash('Задача успешно создана!')->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        \Gate::authorize('view', $task);

        return view('task.show', ['task' => $task->load('status')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        \Gate::authorize('update', $task);

        return view('task.edit', ['task' => $task->load('status')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        \Gate::authorize('update', $task);
        $data = $request->validated();
        $status = TaskStatus::query()->find($data['status_id']);
        $task->name = $data['name'];
        $task->description = trim($data['description']);
        $task->status()->associate($status);

        if (isset($data['assigned_to_id'])) {
            $task->assignedUser()->associate(User::find($data['assigned_to_id']));
        }

        $task->save();

        flash('Задача успешно изменена!')->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        \Gate::authorize('delete', $task);
        $task->delete();
        flash('Задача успешно удалена!')->success();

        return redirect()->route('tasks.index');
    }
}
