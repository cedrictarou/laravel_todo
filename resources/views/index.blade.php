@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="todo__container">
            <div class="todo-add__wrapper">
                <h1 class="title">Todo List</h1>
                <form action="{{ route('store') }}" method="POST" class="todo-add__form">
                    @csrf
                    <input type="text" class="todo-add__field input" name="content" placeholder="タスクを入力してください。">
                    <button class="btn--add btn" type="submit">追加</button>
                </form>
            </div>
            <div class="todo-list__wapper">

                <div class="todo-list__form">
                    <table class="todo-list__table">
                        <thead>
                            <td>作成日</td>
                            <td>タスク名</td>
                            <td>更新</td>
                            <td>削除</td>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td class="todo-list__date">{{ $todo->updated_at }}</td>
                                    <td class="todo-list__content">
                                        <form action="/update/{{ $todo->id }}" method="POST"
                                            id="form_{{ $todo->id }}">
                                            @csrf
                                            <input class="input" type="text" name="content"
                                                value="{{ $todo->content }}">
                                        </form>
                                    </td>
                                    <td class="todo-list__action">
                                        <button form="form_{{ $todo->id }}" type="submit" class="btn btn--update"
                                            data-action="/update/{{ $todo->id }}">更新</button>
                                    </td>
                                    <td class="todo-list__action">
                                        <form action="/delete/{{ $todo->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn--delete"
                                                data-action="/delete/{{ $todo->id }}">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
