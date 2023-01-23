<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;


class TodoController extends Controller
{
	public function index()
	{
		$todos = Todo::all();
		return view('index', compact('todos'));
	}

	public function store(TodoRequest $request)
	{
		$content = $request->input('content');
		$todo = new Todo;
		$todo->fill(['content' => $content])->save();
		return redirect('/');
	}

	public function update(TodoRequest $request, $id)
	{

		$content = $request->input('content');
		$todo = Todo::find($id);
		$todo->fill(['content' => $content])->save();
		return redirect('/');
	}

	public function delete($id)
	{
		Todo::find($id)->delete();
		return redirect('/');
	}
}
