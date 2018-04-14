<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Task;

class TaskController extends Controller
{

	public function show($id)
	{
		return new TaskResource(Task::find($id));
	}

	public function index()
	{
		return TaskResource::collection(Task::all());
	}

	public function store(Request $request)
	{
		$task = Task::create($request->all());
		return response()->json($task, 201);
	}

	public function update(Request $request,$id)
	{
		$task = Task::findOrFail($id);
		$task->update($request->all());
		return response()->json($task, 200);
	}

	public function delete($id)
	{
		$task = Task::findOrFail($id);
		$task->delete();
		return response()->json(null, 204);
	}
}
