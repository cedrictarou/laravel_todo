<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <span class="mr-3">「{{ $user->name }}」でログイン中</span>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-todo-button btn='ログアウト' color="logout" />
    </form>
</div>
