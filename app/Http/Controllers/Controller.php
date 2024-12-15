<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

abstract class Controller
{
    protected function hasModelTaskRelation(Model $model): bool
    {
        return $model->tasks()->count() > 0;
    }
}
