@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="todo__container">
            <div class="todo-add__wrapper">
                <h1 class="title">Todo List</h1>
                <form action="/" method="POST" class="todo-add__form">
                    @csrf
                    <input type="text" class="todo-add__field input" name="content" placeholder="タスクを入力してください。">
                    <button class="btn--add btn" type="submit">追加</button>
                </form>
            </div>
            <div class="todo-list__wapper">
                <form action="/" method="POST" class="todo-list__form">
                    @csrf
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
                                    <td class="todo-list__content"><input class="input" type="text"
                                            value="{{ $todo->content }}">
                                    </td>
                                    <td class="todo-list__action"><button class="btn btn--update">更新</button></td>
                                    <td class="todo-list__action"><button class="btn btn--delete">削除</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
