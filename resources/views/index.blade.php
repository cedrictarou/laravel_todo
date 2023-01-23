@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="todo__container">
            <div class="todo-add__wrapper">
                <h1 class="title">Todo List</h1>
                <form action="/" class="todo-add__form">
                    <input type="text" class="todo-add__field input">
                    <button class="btn--add btn">追加</button>
                </form>
            </div>
            <div class="todo-list__wapper">
                <form action="/" class="todo-list__form">
                    <table class="todo-list__table">
                        <thead>
                            <td>作成日</td>
                            <td>タスク名</td>
                            <td>更新</td>
                            <td>削除</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="todo-list__date">2023-01-21 15:07:12</td>
                                <td class="todo-list__content"><input class="input" type="text" value="aaaaaaaa"></td>
                                <td class="todo-list__action"><button class="btn btn--update">更新</button></td>
                                <td class="todo-list__action"><button class="btn btn--delete">削除</button></td>
                            </tr>
                            <tr>
                                <td class="todo-list__date">2023-01-21 15:07:12</td>
                                <td class="todo-list__content"><input class="input" type="text" value="aaaaaaaa"></td>
                                <td class="todo-list__action"><button class="btn btn--update">更新</button></td>
                                <td class="todo-list__action"><button class="btn btn--delete">削除</button></td>
                            </tr>
                            <tr>
                                <td class="todo-list__date">2023-01-21 15:07:12</td>
                                <td class="todo-list__content"><input class="input" type="text" value="aaaaaaaa"></td>
                                <td class="todo-list__action"><button class="btn btn--update">更新</button></td>
                                <td class="todo-list__action"><button class="btn btn--delete">削除</button></td>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
