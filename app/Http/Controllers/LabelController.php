<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('label.index', ['labels' => Label::query()->orderBy('created_at')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        \Gate::authorize('create', Label::class);;

        return view('label.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLabelRequest $request)
    {
        \Gate::authorize('create', Label::class);
        $data = $request->validated();
        $data['description'] = trim($data['description']);

        Label::query()->create($data);
        flash(__('hexlet.notify.label.success.create'))->success();

        return redirect()->route('labels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('label.edit', ['label' => $label]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        \Gate::authorize('update', $label);
        $data = $request->validated();
        $label->update($data);
        flash(__('hexlet.notify.label.success.update'))->success();

        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        \Gate::authorize('delete', $label);
        if ($this->hasModelTaskRelation($label)) {
            flash(__('hexlet.notify.label.error.destroy'))->error();

            return redirect()->back();
        }

        $label->delete();

        flash(__('hexlet.notify.label.success.destroy'))->success();

        return redirect()->route('labels.index');
    }
}
