<x-layout>
   
    <body style="font-family: Open Sans, sans-serif">
    @include('header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if($blogs->count())
                <x-blog-grid :blogs="$blogs"/>
            @else
                <p>No blogs yet</p>
            @endif
        </main>
</x-layout>

