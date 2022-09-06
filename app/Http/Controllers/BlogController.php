<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function GuzzleHttp\Promise\all;

class BlogController extends Controller
{
    public function index()
    {
        return view('hi', [
            'blogs' => Blog::with('category', 'author')->filter(request(['search','category','author']))->paginate(5),
            
        ]);
        // $doc=YamlFrontMatter::parseFile(
        //     resource_path('blogs/firstblog.html')
        // );


        // $files=File::files(resource_path("blogs"));


        // $blogs=array_map(function($file){
        //     $document = YamlFrontMatter::parseFile($file);
        //     return new Blog(
        //         $document->title,
        //         $document->slug,
        //         $document->body()
        //     );
        // },$files);

        // foreach($files as $file){
        //     $document = YamlFrontMatter::parseFile($file);
        //     $blog[] =new Blog(
        //         $document->title,
        //         $document->slug,
        //         $document->body()
        //     );
        // }
        // $blogs=Blog::all();
    }

    public function create(){    
        return view('blog.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=>'required',
            'body'=>'required',
            'slug'=>'required',
            'thumbnail'=>'required',
            'category_id'=> 'required'
        ]);
        
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->id();
       
        Blog::create($attributes);
            // "title"=>request('title'),
            // "body"=>request('body'),
            // "slug"=>request('slug'),
            // "category_id"=>request('category_id')
        

        return redirect('/')->with('success','new blog added');
    }

    public function show(Blog $blog){
        return view('blog',[
            'blog'=>$blog,
            'comments'=>Comment::where('blog_id',$blog->id)->get()
        ]);
    
    }
}
