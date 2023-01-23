<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(Todo $todo, Request $request)
    {
        // フロントからcontentを取得
        $content = $request->input('content');
        // todoにcontentを代入して、BDに登録
        $todo->fill(['content' => $content])->save();
        return redirect('/');
    }
}
