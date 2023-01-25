@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-5">
        @error('content')
            <ul class="w-1/2 container mx-auto mt-5">
                <li class="text-center py-2 text-red-500 bg-red-200 rounded">{{ $message }}</li>
            </ul>
        @enderror
        <div class="bg-white mt-20 rounded-lg p-5 max-w-3xl min-w-min container mx-auto">
            <div class="container mx-auto px-10">
                <div class="flex justify-between items-center">
                    <h1 class="text-4xl p-4">Todo List</h1>

                    {{-- ログイン中かの表示 --}}
                    @if (Auth::check())
                        <div class="flex items-center">
                            <span>「{{ $user->name }}」でログイン中</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="inline-flex
																		ml-3 items-center px-3 py-1.5 bg-rose-500 hover:bg-rose-600 transition duration-500 ease-in-out
											text-white text-sm font-medium rounded-md mx-2"
                                    type="submit">ログアウト</button>
                            </form>
                        </div>
                    @endif
                </div>

                <form action="{{ route('todos.store') }}" method="POST" class="flex gap-2 justify-around">
                    @csrf
                    <input type="text" class="px-2 py-2 border rounded sm:w-10/12 w-2/3" name="content"
                        placeholder="タスクを入力してください。">
                    <button
                        class="inline-flex items-center px-3 py-1.5 bg-indigo-500 hover:bg-indigo-600 transition duration-500 ease-in-out
												text-white text-sm font-medium rounded-md mx-2"
                        type="submit">追加</button>
                </form>
            </div>
            <div class="container mx-auto">
                <div class="flex justify-center px-20 mt-5">
                    <table class="table-auto w-full text-md text-left text-gray-500 dark:text-gray-400">
                        <thead>
                            <th class="py-3 text-center">作成日</th>
                            <th class="py-3 text-center">タスク名</th>
                            <th class="py-3 text-center">更新</th>
                            <th class="py-3 text-center">削除</th>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td class="py-3 w-1/6">{{ $todo->updated_at }}</td>
                                    <form action="{{ route('todos.update', ['id' => $todo->id]) }}" method="POST">
                                        <td class="py-3 w-3/6">
                                            @csrf
                                            <input class="w-full border rounded px-2 py-2 focus:text-gray-800"
                                                type="text" name="content" value="{{ $todo->content }}">
                                        </td>
                                        <td class="py-3 text-center">
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-sky-500
																								hover:bg-sky-600
																								transition duration-500 ease-in-out
																								text-white text-sm font-medium rounded-md mx-1">更新</button>
                                        </td>
                                    </form>
                                    <td class="py-3 text-center">
                                        <form action="{{ route('todos.delete', ['id' => $todo->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-pink-500 hover:bg-pink-600
																								transition duration-500 ease-in-out text-white text-sm font-medium rounded-md mx-1">削除</button>
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
