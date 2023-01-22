@extends('layouts.default')

@section('content')
<div class="container">
    <div class="todo__container">
        <div class="todo-add__wrapper">
            <h1>Todo List</h1>
            <form action="/">
                <input type="text">
                <button>追加</button>
            </form>
        </div>
        <div class="todo-list__wapper">
            <form action="/">
                <table>
                    <thead>
                        <td>作成日</td>
                        <td>タスク名</td>
                        <td>更新</td>
                        <td>削除</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-01-21 15:07:12</td>
                            <td><input type="text" value="aaaaaaaa"></td>
                            <td><button>更新</button></td>
                            <td><button>削除</button></td>
                        </tr>
                        <tr>
                            <td>2023-01-21 15:07:12</td>
                            <td><input type="text" value="aaaaaaaa"></td>
                            <td><button>更新</button></td>
                            <td><button>削除</button></td>
                        </tr>
                        <tr>
                            <td>2023-01-21 15:07:12</td>
                            <td><input type="text" value="aaaaaaaa"></td>
                            <td><button>更新</button></td>
                            <td><button>削除</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
