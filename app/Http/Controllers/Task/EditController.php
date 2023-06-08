<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class EditController extends BaseController
{
    public function __invoke(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
}
