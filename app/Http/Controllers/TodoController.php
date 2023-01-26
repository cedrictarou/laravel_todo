<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Tag;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$tags = Tag::all();
		$todos = Todo::all();
		return view('todos.index', compact('todos', 'user', 'tags'));
	}

	public function store(TodoRequest $request)
	{
		$params = $request->all();
		unset($params['_token']);
		Todo::create([
			'content' => $params['content'],
			'tag_id' => (int)$params['tag_id'],
		]);
		return redirect('/todos');
	}

	public function update(TodoRequest $request, $id)
	{
		$todo = Todo::find($id);
		$params = $request->all();
		unset($params['_token']);
		$todo->create([
			'content' => $params['content'],
			'tag_id' => (int)$params['tag_id'],
		]);
		return redirect('/todos');
	}

	public function delete($id)
	{
		Todo::find($id)->delete();
		return redirect('/todos');
	}
}
