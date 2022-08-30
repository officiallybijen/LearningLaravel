{{-- @extends('layout')
@section('title')
    Blog Detail
@endsection
@section('content')
    <h1>{{$blog->title}}</h1>
    <p>{!! $blog->body !!}</p>
    <a href="/hi">Go back</a>
@endsection
 --}}

 {{-- <x-layout content="hello"></x-layout> --}}

 <x-layout>
        <h1>{{$blog->title}}</h1>
        <p>{!! $blog->body !!}</p>
        <a href="/hi">Go back</a>
</x-layout>
