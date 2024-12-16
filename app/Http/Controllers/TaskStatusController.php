<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusStoreRequest;
use App\Http\Requests\TaskStatusUpdateRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task-status.index', ['statuses' => TaskStatus::orderBy('created_at')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Gate::authorize('create', TaskStatus::class);

        return view('task-status.create', [
            'status' => new TaskStatus()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStatusStoreRequest $request)
    {
        \Gate::authorize('create', TaskStatus::class);
        $data = $request->validated();
        TaskStatus::query()->create($data);
        flash(__('hexlet.notify.status.success.create'))->success();

        return redirect()->route('task_statuses.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        \Gate::authorize('update', $taskStatus);

        return view('task-status.edit', ['status' => $taskStatus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStatusUpdateRequest $request, TaskStatus $taskStatus)
    {
        \Gate::authorize('update', $taskStatus);
        $data = $request->validated();
        $taskStatus->update($data);
        flash(__('hexlet.notify.status.success.update'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        \Gate::authorize('delete', $taskStatus);
        if ($this->hasModelTaskRelation($taskStatus)) {
            flash(__('hexlet.notify.status.error.destroy'))->error();

            return redirect()->back();
        }

        $taskStatus->delete();

        flash(__('hexlet.notify.status.success.destroy'))->success();

        return redirect()->route('task_statuses.index');
    }
}
