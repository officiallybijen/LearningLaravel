<x-layout>
    <form action="/admin/post" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <input type="text" name="title" value="{{ old('title') }}" placeholder="enter title"><br>
        @error('title')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        --}}

        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.input name="thumbnail" type="file" />
      
        <x-form.textarea name="body" />

        <select name="category_id">
            @foreach (\App\Models\Category::all() as $category)
                <option value="{{$category->id}}">{{ ucwords($category->name) }}</option>
            @endforeach
        </select>
        <br>
        <x-form.btn>
            Publish
        </x-form.btn>
    </form>
</x-layout>
