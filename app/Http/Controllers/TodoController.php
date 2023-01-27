<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Tag;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TodoController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$tags = Tag::all();

		return view('todos.index', compact('user', 'tags'));
	}

	public function store(TodoRequest $request)
	{
		$params = $request->all();
		unset($params['_token']);
		$user = Auth::user();
		Todo::create([
			'content' => $params['content'],
			'tag_id' => (int)$params['tag_id'],
			'user_id' => (int)$user['id'],
		]);
		return redirect()->route('todos.index');
	}

	public function update(TodoRequest $request, $id)
	{
		$todo = Todo::find($id);
		$params = $request->all();
		unset($params['_token']);
		$todo->update([
			'content' => $params['content'],
			'tag_id' => (int)$params['tag_id'],
		]);
		return back();
	}

	public function delete($id)
	{
		Todo::find($id)->delete();
		return back();
	}

	public function search()
	{
		$user = Auth::user();
		$tags = Tag::all();

		return view('todos.search', compact('user', 'tags'));
	}

	public function find(Request $request)
	{
		$user = Auth::user();
		$tags = Tag::all();
		// 検索処理
		$params = $request->all();
		$params['user_id'] = (int)$user->id;
		$todos = Todo::search($params)->get();

		return view('todos.search', compact('user', 'tags', 'todos'));
	}
}
