<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('tasks.index', ['tasks' => auth()->user()->tasks()->latest()->paginate(5)]);
    }
}
