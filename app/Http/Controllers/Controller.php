<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Model;

abstract class Controller
{
    protected function hasModelTaskRelation(Model $model): bool
    {
        /** @var TaskStatus|Label $model */
        return $model->tasks()->count() > 0;
    }
}
