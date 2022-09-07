<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::paginate(6)
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog
        ]);
    }

    public function update(Blog $blog)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required'
        ]);
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $blog->update($attributes);

        return redirect('/')->with('success', 'Post Updated');
    }

    public function destroy(Blog $blog){

        $blog->delete();
        return back();

    }
}
