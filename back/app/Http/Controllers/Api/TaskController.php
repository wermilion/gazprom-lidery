<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Instrument;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Instrument::all();
        return TaskResource::collection($task);
    }
}
