<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use App\Models\Task;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all()->toArray();
        return view('task.taskList',compact('tasks'));

    }


    public function create()
    {
        return view('task.addTask');

    }

    public function store(AddTaskRequest $request)
    {
        try {
            Task::query()->create([
                'name' => $request->name,
                'deadline' => $request->deadline
            ]);
            return response()->json(['message'=>'Added new records.']);
        } catch (QueryException $exception) {
            return response()->json(['message'=>'Something went Wrong']);
        }
    }

}
