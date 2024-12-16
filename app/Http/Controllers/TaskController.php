<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statuses = TaskStatus::all();
        $users = User::all();

        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(
                [
                    AllowedFilter::exact('status_id'),
                    AllowedFilter::exact('created_by_id'),
                    AllowedFilter::exact('assigned_to_id')
                ]
            )
            ->orderBy('created_at')
            ->paginate(10);

        $filter = $request->get('filter') ?? null;

        return view('task.index', [
            'tasks' => $tasks,
            'statuses' => $statuses,
            'users' => $users,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Gate::authorize('create', Task::class);
        $labels = Label::all();
        $users = User::all();
        $statuses = TaskStatus::all();

        return view('task.create', [
            'labels' => $labels,
            'users' => $users,
            'statuses' => $statuses
        ]);
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

        if (isset($data['labels'])) {
            $task->labels()->sync($data['labels']);
        }

        flash(__('hexlet.notify.task.success.create'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        \Gate::authorize('view', $task);

        return view('task.show', ['task' => $task->load('status', 'labels')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        \Gate::authorize('update', $task);
        $labels = Label::all();
        $users = User::all();
        $statuses = TaskStatus::all();
        return view('task.edit', [
            'task' => $task->load('status', 'labels'),
            'labels' => $labels,
            'users' => $users,
            'statuses' => $statuses
        ]);
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

        if (isset($data['labels'])) {
            $task->labels()->sync($data['labels']);
        }

        if (isset($data['assigned_to_id'])) {
            $task->assignedUser()->associate(User::find($data['assigned_to_id']));
        }

        $task->save();

        flash(__('hexlet.notify.task.success.update'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        \Gate::authorize('delete', $task);
        $task->delete();
        flash(__('hexlet.notify.task.success.destroy'))->success();

        return redirect()->route('tasks.index');
    }
}
