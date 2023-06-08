<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
