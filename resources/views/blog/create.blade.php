<x-layout>
    <form action="/admin/post" method="post" enctype="multipart/form-data" style="width: 50%;margin: 40px auto;">
        @csrf
        {{-- <input type="text" name="title" value="{{ old('title') }}" placeholder="enter title"><br>
        @error('title')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        --}}
        <legend>Add a new blog:</legend>
        <fieldset>
        <x-form.input name="title"/>
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
            Publish
        </x-form.btn>
    </fieldset>
    </form>
</x-layout>
