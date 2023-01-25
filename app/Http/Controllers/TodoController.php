<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
	public function index()
	{
		//ユーザー認証
		$user = Auth::user();
		// dd($user);

		$todos = Todo::all();
		return view('todos.index', compact('todos', 'user'));
	}

	public function store(TodoRequest $request)
	{
		$content = $request->input('content');
		$todo = new Todo;
		$todo->fill(['content' => $content])->save();
		return redirect('/todos');
	}

	public function update(TodoRequest $request, $id)
	{

		$content = $request->input('content');
		$todo = Todo::find($id);
		$todo->fill(['content' => $content])->save();
		return redirect('/todos');
	}

	public function delete($id)
	{
		Todo::find($id)->delete();
		return redirect('/todos');
	}
}
