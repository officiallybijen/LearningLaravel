<x-layout>
    <form action="/admin/posts/{{$blog->id}}" method="post" enctype="multipart/form-data" style="width: 50%;margin: 40px auto;">
        @csrf
        @method('PATCH')
        {{-- <input type="text" name="title" value="{{ old('title') }}" placeholder="enter title"><br>
        @error('title')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        --}}
        <legend>Edit blog named <b>{{ $blog->title }}</b></legend>
        <x-form.input name="title" value="afafds"/>
        <x-form.input name="slug"/>
        <x-form.input name="thumbnail" type="file" />
      
        <x-form.textarea name="body" />

        <select name="category_id" class="form-select">
            @foreach (\App\Models\Category::all() as $category)
                <option value="{{$category->id}}">{{ ucwords($category->name) }}</option>
            @endforeach
        </select>
        <br>
        <x-form.btn class="btn btn-primary">
            Submit
        </x-form.btn>
    </form>
</x-layout>
