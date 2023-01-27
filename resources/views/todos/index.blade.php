<x-app-layout>
    <div class="container mx-auto px-5">
        @if (count($errors) > 0)
            <x-todo-error :errors="$errors" />
        @endif
        <div class="bg-white mt-20 rounded-lg p-5 max-w-3xl min-w-min container mx-auto">
            <div class="container mx-auto px-10">
                <div class="flex justify-between items-center">
                    <x-todo-title title="Todo List" />

                    {{-- ログイン中かの表示 --}}
                    @if (Auth::check())
                        <x-todo-login-box :user="$user" />
                    @endif
                </div>
                <div class="my-3">
                    <x-todo-link linkName="タグ検索" href="todos/search" />
                </div>

                <x-todo-form method="POST" action="{{ route('todos.store') }}">
                    <div class="flex-grow">
                        <x-todo-input name="content" placeHolder="タスクを入力してください" value="" />
                    </div>
                    <div>
                        <x-todo-select name="tag_id">
                            <option selected></option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </x-todo-select>
                    </div>
                    <x-todo-button btn='追加' color="add" />
                </x-todo-form>
            </div>
            <div class="container mx-auto">
                <div class="flex justify-center px-10 mt-5">
                    <table class="table-auto w-full text-md text-left text-gray-500 dark:text-gray-400 flex-grow">
                        <thead>
                            @php
                                $tds = ['作成日', 'タスク名', 'タグ', '更新', '削除'];
                            @endphp
                            @foreach ($tds as $td)
                                <th class="py-3 text-center">{{ $td }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($user->todo as $todo)
                                <tr>
                                    <td class="py-3">{{ $todo->updated_at }}</td>
                                    <form action="{{ route('todos.update', ['id' => $todo->id]) }}" method="POST">
                                        <td class="py-3">
                                            @csrf
                                            <x-todo-input name="content" value="{{ $todo->content }}" />
                                        </td>
                                        <td class="py-3">
                                            <x-todo-select name="tag_id">
                                                @foreach ($tags as $tag)
                                                    <option value={{ $tag->id }}
                                                        @if ($tag->id == $todo->getTagId()) selected @endif>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </x-todo-select>
                                        </td>
                                        <td class="py-3">
                                            <x-todo-button btn='更新' color="update" />
                                        </td>
                                    </form>

                                    <td class="py-3">
                                        <x-todo-form action="{{ route('todos.delete', ['id' => $todo->id]) }}"
                                            method="POST">
                                            <x-todo-button btn='削除' color="delete" />
                                        </x-todo-form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
