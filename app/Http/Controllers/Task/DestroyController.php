<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class DestroyController extends BaseController
{
    public function __invoke(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
