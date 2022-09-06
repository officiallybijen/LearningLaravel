<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class BlogController extends Controller
{
    public function index()
    {
        return view('hi', [
            'blogs' => Blog::latest()->with('category', 'author')->filter(request(['search','category']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog){
        return view('blog',[
            'blog'=>$blog
        ]);
    
    }
}
