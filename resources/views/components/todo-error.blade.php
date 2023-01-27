<ul class="w-1/2 absolute top-5 left-1/2 -translate-x-1/2">
    @foreach ($errors->all() as $error)
        <li class="text-center py-2 text-red-500 bg-red-200 rounded mb-2">{{ $error }}</li>
    @endforeach
</ul>
