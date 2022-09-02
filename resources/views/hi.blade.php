<x-layout>
    @if(session()->has('success'))
    <div style="position: fixed; top: 50px; right: 50;padding: 20px; background-color: rgb(51, 51, 173); color: white;">
        <p>{{ session('success')  }}</p>
    </div>
    @endif
    <body style="font-family: Open Sans, sans-serif">
    @include('header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if($blogs->count())
                <x-blog-grid :blogs="$blogs"/>
                {{ $blogs->links() }}
            @else
                <p>No blogs yet</p>
            @endif
        </main>
</x-layout>

